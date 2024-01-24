<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('url_helper');
    }

    public function index(){
        $data['title'] = "Beranda";
        $data["scripts"] = [
            "assets/js/modules/beranda.js",
        ]; 
        $data['content_view'] = 'beranda/dashboard';
        $this->load->view('templates/template', $data);
    } 
    
}
