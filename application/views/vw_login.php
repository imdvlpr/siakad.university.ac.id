<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIAKAD | LOGIN</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>source/img/logo.jpg"/>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/css/customcss.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>source/font-awesome/css/font-awesome.min.css">
    <!-- JS -->
    <script src="<?php echo base_url(); ?>source/js/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url(); ?>source/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>source/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>source/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>source/js/bootstrap-datepicker.min.js"></script>
  </head>
  <style type="text/css">
    body{
        background-image: url("<?php echo base_url(); ?>source/img/bglogin.jpg");
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        font-weight: 300;
    }
    .form-control {
        min-height: 41px;
        background: #f2f2f2;
        box-shadow: none !important;
        border: transparent;
      }
      .form-control:focus {
        background: #e2e2e2;
      }
      .form-control, .btn {
            border-radius: 2px;
        }
      .login-form {
        width: 350px;
        margin: 30px auto;
        text-align: center;
      }
      .login-form h2 {
            margin: 10px 0 25px;
        }
        .login-form form {
        color: #7a7a7a;
        /* border-radius: 3px; */
          margin-bottom: 15px;
            background: #fff;
            /* box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); */
            padding: 30px;
        }
        .login-form .btn {
            font-size: 16px;
            font-weight: bold;
        background: #3598dc;
        border: none;
            outline: none !important;
        }
      .login-form .btn:hover, .login-form .btn:focus {
        background: #2389cd;
      }
      .login-form a {
        color: #fff;
        text-decoration: underline;
      }
      .login-form a:hover {
        text-decoration: none;
      }
      .login-form form a {
        color: #7a7a7a;
        text-decoration: none;
      }
      .login-form form a:hover {
        text-decoration: underline;
      }
  </style>
  <body class="hold-transition login-page" style="overflow: hidden; background-color: transparent;">
      <header class="main-header">
        <a href="#" class="logo" style="background-color: transparent; width:33%; text-align:left; padding-left:50px;">
          <b>SIAKAD UNIV</b>
        </a>
        <nav class="navbar navbar-static-top">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <div class="mx-auto">
                    <a href="#" class="btn btn-default btn-flat">Beranda</a>
                    <a href="#" class="btn btn-default btn-flat">Jadwal Kuliah</a>
                    <a href="#" class="btn btn-default btn-flat">Jadwal Ujian</a>
                    <a href="#" class="btn btn-default btn-flat">Panduan</a>
                    <a href="#" class="btn btn-default btn-flat">Kalender Akademik</a>
                    <a href="#" class="btn btn-default btn-flat">Login</a>
                </div>
            </ul>
          </div>
        </nav>
        <div class="" style="width:33%">

        </div>
      </header>
      <div class="container" style="background-color: transparent; margin-top: 40px;">
        <h2 class="text-center">Sistem Informasi Akademik</h2>
        <center><h9>Silahkan Login untuk masuk ke dalam sistem.</h9></center>
      </div>
      <div class="container" style="background-color: transparent; margin-top: 120px;">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="card text-white mb-3" style="max-width: 22rem;">
              <?php echo form_open("main_controller/login"); ?>
              <div class="card-header text-center" style="background:#357CA5;"><b>LOGIN SIAKAD</b></div>
              <div class="card-body">
                <h9 class="card-title" style="color: black;"><b>ID Pengguna</b></h9>
                <div class="form-group has-error">
                  <input type="text" class="form-control" name="username" placeholder="ID pengguna" required="required">
                </div>
                <h9 class="card-title" style="color: black;"><b>Kata Sandi</b></h9>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Kata sandi" required="required">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-info btn-lg btn-block">Login</button>
                </div>
              </div>
            </div>
              <?php echo form_close(); ?>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
      $(document).ready(function(){
        $(".login-box").show(1000);
        $(".login-logo").show(1000);
      });
    </script>
  </body>
</html>
