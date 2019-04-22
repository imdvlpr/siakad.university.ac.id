<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Profil</h6>
        <h2>Preview</h2>
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
        <h4 class="title-content">Biodata Mahasiswa</h4>
      </div>

      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
      </div>
    </div>
  </div>
  <br>
  <?php echo form_open("main_controller/MHS_MHS_update"); ?>
    <div class="form-row">
      <label for="" class="col-md-3">NIM</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa" value="<?php echo $mahasiswa->row()->nim; ?>" readonly>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Nama Lengkap</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Mahasiswa" value="<?php echo $mahasiswa->row()->nama; ?>">
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Alamat</label>
      <div class="col-md-9">
        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap"><?php echo $mahasiswa->row()->alamat; ?></textarea>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Gender</label>
      <div class="col-md-9">
        <div class="radio">
          <?php if($mahasiswa->row()->gender == "p") : ?>
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
        <select class="form-control" name="agama">
          <?php foreach($agama->result() as $data):?>
            <?php if($data->agama_id == $mahasiswa->row()->agama_id) : ?>
              <option value="<?php echo $mahasiswa->row()->agama_id; ?>"><?php echo $data->keterangan;?></option>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php foreach($agama->result() as $data):?>
            <option value="<?php echo $data->agama_id; ?>"><?php echo $data->keterangan;?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Tanggal Lahir</label>
      <div class="col-md-9">
        <input id="datepicker" type="text" class="form-control" name="tgl_lahir" placeholder="yyyy-mm-dd" value="<?php echo $mahasiswa->row()->tanggal_lahir; ?>">
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Tempat Lahir</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir Mahasiswa" value="<?php echo $mahasiswa->row()->tempat_lahir; ?>">
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Nama Ayah</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah Mahasiswa" value="<?php echo $mahasiswa->row()->nama_ayah; ?>">
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Nama Ibu</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu Mahasiswa" value="<?php echo $mahasiswa->row()->nama_ibu; ?>">
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Nomor Telfon Orang Tua </label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telfon Orang Tua" value="<?php echo $mahasiswa->row()->no_hp_ortu; ?>">
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Pekerjaan Ibu</label>
      <div class="col-md-9">
        <select class="form-control" name="ID_p_ibu">
        <?php foreach($pekerjaan->result() as $data):?>
          <?php if($data->pekerjaan_id == $mahasiswa->row()->pekerjaan_id_ibu) : ?>
            <option value="<?php echo $mahasiswa->row()->pekerjaan_id_ibu; ?>"><?php echo $data->keterangan;?></option>
          <?php endif; ?>
        <?php endforeach; ?>
        <?php foreach($pekerjaan->result() as $data):?>
          <option value="<?php echo $data->pekerjaan_id; ?>"><?php echo $data->keterangan;?></option>
        <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Pekerjaan Bapak</label>
      <div class="col-md-9">
        <select class="form-control" name="ID_p_bpk">
        <?php foreach($pekerjaan->result() as $data):?>
          <?php if($data->pekerjaan_id == $mahasiswa->row()->pekerjaan_id_ayah) : ?>
            <option value="<?php echo $mahasiswa->row()->pekerjaan_id_ayah; ?>"><?php echo $data->keterangan;?></option>
          <?php endif; ?>
        <?php endforeach; ?>
        <?php foreach($pekerjaan->result() as $data):?>
          <option value="<?php echo $data->pekerjaan_id; ?>"><?php echo $data->keterangan;?></option>
        <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Alamat Ayah</label>
      <div class="col-md-9">
        <textarea class="form-control" rows="3" name="alamat_ayah" placeholder="Alamat Lengkap"><?php echo $mahasiswa->row()->alamat_ayah; ?></textarea>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Alamat Ibu</label>
      <div class="col-md-9">
        <textarea class="form-control" rows="3" name="alamat_ibu" placeholder="Alamat Lengkap"><?php echo $mahasiswa->row()->alamat_ibu; ?></textarea>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Penghasilan Ayah</label>
      <div class="col-md-9">
        <select class="form-control" name="hasil_ayah">
          <?php if($mahasiswa->row()->penghasilan_ayah == "&lt;3000000") : ?>
            <option value="<?php echo $mahasiswa->row()->penghasilan_ayah; ?>"> < 3.000.000</option>
          <?php elseif($mahasiswa->row()->penghasilan_ayah == "&lt;5000000") : ?>
            <option value="<?php echo $mahasiswa->row()->penghasilan_ayah; ?>"> < 5.000.000</option>
          <?php elseif($mahasiswa->row()->penghasilan_ayah == "&lt;1000000") : ?>
            <option value="<?php echo $mahasiswa->row()->penghasilan_ayah; ?>"> < 10.000.000</option>
          <?php else: ?>
            <option value="<?php echo $mahasiswa->row()->penghasilan_ayah; ?>"> > 10.000.000</option>
          <?php endif; ?>
          <option value="<3000000"> < 3.000.000</option>
          <option value="<5000000"> < 5.000.000</option>
          <option value="<10000000"> < 10.000.000</option>
          <option value=">10000000"> > 10.000.000</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Penghasilan Ibu</label>
      <div class="col-md-9">
        <select class="form-control" name="hasil_ibu">
          <?php if($mahasiswa->row()->penghasilan_ibu == "&lt;3000000") : ?>
            <option value="<?php echo $mahasiswa->row()->penghasilan_ibu; ?>"> < 3.000.000</option>
          <?php elseif($mahasiswa->row()->penghasilan_ibu == "&lt;5000000") : ?>
            <option value="<?php echo $mahasiswa->row()->penghasilan_ibu; ?>"> < 5.000.000</option>
          <?php elseif($mahasiswa->row()->penghasilan_ibu == "&lt;1000000") : ?>
            <option value="<?php echo $mahasiswa->row()->penghasilan_ibu; ?>"> < 10.000.000</option>
          <?php else: ?>
            <option value="<?php echo $mahasiswa->row()->penghasilan_ibu; ?>"> > 10.000.000</option>
          <?php endif; ?>
          <option value="<3000000"> < 3.000.000</option>
          <option value="<5000000"> < 5.000.000</option>
          <option value="<10000000"> < 10.000.000</option>
          <option value=">10000000"> > 10.000.000</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Nama Sekolah</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $mahasiswa->row()->sekolah_nama; ?>">
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Nomor Telfon Sekolah</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="notelp_sekolah" placeholder="Nomor Telfon Sekolah" value="<?php echo $mahasiswa->row()->sekolah_telpon; ?>">
      </div>
    </div>
    <div class="form-row">
      <label for="" class="col-md-3">Alamat Sekolah</label>
      <div class="col-md-9">
        <textarea class="form-control" rows="3" name="alamat_sekolah" placeholder="Alamat Sekolah"><?php echo $mahasiswa->row()->sekolah_alamat; ?></textarea>
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
                    <j>Pada halaman ini, anda dapat mengedit informasi diri apabila ada biodata yang belum diisi atau salah penginputan. Setelah selesai di-edit, klik tombol biru "submit".</j>
                  </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>

          <?php echo form_close(); ?>
      </div>


   </section>
