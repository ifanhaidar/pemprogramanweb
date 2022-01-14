<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Tables
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Jasa</li>
        </ol>
    </section>

    <section class="content">
        <?php echo $this->session->flashdata('message'); ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
            Tambah List Jasa</button>

        <a class="btn btn-danger" href="<?php echo base_url('jasa/print') ?>"><i class="fa fa-print"></i>Print </a>
        <a class="btn btn-success" href="<?php echo base_url('jasa/pdf') ?>"><i class="fa fa-download"></i>Export PDF </a>
        <a class="btn btn-warning" href="<?php echo base_url('jasa/excel') ?>"><i class="fa fa-download"></i>Export Excel </a>

        <div class="navbar-form navbar-right">
            <?php echo form_open('jasa/search') ?>
            <input type="text" name="keyword" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-info">Cari</button>
            <?php echo form_close() ?>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table Jasa</h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>Nama Jasa</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($jasa as $jsa) : ?>

                                <tr>
                                    <td><?php echo $jsa->id ?></td>
                                    <td><?php echo $jsa->kategori ?></td>
                                    <td><?php echo $jsa->nama ?></td>
                                    <td><?php echo $jsa->harga ?></td>
                                    <td><?php echo $jsa->deskripsi ?></td>
                                    <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('jasa/hapus/' . $jsa->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                                    </td>
                                    <td><?php echo anchor('jasa/edit/' . $jsa->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>

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
                    <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA JASA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'jasa/tambah_aksi' ?>">

                        <div class="form-group"><label>ID Jasa</label>
                            <input type="int" name="id" class="form-control">
                        </div>
                        <div class="form-group"><label>Kategori</label>

                            <select class="form-control" name="kategori">
                                <option>Pemasangan</option>
                                <option>Perbaikan</option>
                            </select>
                        </div>
                        <div class="form-group"><label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group"><label>Harga</label>
                            <input type="text" name="harga" class="form-control">
                        </div>
                        <div class="form-group"><label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control">
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