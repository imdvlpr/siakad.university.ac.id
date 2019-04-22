<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Jadwal Kuliah Mahasiswa</h6>
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

<?php
        if ($status_regis_mhs != 1){
          ?><div class="callout callout-info">
            <h4>Informasi !</h4>
            Silahkan lakukan Registrasi Mata Kuliah untuk mengakses halaman ini, petunjuk dapat diakses melalui
            <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_registrasimk">Halaman Registrasi</a>
            <br>Terimakasih.
          </div><?php
        }else{
          ?>
          <div class="col">
            
            <div class="container">
              <div class="row">
                <div class="col">
                  <h4 class="title-content">Daftar Jadwal Kuliah</h4>
                </div>
                <div class="col">
                  <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
                  <a href="<?php echo base_url()?>index.php/main_controller/pg_mhs_jadwalkuliah/<?php echo $this->session->kode_user; ?>" style="float:right;" class="btn btn-success  "><i class="fa fa-print"></i> Cetak Jadwal Kuliah</a>
                </div>
              </div>
            </div>
            <table id="tabelkeren" class="table  table-hover">
              <thead>
              <tr>
                <th id="s">#</th>
                <th>AKADEMIK</th>
                <th>HARI</th>
                <th>JAM</th>
                <th>RUANGAN</th>
                <th>MATA KULIAH</th>
                <th>KELAS</th>
                <th>DOSEN</th>

              </tr>
              </thead>
              <tbody>
                <?php $i = 0; ?>
                <?php foreach($jadwalmhs->result() as $data):?>
                <?php $i += 1; ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                  <td><?php echo ($data->nama_hari); ?></td>
                  <td><?php echo ($data->jam_mulai); ?> - <?php echo ($data->jam_selesai); ?></td>
                  <td><?php echo ($data->nama_ruangan); ?></td>
                  <td><?php echo ($data->nama_mk); ?></td>
                  <td><?php echo ($data->nama_kelas); ?></td>
                  <td><?php echo ($data->nama_lengkap); ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th id="s">#</th>
                <th>AKADEMIK</th>
                <th>HARI</th>
                <th>JAM</th>
                <th>RUANGAN</th>
                <th>MATA KULIAH</th>
                <th>KELAS</th>
                <th>DOSEN</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <?php
        }
       ?>




<section class="content-popup">
      <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">

                  <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
               </div>
               <div class="modal-body">
                  <div>
                     <p align="justify">Pada halaman ini, anda dapat melihat jadwal kuliah anda selama satu semester. Jika membutuhkan print out jadwal kuliah satu semester, klik menu <b>Registrasi</b> pada sebelah kiri anda, lalu klik <b>"Cetak Kartu Studi"</b>.</p>
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
