<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIAKAD STKIP | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/plugins/iCheck/square/blue.css">
<link rel="icon" type="image/png" href="<?php echo base_url()?>source/AdminLTE_2/dist/img/stkip_logo.png">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style type="text/css">
  .login-page{
    background-image: url("<?php echo base_url()?>source/AdminLTE_2/dist/img/loginbg.jpg");

    /* Full height */
    height: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .login-page::before {
    content: "";
    display: block;
    position: absolute;
    z-index: -1;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(255,255,255,0.30);
  }
</style>

<body class="hold-transition login-page" style="overflow: hidden;">

<!-- <img src="<?php echo base_url()?>source/AdminLTE_2/dist/img/loginbg.jpg"> -->
<div class="login-box" style="background-color: white;padding-top: 60px;border-radius: 10px;" >
  <div class="login-logo" hidden="" style="margin-bottom: 10px">
    <img src="<?php echo base_url()?>source/AdminLTE_2/dist/img/stkip_logo.png"><br>
    <a href="#"><b>SIAKAD</b><br> STKIP YASIKA</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius: 10px">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php echo form_open("main_controller/login"); ?>
      <div class="form-group has-feedback">
        <input type="username" class="form-control" id="username" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>


    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>source/AdminLTE_2/plugins/iCheck/icheck.min.js"></script>
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
