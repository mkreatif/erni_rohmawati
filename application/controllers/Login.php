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
        $data['content_view'] = 'login/login'; 
        $this->load->view('templates/template', $data); 

    }

    public function sign_in()
    {
        try {
            // Process submitted data
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if (isset($username) && isset($password)) {
                $data = $this->login_model->get_by_conditions(array("username"=>$username, "password"=> $password));
                // Return response (you can also return JSON)
                if (isset($data) && !empty($data)) {
                    echo json_encode(['status' => 'success', 'message' => 'Anda Berhasil Login',  "data" => $data]);
                } else {
                    echo json_encode(['status' => 'failed', 'message' => 'Username atau Password Salah', "data" => $data]);
                }
            }else{
                echo json_encode(['status' => 'failed', 'message' => 'Inputan Tidak Lengkap', "data" => null]);
            }

        } catch (Exception $e) {
            // Catch any other exceptions that are not DivisionByZeroError
            echo "Caught exception: " . $e->getMessage();
        }

    }
}
