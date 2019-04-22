<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Akademik</h2>
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
<div class="col" style="overflow: auto;">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Tabel Jadwal Ujian</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>AKADEMIK</th>
      <th>HARI</th>
      <th>JAM</th>
      <th>RUANGAN</th>
      <th>MATA KULIAH</th>
      <th>PROGRAM STUDI</th>
      <th>KELAS</th>
      <th>JENIS UJIAN</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($jadwal->result() as $data):?>
    <?php $i += 1; ?>

    <tr>
      <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
      <td><?php echo ($data->nama_hari); ?></td>
      <td><?php echo ($data->jam_mulai); ?> - <?php echo ($data->jam_selesai); ?></td>
      <td><?php echo ($data->nama_ruangan); ?></td>
      <td><?php echo ($data->nama_mk); ?></td>
      <td><?php echo ($data->nama_prodi); ?></td>
      <td><?php echo ($data->nama_kelas); ?></td>
      <?php if($data->jenis_ujian == 1) : ?>
        <td>UTS</td>
      <?php else : ?>
        <td>UAS</td>
      <?php endif; ?>
      <td>

        <a href="<?php echo base_url()?>index.php/main_controller/jadwal_ujian_delete/<?php echo ($data->id_jadwal_ujian); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>AKADEMIK</th>
      <th>HARI</th>
      <th>JAM</th>
      <th>RUANGAN</th>
      <th>MATA KULIAH</th>
      <th>PROGRAM STUDI</th>
      <th>KELAS</th>
      <th>JENIS UJIAN</th>
      <th id="s">OPERASI</th>
    </tr>
    </tfoot>
  </table>
</div>
<section class="content-popup">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Ujian Baru</h4>
          </div>
          <div class="modal-body">
          <?php echo form_open("main_controller/jadwal_ujian_addNew"); ?>
          <div class="form-row">
            <label for="" class="col-md-3">Tahun Akademik</label>
            <div class="col-md-9">
              <select class="form-control" name="id_tahun_akademik">
                <?php foreach($tahun_akademik->result() as $data):?>
                  <option value="<?php echo $data->tahun_akademik_id; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

            <div class="form-row">
              <label for="" class="col-md-3">Hari</label>
              <div class="col-md-9">
                <select class="form-control" name="id_hari">
                  <?php foreach($hari->result() as $data):?>
                    <option value="<?php echo $data->id_hari; ?>"><?php echo $data->nama_hari;?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Jam Mulai</label>
              <div class="col-md-9">
                <select class="form-control" name="jam_mulai">
                  <?php foreach($shift->result() as $data):?>
                    <option value="<?php echo $data->jam_mulai; ?>"><?php echo $data->jam_mulai;?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Jam Akhir</label>
              <div class="col-md-9">
                <select class="form-control" name="jam_selesai">
                  <?php foreach($shift->result() as $data):?>
                    <option value="<?php echo $data->jam_selesai; ?>"><?php echo $data->jam_selesai?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>


            <div class="form-row">
              <label for="" class="col-md-3">Gedung</label>
              <div class="col-md-9">
                <select class="form-control" name="gedung_id" id="gedung">
                  <option value="0">-- Pilih --</option>
                  <?php foreach($gedung->result() as $data):?>
                    <option value="<?php echo $data->gedung_id; ?>"><?php echo $data->nama_gedung;?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Ruangan</label>
              <div class="col-md-9">
                <select class="form-control" name="ruangan_id" id="ruangan_id">
                  <option value="0">-- Pilih --</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <label for="" class="col-md-3">Program Studi</label>
              <div class="col-md-9">
                <select class="form-control" name="id_prodi" id="prodi">
                  <option value="0">-- Pilih --</option>
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
                  <option value="0">-- Pilih --</option>

                </select>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Mata Kuliah</label>
              <div class="col-md-9">
                <select class="form-control" name="kode_mk" id="matkul">
                  <option value="0">-- Pilih --</option>

                </select>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Jenis Ujian</label>
              <div class="col-md-9">
                <select class="form-control" name="jenis_ujian">
                  <option value="1">UTS</option>
                  <option value="2">UAS</option>
                </select>
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
<section class="content-popup">
    <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">

        <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
       </div>
       <div class="modal-body">
        <div>
         1. Tambah Jadwal Ujian<br>
         Admin dapat menambahkan jadwal ujian dengan mengisikan infomasi.<br><br>
         2. Melihat Jadwal Ujian <br>
         Admin dapat melihat jadwal ujian.<br><br>
         3. Mengubah Jadwal Ujian<br>
         Admin dapat mengubah jadwal ujian jika ada yang bentrok atau salah memasukan informasi.<br><br>
         4. Menghapus Jadwal Ujian <br>
         Admin dapat menghapus data jadwal ujian jika diperlukan. <br><br>
         5. Excel <br>
         Admin dapat mengunduh seluruh data jadwal ujian dalam bentuk excel.
        </div>
       </div>
       <div class="modal-footer">

       </div>
      </div>
     </div>
    </div>
   </section>
