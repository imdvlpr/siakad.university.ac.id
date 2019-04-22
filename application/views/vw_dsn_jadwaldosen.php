<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DOSEN</h6>
        <h2>Jadwal dan Kehadiran</h2>
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
        <h4 class="title-content">Tabel Jadwal Perkuliahan</h4>
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
      <th>KELAS</th>
      <th>OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($jadwal_dosen->result() as $data):?>
    <?php $i += 1; ?>

    <tr>
      <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
      <td><?php echo ($data->nama_hari); ?></td>
      <td><?php echo ($data->jam_mulai); ?> - <?php echo ($data->jam_selesai); ?></td>
      <td><?php echo ($data->nama_ruangan); ?></td>
      <td><?php echo ($data->nama_mk); ?></td>
      <td><?php echo ($data->nama_kelas); ?></td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/redirect_view_presensi/<?php echo ($data->id_jadwal_matkul); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Presensi</a>
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
      <th>KELAS</th>
      <th>OPERASI</th>
    </tr>
    </tfoot>
  </table>
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
