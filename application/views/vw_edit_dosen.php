

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
            <h3 class="box-title">Edit Dosen</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/Dosen_update"); ?>

              <div class="form-group">
                <label for="" class="col-md-3">NIDN</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nidn" placeholder="Nomor Induk Dosen" value="<?php echo $dosen->row()->nidn; ?>" readonly>
                </div>
              </div>


              <div class="form-group">
                <label for="" class="col-md-3">Nama Lengkap</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap Dosen" value="<?php echo $dosen->row()->nama_lengkap; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Status Pekerjaan</label>
                <div class="col-md-9">
                  <select class="form-control" name="status_pekerjaan">
                    <?php if($dosen->row()->status_pekerjaan == 1) : ?>
                      <option value="<?php echo $dosen->row()->status_pekerjaan; ?>"> Tetap </option>
                    <?php elseif($dosen->row()->status_pekerjaan == 2) : ?>
                      <option value="<?php echo $dosen->row()->status_pekerjaan; ?>"> Tidak Tetap </option>
                    <?php else: ?>
                      <option value="0"> Unknown </option>
                    <?php endif; ?>
                    <option value="1"> Tetap </option>
                    <option value="2"> Tidak Tetap </option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">NIP</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nip" placeholder="NIP Dosen" value="<?php echo $dosen->row()->nip; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">No KTP</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="no_ktp" placeholder="Nomor KTP Dosen" value="<?php echo $dosen->row()->no_ktp; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Tempat Lahir</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir Dosen" value="<?php echo $dosen->row()->tempat_lahir; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Tanggal Lahir</label>
                <div class="col-md-9">
                  <input id="datepicker" type="text" class="form-control" name="tanggal_lahir" placeholder="yyyy-mm-dd" value="<?php echo $dosen->row()->tanggal_lahir; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Gender</label>
                <div class="col-md-9">
                  <div class="radio">
                    <?php if($dosen->row()->gender == "p") : ?>
                      <label>
                        <input type="radio" name="optionsRadios" id="gendPria" value="pria" checked>
                        Pria
                      </label>
                      <label>
                        <input type="radio" name="optionsRadios" id="gendWanita" value="wanita">
                        Wanita
                      </label>
                    <?php else: ?>
                      <label>
                        <input type="radio" name="optionsRadios" id="gendPria" value="pria">
                        Pria
                      </label>
                      <label>
                        <input type="radio" name="optionsRadios" id="gendWanita" value="wanita" checked>
                        Wanita
                      </label>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Agama</label>
                <div class="col-md-9">
                  <select class="form-control" name="agama_id">
                  <?php foreach($agama->result() as $data):?>
                    <?php if($data->agama_id == $dosen->row()->agama_id) : ?>
                      <option value="<?php echo $dosen->row()->agama_id; ?>"><?php echo $data->keterangan;?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                    <?php foreach($agama->result() as $data):?>
                      <option value="<?php echo $data->agama_id; ?>"><?php echo $data->keterangan;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Status Kawin</label>
                <div class="col-md-9">
                  <select class="form-control" name="status_kawin">
                    <?php if($dosen->row()->status_kawin == 1) : ?>
                      <option value="<?php echo $dosen->row()->status_kawin; ?>"> Kawin </option>
                    <?php else: ?>
                      <option value="<?php echo $dosen->row()->status_kawin; ?>"> Belum Kawin </option>
                    <?php endif; ?>
                    <option value="1">Kawin</option>
                    <option value="2">Belum Kawin</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Gelar Pendidikan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="gelar_pendidikan" placeholder="Gelar Pendidikan Dosen" value="<?php echo $dosen->row()->gelar_pendidikan; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Alamat</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap"><?php echo $dosen->row()->alamat; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">No HP</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="hp" placeholder="No HP Dosen" value="<?php echo $dosen->row()->hp; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Email</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="email" placeholder="Email Dosen" value="<?php echo $dosen->row()->email; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="prodi_id">
                  <?php foreach($prodi as $data):?>
                    <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                  <?php endforeach; ?>
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
