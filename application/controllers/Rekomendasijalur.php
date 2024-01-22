<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasijalur
 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('url_helper');
    }

    public function index(){
        $data['title'] = "Rekomendasi Jalur";
        $this->load->view('templates/header', $data);
        $this->load->view("distribusi_jalur/distribusi_jalur.php");
        $this->load->view('templates/footer');
    } 
    
}