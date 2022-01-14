<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi extends CI_Controller
{
    public function index()
    {
        $data['transaksi'] = $this->m_transaksi->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('transaksi', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $tanggal = $this->input->post('tanggal');
        $kategori = $this->input->post('kategori');
        $jasa = $this->input->post('jasa');
        $harga = $this->input->post('harga');

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'tanggal' => $tanggal,
            'kategori' => $kategori,
            'jasa' => $jasa,
            'harga' => $harga,
        );
        $this->m_transaksi->input_data($data, 'transaksi');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan!
      </div>');
        redirect('transaksi/index');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_transaksi->hapus_data($where, 'transaksi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus!
      </div>');
        redirect('transaksi/index');
    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['transaksi'] = $this->m_transaksi->edit_data($where, 'transaksi')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edittransaksi', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $tanggal = $this->input->post('tanggal');
        $kategori = $this->input->post('kategori');
        $jasa = $this->input->post('jasa');
        $harga = $this->input->post('harga');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'tanggal' => $tanggal,
            'kategori' => $kategori,
            'jasa' => $jasa,
            'harga' => $harga
        );

        $where = array('id' => $id);

        $this->m_transaksi->update_data($where, $data, 'transaksi');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate!
      </div>');
        redirect('transaksi/index');
    }
    public function print()
    {
        $data['transaksi'] = $this->m_transaksi->tampil_data("transaksi")->result();
        $this->load->view('print_transaksi', $data);
    }
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['transaksi'] = $this->m_transaksi->tampil_data("transaksi")->result();
        $this->load->view('pdf_transaksi', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_transaksi.pdf", array('Attachment' => 0));
    }
    public function excel()
    {
        $data['transaksi'] = $this->m_transaksi->tampil_data('transaksi')->result();
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $object = new PHPExcel();

        $object->getProperties()->setCreator("Transaksiku");
        $object->getProperties()->setLastModifiedBy("Transaksikuku");
        $object->getProperties()->setTitle("Daftar Transaksiku");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'Nama');
        $object->getActiveSheet()->setCellValue('C1', 'Alamat');
        $object->getActiveSheet()->setCellValue('D1', 'Telepon');
        $object->getActiveSheet()->setCellValue('E1', 'Tanggal');
        $object->getActiveSheet()->setCellValue('F1', 'Kategori');
        $object->getActiveSheet()->setCellValue('G1', 'Jasa');
        $object->getActiveSheet()->setCellValue('H1', 'Harga');

        $baris = 2;
        $no = 1;

        foreach ($data['transaksi'] as $tsk) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $tsk->nama);
            $object->getActiveSheet()->setCellValue('C' . $baris, $tsk->alamat);
            $object->getActiveSheet()->setCellValue('D' . $baris, $tsk->telepon);
            $object->getActiveSheet()->setCellValue('E' . $baris, $tsk->tanggal);
            $object->getActiveSheet()->setCellValue('F' . $baris, $tsk->kategori);
            $object->getActiveSheet()->setCellValue('G' . $baris, $tsk->jasa);
            $object->getActiveSheet()->setCellValue('H' . $baris, $tsk->harga);

            $baris++;
        }
        $filename = "Data_Transaksi" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Transaksi");

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
        $data['transaksi'] = $this->m_transaksi->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('transaksi', $data);
        $this->load->view('templates/footer');
    }
}
