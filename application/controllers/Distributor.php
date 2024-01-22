<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distributor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('distributor_model', "distributor");
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = "Data Distributor";
        $data['dis_options'] = array(
            "Distributor A" => "J&T Ekspress",
            "Distributor B" => "Cahaya Logistik",
            "Distributor C" => "JNE",
            "Distributor D" => "Kargo Tech",
            "Distributor E" => "Indah Logistik",
            "Distributor F" => "Tiki",
            "Distributor G" => "Pos Indonesia",
            "Distributor H" => "Ninja Express",
            "Distributor I" => "Mas Kargo",
            "Distributor J" => "ID Ekspress",
        );
        $data["db_entries"] = $this->distributor->get_all(); 
        $data["scripts"] = [
            "assets/js/modules/distributor.js",
        ];
        $this->load->view('templates/header', $data);
        $this->load->view("distributor/data_distributor");
        $this->load->view('templates/footer');
    }

}