<?php
class Perhitungan_model extends Base_model
{
    protected $table = 'penilaian';
    public function __construct()
    {

        $this->load->database();

    }
 

}
