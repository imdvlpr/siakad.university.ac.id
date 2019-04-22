<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DOSEN</h6>
        <h2>Update Kehadiran</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
        <div class="input-group-prepend">

        </div>
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
        <h4 class="title-content">Ubah Kehadiran</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
      </div>
    </div>
  </div>
  <div class="row">
  <!-- left colum -->
    <div class="col-md-12">



    <div class="box box-primary">
    <div class="box-header">
    <h3 class="box-title">Keterangan Jadwal</h3>
      </div>

      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-row">
            <label class="col-sm-2 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($jadwal->row()->keterangan, 0,4)); echo "-"; echo substr($jadwal->row()->keterangan, -1);?></p>

          </div>
          <div class="form-row">
            <label class="col-sm-2 from-control-label">Hari</label><p>: <?php echo ($jadwal->row()->nama_hari); ?></p>

          </div>
          <div class="form-row">

            <label class="col-sm-2 from-control-label">Jam</label><p>: <?php echo ($jadwal->row()->jam_mulai); ?> - <?php echo ($jadwal->row()->jam_selesai); ?></p>

          </div>
          <div class="form-row">
            <label class="col-sm-2 from-control-label">Ruangan</label><p>: <?php echo ($jadwal->row()->nama_ruangan); ?></p>
          </div>
          <div class="form-row">

            <label class="col-sm-2 from-control-label">Mata Kuliah</label><p>: <?php echo ($jadwal->row()->nama_mk); ?></p>
          </div>
          <div class="form-row">

            <label class="col-sm-2 from-control-label">Kelas</label><p>: <?php echo ($jadwal->row()->nama_kelas); ?></p>
          </div>
        </div>
      </form>
    </div>

    <?php echo form_open("main_controller/kehadiran_update"); ?>
    <div class="box box-primary">
      <div class="box-header">
    <h3 class="box-title">Kehadiran Mahasiswa</h3>
      </div>
      <form class="form-horizontal">
        <div class="box-body">
          <div style="padding-left: 10px">
            <form>
            <table class="table table-bordered" id="">
              <thead>
              <tr>
                <th style="width: 13px">#</th>
                <th style="width: 15px">NIM</th>
                <th style=" width: 350px">Nama Mahasiswa</th>
                <th style="width: 13px"><center>Hadir</center></th>
                <th style="width: 13px"><center>Izin</center></th>
                <th style="width: 13px"><center>Sakit</center></th>
                <th style="width: 13px"><center>Alfa</center></th>
              </tr>
              </thead>

              <tbody>
                <?php $i = 0; ?>
                <?php foreach($mahasiswa->result() as $data):?>
                <?php $i += 1; ?>
                  <tr>
                    <td><?php echo ($i);?></td>
                    <td><?php echo ($data->nim);?></td>
                    <td><?php echo ($data->nama);?></td>
                    <?php if($data->kehadiran == 0) : ?>
                      <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="0" checked></center></td>
                    <?php else : ?>
                      <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="0"></center></td>
                    <?php endif; ?>
                    <?php if($data->kehadiran == 1) : ?>
                      <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="1" checked></center></td>
                    <?php else : ?>
                      <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="1"></center></td>
                    <?php endif; ?>
                    <?php if($data->kehadiran == 2) : ?>
                      <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="2" checked></center></td>
                    <?php else : ?>
                      <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="2"></center></td>
                    <?php endif; ?>
                    <?php if($data->kehadiran == 3) : ?>
                      <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="3" checked></center></td>
                    <?php else : ?>
                      <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="3"></center></td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>

            </table>
              <input type="hidden" class="form-control" name="id_jadwal_matkul" value="<?php echo $jadwal->row()->id_jadwal_matkul; ?>" readonly>
              <input type="hidden" class="form-control" name="id_presensi" value="<?php echo $jadwal->row()->id_presensi; ?>" readonly>
              <input type="hidden" class="form-control" name="jumlah_mhs" value="<?php echo $i; ?>" readonly>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
      </form>
    </div>
    <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title" id="myModalLabel">Tambah Gedung Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/Gedung_addNew"); ?>
              <div class="form-row">
              <label for="" class="col-md-3">Akademik</label>
              <div class="col-md-9">
                <select class="form-control" name="id_angkatan">
                  <option value="0">-- Pilih --</option>
                <?php foreach($prodi as $data):?>
                  <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/Gedung_addNew"); ?>
              <div class="form-row">
                <label for="" class="col-md-3">Nama Gedung</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_gedung" placeholder="Nama Gedung" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-success" name="addnew" value="Submit"></input>
            </div>
            <?php echo form_close(); ?>
            </div>
          </div>
        </div>
  </section>
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
                    <p align="justify">Silahkan isi kehadiran mahasiswa pada tabel di bawah ini.  Jika sudah selesai klik <b>"Submit"</b>.</p>
                  </div>
               </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>

          <?php echo form_close(); ?>
      </div>


   </section>
