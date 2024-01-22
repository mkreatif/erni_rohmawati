<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = "Kriteria";
        $this->load->view('templates/header', $data);
        $this->load->view("kriteria/kriteria.php");
        $this->load->view('templates/footer');
    }
    
    public function bobot()
    {
        $data['title'] = "Bobot Kriteria";
        $this->load->view('templates/header', $data);
        $this->load->view("kriteria/kriteria.php");
        $this->load->view('templates/footer');
    }

}
