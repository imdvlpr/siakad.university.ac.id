<?php
  if ($this->session->is_logged==FALSE){
    redirect('main_controller/index');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('included');?>
</head>
<body>
  <header class="main-header">
    <a href="<?php echo base_url()?>index.php/main_controller/dashboard" class="logo">
      <!-- <span class="logo-mini"><b>U</b>NV</span> -->
      <span class="logo-lg"><b>SIAKAD</b> UNIV 1.0</span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                if($this->session->level==1){
                    ?><img src="<?php echo base_url().'/source/dp.png'?>" class="user-image" alt="User Image"><?php
                }else if($this->session->level==2){
                    ?>
                    <?php if ($this->main_model->getFotoProfilDsn() != '') {
                        ?>
                          <img src="<?php echo base_url().'/uploads/'.$this->main_model->getFotoProfilDsn()?>" class="user-image" alt="User Image">
                        <?php
                      }else{
                        ?>
                          <img src="<?php echo base_url().'/source/dp.png'?>" class="user-image" alt="User Image">
                        <?php
                      }?>
                    <?php
                }else if($this->session->level ==3){
                ?>
                    <?php if ($this->main_model->getFotoProfilMhs() != '') {
            ?>
              <img src="<?php echo base_url().'/uploads/'.$this->main_model->getFotoProfilMhs()?>" class="user-image" alt="User Image">
            <?php
          }else{
            ?>
              <img src="<?php echo base_url().'/source/dp.png'?>" class="user-image" alt="User Image">
            <?php
            }?>
                <?php
                }?>
              <span class="hidden-xs"><?php echo $this->session->display_name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?php
                if($this->session->level==1){
                    ?><img src="<?php echo base_url().'/source/dp.png'?>" class="img-circle" alt="User Image"><?php
                }else if($this->session->level==2){
                    ?>
                    <?php if ($this->main_model->getFotoProfilDsn() != '') {
                        ?>
                          <img src="<?php echo base_url().'/uploads/'.$this->main_model->getFotoProfilDsn()?>" class="img-circle" alt="User Image">
                        <?php
                      }else{
                        ?>
                          <img src="<?php echo base_url().'/source/dp.png'?>" class="img-circle" alt="User Image">
                        <?php
                      }?>
                    <?php
                }else if($this->session->level ==3){
                ?>
                    <?php if ($this->main_model->getFotoProfilMhs() != '') {
            ?>
              <img src="<?php echo base_url().'/uploads/'.$this->main_model->getFotoProfilMhs()?>" class="img-circle" alt="User Image">
            <?php
          }else{
            ?>
              <img src="<?php echo base_url().'/source/dp.png'?>" class="img-circle" alt="User Image">
            <?php
          }?>
                <?php


                }?>


                <p>
                  <?php echo $this->session->display_name?><br>
                <?php if($this->session->level != 1){
                ?>
                    <small><?php echo ($this->main_model->getSatuProdi($this->session->id_prodi)->row()->nama_prodi )?></small>
                <?php
                }?>


                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col text-center">
                    <a><?php echo $this->session->kode_user;?></a>
                  </div>
                   <div class="col text-center">
                    <a><?php
                switch($this->session->level){
                  case 1:
                    ?>Admin<?php
                    break;
                  case 2:
                    ?>Dosen<?php
                    break;
                  case 3:
                    ?>Mahasiswa<?php
                    break;
                  default:
                    ?><?php
                    break;
                }
              ?></a>
                  </div>
                  <?php if($this->session->level != 1){
                ?>
                   <div class="col text-center">

                    <a><?php echo ($this->main_model->getSatuProdi($this->session->id_prodi)->row()->kode_prodi )?></a>
                  </div>
                  <?php
                }?>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                    <?php if($this->session->level == 2){
                    ?>
                        <a href="<?php echo base_url();?>main_controller/view_dsn_editprofil" class="btn btn-default btn-flat">Profile</a>
                    <?php
                    }else if($this->session->level == 3){
                    ?>
                        <a href="<?php echo base_url();?>main_controller/view_mhs_editprofil" class="btn btn-default btn-flat">Profile</a>
                    <?php
                    }?>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>index.php/main_controller/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="" >
    <div class="row">
      <div class="col-2" style="padding-left:40px; padding-top: 20px; border-right: 1px solid #ddd; background:#fff; min-height:910px;">
        <?php $this->load->view($main_sidebar);?>
      </div>
      <div class="col-10" style="padding-right:20px; padding-top: 20px;padding-left:20px;">
        <?php $this->load->view($main_content);?>
      </div>
    </div>
  </div>
  <!-- <footer class="main-footer">
    <b>Version</b> 1.0.0
    <strong>Copyright &copy; 2019 <a href="">UNIVERSITY</a>.</strong> All rights
    reserved.
  </footer> -->
</body>
</html>
