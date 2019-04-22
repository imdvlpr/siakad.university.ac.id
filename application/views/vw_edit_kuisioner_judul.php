<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Kuisioner</h2>
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
            <h3 class="box-title">Edit Judul Kuisioner</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/kuisioner_judul_update"); ?>

              <input type="hidden" class="form-control" name="id_kuisioner_judul" value="<?php echo $kuisioner_judul->row()->id_kuisioner_judul; ?>" readonly>

              <div class="form-row">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_tahun_akademik">
                    <option value="<?php echo ($kuisioner_judul->row()->id_tahun_akademik);?>"><?php echo (substr($kuisioner_judul->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner_judul->row()->keterangan, -1);?></option>
                    <?php foreach($tahun_akademik->result() as $data):?>
                      <option value="<?php echo $data->tahun_akademik_id; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Tipe</label>
                <div class="col-md-9">
                  <select class="form-control" name="tipe">
                    <?php if($kuisioner_judul->row()->tipe == 1) : ?>
                      <option value="1"> 1</option>
                      <option value="2"> 2</option>
                    <?php else : ?>
                      <option value="2"> 2</option>
                      <option value="1"> 1</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Judul Kuisioner</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="judul_kuisioner" placeholder="Judul Kuisioner" value="<?php echo $kuisioner_judul->row()->judul ?>" required>
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
