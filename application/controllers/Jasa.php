<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jasa extends CI_Controller
{
    public function index()
    {
        $data['jasa'] = $this->m_jasa->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jasa', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'id' => $id,
            'kategori' => $kategori,
            'nama' => $nama,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
        );
        $this->m_jasa->input_data($data, 'jasa');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan!
      </div>');
        redirect('jasa/index');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_jasa->hapus_data($where, 'jasa');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus!
      </div>');
        redirect('jasa/index');
    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['jasa'] = $this->m_jasa->edit_data($where, 'jasa')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('editjasa', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'kategori' => $kategori,
            'nama' => $nama,
            'harga' => $harga,
            'deskripsi' => $deskripsi
        );

        $where = array('id' => $id);

        $this->m_jasa->update_data($where, $data, 'jasa');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate!
      </div>');
        redirect('jasa/index');
    }
    public function print()
    {
        $data['jasa'] = $this->m_jasa->tampil_data("jasa")->result();
        $this->load->view('print_jasa', $data);
    }
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['jasa'] = $this->m_jasa->tampil_data("jasa")->result();
        $this->load->view('pdf_jasa', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_jasa.pdf", array('Attachment' => 0));
    }
    public function excel()
    {
        $data['jasa'] = $this->m_jasa->tampil_data('jasa')->result();
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $object = new PHPExcel();

        $object->getProperties()->setCreator("Jasaku");
        $object->getProperties()->setLastModifiedBy("Jasaku");
        $object->getProperties()->setTitle("Daftar Jasaku");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'Kategori');
        $object->getActiveSheet()->setCellValue('C1', 'Nama Jasa');
        $object->getActiveSheet()->setCellValue('D1', 'Harga');
        $object->getActiveSheet()->setCellValue('E1', 'Deskripsi');

        $baris = 2;
        $no = 1;

        foreach ($data['jasa'] as $jsa) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $jsa->kategori);
            $object->getActiveSheet()->setCellValue('C' . $baris, $jsa->nama);
            $object->getActiveSheet()->setCellValue('D' . $baris, $jsa->harga);
            $object->getActiveSheet()->setCellValue('E' . $baris, $jsa->deskripsi);

            $baris++;
        }
        $filename = "Data_Jasa" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Jasa");

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
        $data['jasa'] = $this->m_jasa->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jasa', $data);
        $this->load->view('templates/footer');
    }
}
