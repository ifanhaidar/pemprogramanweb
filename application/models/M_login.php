<?php
class M_login extends CI_Model
{

    function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => $password

        );

        $cek = $this->db->get_where('user', $where)->num_rows();

        if ($cek > 0) {
            $data_session = array('nama' => $username, 'status' => "login");
            $this->session->set_userdata($data_session);

            redirect('admin/dashboard'); //jika berhasil login akan ke controller admin
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Anda Gagal Login, Coba Lagi!
          </div>');
            redirect('login'); //jika tidak berhasil login akan ke controller login
        }
    }
}
