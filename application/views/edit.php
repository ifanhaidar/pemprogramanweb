<div class="content-wrapper">
    <section class="content">
        <?php foreach ($tukang as $tkg) { ?>
            <form action="<?php echo base_url() . 'tukang/update'; ?>" method="post">
                <div class="form-group">
                    <label>ID Tukang</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $tkg->id ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $tkg->username ?>">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $tkg->nama ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $tkg->alamat ?>">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?php echo $tkg->telepon ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $tkg->email ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $tkg->password ?>">
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php } ?>
    </section>
</div>