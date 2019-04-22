
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
            <?php echo form_open("main_controller/status_bayar_update"); ?>

              <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $pembayaran->row()->id_transaksi; ?>" readonly>

              <div class="form-group">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="id_tahun_akademik" value="<?php echo $pembayaran->row()->id_tahun_akademik; ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">NIM</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nim" value="<?php echo $pembayaran->row()->nim; ?>" readonly>
                </div>
              </div>





              <div class="form-group">
                <label for="" class="col-md-3">Status</label>
                <div class="col-md-9">
                  <select class="form-control" name="status">
                      <option><?php if ($pembayaran->row()->status_pembayaran_mhs == 1) {
                        echo "Approved";
                      }else if ($pembayaran->row()->status_pembayaran_mhs == 3) {
                        echo "Waiting";
                      }else{
                        echo "Cancelled";
                      }?>
                      </option>
                      <option value="1">Approved</option>
                      <option value="3">Waiting</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Tanggal</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tanggal" value="<?php echo $pembayaran->row()->tanggal; ?>" readonly>
                </div>
              </div>






            <input type="submit" class="btn btn-Warning" name="update" value="Submit"></input>


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
    <?php if (isset($buktipembayaran->row()->dir)) {
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bukti Pembayaran</h3>
            </div>
            <div class="box-body">
              <img src="<?php echo base_url(); ?>uploads/<?php echo $buktipembayaran->row()->dir; ?>" width=400px>
            </div>
            <a href="<?php echo base_url()?>index.php/main_controller/download/<?php echo ($buktipembayaran->row()->id_bukti); ?>" class="btn btn-sm"><i class="fa fa-download"></i> Download</a>
          </div>
        </div>
      </div>
      <?php
    } ?>

  </section>


  <!-- /.content -->
</div>
