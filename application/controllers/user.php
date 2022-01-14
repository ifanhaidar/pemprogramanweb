<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->m_user->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
        );
        $this->m_user->input_data($data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan!
      </div>');
        redirect('user/index');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_user->hapus_data($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus!
      </div>');
        redirect('user/index');
    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['user'] = $this->m_user->edit_data($where, 'user')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edituser', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'username' => $username,
            'password' => $password
        );

        $where = array('id' => $id);

        $this->m_user->update_data($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate!
      </div>');
        redirect('user/index');
    }
    public function print()
    {
        $data['user'] = $this->m_user->tampil_data("user")->result();
        $this->load->view('print_user', $data);
    }
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['user'] = $this->m_user->tampil_data("user")->result();
        $this->load->view('pdf_user', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_user.pdf", array('Attachment' => 0));
    }
    public function excel()
    {
        $data['user'] = $this->m_user->tampil_data('user')->result();
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $object = new PHPExcel();

        $object->getProperties()->setCreator("Userku");
        $object->getProperties()->setLastModifiedBy("Userku");
        $object->getProperties()->setTitle("Daftar Userku");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'Username');
        $object->getActiveSheet()->setCellValue('C1', 'Password');

        $baris = 2;
        $no = 1;

        foreach ($data['user'] as $usr) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $usr->username);
            $object->getActiveSheet()->setCellValue('C' . $baris, $usr->password);

            $baris++;
        }
        $filename = "Data_User" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data User");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['user'] = $this->m_user->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user', $data);
        $this->load->view('templates/footer');
    }
}
