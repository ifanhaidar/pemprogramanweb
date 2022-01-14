<?php

class M_transaksi extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('transaksi');
    }
    public function input_data($data)
    {

        $this->db->insert('transaksi', $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->like('nama', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('telepon', $keyword);
        $this->db->or_like('tanggal', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('jasa', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get()->result();
    }
}
