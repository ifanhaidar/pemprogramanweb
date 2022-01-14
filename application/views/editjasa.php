<div class="content-wrapper">
    <section class="content">
        <?php foreach ($jasa as $jsa) { ?>
            <form action="<?php echo base_url() . 'jasa/update'; ?>" method="post">
                <div class="form-group">
                    <label>ID Jasa</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $jsa->id ?>">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" value="<?php echo $jsa->kategori ?>">
                        <option>Pemasangan</option>
                        <option>Perbaikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Jasa</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $jsa->nama ?>">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control" value="<?php echo $jsa->harga ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="<?php echo $jsa->deskripsi ?>">
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php } ?>
    </section>
</div>