
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
            <h3 class="box-title">Edit Mahasiswa</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/MHS_update"); ?>

              <div class="form-group">
                <label for="" class="col-md-3">NIM</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa" value="<?php echo $mahasiswa->row()->nim; ?>" readonly>
                </div>
              </div>


              <div class="form-group">
                <label for="" class="col-md-3">Nama Lengkap</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Mahasiswa" value="<?php echo $mahasiswa->row()->nama; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Angkatan</label>
                <div class="col-md-9">
                  <select class="form-control" name="angkatan">
                  <?php foreach($angkatan->result() as $data):?>
                    <option value="<?php echo $data->id_angkatan; ?>"><?php echo $data->tahun;?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="programstudi" id="prodi">
                  <?php foreach($prodi as $data):?>
                    <?php if($data['id_prodi'] == $mahasiswa->row()->kampus_prodi) : ?>
                      <option value="<?php echo $mahasiswa->row()->kampus_prodi; ?>"><?php echo $data['nama_prodi'];?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <?php foreach($prodi as $data):?>
                    <?php if($data['id_prodi'] != $mahasiswa->row()->kampus_prodi) : ?>
                    <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Kelas</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_kelas" id="kelas">
                    <?php foreach($kelas->result() as $data):?>
                      <?php if($data->id_kelas == $mahasiswa->row()->id_kelas) : ?>
                        <option value="<?php echo $mahasiswa->row()->id_kelas; ?>"><?php echo $data->nama_kelas;?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php foreach($kelas->result() as $data):?>
                      <?php if($data->id_kelas != $mahasiswa->row()->id_kelas) : ?>
                      <option value="<?php echo $data->id_kelas; ?>"><?php echo $data->nama_kelas;?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Alamat</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap"><?php echo $mahasiswa->row()->alamat; ?></textarea>
                </div>
              </div>

              <div class="form-group">
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

              <div class="form-group">
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

              <div class="form-group">
                <label for="" class="col-md-3">Tanggal Lahir</label>
                <div class="col-md-9">
                  <input id="datepicker" type="text" class="form-control" name="tgl_lahir" placeholder="yyyy-mm-dd" value="<?php echo $mahasiswa->row()->tanggal_lahir; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Tempat Lahir</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir Mahasiswa" value="<?php echo $mahasiswa->row()->tempat_lahir; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nama Ayah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah Mahasiswa" value="<?php echo $mahasiswa->row()->nama_ayah; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nama Ibu</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu Mahasiswa" value="<?php echo $mahasiswa->row()->nama_ibu; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nomor Telfon Orang Tua </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telfon Orang Tua" value="<?php echo $mahasiswa->row()->no_hp_ortu; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">ID Pekerjaan Ibu</label>
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

                <div class="form-group">
                <label for="" class="col-md-3">ID Pekerjaan Bapak</label>
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

              <div class="form-group">
                <label for="" class="col-md-3">Alamat Ayah</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_ayah" placeholder="Alamat Lengkap"><?php echo $mahasiswa->row()->alamat_ayah; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Alamat Ibu</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_ibu" placeholder="Alamat Lengkap"><?php echo $mahasiswa->row()->alamat_ibu; ?></textarea>
                </div>
              </div>

              <div class="form-group">
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

              <div class="form-group">
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

              <div class="form-group">
                <label for="" class="col-md-3">Nama Sekolah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $mahasiswa->row()->sekolah_nama; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nomor Telfon Sekolah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="notelp_sekolah" placeholder="Nomor Telfon Sekolah" value="<?php echo $mahasiswa->row()->sekolah_telpon; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Alamat Sekolah</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_sekolah" placeholder="Alamat Sekolah"><?php echo $mahasiswa->row()->sekolah_alamat; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Jurusan</label>
                <div class="col-md-9">
                  <select class="form-control" name="jurusan">
                    <?php if($mahasiswa->row()->sekolah_jurusan == "ipa") : ?>
                      <option value="<?php echo $mahasiswa->row()->sekolah_jurusan; ?>">IPA</option>
                    <?php elseif($mahasiswa->row()->sekolah_jurusan == "ips") : ?>
                      <option value="<?php echo $mahasiswa->row()->sekolah_jurusan; ?>">IPS</option>
                    <?php else : ?>
                      <option value="<?php echo $mahasiswa->row()->sekolah_jurusan; ?>">Lainnya</option>
                    <?php endif; ?>
                    <option value="ipa">IPA</option>
                    <option value="ips">IPS</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Tahun Lulus</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tahunlulus" placeholder="Tahun Lulus" value="<?php echo $mahasiswa->row()->sekolah_tahun_lulus; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Semester Aktif</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="semester_aktif" placeholder="Semester Aktif" value="<?php echo $mahasiswa->row()->semester_aktif; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-md-3">Status Mahasiswa</label>
                <div class="col-md-9">
                  <select class="form-control" name="status_mhs">
                      <?php if ($mahasiswa->row()->status_mahasiswa == 1) {
                      ?><option value="1">Aktif</option><?php
                    }else if ($mahasiswa->row()->status_mahasiswa == 2){
                      ?><option value="2">Alumni</option><?php
                    }?>
                    <option value="1">Aktif</option>
                    <option value="2">Alumni</option>
                  </select>
                </div>
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

    <!-- /.row -->
  </section>


  <!-- /.content -->
</div>
