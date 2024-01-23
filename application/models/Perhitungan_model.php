<?php
class Perhitungan_model extends Base_model
{
    protected $table = 'table_penilaian_distributor';
    public function __construct()
    {

        $this->load->database();

    }

    public function get_perhitungan_distributors() {
        // Select columns from both tables
        $this->db->select('tpd.*, td.nama , td.distributor');
        
        // Specify the tables to be joined and the common column
        $this->db->from('table_penilaian_distributor tpd ');
        $this->db->join('table_distributor td', 'tpd.kode_distributor = td.id');
        // Execute the query
        $query = $this->db->get();

        // Return the result 
        return $query->result();
    }
 

}
