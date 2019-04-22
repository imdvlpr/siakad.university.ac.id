<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Akademik</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
  <div class="input-group-prepend">
    
  </div>
  <span id="date_time"></span>
<script type="text/javascript">window.onload = date_time('date_time');</script>
</div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="col" style="overflow: auto;">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Tabel Kartu Rencana Studi</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
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
</div>
  <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Tambah Tahun Akademik</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/tahunAkademik_addNew"); ?>

              <div class="form-row">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tahun_akademik" placeholder="Tahun Akademik" required>
                </div>
              </div>

              <div class="form-row">
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

               <div class="form-row">
                <label class="col-md-3">Batas Registrasi</label>
                <div class="col-md-9">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class=""></i>
                  </div>
                  <input type="text" name='bts_regis' class="form-control pull-right" id="datepicker">
                </div>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-row">
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
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-success" name="addnew" value="Submit"></input>
              
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
        
        <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
       </div>
       <div class="modal-body">
        <div>
         Dalam menu ini, admin dapat melihat beberapa mahasiswa yang sudah melalukan registrasi mata kuliah  atau belum. Pada halaman ini admin hanya dapat merubah status registrasi mahasiswa apakah belum registrasi, registrasi ter approve, pending, rejected. Apabila belum registrasi maka aka nada notifikasi pada mahasiswa untuk segera registrasi, jika sudah di approve mahasiswa dapat melihat jadwal kuliahnya.
        </div>
       </div>
       <div class="modal-footer">
        
       </div>
      </div>
     </div>
    </div>
   </section>
