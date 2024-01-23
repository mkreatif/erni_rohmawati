<?php
class Login_model extends Base_model
{
    protected $table = 'table_user';
    public function __construct()
    {

        $this->load->database();

    } 

}
