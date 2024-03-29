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

    public function index()
    {
        $data['title'] = "Data Perhitungan";
        $data['db_entries'] = $this->perhitungan->get_perhitungan_distributors();
        $data['db_distributors'] = $this->distributor->get_all();
        $data["scripts"] = [
            "assets/js/modules/perhitungan.js?v=" . time(),
        ];
        $data['content_view'] = 'perhitungan/data_perhitungan';
        $this->load->view('templates/template', $data);
    }

    public function rekomendasi()
    {
        $data['title'] = "Rekomendasi Jalur";

        $data['db_entries'] = $this->perhitungan->get_perhitungan_distributors();
        $data["scripts"] = [
            "assets/js/modules/rekomendasi_jalur.js?v=" . time(),
        ];
        $data['content_view'] = 'perhitungan/distribusi_jalur';
        $this->load->view('templates/template', $data);
    }

    public function create()
    {
        try {
            // Process submitted data
            $in1 = $this->input->post('kode_distributor');
            $in4 = $this->input->post('N1');
            $in5 = $this->input->post('N2');
            $in6 = $this->input->post('N3');
            $in7 = $this->input->post('N4');
            $in8 = $this->input->post('N5');
            $in9 = $this->input->post('N_akhir');
            $in10 = $this->input->post('N_ket');

            $result = $this->perhitungan->insert(array(
                "kode_distributor" => $in1,
                "N1" => $in4,
                "N2" => $in5,
                "N3" => $in6,
                "N4" => $in7,
                "N5" => $in8,
                "N_akhir" => $in9,
                "N_ket" => $in10,
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

    public function update($id = -1)
    {
        try {
            // Process submitted data
            $in1 = $this->input->post('kode_distributor');
            $in4 = $this->input->post('N1');
            $in5 = $this->input->post('N2');
            $in6 = $this->input->post('N3');
            $in7 = $this->input->post('N4');
            $in8 = $this->input->post('N5');
            $in9 = $this->input->post('N_akhir');
            $in10 = $this->input->post('N_ket');

            $result = $this->perhitungan->update($id, array(
                "kode_distributor" => $in1,
                "N1" => $in4,
                "N2" => $in5,
                "N3" => $in6,
                "N4" => $in7,
                "N5" => $in8,
                "N_akhir" => $in9,
                "N_ket" => $in10,
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

    public function delete($id = -1)
    {
        try {
            $result = $this->perhitungan->delete($id);
            if (isset($result)) {
                echo json_encode(['status' => 'success', 'message' => 'Data Berhasil Hapus Data', "data" => $result]);
            } else {
                echo json_encode(['status' => 'failed', 'message' => 'Data Gagal Hapus Data', "data" => $result]);
            }
        } catch (Throwable $th) {
            throw $th;
        }

    }

}
