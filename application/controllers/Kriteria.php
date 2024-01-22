<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kriteria_model', "kriteria");
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = "Kriteria";
        $data["option_kode"] = array("C1", "C2", "C3", "C4", "C5");
        $data["option_nama"] = array("Jarak", "Estimasi", "Kapasitas", "Biaya", "Skill");
        $data["option_bobot"] = array("10", "15", "20");
        $data["db_entries"] = $this->kriteria->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view("kriteria/kriteria.php");
        $this->load->view('templates/footer');
    }

    public function bobot()
    {
        $data['title'] = "Bobot Kriteria";
        $this->load->view('templates/header', $data);
        $this->load->view("kriteria/bobot-kriteria.php");
        $this->load->view('templates/footer');
    }

}
