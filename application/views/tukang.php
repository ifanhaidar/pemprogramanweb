<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Tables
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Tukang</li>
        </ol>
    </section>

    <section class="content">
        <?php echo $this->session->flashdata('message'); ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
            Tambah Data Tukang</button>
        <a class="btn btn-danger" href="<?php echo base_url('tukang/print') ?>"><i class="fa fa-print"></i>Print </a>
        <a class="btn btn-success" href="<?php echo base_url('tukang/pdf') ?>"><i class="fa fa-download"></i>Export PDF </a>
        <a class="btn btn-warning" href="<?php echo base_url('tukang/excel') ?>"><i class="fa fa-download"></i>Export Excel </a>

        <div class="navbar-form navbar-right">
            <?php echo form_open('tukang/search') ?>
            <input type="text" name="keyword" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-info">Cari</button>
            <?php echo form_close() ?>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table Tukang</h3>
                    </div>


                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Password</th>
                                    <th colspan="2">Aksi</th>

                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($tukang as $tkg) : ?>

                                <tr>
                                    <td><?php echo $tkg->id ?></td>
                                    <td><?php echo $tkg->username ?></td>
                                    <td><?php echo $tkg->nama ?></td>
                                    <td><?php echo $tkg->alamat ?></td>
                                    <td><?php echo $tkg->telepon ?></td>
                                    <td><?php echo $tkg->password ?></td>
                                    <td><?php echo anchor('tukang/detail/' . $tkg->id, '<div classs="btn btn-info btn-sm"><i class="fa fa-search-plus"></i></div>
                                    </td>') ?>

                                    <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('tukang/hapus/' . $tkg->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                                    </td>
                                    <td><?php echo anchor('tukang/edit/' . $tkg->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>

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
                    <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA TUKANG</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('tukang/tambah_aksi'); ?>

                    <div class="form-group"><label>ID Tukang</label>
                        <input type="int" name="id" class="form-control">
                    </div>
                    <div class="form-group"><label>Username</label>
                        <input type="text" name="username" class="form-control">
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
                    <div class="form-group"><label>Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group"><label>Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group"><label>Upload Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

</div>
</div>