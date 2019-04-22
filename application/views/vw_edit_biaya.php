
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
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
