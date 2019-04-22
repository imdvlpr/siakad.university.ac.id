<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="min-height:90px;">
        <div class="pull-left image">
              <img src="<?php echo base_url().'/source/dp.png'?>" class="img-circle" alt="User Image" style="max-width:65px;margin-top: 5px;">

        </div>
        <div class="pull-left info" style="left:70px">
          <p><?php echo $this->session->display_name?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>
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
        ?> </a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Cari Menu...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <?php
            if ($main_content == 'vw_dashboard_home'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        <li class="header">MAIN NAVIGATION</li>

        </li>
        <?php
            if ($main_content == 'vw_all_gedung' || $main_content == 'vw_all_ruangan' || $main_content == 'vw_all_prodi' || $main_content == 'vw_all_mk' || $main_content == 'vw_all_angkatan' || $main_content == 'vw_all_kelas' || $main_content == 'vw_edit_gedung' || $main_content == 'vw_edit_ruangan'
            || $main_content == 'vw_edit_prodi'|| $main_content =='vw_edit_mk' || $main_content == 'vw_edit_angkatan'){
              ?><li class="active treeview"><?php
            }
            else{
              ?><li class="treeview"><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/dashboard">
            <i class="fa fa-bar-chart-o"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
            if ($main_content == 'vw_all_gedung' || $main_content == 'vw_edit_gedung'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_all_gedung"><i class="fa fa-building"></i> Gedung

              </a>
            <?php
            if ($main_content == 'vw_all_ruangan'|| $main_content == 'vw_edit_ruangan'){
              ?><li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_all_ruangan"><i class="fa fa-bank"></i> Ruangan</a>
            <?php
            if ($main_content == 'vw_all_prodi' || $main_content == 'vw_edit_prodi'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_prodi"><i class="fa fa-table"></i> Program Studi</a></li>

            <?php
            if ($main_content == 'vw_all_mk'|| $main_content =='vw_edit_mk'){
              ?><li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_mk"><i class="fa fa-address-book"></i>Mata Kuliah</a></li>
            <!-- <li><a href="#"><i class="fa fa-credit-card"></i>Grade Nilai</a></li> -->
            <?php
            if ($main_content == 'vw_all_angkatan' || $main_content == 'vw_edit_angkatan'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_angkatan"><i class="fa fa-calendar"></i> Tahun Angkatan</a></li>
          <?php
            if ($main_content == 'vw_all_kelas'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_kelas"><i class="fa fa-home"></i> Kelola Kelas</a></li>
          </ul>
        </li>

        </li>
        <?php
              if ($main_content == 'vw_all_dosen' || $main_content == 'vw_edit_dosen'){
                ?><li class="active treeview"><?php
              }
              else{
                ?><li class="treeview"><?php
              }
            ?>
            <a href="#">
              <i class="fa fa-user-secret"></i>
              <span> Dosen</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php
              if ($main_content == 'vw_all_dosen' && $id == 1){
                ?><li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_dosen/1"><i class="fa fa-users"></i> Semua Dosen</a></li>
              <?php
              if ($main_content == 'vw_all_dosen' && $id == 2){
                ?><li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_dosen/2"><i class="fa fa-user-circle"></i> Tetap</a></li>
              <?php
              if ($main_content == 'vw_all_dosen' && $id == 3){
                ?><li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_dosen/3"><i class="fa fa-user-o"></i> Tidak Tetap</a></li>
            </ul>
        <?php
              if ($main_content == 'vw_all_student' || $main_content == 'vw_edit_student'){
                ?><li class="active treeview"><?php
              }
              else{
                ?><li class="treeview"><?php
              }
            ?>
            <a href="#">
              <i class="fa fa-users"></i>
              <span> Mahasiswa</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php
              if ($main_content == 'vw_all_student' && $id == 1){
                ?><li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_mhs/1"><i class="fa fa-users"></i> Semua Mahasiswa</a></li>
              <?php
              if ($main_content == 'vw_all_student' && $id == 2){
                ?><li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_mhs/2"><i class="fa fa-user-circle"></i> Aktif</a></li>
              <?php
              if ($main_content == 'vw_all_student' && $id == 3){
                ?><li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_mhs/3"><i class="fa fa-user-o"></i>Alumni</a></li>
            </ul>
          <?php
            if ($main_content == 'vw_all_jadwal_master' ||$main_content == 'vw_all_jadwal_matkul' || $main_content == 'vw_all_tahun_akademik' || $main_content == 'vw_all_jadwal_ujian' || $main_content == 'vw_all_registrasi' || $main_content == 'vw_all_krs' || $main_content == 'vw_all_khs' || $main_content == 'vw_edit_regis'
          || $main_content == 'vw_edit_tahunakademik' || $main_content == 'vw_edit_jadwal_master'){
              ?><li class="active treeview"><?php
            }
            else{
              ?><li class="treeview"><?php
            }
          ?>
          <a href="#">
            <i class="fa fa-mortar-board"></i>
            <span>Akademik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
            if ($main_content == 'vw_all_tahun_akademik' || $main_content == 'vw_edit_tahunakademik'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_tahun_akademik"><i class="fa fa-calendar"></i> Tahun Akademik</a></li>
            <?php
            if ($main_content == 'vw_all_jadwal_master' ||$main_content == 'vw_all_jadwal_matkul'|| $main_content == 'vw_edit_jadwal_master'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_jadwal_master"><i class="fa fa-book"></i> Jadwal Mata Kuliah</a></li>
          <?php
          if ($main_content == 'vw_all_jadwal_ujian'){
            ?><li class="active"><?php
          }
          else{
            ?><li><?php
          }
        ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_jadwal_ujian"><i class="fa fa-edit"></i> Jadwal Ujian</a></li>
            <?php
            if ($main_content == 'vw_all_registrasi' || $main_content == 'vw_edit_regis'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_registrasi"><i class="fa fa-bookmark"></i> Kartu Rencana Studi</a></li>
            <?php
            if ($main_content == 'vw_all_krs'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_krs"><i class="fa fa-credit-card"></i> Kartu Studi Mahasiswa</a></li>
            <?php
            if ($main_content == 'vw_all_khs'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_khs"><i class="fa fa-cc-mastercard"></i> Kartu Hasil Studi</a></li>
          </ul>
        </li>
        <?php
        if ($main_content == 'vw_all_statusbayar'){
          ?><li class="active"><?php
        }
        else{
          ?><li><?php
        }
      ?>
      </li>

      <!-- Keuangan -->
      <?php
            if ($main_content == 'vw_all_statusbayar' || $main_content == 'vw_all_biaya' || $main_content == 'vw_edit_statusbayar' || $main_content == 'vw_edit_biaya'){
              ?><li class="active treeview"><?php
            }
            else{
              ?><li class="treeview"><?php
            }
          ?>
          <a href="#">
            <i class="fa fa-bank"></i>
            <span> Keuangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
              if ($main_content == 'vw_all_statusbayar'){
                ?><li class="active treeview"><?php
              }
              else{
                ?><li class="treeview"><?php
              }
            ?>
              <a href="#"><i class="fa fa-info"></i> Kelola Transaksi
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php
                if ($main_content == 'vw_all_statusbayar' && $id == 1){
                  ?><li class="active"><?php
                }
                else{
                  ?><li><?php
                }
              ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/1"><i class="fa fa-circle-o"></i> Semua Transaksi</a></li>
                  <?php
                  if ($main_content == 'vw_all_statusbayar' && $id == 2){
                    ?><li class="active"><?php
                  }
                  else{
                    ?><li><?php
                  }
                ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/2"><i class="fa fa-circle-o"></i> Di Setujui</a></li>
                <?php
                if ($main_content == 'vw_all_statusbayar' && $id == 4){
                  ?><li class="active"><?php
                }
                else{
                  ?><li><?php
                }
              ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/4"><i class="fa fa-circle-o"></i> Menunggu Persetujuan</a></li>
              <?php
              if ($main_content == 'vw_all_statusbayar' && $id == 3){
                ?><li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_status_bayar/3"><i class="fa fa-circle-o"></i> Persetujuan di Tolak</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Belum Bayar</a></li>
              </ul>
            </li>
        </li>
            <?php
            if ($main_content == 'vw_all_biaya' || $main_content == 'vw_edit_biaya'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_biaya/"><i class="fa fa-money"></i> Kelola Biaya</a></li>
          </ul>
      <!-- end keuangan -->

        <!-- Kuisioner -->
        <?php
            if ($main_content == 'vw_all_judul_kuisioner' || $main_content == 'vw_pilih_tipe_kuisioner' || $main_content == 'vw_all_pertanyaan_kuisioner' || $main_content == 'vw_hasil_kuisioner_list_jadwal_master' || $main_content =='vw_lihat_hasil_kuisioner_tipe_satu'){
              ?><li class="active treeview"><?php
            }
            else{
              ?><li class="treeview"><?php
            }
          ?>
          <a href="#">
            <i class="fa fa-clipboard"></i>
            <span> Kuisioner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
            if ($main_content == 'vw_all_judul_kuisioner'|| $main_content == 'vw_all_pertanyaan_kuisioner'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_all_judul_kuisioner/"><i class="fa fa-clipboard"></i> Kelola Pertanyaan</a></li>
            <?php
            if ($main_content == 'vw_pilih_tipe_kuisioner' || $main_content == 'vw_hasil_kuisioner_list_jadwal_master' || $main_content =='vw_lihat_hasil_kuisioner_tipe_satu'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?><a href="<?php echo base_url()?>index.php/main_controller/view_pilih_tipe_kuisioner/"><i class="fa fa-clipboard"></i> Hasil Kuisioner</a></li>
          </ul>
        <!-- end kuisioner -->

        <li class="header">SYSTEM</li>
        <?php
            if ($main_content == 'vw_all_users'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_all_users">
            <i class="fa fa-user-o"></i> <span>Users Account</span>

          </a>
        </li>
        <?php
            if ($main_content == 'view_system'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_storage">
            <i class="fa fa-battery"></i> <span>Storage</span>
          </a>
        </li>
        <?php
            if ($main_content == 'view_database'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_database">
            <i class="fa fa-database"></i> <span>Database</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
