<div class="content-wrapper">
    <section class="content">
        <?php foreach ($user as $usr) { ?>
            <form action="<?php echo base_url() . 'user/update'; ?>" method="post">
                <div class="form-group">
                    <label>ID User</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $usr->id ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $usr->username ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $usr->password ?>">
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php } ?>
    </section>
</div>