<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Seno Adhi Nugroho.
 * User: senonugroho
 * Date: 10/30/13
 * Time: 4:48 PM
 */

class Home extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->_user = $this->session->all_userdata();

        $this->load->model('model_user');
    }
    function index()
    {

        $sess_data = $this->session->userdata('logged_in');

        if($sess_data == FALSE)
        {
            redirect('login');
        }

        $this->load->view(GLOBAL_TEMPLATE.'/header');
        $this->load->view('home');
        $this->load->view(GLOBAL_TEMPLATE.'/footer');

    }

    function features()
    {
        $this->load->view(GLOBAL_TEMPLATE.'/header');
        $this->load->view('features');
        $this->load->view(GLOBAL_TEMPLATE.'/footer');
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login');
    }

}