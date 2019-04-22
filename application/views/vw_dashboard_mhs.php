<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS MAHASISWA</h6>
        <h2>Control Panel</h2>
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
<div class="">
  <div class="row" id="boxbox">
    <div class="col rounded-lg " style="background-color:#00c0ef !important;">
      <div class="inner">
        <h3><?php echo $jumsks;?></h3>
        <p>SKS Terpenuhi</p>
      </div>
      <div class="icon">
        <i class="fas fa-user"></i>
      </div>
    </div>
    <div class="col rounded-lg " style="background-color:#00a65a !important;">
      <div class="inner">
        <h3><?php echo $jadwal->num_rows();?></h3>
        <p>Mata Kuliah</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
    </div>
    <div class="col rounded-lg " style="background-color:#f39c12 !important;">
      <div class="inner">
        <h3><?php echo $pert->num_rows();?></h3>
        <p>Pertemuan</p>
      </div>
      <div class="icon">
        <i class="fas fa-chalkboard"></i>
      </div>
    </div>

  </div>
</div>

<hr>
<div class="col">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Tabel Kalender Akademik</h4>
      </div>
      <!-- <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Tambah Kegiatan">
      </div> -->
    </div>
  </div>
  <table id="tabelkeren" class="table  table-hover">
    <thead>
    <tr>
      <th id="s">#</th>
      <th>TAHUN AKADEMIK</th>
      <th>NAMA KEGIATAN</th>
      <th>UNTUK</th>
      <th>TANGGAL</th>
    </tr>
    </thead>
    <tbody>
      <?php $i = 0; ?>
      <?php foreach($event->result() as $data):?>
      <?php $i += 1; ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
        <td><?php echo $data->nama_kegiatan; ?></td>
        <td><?php
        if ($data->level == 2) {
          echo "Dosen";
        }elseif ($data->level == 3) {
          echo "Mahasiswa";
        }?></td>
        <td><?php echo $data->tanggal_mulai.' s/d '.$data->tanggal_selesai; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>#</th>
      <th>TAHUN AKADEMIK</th>
      <th>NAMA KEGIATAN</th>
      <th>UNTUK</th>
      <th>TANGGAL</th>
    </tr>
    </tfoot>
  </table>
</div>
