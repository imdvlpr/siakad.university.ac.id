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
                     <p align="justify">Pada halaman ini, anda dapat melihat materi perkuliahan yang diberikan oleh dosen. Klik  "Lihat Materi" pada tabel dibawah yang terdapat di sebelah kanan anda</p>
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
        Materi Perkuliahan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Materi & Tugas</li>
        <li class="active"> Materi Perkuliahan</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kelas</h3>

            </div>
            <!-- /.box-header -->


            <div class="box-body">
              <table id="tabelkeren" class="table  table-striped  table-hover">
                <thead>
                <tr>
                  <th>AKADEMIK</th>
                  <th>MATA KULIAH</th>
                  <th>PROGRAM STUDI</th>
                  <th>KELAS</th>
                  <th>DOSEN</th>
                  <th id="s">OPERASI</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                <?php foreach($jadwal->result() as $data):?>
                <?php $i += 1; ?>

                <tr>
                  <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                  <td><?php echo ($data->nama_mk); ?></td>
                  <td><?php echo ($data->nama_prodi); ?></td>
                  <td><?php echo ($data->nama_kelas); ?></td>
                  <td><?php echo ($data->nidn); ?></td>
                  <td>
                    <a href="<?php echo base_url()?>index.php/main_controller/redirect_download_materi/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat Materi</a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>AKADEMIK</th>
                  <th>MATA KULIAH</th>
                  <th>PROGRAM STUDI</th>
                  <th>KELAS</th>
                  <th>DOSEN</th>
                  <th id="s">OPERASI</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>




  </section>
</div>
