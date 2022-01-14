<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Orderan extends CI_Controller
{
    public function index()
    {
        $data['orderan'] = $this->m_orderan->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('orderan', $data);
    }
    public function print()
    {
        $data['transaksi'] = $this->m_transaksi->tampil_data("transaksi")->result();
        $this->load->view('print_transaksi', $data);
    }
}
