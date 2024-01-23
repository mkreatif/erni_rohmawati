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
            "assets/js/modules/distributor.js?v=".time(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view("distributor/data_distributor");
        $this->load->view('templates/footer');
    }

    public function create()
    {
        try {
            // Process submitted data
            $in1 = $this->input->post('id');
            $in2 = $this->input->post('distributor');
            $in3 = $this->input->post('nama');
            $in4 = $this->input->post('no_tlp');
            $in5 = $this->input->post('alamat');

            $result = $this->distributor->insert(array(
                "id"=> $in1,
				"distributor"=> $in2,
				"nama"=> $in3,
				"no_tlp"=> $in4,
				"alamat"=> $in5,
            ));

            if (isset($result)) {
                echo json_encode(['status' => 'success', 'message' => 'Data Berhasil Disimpan', "data" => $result]);
            } else {
                echo json_encode(['status' => 'failed', 'message' => 'Data Gagal Disimpan', "data" => $result]);
            }
        } catch (Throwable $th) {
            throw $th;
        }

    }

}