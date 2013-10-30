<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: senonugroho
 * Date: 10/30/13
 * Time: 4:49 PM
 * To change this template use File | Settings | File Templates.
 */

class Login extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->_user = $this->session->all_userdata();

        $this->load->model('model_user');
    }

    function index()
    {

        if($this->session->userdata('logged_in') == TRUE)
        {
            redirect('home');
        }

        #Build post data
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $rememberme = $this->input->post('remember');

        #set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required','field tidak boleh kosong..');

        if ($this->form_validation->run() == FALSE)
        {

            $this->load->view(GLOBAL_TEMPLATE.'/login_header');
            $this->load->view('login');
            $this->load->view(GLOBAL_TEMPLATE.'/login_footer');
            return;
        }
        else
        {
            $data_user = $this->model_user->check_login($username, $password);

            if ($data_user)
            {
                $newdata = array('logged_in' => array(
                    'id' => $data_user[0]['id'],
                    'username' => $username
                )
                );
                $this->session->set_userdata($newdata);

                #Adding Remember me functionality
                $year = time() + 31536000;

                if($rememberme)
                {
                    setcookie('remember_me', $username, $year);
                }
                elseif(!$rememberme)
                {
                    if(isset($_COOKIE['remember_me']))
                    {
                        $past = time() - 100;
                        setcookie('remember_me','gone', $past);
                    }
                }

                redirect('home');
            }
            else
            {
                redirect('login');
            }
        }


    }

    function logout()
    {
        $this->session->sess_destroy('logged_in');

        $this->load->view(GLOBAL_TEMPLATE.'/login_header');
        $this->load->view('login');
        $this->load->view(GLOBAL_TEMPLATE.'/login_footer');
    }

}

?>