<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Angkatan</h2>
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
      <h3 class="box-title">Edit Angkatan</h3>
    </div>
    <div class="box-body">
      <?php echo form_open("main_controller/Angkatan_update"); ?>
        <input type="hidden" class="form-control" name="id_angkatan" placeholder="ID Angkatan" value="<?php echo $angkatan->row()->id_angkatan; ?>" readonly>
        <div class="form-row">
          <label for="" class="col-md-3">Tahun</label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="tahun" placeholder="Tahun" value="<?php echo $angkatan->row()->tahun; ?>">
          </div>
        </div>
        <input type="submit" class="btn btn-success" name="update" value="Submit"></input>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
