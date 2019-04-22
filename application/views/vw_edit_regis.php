<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Registrasi</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
          <div class="input-group-prepend"></div>
          <span id="date_time"></span>
          <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Registrasi</h3>

        </div>
        <!-- /.box-header -->


        <div class="box-body">
          <?php echo form_open("main_controller/registrasi_update"); ?>
            <div class="form-row">

              <input type="hidden" class="form-control" name="id_registrasi" value="<?php echo $regis->row()->id_registrasi; ?>" readonly>

              <label for="" class="col-md-3">Tahun Akademik</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="" placeholder="" value="<?php echo substr($regis->row()->keterangan, 0,4) ?>" readonly>
                <input type="text" class="form-control" name="tahun_akademik_id" placeholder="" style="visibility: hidden;" value="<?php echo ($regis->row()->tahun_akademik_id) ?>">
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Keterangan</label>
              <div class="col-md-9">
                <?php
                  if (substr($regis->row()->keterangan, -1) == 1) {
                    ?><input type="text" class="form-control" name="" placeholder="" value="Semester Ganjil" readonly><?php
                  }else{
                    ?><input type="text" class="form-control" name="" placeholder="" value="Semester Genap" readonly><?php
                  }
                 ?>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">NIM</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="nim" placeholder="" value="<?php echo $regis->row()->nim; ?>" readonly>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Status</label>
              <div class="col-md-9">
                <div class="radio">
                  <?php if($regis->row()->status_regis == 0) : ?>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_open" value="0" checked>
                      Belum Registrasi
                    </label>
                  <?php else : ?>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_open" value="0">
                      Belum Registrasi
                    </label>
                  <?php endif; ?>
                  <?php if($regis->row()->status_regis == 1) : ?>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_close" value="1" checked>
                      Approved
                    </label>
                  <?php else : ?>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_close" value="1">
                      Approved
                    </label>
                  <?php endif; ?>
                  <?php if($regis->row()->status_regis == 2) : ?>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_close" value="2" checked>
                      Pending
                    </label>
                  <?php else : ?>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_close" value="2">
                      Pending
                    </label>
                  <?php endif; ?>
                  <?php if($regis->row()->status_regis == 3) : ?>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_close" value="3" checked>
                      Rejected
                    </label>
                  <?php else : ?>
                    <label>
                      <input type="radio" name="optionsRadios" id="status_close" value="3">
                      Rejected
                    </label>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <input type="submit" class="btn btn-success" name="update" value="Submit"></input>
          <?php echo form_close(); ?>
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
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tabel Kartu Rencana Studi Mahasiswa</h3>

        </div>
        <!-- /.box-header -->


        <div class="box-body">
          <table id="tabelkeren" class="table  table-striped  table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>NIM</th>
              <th>MATA KULIAH</th>
              <th>KELAS</th>
              <th>DOSEN</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            <?php foreach($temp_krs->result() as $data):?>
            <?php $i += 1; ?>

            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $data->nim; ?></td>
              <td><?php echo $data->nama_mk; ?></td>
              <td><?php echo $data->nama_kelas; ?></td>
              <td><?php echo $data->nidn; ?></td>
              <td></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>#</th>
              <th>NIM</th>
              <th>MATA KULIAH</th>
              <th>KELAS</th>
              <th>DOSEN</th>
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

<!-- /.content -->
</div>
