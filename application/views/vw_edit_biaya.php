<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Pembayaran</h2>
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
            <h3 class="box-title">Edit Pembayaran</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/biaya_update"); ?>

              <input type="hidden" class="form-control" name="id_biaya" value="<?php echo $biaya->row()->id_biaya; ?>" readonly>

              <div class="form-row">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="id_tahun_akademik" value="<?php echo $biaya->row()->keterangan; ?>" readonly>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="prodi" value="<?php echo $biaya->row()->nama_prodi; ?>" readonly>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Jenis Pembayaran</label>
                <div class="col-md-9">
                  <?php if ($biaya->row()->jenis_pembayaran == 1) {
                    ?><input type="text" class="form-control" name="" value="Registrasi Semester" readonly><?php
                  } else if ($biaya->row()->jenis_pembayaran == 2){
                    ?><input type="text" class="form-control" name="" value="SPP Bulanan" readonly><?php
                  }else{
                    ?><input type="text" class="form-control" name="" value="Unknown" readonly><?php
                  }?>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Jumlah Biaya</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="jumlah_biaya" placeholder="Biaya" value="<?php echo $biaya->row()->jumlah_biaya; ?>" required>
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


  <!-- /.content -->
</div>
