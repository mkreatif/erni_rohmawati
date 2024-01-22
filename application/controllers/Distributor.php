<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distributor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('url_helper');
    }

    public function index(){
        $data['title'] = "Data Distributor";
        $this->load->view('templates/header', $data);
        $this->load->view("distributor/data_distributor");
        $this->load->view('templates/footer');
    } 
    
}
