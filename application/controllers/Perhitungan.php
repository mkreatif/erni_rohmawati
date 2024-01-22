<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('url_helper');
        $this->load->model('perhitungan_model', "perhitungan");
        $this->load->model('distributor_model', "distributor");
    }

    public function index(){
        $data['title'] = "Data Perhitungan";
        $data['db_entries'] = $this->perhitungan->get_all();
        $data['db_distributors'] = $this->distributor->get_all();
        $data["scripts"] = [
            "assets/js/modules/perhitungan.js?v=".time(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view("perhitungan/data_perhitungan.php");
        $this->load->view('templates/footer');
    } 
    
    public function create()
    {
        try {
            // Process submitted data
            $in1 = $this->input->post('kode_distributor');
            $in2 = $this->input->post('nama');
            $in3 = $this->input->post('perusahaan');
            $in4 = $this->input->post('N1');
            $in5 = $this->input->post('N2');
            $in6 = $this->input->post('N3');
            $in7 = $this->input->post('N4');
            $in8 = $this->input->post('N5');
            $in9 = $this->input->post('N_akhir');
            $in10 = $this->input->post('N_ket');

            $result = $this->perhitungan->insert(array(
                "kode_distributor"=> $in1,
				"nama"=> $in2,
				"perusahaan"=> $in3,
				"N1"=> $in4,
				"N2"=> $in5,
				"N3"=> $in6,
				"N4"=> $in7,
				"N5"=> $in8,
				"N_akhir"=> $in9,
				"N_ket"=> $in10,
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
