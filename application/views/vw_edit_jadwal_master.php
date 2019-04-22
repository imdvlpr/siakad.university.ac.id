  
  
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
            <h3 class="box-title">Edit Jadwal Master</h3>
            
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/Jadwal_master_update"); ?>

              <input type="hidden" class="form-control" name="id_jadwal_master" value="<?php echo $jadwal->row()->id_jadwal_master; ?>" readonly>

              <div class="form-group">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="id_tahun_akademik"  value="<?php echo (substr($jadwal->row()->keterangan, 0,4)); echo "-"; echo substr($jadwal->row()->keterangan, -1);?>" readonly>
                </div>
              </div>


              <div class="form-group">
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

              <div class="form-group">
                <label for="" class="col-md-3">Kelas</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_kelas" id="kelas">
                    <option value="<?php echo($jadwal->row()->id_kelas); ?>"><?php echo($jadwal->row()->nama_kelas); ?></option>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Mata Kuliah</label>
                <div class="col-md-9">
                  <select class="form-control" name="kode_mk" id="matkul">
                    <option value="<?php echo($jadwal->row()->kode_mk); ?>"><?php echo($jadwal->row()->nama_mk); ?></option>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">NIDN</label>
                <div class="col-md-9">
                  <select class="form-control" name="nidn" id="dosen">
                    <option value="<?php echo($jadwal->row()->nidn); ?>"><?php echo($jadwal->row()->nama_lengkap); ?></option>

                  </select>
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
  </section> 


  <!-- /.content -->    
</div>