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
                     <p align="justify">Pada halaman ini, anda dapat melihat jadwal Ujian Tengah Semester (UTS) atau Ujian Akhir Semester (UAS). Dengan catatan jadwal akan muncul ketika sudah mendekati masing-masing ujian dan wajib mengisi <b>Kuisioner</b> terlebih dahulu. Anda dapat mencetak kartu ujian dengan klik <b>“Cetak Kartu Ujian”</b> disebelah kanan atas.</p>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>

    <section class="content-header">
      <h1>
        Jadwal Ujian
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li class="active"> Jadwal</li>
        <li class="active"> Jadwal Ujian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- left colum -->


        <div class="col-xs-20">
            <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-header">
              <h3 class="box-title">Daftar Jadwal Ujian</h3>
              <a href="<?php echo base_url()?>index.php/main_controller/pg_mhs_jadwalujian/<?php echo $this->session->kode_user; ?>" style="float:right;" class="btn btn-lg"><i class="fa fa-print"></i> Cetak Jadwal Ujian</a>
            </div>
              <div class="box-body">
                <table id="tabelkeren" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>HARI</th>
                  <th>JAM</th>
                  <th>RUANGAN</th>
                  <th>KODE MATA KULIAH</th>
                  <th>NAMA MATA KULIAH</th>
                  <th>KELAS</th>
                  <th>JENIS UJIAN</th>
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
                    <?php if($data->jenis_ujian == 1) : ?>
                      <td>UTS</td>
                    <?php else : ?>
                      <td>UAS</td>
                    <?php endif; ?>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>HARI</th>
                  <th>JAM</th>
                  <th>RUANGAN</th>
                  <th>KODE MATA KULIAH</th>
                  <th>NAMA MATA KULIAH</th>
                  <th>KELAS</th>
                  <th>JENIS UJIAN</th>
                </tr>
              </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
