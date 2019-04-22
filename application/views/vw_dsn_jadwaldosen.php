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
                    <p align="justify">Pada halaman ini, anda dapat melihat jadwal mengajar secara keseluruhan sesuai dengan ajaran semester pada saat ini. Setiap di akhir perkuliahan di haruskan untuk meng-input presensi mahasiswa.
                    <br>Klik tombol <b>"Presensi"</b> pada tabel di bawah sebelah kanan anda.</p></br>
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
        Jadwal Mengajar & Kehadiran
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Jadwal</li>
        <li class="active"> Jadwal Mengajar & Kehadiran</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->
              
            <div class="col-xs-20">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Daftar Jadwal</h3>
                  </div>
                <!-- /.box-header -->
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
                        <th>OPERASI</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 0; ?>
                      <?php foreach($jadwal_dosen->result() as $data):?>
                      <?php $i += 1; ?>

                      <tr>
                        <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                        <td><?php echo ($data->nama_hari); ?></td>
                        <td><?php echo ($data->jam_mulai); ?> - <?php echo ($data->jam_selesai); ?></td>
                        <td><?php echo ($data->nama_ruangan); ?></td>
                        <td><?php echo ($data->nama_mk); ?></td>
                        <td><?php echo ($data->nama_kelas); ?></td>
                        <td>
                          <a href="<?php echo base_url()?>index.php/main_controller/redirect_view_presensi/<?php echo ($data->id_jadwal_matkul); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Presensi</a>
                        </td>
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
                        <th>OPERASI</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
            </div>
          </div>
    </section>
</div>
