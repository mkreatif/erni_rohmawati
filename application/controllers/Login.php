<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['credentials'] = $this->login_model->get_credentials();
        $data['title'] = 'Login';
        
        if (empty($data['credentials']))
        {
                show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('login/login', $data);
        $this->load->view('templates/footer');

        echo json_encode($data);
    }

    public function view($slug = null)
    {
        $where = array("Username" => "");
        $data['login'] = $this->login_model->get_credentials($where);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/login', $data);
        $this->load->view('templates/footer');
    }
}
