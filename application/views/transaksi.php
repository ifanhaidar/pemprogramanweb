<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Tables
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Transaksi</li>
        </ol>
    </section>

    <section class="content">
        <?php echo $this->session->flashdata('message'); ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
            Tambah Transaksi</button>
        <a class="btn btn-danger" href="<?php echo base_url('transaksi/print') ?>"><i class="fa fa-print"></i>Print </a>
        <a class="btn btn-success" href="<?php echo base_url('transaksi/pdf') ?>"><i class="fa fa-download"></i>Export PDF </a>
        <a class="btn btn-warning" href="<?php echo base_url('transaksi/excel') ?>"><i class="fa fa-download"></i>Export Excel </a>

        <div class="navbar-form navbar-right">
            <?php echo form_open('transaksi/search') ?>
            <input type="text" name="keyword" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-info">Cari</button>
            <?php echo form_close() ?>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table Transaksi</h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Jasa</th>
                                    <th>Harga</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($transaksi as $tsk) : ?>

                                <tr>
                                    <td><?php echo $tsk->id ?></td>
                                    <td><?php echo $tsk->nama ?></td>
                                    <td><?php echo $tsk->alamat ?></td>
                                    <td><?php echo $tsk->telepon ?></td>
                                    <td><?php echo $tsk->tanggal ?></td>
                                    <td><?php echo $tsk->kategori ?></td>
                                    <td><?php echo $tsk->jasa ?></td>
                                    <td><?php echo $tsk->harga ?></td>
                                    <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('transaksi/hapus/' . $tsk->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                                    </td>
                                    <td><?php echo anchor('transaksi/edit/' . $tsk->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">FORM INPUT TRANSAKSI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'transaksi/tambah_aksi' ?>">

                        <div class="form-group"><label>ID Transaksi</label>
                            <input type="int" name="id" class="form-control">
                        </div>
                        <div class="form-group"><label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group"><label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group"><label>Telepon</label>
                            <input type="text" name="telepon" class="form-control">
                        </div>
                        <div class="form-group"><label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group"><label>Kategori</label>

                            <select class="form-control" name="kategori">
                                <option>Pemasangan</option>
                                <option>Perbaikan</option>
                            </select>
                        </div>
                        <div class="form-group"><label>Jasa</label>
                            <select class="form-control" name="jasa">
                                <option>Pengecetan</option>
                                <option>Pengecoran</option>
                                <option>Keramik</option>
                                <option>Atap</option>
                            </select>
                        </div>
                        <div class="form-group"><label>Harga</label>
                            <select class="form-control" name="harga">
                                <option>500000</option>
                                <option>600000</option>
                                <option>1000000</option>
                                <option>1200000</option>
                                <option>2800000</option>
                            </select>
                        </div>

                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

</div>
</div>