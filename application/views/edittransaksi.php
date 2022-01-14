<div class="content-wrapper">
    <section class="content">
        <?php foreach ($transaksi as $tsk) { ?>
            <form action="<?php echo base_url() . 'transaksi/update'; ?>" method="post">
                <div class="form-group">
                    <label>ID Transaksi</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $tsk->id ?>">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $tsk->nama ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $tsk->alamat ?>">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?php echo $tsk->telepon ?>">
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo $tsk->tanggal ?>">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" value="<?php echo $tsk->kategori ?>">
                        <option>Pemasangan</option>
                        <option>Perbaikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jasa</label>
                    <select class="form-control" name="jasa" value="<?php echo $tsk->jasa ?>">
                        <option>Pengecetan</option>
                        <option>Pengecoran</option>
                        <option>Keramik</option>
                        <option>Atap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <select class="form-control" name="harga" value="<?php echo $tsk->harga ?>">
                        <option>500000</option>
                        <option>600000</option>
                        <option>1000000</option>
                        <option>1200000</option>
                        <option>2800000</option>
                    </select>
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php } ?>
    </section>
</div>