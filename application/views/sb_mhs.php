<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="min-height:90px;">
        <div class="pull-left image">
          <?php if ($this->main_model->getFotoProfilMhs() != '') {
            ?>
              <img src="<?php echo base_url().'/uploads/'.$this->main_model->getFotoProfilMhs()?>" class="img-circle" alt="User Image" style="max-width:65px;margin-top: 5px;">
            <?php
          }else{
            ?>
              <img src="<?php echo base_url().'/source/dp.png'?>" class="img-circle" alt="User Image" style="max-width:65px;margin-top: 5px;">
            <?php
          }?>

        </div>
        <div class="pull-left info" style="left:70px">
          <p><?php echo $this->session->display_name?></p>

          <p><small><?php echo wordwrap($this->main_model->getSatuProdi($this->session->id_prodi)->row()->nama_prodi ,24,"<br>\n")?></small></p>
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
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search.....">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <?php
            if ($main_content == 'vw_dashboard_mhs'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/dashboard">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
        <li class="header">AKADEMIK</li>

<!-- dari sini satu menu utama -->

        <!-- nah sampe sini satu menu utama -->

        <!-- dari sini satu menu utama -->
          <?php
            if ($main_content == 'vw_mhs_jadwalkuliah' || $main_content == 'vw_mhs_jadwalujian'){
              ?>
            <li class="active treeview"><?php
            }
            else{
              ?><li class="treeview"><?php
            }
          ?>
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>Jadwal Mahasiswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                      <!-- dari sini satu menu anakannya -->
            <?php
              if ($main_content == 'vw_mhs_jadwalkuliah'){
                ?>
              <li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_jadwalkuliah"><i class="fa fa-calendar-o"></i> Jadwal Kuliah</a>
            </li>
            <?php
              if ($main_content == 'vw_mhs_jadwalujian'){
                ?>
              <li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_jadwalujian"><i class="fa fa-calendar-plus-o"></i> Jadwal Ujian</a>
            </li>
            <!-- sampe sini satu menu anakannya -->
          </ul>
        </li>
        <!-- nah sampe sini satu menu utama -->



        <!-- nah sampe sini satu menu utama -->


        <!-- dari sini satu menu utama -->

        <!-- >>>>>>>>>>>>>>Lihat Materi + Upload Jawaban>>>>>>>>>>>>>>> -->
        <?php
            if ($main_content == 'vw_mhs_materi_download' || $main_content == 'vw_mhs_materi_upload' || $main_content == 'vw_mhs_materi_kelas' || $main_content == 'vw_mhs_tugas_kelas'){
              ?>
            <li class="active treeview"><?php
            }
            else{
              ?><li class="treeview"><?php
            }
          ?>
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Materi & Tugas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <?php if ($this->main_model->getAllTugas($this->session->kode_user) > 0): ?>
                <span class="label label-primary pull-right">NEW</span>
              <?php endif; ?>
            </span>
          </a>
          <ul class="treeview-menu">
                      <!-- dari sini satu menu anakannya -->
            <li>
              <?php
            if ($main_content == 'vw_mhs_materi_download' || $main_content == 'vw_mhs_materi_kelas'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_materi_download">
                <i class="fa fa-cloud-download"></i> <span>Materi Kuliah</span>
                <span class="pull-right-container">
                  <span class="label label-success pull-right"><?php echo $this->main_model->getAllMateri($this->session->kode_user); ?></span>
                </span> </a>
            </li>

            <?php
              if ($main_content == 'vw_mhs_materi_upload' || $main_content == 'vw_mhs_tugas_kelas'){
                ?>
              <li class="active"><?php
              }
              else{
                ?><li class=""><?php
              }
            ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_materi_upload">
                <i class="fa fa-check-square-o"></i> <span>Tugas Kuliah</span>
                <span class="pull-right-container">
                  <span class="label label-warning pull-right"><?php echo $this->main_model->getAllTugas($this->session->kode_user); ?></span>
                </span> </a>

            </li>
            <!-- sampe sini satu menu anakannya -->
          </ul>
        </li>
        <!-- <<<<<<<<<<<<<<<END OF lihat Materi + Upload Jawaban<<<<<<<<<<<< -->

        <?php
            if ($main_content == 'vw_mhs_nilai'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_nilai">
            <i class="fa fa-bar-chart"></i>
          <span>Nilai</span>
          </a>
        </li>
        <?php
            if ($main_content == 'vw_mhs_kehadiran'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_kehadiran">
            <i class="fa fa-check-square-o"></i>
          <span>Kehadiran</span>
          </a>
        </li>
        <li class="header">ADMINISTRASI</li>
        <?php
            if ($main_content == 'vw_mhs_kuisioner' || $main_content == 'vw_mhs_kuisioner_all_matkul' || $main_content == 'vw_mhs_lihat_kuisioner_tipe_satu' || $main_content == 'vw_mhs_input_kuisioner_tipe_satu'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_all_judul_kuisioner_mhs">
            <i class="fa fa-clipboard"></i>
          <span>Kuisioner</span>
          </a>
        </li>
        <?php
            if ($main_content == 'vw_mhs_statuspembayaran'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_statuspembayaran">
            <i class="fa fa-money"></i>
          <span>Pembayaran</span>
          </a>
        </li>
        <!-- nah sampe sini satu menu utama -->

        <!-- nah sampe sini satu menu utama -->
        <?php
            if ($main_content == 'vw_mhs_registrasimk' || $main_content == 'vw_mhs_cetakksm'){
              ?>
            <li class="active treeview"><?php
            }
            else{
              ?><li class="treeview"><?php
            }
          ?>
          <a href="#">
            <i class="fa fa-plus-square"></i>
            <span>Registrasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                      <!-- dari sini satu menu anakannya -->
            <li>
              <?php
            if ($main_content == 'vw_mhs_registrasimk'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_registrasimk"><i class="fa fa-database"></i> Registrasi Mata Kuliah</a>
            </li>
            <li><a href="<?php echo base_url()?>index.php/main_controller/pg_mhs_jadwalkuliah/<?php echo ($this->session->kode_user); ?>"><i class="fa fa-print"></i> Cetak Kartu Studi</a>
            <a href="<?php echo base_url()?>index.php/main_controller/pg_print_khs/<?php echo ($this->session->kode_user); ?>"><i class="fa fa-print"></i> Cetak Kartu Hasil Studi</a></li>

            <?php
              if ($main_content == 'vw_mhs_cetakksm'){
                ?>
              <li class="active"><?php
              }
              else{
                ?><li class=""><?php
              }
            ?>

            </li>
            <!-- sampe sini satu menu anakannya -->
          </ul>
        </li>
        <!-- Menu Registrasi -->
        <li class="header">SYSTEM</li>
        <?php
          if ($main_content == 'vw_mhs_editprofil' || $main_content == 'vw_mhs_ubahpassword'){
        ?>
        <li class="active treeview">
          <?php
          }
          else{
            ?>
            <li class="treeview">
              <?php
          }
        ?>
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Akun</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
                    <!-- dari sini satu menu anakannya -->
          <?php
            if ($main_content == 'vw_mhs_editprofil'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
            <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_editprofil"><i class="fa fa-edit"></i> Lihat Profil</a>
          </li>
          <?php
            if ($main_content == 'vw_mhs_ubahpassword'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
            <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_ubahpassword"><i class="fa fa-key"></i> Ubah Password</a>
          </li>
          <!-- sampe sini satu menu anakannya -->
        </ul>
      </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
