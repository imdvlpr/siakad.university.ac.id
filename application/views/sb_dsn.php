<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="min-height:90px;">
        <div class="pull-left image">
          <?php if ($this->main_model->getFotoProfilDsn() != '') {
            ?>
              <img src="<?php echo base_url().'/uploads/'.$this->main_model->getFotoProfilDsn()?>" class="img-circle" alt="User Image" style="max-width:65px;margin-top: 5px;">
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
            if ($main_content == 'vw_dashboard_dsn'){
              ?><li class="active"><?php
            }
            else{
              ?><li><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/dashboard">
            <i class="fa fa-home"></i>
            <span> Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="header">MAIN NAVIGATION</li>
        <!-- dari sini satu menu utama -->
          <?php
            if ($main_content == 'vw_dsn_jadwaldosen' || $main_content == 'vw_dsn_presensi' || $main_content == 'vw_dsn_update_kehadiran' || $main_content == 'vw_dsn_input_kehadiran'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_dsn_jadwaldosen">
            <i class="fa fa-calendar"></i>
            <span>Jadwal & Kehadiran</span>
          </a>

        </li>
        <!-- nah sampe sini satu menu utama -->

        <!-- >>>>>>>>>>>>>>Lihat Materi + Upload Jawaban>>>>>>>>>>>>>>> -->
        <?php
            if ($main_content == 'vw_dsn_materi_downloadjawaban' || $main_content == 'vw_dsn_materi_upload' || $main_content == 'vw_dsn_materi_kelas' || $main_content == 'vw_dsn_tugas_kelas' || $main_content == 'vw_dsn_tugas_kelas_hasil'){
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
            </span>
          </a>
          <ul class="treeview-menu">
                      <!-- dari sini satu menu anakannya -->
            <li>
              <?php
            if ($main_content == 'vw_dsn_materi_upload' || $main_content == 'vw_dsn_materi_kelas'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_dsn_materi_upload">
                <i class="fa fa-cloud-upload"></i> Materi Perkuliahan</a>
            </li>

            <?php
              if ($main_content == 'vw_dsn_materi_downloadjawaban' || $main_content == 'vw_dsn_tugas_kelas' || $main_content == 'vw_dsn_tugas_kelas_hasil'){
                ?>
              <li class="active"><?php
              }
              else{
                ?><li class=""><?php
              }
            ?>
              <a href="<?php echo base_url()?>index.php/main_controller/view_dsn_materi_downloadjawaban">
                <i class="fa fa-files-o"></i> Tugas Mahasiswa</a>
            </li>
            <!-- sampe sini satu menu anakannya -->
          </ul>
        </li>
        <!-- <<<<<<<<<<<<<<<END OF lihat Materi + Upload Jawaban<<<<<<<<<<<< -->

        <?php
            if ($main_content == 'vw_dsn_nilai' || $main_content == 'vw_dsn_update_nilai' || $main_content == 'vw_dsn_input_nilai'){
              ?>
            <li class="active"><?php
            }
            else{
              ?><li class=""><?php
            }
          ?>
          <a href="<?php echo base_url()?>index.php/main_controller/view_dsn_inputnilai">
          <i class="fa fa-bar-chart"></i>
          <span>Nilai</span>
          </a>
        </li>
        <li class="header">SYSTEM</li>
        <!-- dari sini sidebar Akun -->
          <?php
            if ($main_content == 'vw_dsn_editprofil' || $main_content == 'vw_dsn_gantipassword'){
              ?>
            <li class="active treeview"><?php
            }
            else{
              ?><li class="treeview"><?php
            }
          ?>
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Akun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-righ00t"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <!-- dari sini satu menu anakannya -->
            <?php
              if ($main_content == 'vw_dsn_editprofil'){
                ?>
              <li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?>

                  <a href="<?php echo base_url()?>index.php/main_controller/view_dsn_editprofil"><i class="fa fa-edit"></i> Lihat Profil</a>
                </li>
             <?php
              if ($main_content == 'vw_dsn_gantipassword'){
                ?>
              <li class="active"><?php
              }
              else{
                ?><li><?php
              }
            ?>

                  <a href="<?php echo base_url()?>index.php/main_controller/view_dsn_gantipassword"><i class="fa fa-key"></i> Ubah Password</a>
                </li>

            <!-- sampe sini satu menu anakannya -->
          </ul>
        </li>
        <!-- nah sampe sini satu menu utama -->
        <!-- nah sampe sini satu menu utama -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
