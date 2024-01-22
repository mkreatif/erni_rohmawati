<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('url_helper');
        $this->load->model('perhitungan_model', "perhitungan");
    }

    public function index(){
        $data['title'] = "Data Perhitungan";
        $data['db_entries'] = $this->perhitungan->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view("perhitungan/data_perhitungan.php");
        $this->load->view('templates/footer');
    } 
    
}
