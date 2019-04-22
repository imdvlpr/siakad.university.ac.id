<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD | LOGIN</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://pbs.twimg.com/profile_images/825975579388239872/UiPXPhkL_400x400.jpg" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <style type="text/css">
    .login-page{
      background-image: url("https://www.sheerid.com/wp-content/uploads/2019/02/linkedin_heros_collegestudents.jpg");
      height: 100%;
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
    input{
      margin-bottom: 10px;
    }
  </style>
  <body class="hold-transition login-page" style="overflow: hidden;">
    <div class="login-box" style="background-color: white;padding-top: 60px;border-radius: 10px;" >
      <div class="login-logo" hidden="" style="margin-bottom: 10px">
        <img src="https://pbs.twimg.com/profile_images/825975579388239872/UiPXPhkL_400x400.jpg" width="150"><br>
        <a href="#"><b>SIAKAD</b><br> UNIVERSITY</a>
      </div>
      <div class="login-box-body" style="border-radius: 10px">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php echo form_open("main_controller/login"); ?>
          <div class="form-row has-feedback">
            <input type="username" class="form-control" id="username" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-row has-feedback">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">

            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        <?php echo form_close(); ?>
        <a href="#">I forgot my password</a><br>
      </div>
    </div>
    <script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
