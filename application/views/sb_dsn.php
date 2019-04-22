<div class="container">
  <div class="row">
    <div class="col-5">
      <div class="">
        <?php if ($this->main_model->getFotoProfilDsn() != '') {
          ?>
            <img src="<?php echo base_url().'/uploads/'.$this->main_model->getFotoProfilDsn()?>" class="img-circle" alt="User Image" style="max-width:100%;margin-top: 5px;">
          <?php
        }else{
          ?>
            <img src="<?php echo base_url().'/source/dp.png'?>" class="img-circle" alt="User Image" style="max-width:100%;margin-top: 5px;">
          <?php
        }?>
      </div>
    </div>
    <div class="col" style="margin-top:10px;">
      <b>
      <?php echo $this->session->display_name?><br></b>
      <?php echo wordwrap($this->main_model->getSatuProdi($this->session->id_prodi)->row()->nama_prodi ,24,"<br>\n")?>
      <br>
      <a style="font-weight:400;"><i class="fa fa-circle text-success"></i>
      <?php
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
      ?>
    </a>
    </div>
  </div>
</div>
<br>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
  </div>
  <input type="text" class="form-control" placeholder="Search">
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_dashboard_dsn'){
            ?><a class="active" href="<?php echo base_url()?>index.php/main_controller/dashboard"><?php
          }
          else{
            ?><a class="" href="<?php echo base_url()?>index.php/main_controller/dashboard"><?php
          }
        ?>
          <i class="fas fa-tachometer-alt"></i><span>Control Panel</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<hr>
<h6 style="margin-top:30px;">AKADEMIK</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" href="<?php echo base_url()?>index.php/main_controller/view_dsn_jadwaldosen">
          <i class="fa fa-calendar"></i><span>Jadwal dan Kehadiran</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <i class="fa fa-book"></i></i><span>Materi Dan Tugas</span>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in ">
      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_dsn_materi_upload">Materi Perkuliahan</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_dsn_materi_downloadjawaban">Tugas Mahasiswa</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" href="<?php echo base_url()?>index.php/main_controller/view_dsn_inputnilai">
          <i class="fa fa-bar-chart"></i><span>Nilai</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<h6 style="margin-top:30px;">SYSTEM</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <i class="fa fa-book"></i></i><span>Akun</span>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in ">
      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_dsn_editprofil">Lihat Profil</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_dsn_gantipassword">Ubah Password</a></li>
      </ul>
    </div>
  </div>
</div>
