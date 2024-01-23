<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eigenvektor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('url_helper');
    }

    public function index(){
        $data['title'] = "Eigen Vektor";
        $data['content_view'] = 'eigen_vektor/eigen_vektor';
        $this->load->view('templates/template', $data);
    } 
    
}
