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
        $data['title'] = 'Login';
        $data["scripts"] = [
            "assets/js/modules/login.js",
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('login/login', $data);
        $this->load->view('templates/footer');

    }

    public function sign_in()
    {
        try {
            // Process submitted data
            $username = $this->input->post('Username');
            $password = $this->input->post('Password');

            // Return response (you can also return JSON)
            $data = $this->login_model->get_credentials($username, $password);
            $where = array("Username" => $username, "Passwrod" => $password);
            if (isset($data)) {
                echo json_encode(['status' => 'success', 'message' => 'Anda Berhasil Login', "data" => $where, "data2" => $data]);
            } else {
                echo json_encode(['status' => 'failed', 'message' => 'Username atau Password Salah', "data" => $where, "data2" => $data]);
            }
        } catch (Exception $e) {
            // Catch any other exceptions that are not DivisionByZeroError
            echo "Caught exception: " . $e->getMessage();
        }

    }
}
