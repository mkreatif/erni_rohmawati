<?php
class Vektor_model extends Base_model
{
    protected $table = 'table_vektor';
    public function __construct()
    {

        $this->load->database();

    } 

}
