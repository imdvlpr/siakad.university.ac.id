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
        <h4 class="title-content">Tabel Kartu Studi Mahasiswa</h4>
      </div>
      <div class="col">
        <!-- <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+"> -->
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>NIM</th>
      <th>TAHUN AKADEMIK</th>
      <th>STATUS REGISTRASI</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($regis->result() as $data):?>
    <?php $i += 1; ?>
    <tr>
      <td><?php echo $data->nim; ?></td>
      <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
      <td>
        <?php
          if ($data->status_regis == 0) {
            echo "Belum Registrasi";
          }else if ($data->status_regis == 1) {
            echo "Approved";
          }else if ($data->status_regis == 2) {
            echo "Pending";
          }else if ($data->status_regis == 3) {
            echo "Rejected";
          }
         ?>
      </td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/pg_mhs_jadwalkuliah/<?php echo ($data->nim); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>


    <tfoot>
    <tr>
      <th>NIM</th>
      <th>TAHUN AKADEMIK</th>
      <th>STATUS REGISTRASI</th>
      <th id="s">OPERASI</th>
    </tr>
    </tfoot>
  </table>
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
         Dalam menu ini, admin dapat melihat beberapa mahasiswa yang sudah melakukan registrasi mata kuliah yang di approve oleh admin, maka mahasiswa yang mengajukan tersebut sudah dapat melihat jadwal kuliahnya.
        </div>
       </div>
       <div class="modal-footer">
        
       </div>
      </div>
     </div>
    </div>
   </section>
</div>
