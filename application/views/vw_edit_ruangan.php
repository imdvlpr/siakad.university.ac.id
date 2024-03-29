<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Ruangan</h2>
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
            <h3 class="box-title">Edit Ruangan</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/Ruangan_update"); ?>

              <input type="hidden" class="form-control" name="ruangan_id" placeholder="ID Ruangan" value="<?php echo $ruangan->row()->ruangan_id; ?>" readonly>

              <div class="form-row">
                <label for="" class="col-md-3">Nama Ruangan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan" value="<?php echo $ruangan->row()->nama_ruangan; ?>">
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Nama Gedung</label>
                <div class="col-md-9">

                  <select class="form-control" name="gedung_id">
                    <?php foreach($gedung->result() as $data):?>
                      <?php if($data->gedung_id == $ruangan->row()->gedung_id) : ?>
                        <option value="<?php echo $ruangan->row()->gedung_id; ?>"><?php echo $data->nama_gedung;?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php foreach($gedung->result() as $data):?>
                      <option value="<?php echo $data->gedung_id; ?>"><?php echo $data->nama_gedung;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Kapasitas</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas Ruangan" value="<?php echo $ruangan->row()->kapasitas; ?>">
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Keterangan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?php echo $ruangan->row()->keterangan; ?>">
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
