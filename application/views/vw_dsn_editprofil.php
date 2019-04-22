<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Dosen</h6>
        <h2>Edit Profil Dosen</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
          <span id="date_time"></span>
          <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="col">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Biodata Dosen</h4>
      </div>

      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
      </div>
    </div>
  </div>
  <br>
  <?php echo form_open("main_controller/dsn_dsn_editprofil"); ?>

    <div class="form-row">
      <label for="" class="col-md-3">NIDN</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="nidn" placeholder="Nomor Induk Dosen" value="<?php echo $dosen->row()->nidn; ?>" readonly>
      </div>
    </div>


    <div class="form-row">
      <label for="" class="col-md-3">Nama Lengkap</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap Dosen" value="<?php echo $dosen->row()->nama_lengkap; ?>">
      </div>
    </div>

    <div class="form-row">
      <label for="" class="col-md-3">NIP</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="nip" placeholder="NIP Dosen" value="<?php echo $dosen->row()->nip; ?>">
      </div>
    </div>

    <div class="form-row">
      <label for="" class="col-md-3">No KTP</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="no_ktp" placeholder="Nomor KTP Dosen" value="<?php echo $dosen->row()->no_ktp; ?>">
      </div>
    </div>

    <div class="form-row">
      <label for="" class="col-md-3">Tempat Lahir</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir Dosen" value="<?php echo $dosen->row()->tempat_lahir; ?>">
      </div>
    </div>

    <div class="form-row">
      <label for="" class="col-md-3">Tanggal Lahir</label>
      <div class="col-md-9">
        <input id="datepicker" type="text" class="form-control" name="tanggal_lahir" placeholder="yyyy-mm-dd" value="<?php echo $dosen->row()->tanggal_lahir; ?>">
      </div>
    </div>

    <div class="form-row">
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

    <div class="form-row">
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

    <div class="form-row">
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

    <div class="form-row">
      <label for="" class="col-md-3">Gelar Pendidikan</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="gelar_pendidikan" placeholder="Gelar Pendidikan Dosen" value="<?php echo $dosen->row()->gelar_pendidikan; ?>">
      </div>
    </div>

    <div class="form-row">
          <label class="col-md-3 from-control-label">Jabatan Akademik</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="gelar_pendidikan" placeholder="Jabatan Akademik" value="<?php echo $dosen->row()->jabatan_akademik; ?>">
        </div>
      </div>

      <div class="form-row">
        <label class="col-md-3 from-control-label">Pendidikan</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="gelar_pendidikan" placeholder="Pendidikan" value="<?php echo $dosen->row()->pendidikan; ?>">
          </div>
       </div>

    <div class="form-row">
      <label for="" class="col-md-3">Alamat</label>
      <div class="col-md-9">
        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap"><?php echo $dosen->row()->alamat; ?></textarea>
      </div>
    </div>

    <div class="form-row">
      <label for="" class="col-md-3">No HP</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="hp" placeholder="No HP Dosen" value="<?php echo $dosen->row()->hp; ?>">
      </div>
    </div>

    <div class="form-row">
      <label for="" class="col-md-3">Email</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="email" placeholder="Email Dosen" value="<?php echo $dosen->row()->email; ?>">
      </div>
    </div>

     <div class="form-row">
      <label for="" class="col-md-3">Program Studi</label>
      <div class="col-md-9">
      <input type="hidden" class="form-control" name="prodi_id" placeholder="Nomor Induk Dosen" value="<?php echo $dosen->row()->prodi_id; ?>" readonly>
      <input type="text" class="form-control" name="" placeholder="Nomor Induk Dosen" value="<?php echo ($this->main_model->getSatuProdi($dosen->row()->prodi_id)->row()->nama_prodi )?>" readonly>

      </div>
    </div>
    <input type="submit" class="btn btn-info" name="update" value="Submit" style="float:right"></input>
    <?php echo form_close(); ?>


</div>


<section class="content-popup">
      <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">

                  <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
               </div>
               <div class="modal-body">
                  <div>
                    <p align="justify">Halaman ini menampilkan biodata anda, apabila ada data yang kurang lengkap, harap segera lengkapi.</p>
                  </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>

          <?php echo form_close(); ?>
      </div>


   </section>
