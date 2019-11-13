<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $title ?></title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h2>SISTEM INFORMASI</h2>
        <h3 class="text-center text-warning">RENTAL MOBIL</h3>
        <p class="text-center">KOLOMPOK V</p>
      </div>
      <?php 
        if ($this->session->flashdata('sukses')) {
            $sukses = $this->session->flashdata('sukses');
            echo $sukses;
        }
      ?>
      <div class="login-box">
        <form class="login-form" action="<?php echo base_url('auth/login') ?>" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-key"></i>LOGIN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email" name="username" autofocus>
            <div class="form-control-feedback text-danger">
                <?php echo form_error('username') ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
            <div class="form-control-feedback text-danger">
                <?php echo form_error('password') ?>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
          <br>  
          <a href="<?= base_url('auth/registrasi') ?>">Create Account ?</a>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url() ?>assets/js/plugins/pace.min.js"></script>
  </body>
</html>