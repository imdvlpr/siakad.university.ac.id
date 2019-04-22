<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Materi Perkuliahan</h6>
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
        <h4 class="title-content">Daftar Kelas</h4>
      </div>


      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
      </div>

    </div>
  </div>
  <table id="tabelkeren" class="table  table-hover">
    <thead>
    <tr>
      <th>AKADEMIK</th>
      <th>MATA KULIAH</th>
      <th>PROGRAM STUDI</th>
      <th>KELAS</th>
      <th>DOSEN</th>
      <th id="s">OPERASI</th>
      <th>FILE</th>
    </tr>
    </thead>
    <tbody>
      <?php $i = 0; ?>
      <?php foreach($jadwal->result() as $data):?>
      <?php $i += 1; ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
        <td><?php echo ($data->nama_mk); ?></td>
        <td><?php echo ($data->nama_prodi); ?></td>
        <td><?php echo ($data->nama_kelas); ?></td>
        <td><?php echo ($data->nidn); ?></td>
        <td>

          <a href="<?php echo base_url()?>index.php/main_controller/redirect_download_materi/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat Materi</a>

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
      <th> </th>
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
<p align="justify">Pada halaman ini, anda dapat melihat materi perkuliahan yang diberikan oleh dosen. Klik  "Lihat Materi" pada tabel dibawah yang terdapat di sebelah kanan anda</p>                  </div>
               </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>

          <?php echo form_close(); ?>
      </div>


   </section>
