<?php

class M_orderan extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('transaksi');
    }
}
