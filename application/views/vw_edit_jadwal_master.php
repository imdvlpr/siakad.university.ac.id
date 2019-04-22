<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Ubah Data Jadwal</h2>
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
            <h3 class="box-title">Edit Jadwal Master</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/Jadwal_master_update"); ?>

              <input type="hidden" class="form-control" name="id_jadwal_master" value="<?php echo $jadwal->row()->id_jadwal_master; ?>" readonly>

              <div class="form-row">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="id_tahun_akademik"  value="<?php echo (substr($jadwal->row()->keterangan, 0,4)); echo "-"; echo substr($jadwal->row()->keterangan, -1);?>" readonly>
                </div>
              </div>


              <div class="form-row">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_prodi" id="prodi">
                    <option value="<?php echo($jadwal->row()->id_prodi); ?>"><?php echo($jadwal->row()->nama_prodi); ?></option>
                    <?php foreach($prodi as $data):?>
                      <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Kelas</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_kelas" id="kelas">
                    <option value="<?php echo($jadwal->row()->id_kelas); ?>"><?php echo($jadwal->row()->nama_kelas); ?></option>

                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Mata Kuliah</label>
                <div class="col-md-9">
                  <select class="form-control" name="kode_mk" id="matkul">
                    <option value="<?php echo($jadwal->row()->kode_mk); ?>"><?php echo($jadwal->row()->nama_mk); ?></option>

                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">NIDN</label>
                <div class="col-md-9">
                  <select class="form-control" name="nidn" id="dosen">
                    <option value="<?php echo($jadwal->row()->nidn); ?>"><?php echo($jadwal->row()->nama_lengkap); ?></option>

                  </select>
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
