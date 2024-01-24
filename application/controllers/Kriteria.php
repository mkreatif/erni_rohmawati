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
        $data["scripts"] = [
            "assets/js/modules/kriteria.js?v=".time(),
        ];
        $data['content_view'] = 'kriteria/kriteria';
        $this->load->view('templates/template', $data);
    }

    public function bobot()
    {
        $data['title'] = "Bobot Kriteria";
        $data['content_view'] = 'kriteria/bobot-kriteria';
        $this->load->view('templates/template', $data);
    }

    public function create($id = -1)
    {
        try {
            // Process submitted data
            $kk = $this->input->post('K_kriteria');
            $nk = $this->input->post('N_kriteria');
            $pk = $this->input->post('P_kriteria');
            $result;
            if($id != -1){
                $result = $this->kriteria->update($id, array(
                    "k_kriteria" => $kk,
                    "n_kriteria" => $nk,
                    "p_kriteria" => $pk,
                ));
            }else{
                $result = $this->kriteria->insert(array(
                    "k_kriteria" => $kk,
                    "n_kriteria" => $nk,
                    "p_kriteria" => $pk,
                ));
            }

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
            $result = $this->kriteria->delete($id);
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
