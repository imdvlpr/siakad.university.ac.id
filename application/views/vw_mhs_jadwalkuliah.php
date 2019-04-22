<div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <div class="content-header">
      <div style="text-align: right; font-size: 12.5px;">
         <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
      </div>
   </div>
   <section class="content-popup">
      <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
               </div>
               <div class="modal-body">
                  <div>
                     <p align="justify">Pada halaman ini, anda dapat melihat jadwal kuliah anda selama satu semester. Jika membutuhkan print out jadwal kuliah satu semester, klik menu <b>Registrasi</b> pada sebelah kiri anda, lalu klik <b>"Cetak Kartu Studi"</b>.</p>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
   </section>
    <section class="content-header">

      <h1>
        Jadwal Kuliah Mahasiswa
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Jadwal</li>
        <li class="active"> Jadwal Kuliah Mahasiswa</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <?php
        if ($status_regis_mhs != 1){
          ?><div class="callout callout-info">
            <h4>Informasi !</h4>
            Silahkan lakukan Registrasi Mata Kuliah untuk mengakses halaman ini, petunjuk dapat diakses melalui
            <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_registrasimk">Halaman Registrasi</a>
            <br>Terimakasih.
          </div><?php
        }else{
          ?>
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->

            <div class="col-xs-20">
                <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Jadwal</h3>
                </div>
                  <div class="box-body">

                    <table id="tabelkeren" class="table  table-striped  table-hover">
                      <thead>
                      <tr>
                        <th>AKADEMIK</th>
                        <th>HARI</th>
                        <th>JAM</th>
                        <th>RUANGAN</th>
                        <th>MATA KULIAH</th>
                        <th>KELAS</th>
                        <th>DOSEN</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 0; ?>
                      <?php foreach($jadwalmhs->result() as $data):?>
                      <?php $i += 1; ?>

                      <tr>
                        <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                        <td><?php echo ($data->nama_hari); ?></td>
                        <td><?php echo ($data->jam_mulai); ?> - <?php echo ($data->jam_selesai); ?></td>
                        <td><?php echo ($data->nama_ruangan); ?></td>
                        <td><?php echo ($data->nama_mk); ?></td>
                        <td><?php echo ($data->nama_kelas); ?></td>
                        <td><?php echo ($data->nama_lengkap); ?></td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>AKADEMIK</th>
                        <th>HARI</th>
                        <th>JAM</th>
                        <th>RUANGAN</th>
                        <th>MATA KULIAH</th>
                        <th>KELAS</th>
                        <th>DOSEN</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
            </div>
          </div>
          <?php
        }
       ?>
    </section>
</div>
