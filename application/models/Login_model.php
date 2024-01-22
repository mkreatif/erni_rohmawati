<?php
class Login_model extends CI_Model
{
    public function __construct()
    {

        $this->load->database();

    }

    public function get_credentials($where = [])
    {
        if (is_array($where) && !empty($where)) {

        } else {
            $query = $this->db->get('login');
            return $query->result_array();
        }

    }

}
