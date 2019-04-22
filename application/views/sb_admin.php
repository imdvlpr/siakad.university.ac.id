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
      <p style="font-weight:500;">
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
      </p>
    </div>
  </div>
</div>


<br>

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
          if ($main_content == 'vw_dashboard_home'){
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
<h6 style="margin-top:30px;">MAIN NAVIGATION</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_all_gedung' || $main_content == 'vw_all_ruangan' || $main_content == 'vw_all_prodi' || $main_content == 'vw_all_mk' || $main_content == 'vw_all_angkatan' || $main_content == 'vw_all_kelas' || $main_content == 'vw_edit_gedung' || $main_content == 'vw_edit_ruangan'
          || $main_content == 'vw_edit_prodi'|| $main_content =='vw_edit_mk' || $main_content == 'vw_edit_angkatan'){
            ?><a class="active" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php
          }
          else{
            ?><a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php
          }
        ?>
          <i class="far fa-chart-bar"></i></i><span>Master Data</span>
        </a>
      </h4>
    </div>
    <?php
      if ($main_content == 'vw_all_gedung' || $main_content == 'vw_all_ruangan' || $main_content == 'vw_all_prodi' || $main_content == 'vw_all_mk' || $main_content == 'vw_all_angkatan' || $main_content == 'vw_all_kelas' || $main_content == 'vw_edit_gedung' || $main_content == 'vw_edit_ruangan'
      || $main_content == 'vw_edit_prodi'|| $main_content =='vw_edit_mk' || $main_content == 'vw_edit_angkatan'){
        ?><div id="collapseOne" class="panel-collapse collapse in show"><?php
      }
      else{
        ?><div id="collapseOne" class="panel-collapse collapse in "><?php
      }
    ?>
      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_gedung">Gedung</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_ruangan">Ruangan</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_prodi">Program Studi</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_mk">Mata Kuliah</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_angkatan">Tahun Angkatan</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_kelas">Kelola Kelas</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_all_dosen' || $main_content == 'vw_edit_dosen'){
            ?><a class="active" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?php
          }
          else{
            ?><a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?php
          }
        ?>
          <i class="fa fa-user"></i></i><span> Dosen</span>
        </a>
      </h4>
    </div>
    <?php
      if ($main_content == 'vw_all_dosen' || $main_content == 'vw_edit_dosen'){
        ?>    <div id="collapseTwo" class="panel-collapse collapse in show"><?php
      }
      else{
        ?>    <div id="collapseTwo" class="panel-collapse collapse in"><?php
      }
    ?>
      <ul class="list-group">
        <a href="<?php echo base_url()?>index.php/main_controller/view_all_dosen/1"><li class="list-group-item">Semua Dosen</a></li>
        <a href="<?php echo base_url()?>index.php/main_controller/view_all_dosen/2"><li class="list-group-item">Tetap</a></li>
        <a href="<?php echo base_url()?>index.php/main_controller/view_all_dosen/3"><li class="list-group-item">Tidak Tetap</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_all_student' || $main_content == 'vw_edit_student'){
            ?><a class="active" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><?php
          }
          else{
            ?><a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><?php
          }
        ?>
          <i class="fa fa-users"></i></i><span>Mahasiswa</span>
        </a>
      </h4>
    </div>
    <?php
      if ($main_content == 'vw_all_student' || $main_content == 'vw_edit_student'){
        ?><div id="collapseThree" class="panel-collapse collapse in show"><?php
      }
      else{
        ?><div id="collapseThree" class="panel-collapse collapse in"><?php
      }
    ?>

      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_mhs/1">Semua Mahasiswa</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_mhs/2">Aktif</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_mhs/3">Alumni</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_all_jadwal_master' ||$main_content == 'vw_all_jadwal_matkul' || $main_content == 'vw_all_tahun_akademik' || $main_content == 'vw_all_jadwal_ujian' || $main_content == 'vw_all_registrasi' || $main_content == 'vw_all_krs' || $main_content == 'vw_all_khs' || $main_content == 'vw_edit_regis'
        || $main_content == 'vw_edit_tahunakademik' || $main_content == 'vw_edit_jadwal_master'){
            ?><a class="active" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><?php
          }
          else{
            ?><a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><?php
          }
        ?>
          <i class="fab fa-pied-piper-hat"></i></i><span>Akademik</span>
        </a>
      </h4>
    </div>
    <?php
      if ($main_content == 'vw_all_jadwal_master' ||$main_content == 'vw_all_jadwal_matkul' || $main_content == 'vw_all_tahun_akademik' || $main_content == 'vw_all_jadwal_ujian' || $main_content == 'vw_all_registrasi' || $main_content == 'vw_all_krs' || $main_content == 'vw_all_khs' || $main_content == 'vw_edit_regis'
    || $main_content == 'vw_edit_tahunakademik' || $main_content == 'vw_edit_jadwal_master'){
        ?><div id="collapseFour" class="panel-collapse collapse in show"><?php
      }
      else{
        ?><div id="collapseFour" class="panel-collapse collapse in"><?php
      }
    ?>

      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_tahun_akademik">Tahun Akademik</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_jadwal_master">Jadwal Matakuliah</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_jadwal_ujian">Jadwal Ujian</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_registrasi">Kartu Rencana Studi</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_krs">Kartu Studi Mahasiswa</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_khs">Kartu Hasil Studi</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_all_statusbayar' || $main_content == 'vw_all_biaya' || $main_content == 'vw_edit_statusbayar' || $main_content == 'vw_edit_biaya'){
            ?><a class="active" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><?php
          }
          else{
            ?><a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><?php
          }
        ?>
          <i class="fa fa-university"></i></i><span>Keuangan</span>
        </a>
      </h4>
    </div>
    <?php
      if ($main_content == 'vw_all_statusbayar' || $main_content == 'vw_all_biaya' || $main_content == 'vw_edit_statusbayar' || $main_content == 'vw_edit_biaya'){
        ?><div id="collapseFive" class="panel-collapse collapse in show"><?php
      }
      else{
        ?><div id="collapseFive" class="panel-collapse collapse in"><?php
      }
    ?>

      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/1">Kelola Transaksi</a>
          <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/1">Semua Transaksi</a></li>
            <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/2">Disetujui</a></li>
            <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/4">Menunggu Persetujuan</a></li>
            <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/3">Ditolak</a></li>
            <li class="list-group-item"><a href="">Belum Bayar</a></li>
          </ul>
        </li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_biaya/">Kelola Biaya</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_all_judul_kuisioner' || $main_content == 'vw_pilih_tipe_kuisioner' || $main_content == 'vw_all_pertanyaan_kuisioner' || $main_content == 'vw_hasil_kuisioner_list_jadwal_master' || $main_content =='vw_lihat_hasil_kuisioner_tipe_satu'){
            ?><a class="active" data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><?php
          }
          else{
            ?><a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><?php
          }
        ?>
          <i class="fa fa-clipboard"></i></i><span>Kuisioner</span>
        </a>
      </h4>
    </div>
    <?php
      if ($main_content == 'vw_all_judul_kuisioner' || $main_content == 'vw_pilih_tipe_kuisioner' || $main_content == 'vw_all_pertanyaan_kuisioner' || $main_content == 'vw_hasil_kuisioner_list_jadwal_master' || $main_content =='vw_lihat_hasil_kuisioner_tipe_satu'){
        ?><div id="collapseSix" class="panel-collapse collapse in show"><?php
      }
      else{
        ?><div id="collapseSix" class="panel-collapse collapse in"><?php
      }
    ?>

      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_all_judul_kuisioner/">Kelola Pertanyaan</a></li>
        <li class="list-group-item"><a href="<?php echo base_url()?>index.php/main_controller/view_pilih_tipe_kuisioner/">Hasil Kuisioner</a>
          <!-- <ul class="list-group">
            <li class="list-group-item"><a href="xxxxxxxx">Tipe Satu</a></li>
            <li class="list-group-item"><a href="xxxxxxxx">Tipe Dua</a></li>
          </ul> -->
        </li>
      </ul>
    </div>
  </div>
</div>
<h6 style="margin-top:30px;">SYSTEM</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'view_all_users'){
            ?><a class="active" href="<?php echo base_url()?>index.php/main_controller/view_all_users"><?php
          }
          else{
            ?><a class="" href="<?php echo base_url()?>index.php/main_controller/view_all_users"><?php
          }
        ?>
          <i class="far fa-user"></i><span>Users Account</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'view_storage'){
            ?><a class="active" href="<?php echo base_url()?>index.php/main_controller/view_storage"><?php
          }
          else{
            ?><a class="" href="<?php echo base_url()?>index.php/main_controller/view_storage"><?php
          }
        ?>
          <i class="fas fa-battery-half"></i><span>Storage</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'view_database'){
            ?><a class="active" href="<?php echo base_url()?>index.php/main_controller/view_database"><?php
          }
          else{
            ?><a class="" href="<?php echo base_url()?>index.php/main_controller/view_database"><?php
          }
        ?>
          <i class="fa fa-database"></i><span>Database</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="" href="<?php echo base_url()?>index.php/main_controller/logout">
          <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </a>
      </h4>
    </div>
  </div>
</div>
