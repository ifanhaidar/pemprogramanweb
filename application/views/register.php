<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <!-- Favicons -->
  <link href="assets/img/123kecil.png" rel="icon">
  <link href="assets/img/123besar.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins2/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins2/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist2/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <center>
        <a>
          <img src="assets/foto/10.png" width=" 260" height="60" />
        </a>
      </center>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Buat Akun Secara Gratis </p>

        <form action="<?= base_url('register') ?>" method="post">
          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-signature"></span>
              </div>
            </div>
          </div>
          <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password1" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password2" placeholder="Repeat Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the terms
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-info btn-block ">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mb-2">
          <a href="<?php echo base_url() . 'login' ?>" class="text-center">Back to Login</a>
        </p>


        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins2/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins2/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist2/js/adminlte.min.js"></script>
</body>

</html>