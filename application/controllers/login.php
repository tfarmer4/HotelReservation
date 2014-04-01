<?php

require_once('generateHash.php');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }
    //TODO: Add server side input validation
    function index()
    {
        $this->load->library('session');
        $this->load->model('db_model');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->view('header');
        $this->load->view('login_form');
        if($this->session->userdata('loggedIn')=='TRUE')
        {
            redirect('home');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    function doLogin()
    {


        $u_name = $this->input->post('username', TRUE) ? $this->input->post('username', TRUE) : '';
        $pw = $this->input->post('password', TRUE) ? $this->input->post('password', TRUE) : '';
        $this->db->select('uName,pass AS hash, salt');
        $this->db->from('Users');
        $this->db->where('uName', $u_name);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
        {

            $row = $query->row();
            $generator = new GenerateHash($pw, $row->salt);
            $hash = $generator->hash($pw, $row->salt);

            if ($row->hash == $hash['hash'])
            {
                $sessionData = array('uName' => $u_name, 'loggedIn' => 'TRUE');
                $this->session->unset_userdata('loginSuccess');
                $this->session->set_userdata($sessionData);
                $this->session->unset_userdata('error_login');
                redirect('home');
            }
            else
            {
                $this->session->set_userdata(array('error_login' => '1', 'loggedIn' => 'FALSE'));
                redirect('login');
            }
        }
        else
        {
            $this->session->set_userdata(array('error_login' => '1', 'loggedIn' => 'FALSE'));
            redirect('login');
        }
    }
    
    function admin_login()
    {
        $u_name = $this->input->post('username', TRUE) ? $this->input->post('username', TRUE) : '';
        $pw = $this->input->post('password', TRUE) ? $this->input->post('password', TRUE) : '';
        $this->db->select('uName,pass AS hash, salt');
        $this->db->from('Users');
        $this->db->where('uName', $u_name);
        $this->db->where('isAdmin', true);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
        {

            $row = $query->row();
            $generator = new GenerateHash($pw, $row->salt);
            $hash = $generator->hash($pw, $row->salt);

            if ($row->hash == $hash['hash'])
            {
                $sessionData = array('uName' => $u_name, 'loggedIn' => 'TRUE', 'admin'=>'TRUE');
                $this->session->unset_userdata('loginSuccess');
                $this->session->set_userdata($sessionData);
                $this->session->unset_userdata('error_login');
                redirect('admin_home');
            }
            else
            {
                $this->session->set_userdata(array('error_login' => '1', 'loggedIn' => 'FALSE'));
                unset($_POST['username']);
                unset($_POST['password']);
                redirect('admin');
            }
        }
        else
        {
            $this->session->set_userdata(array('error_login' => '1', 'loggedIn' => 'FALSE'));
            unset($_POST['username']);
            unset($_POST['password']);
            redirect('admin');
        }
    }  

}
