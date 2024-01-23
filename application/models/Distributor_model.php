<?php
class Distributor_model extends Base_model
{
    protected $table = 'table_distributor';
    public function __construct()
    {

        $this->load->database();

    }
 

}
