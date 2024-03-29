<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->helper('url_helper');
    }

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $data['content_view'] = 'pages/' . $page;
        $this->load->view('templates/template', $data);
    }
}
