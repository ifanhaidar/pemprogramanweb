<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart1 extends CI_Controller
{

    public function chart()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('chart');
        $this->load->view('templates/footer');
    }
}
