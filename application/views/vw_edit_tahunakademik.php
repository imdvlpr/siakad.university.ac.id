<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Tahun Akademik</h2>
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
            <h3 class="box-title">Edit Tahun Akademik</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/TahunAkademik_update"); ?>


              <div class="form-row">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="" placeholder="" value="<?php echo substr($tahun_akademik->row()->keterangan, 0,4) ?>" readonly>
                  <input type="text" class="form-control" name="tahun_akademik_id" placeholder="" style="visibility: hidden;" value="<?php echo ($tahun_akademik->row()->tahun_akademik_id) ?>">
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Keterangan</label>
                <div class="col-md-9">
                  <?php
                    if (substr($tahun_akademik->row()->keterangan, -1) == 1) {
                      ?><input type="text" class="form-control" name="" placeholder="" value="Semester Ganjil" readonly><?php
                    }else{
                      ?><input type="text" class="form-control" name="" placeholder="" value="Semester Genap" readonly><?php
                    }
                   ?>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Batas Registrasi</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="bts_regis" placeholder="" id="datepicker" value="<?php echo $tahun_akademik->row()->batas_registrasi; ?>">
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Status</label>
                <div class="col-md-9">
                  <div class="radio">
                      <?php if ($tahun_akademik->row()->status == 'y') {
                        ?>
                        <label><input type="radio" name="optionsRadios" id="status_open" value="y" checked>Open</label>
                        <label><input type="radio" name="optionsRadios" id="status_close" value="n">Close</label>
                        <?php
                      } else{
                        ?>
                        <label><input type="radio" name="optionsRadios" id="status_open" value="y" >Open</label>
                        <label><input type="radio" name="optionsRadios" id="status_close" value="n"checked>Close</label>
                        <?php
                      }?>
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


  <!-- /.content -->
</div>
