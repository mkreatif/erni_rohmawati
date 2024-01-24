<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eigenvektor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('vektor_model', "vektor");
    }

    public function index()
    {
        $data['title'] = "Eigen Vektor";
        $data["default_kriteria"] = [
            array("code" => "A1", "name" => "Jarak", "bobot" => "20"),
            array("code" => "A2", "name" => "Estimasi", "bobot" => "20"),
            array("code" => "A3", "name" => "Kapasitas", "bobot" => "15"),
            array("code" => "A4", "name" => "Biaya", "bobot" => "15"),
            array("code" => "A5", "name" => "Skill", "bobot" => "20"),
        ];
        $data['db_entries'] = $this->vektor->get_all();
        $data["scripts"] = [
            "assets/js/modules/eigen_vektro.js?v=" . time(),
        ];
        $data['content_view'] = 'eigen_vektor/eigen_vektor';
        $this->load->view('templates/template', $data);
    }

    public function create()
    {
        try {
            // Process submitted data
            $data = array(
                "nama" => $this->input->post('nama'),
                "prioritas" => $this->input->post('prioritas'),
                "N_akhir" => $this->input->post('N_akhir'),
            );
            for ($i = 1; $i <= 5; $i++) {
                $name = "N" . $i;
                $data[$name] = $this->input->post($name);
            }

            $result = $this->vektor->insert($data);

            if (isset($result)) {
                echo json_encode(['status' => 'success', 'message' => 'Data Berhasil Disimpan', "data" => $result]);
            } else {
                echo json_encode(['status' => 'failed', 'message' => 'Data Gagal Disimpan', "data" => $result]);
            }
        } catch (Throwable $th) {
            throw $th;
        }

    }
    public function update($i = -1)
    {
        try {
            // Process submitted data
            $data = array(
                "nama" => $this->input->post('nama'),
                "prioritas" => $this->input->post('prioritas'),
                "N_akhir" => $this->input->post('N_akhir'),
            );
            for ($i = 1; $i <= 5; $i++) {
                $name = "N" . $i;
                $data[$name] = $this->input->post($name);
            }

            $result = $this->vektor->update($i, $data);

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
            $result = $this->vektor->delete($id);
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
