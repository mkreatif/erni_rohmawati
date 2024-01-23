<?php
class Kriteria_model extends Base_model
{
    protected $table = 'table_kriteria';
    public function __construct()
    {
        $this->load->database();
    }

}
