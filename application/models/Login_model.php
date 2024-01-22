<?php
class Login_model extends CI_Model
{
    public function __construct()
    {

        $this->load->database();

    }

    public function get_credentials($username, $password)
    {
    
            $this->db->select('*');
            $this->db->from('login'); 
            if(isset($username) && isset($password)){
                $this->db->where("Username", $username);
                $this->db->where("Password", $password);
            }
            $query = $this->db->get();
            return $query->first_row();
    }

}
