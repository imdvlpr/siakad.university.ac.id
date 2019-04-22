<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Mata Kuliah</h2>
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
            <h3 class="box-title">Edit Mata Kuliah</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/Matkul_update"); ?>


              <div class="form-row">
                <label for="" class="col-md-3">Kode Mata Kuliah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="kode_mk" placeholder="Kode Mata Kuliah" value="<?php echo $matkul->row()->kode_mk; ?>" readonly>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Nama Mata Kuliah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_mk" placeholder="Nama Mata Kuliah" value="<?php echo $matkul->row()->nama_mk; ?>">
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">SKS Mata Kuliah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="sks_mk" placeholder="SKS Mata Kuliah" value="<?php echo $matkul->row()->sks_mk; ?>">
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Semester</label>
                <div class="col-md-9">
                  <select class="form-control" name="semester">
                    <?php if($matkul->row()->semester == 1) : ?>
                      <option value="<?php echo $matkul->row()->semester; ?>"> Ganjil </option>
                    <?php else: ?>
                      <option value="<?php echo $matkul->row()->semester; ?>"> Genap </option>
                    <?php endif; ?>
                    <option value="1">Ganjil</option>
                    <option value="2">Genap</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Tingkat</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tingkat" placeholder="Tingkat" value="<?php echo $matkul->row()->tingkat; ?>">
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
