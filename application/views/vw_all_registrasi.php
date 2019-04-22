
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div style="font-size: 13.5px; text-align: right;">
      <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
    </div>
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb" style="margin-top: 20px">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Registrasi</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <form class="" action="index.html" method="post">

            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>
                <th>NIM</th>
                <th>TAHUN AKADEMIK</th>
                <th>STATUS REGISTRASI</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              <?php foreach($regis->result() as $data):?>
              <?php $i += 1; ?>
              <tr>
                <td><?php echo $data->nim; ?></td>
                <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                <td>
                  <?php
                    if ($data->status_regis == 0) {
                      echo "Belum Registrasi";
                    }else if ($data->status_regis == 1) {
                      echo "Telah di Setujui";
                    }else if ($data->status_regis == 2) {
                      echo "Menunggu Persetujuan";
                    }else if ($data->status_regis == 3) {
                      echo "Rejected";
                    }
                   ?>
                </td>
                <td>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_regis/<?php echo $data->id_registrasi ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>


              <tfoot>
              <tr>
                <th>NIM</th>
                <th>TAHUN AKADEMIK</th>
                <th>STATUS REGISTRASI</th>
                <th id="s">OPERASI</th>
              </tr>
              </tfoot>
            </table>

          </form>
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


  <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Tahun Akademik</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/tahunAkademik_addNew"); ?>

              <div class="form-group">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tahun_akademik" placeholder="Tahun Akademik" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Semester</label>
                <div class="col-md-9">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios1" id="sms_ganjil" value="1" checked>
                      Ganjil
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios1" id="sms_genap" value="2">
                      Genap
                    </label>
                  </div>
                </div>
              </div>

               <div class="form-group">
                <label class="col-md-3">Batas Registrasi</label>
                <div class="col-md-9">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name='bts_regis' class="form-control pull-right" id="datepicker">
                </div>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Status</label>
                <div class="col-md-9">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="status_open" value="y" checked>
                      Open
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_close" value="n">
                      Close
                    </label>
                  </div>
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
            </div>
          </div>
        </div>


  </section>
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
         Dalam menu ini, admin dapat melihat beberapa mahasiswa yang sudah melalukan registrasi mata kuliah  atau belum. Pada halaman ini admin hanya dapat merubah status registrasi mahasiswa apakah belum registrasi, registrasi ter approve, pending, rejected. Apabila belum registrasi maka aka nada notifikasi pada mahasiswa untuk segera registrasi, jika sudah di approve mahasiswa dapat melihat jadwal kuliahnya.
        </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
   </section>
  <!-- /.content -->
</div>
