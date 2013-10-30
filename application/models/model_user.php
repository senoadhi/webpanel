<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: senonugroho
 * Date: 10/30/13
 * Time: 4:50 PM
 * Desc : Model class dipakai untuk data bersangkutan dengan user
 */

class Model_user extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    #check username n password admin playground
    function check_login($user_name,$password)
    {
        // $count  = $this->db->query("SELECT userid, username, password from register WHERE username = '".$user_name."' AND password ='".$password."' LIMIT 1" )->result_array();

        $this->db->select('id, username, password');
        $this->db->from('users');
        $this->db->where('username', $user_name);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }

}
?>