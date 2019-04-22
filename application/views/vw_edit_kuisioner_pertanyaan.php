<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Pertanyaan Kuisioner</h2>
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
            <h3 class="box-title">Edit Pertanyaan Kuisioner</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/kuisioner_pertanyaan_update"); ?>

              <input type="hidden" class="form-control" name="id_kuisioner_judul" value="<?php echo $kuisioner_judul->row()->id_kuisioner_judul; ?>" readonly>
              <input type="hidden" class="form-control" name="id_kuisioner_pertanyaan" value="<?php echo $kuisioner_pertanyaan->row()->id_kuisioner_pertanyaan; ?>" readonly>

              <div class="form-row">
                <label for="" class="col-md-3"> Pertanyaan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pertanyaan_kuisioner" value="<?php echo $kuisioner_pertanyaan->row()->pertanyaan ?>" required>
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
