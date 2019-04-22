<div class="container">
  <div class="row">
    <div class="col-5">
      <div class="">
        <img src="<?php echo base_url().'/source/dp.png'?>" class="img-circle" alt="User Image" style="max-width:100%;margin-top: 5px;">
      </div>
    </div>
    <div class="col" style="margin-top:10px;">
      <b>
      <?php echo $this->session->display_name?><br></b>
      <?php echo ($this->main_model->getSatuProdi($this->session->id_prodi)->row()->nama_prodi)?><br>
      <a style="font-weight:300;"><i class="fa fa-circle text-success"></i>
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
<div class="input-group mb-3" style="padding-top: 20px;">
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
          if ($main_content == 'vw_dashboard_mhs'){
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
<h6 style="margin-top:30px;">Akademik</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <i class="fa fa-calendar"></i></i><span>Jadwal Mahasiswa</span>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in ">
      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_mhs_jadwalkuliah">Jadwal Kuliah</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_mhs_jadwalujian">Jadwal Ujian</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <i class="fa fa-book"></i></i><span>Materi & Tugas</span>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in ">
      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_mhs_materi_download">Materi Kuliah</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_mhs_materi_upload">Tugas Kuliah</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" href="<?php echo base_url()?>index.php/main_controller/view_mhs_nilai">
          <i class="fa fa-bar-chart"></i><span>Nilai</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" href="<?php echo base_url()?>index.php/main_controller/view_mhs_kehadiran">
          <i class="fa fa-check-square-o"></i><span>Kehadiran</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<h6 style="margin-top:30px;">Administrasi</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" href="<?php echo base_url()?>index.php/main_controller/view_all_judul_kuisioner_mhs">
          <i class="fa fa-clipboard"></i><span>Kuisioner</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" href="<?php echo base_url()?>index.php/main_controller/view_mhs_statuspembayaran">
          <i class="fa fa-money"></i><span>Pembayaran</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <i class="far fa-plus-square"></i></i><span>Registrasi</span>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in ">
      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_mhs_registrasimk">Registrasi Mata Kuliah</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/pg_mhs_jadwalkuliah/<?php echo ($this->session->kode_user); ?>">Cetak Kartu Studi</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/pg_print_khs/<?php echo ($this->session->kode_user); ?>">Cetak Kartu Hasil Studi</a></li>
      </ul>
    </div>
  </div>
</div>
<h6 style="margin-top:30px;">Sistem</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          <i class="far fa-user"></i></i><span>Akun</span>
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse in ">
      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_mhs_editprofil">Lihat Profil</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_mhs_ubahpassword">Ubah Password</a></li>
      </ul>
    </div>
  </div>
</div>
