<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Hasil Kuisioner</h2>
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
        <h4 class="title-content">Tabel Kuisioner By Jadwal Master</h4>
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
      <th>MATA KULIAH</th>
      <th>PROGRAM STUDI</th>
      <th>KELAS</th>
      <th>DOSEN</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($jadwal_master->result() as $data):?>
    <?php $i += 1; ?>

    <tr>
      <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
      <td><?php echo ($data->nama_mk); ?></td>
      <td><?php echo ($data->nama_prodi); ?></td>
      <td><?php echo ($data->nama_kelas); ?></td>
      <td><?php echo ($data->nama_lengkap); ?></td>
      <td>
        <?php if($data->kuisioner_isFilled == 1) : ?>
          <a href="<?php echo base_url()?>index.php/main_controller/redirect_hasil_kuisioner_per_jadwal_master/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat Hasil Kuisioner</a>
        <?php else : ?>
          Belum ada koresponden
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>AKADEMIK</th>
      <th>MATA KULIAH</th>
      <th>PROGRAM STUDI</th>
      <th>KELAS</th>
      <th>DOSEN</th>
      <th id="s">OPERASI</th>
    </tr>
    </tfoot>
  </table>
</div>
