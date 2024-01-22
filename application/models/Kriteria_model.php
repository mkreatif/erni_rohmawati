<?php
class Kriteria_model extends Base_model
{
    protected $table = 'kriteria';
    public function __construct()
    {
        $this->load->database();
    }

}
