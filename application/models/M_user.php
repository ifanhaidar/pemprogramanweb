<?php

class M_user extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('user');
    }
    public function input_data($data)
    {

        $this->db->insert('user', $data);
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
        $this->db->from('user');
        $this->db->like('username', $keyword);
        $this->db->or_like('password', $keyword);
        return $this->db->get()->result();
    }
}
