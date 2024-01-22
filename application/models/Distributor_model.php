<?php
class Distributor_model extends Base_model
{
    protected $table = 'data_distributor';
    public function __construct()
    {

        $this->load->database();

    }
 

}
