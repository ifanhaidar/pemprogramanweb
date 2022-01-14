<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tukang extends CI_Controller
{
    public function index()
    {
        $data['tukang'] = $this->m_tukang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tukang', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }


        $data = array(
            'id' => $id,
            'username' => $username,
            'nama' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'email' => $email,
            'password' => $password,
            'foto' => $foto
        );
        $this->m_tukang->input_data($data, 'tukang');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan!
      </div>');
        redirect('tukang/index');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_tukang->hapus_data($where, 'tukang');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus!
      </div>');
        redirect('tukang/index');
    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['tukang'] = $this->m_tukang->edit_data($where, 'tukang')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
            'username' => $username,
            'nama' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'email' => $email,
            'password' => $password
        );

        $where = array('id' => $id);

        $this->m_tukang->update_data($where, $data, 'tukang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate!
      </div>');
        redirect('tukang/index');
    }
    public function detail($id)
    {
        $this->load->model('m_tukang');
        $detail = $this->m_tukang->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail', $data);
        $this->load->view('templates/footer');
    }
    public function print()
    {
        $data['tukang'] = $this->m_tukang->tampil_data("tukang")->result();
        $this->load->view('print_tukang', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['tukang'] = $this->m_tukang->tampil_data("tukang")->result();
        $this->load->view('pdf_tukang', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_tukang.pdf", array('Attachment' => 0));
    }
    public function excel()
    {
        $data['tukang'] = $this->m_tukang->tampil_data('tukang')->result();
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $object = new PHPExcel();

        $object->getProperties()->setCreator("Tukangku");
        $object->getProperties()->setLastModifiedBy("Tukangku");
        $object->getProperties()->setTitle("Daftar Tukangku");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'Username');
        $object->getActiveSheet()->setCellValue('C1', 'Nama');
        $object->getActiveSheet()->setCellValue('D1', 'Alamat');
        $object->getActiveSheet()->setCellValue('E1', 'Telepon');
        $object->getActiveSheet()->setCellValue('F1', 'Password');

        $baris = 2;
        $no = 1;

        foreach ($data['tukang'] as $tkg) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $tkg->username);
            $object->getActiveSheet()->setCellValue('C' . $baris, $tkg->nama);
            $object->getActiveSheet()->setCellValue('D' . $baris, $tkg->alamat);
            $object->getActiveSheet()->setCellValue('E' . $baris, $tkg->telepon);
            $object->getActiveSheet()->setCellValue('F' . $baris, $tkg->password);

            $baris++;
        }
        $filename = "Data_Tukang" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Tukang");

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
        $data['tukang'] = $this->m_tukang->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tukang', $data);
        $this->load->view('templates/footer');
    }
}
