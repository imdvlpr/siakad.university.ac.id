<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DOSEN</h6>
        <h2>Tugas Mahasiswa</h2>
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
<div class="content-header">
      <div style="text-align: right; font-size: 12.5px;">
         <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
      </div>
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
                     <p align="justify">Pada halaman ini anda dapat membuat tugas untuk mahasiswa. Klik <b>"Buat Tugas"</b> pada kolom "operasi".</p>
                  </div>
               </div>
               <div class="modal-footer">
                  
               </div>
            </div>
         </div>
      </div> 
    </section> 
<div class="col">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Daftar Kelas</h4>
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
                <?php foreach($jadwal->result() as $data):?>
                <?php $i += 1; ?>

                <tr>
                  <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                  <td><?php echo ($data->nama_mk); ?></td>
                  <td><?php echo ($data->nama_prodi); ?></td>
                  <td><?php echo ($data->nama_kelas); ?></td>
                  <td><?php echo ($data->nama_lengkap); ?></td>
                  <td>
                    <a href="<?php echo base_url()?>index.php/main_controller/redirect_new_tugas/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-files-o"></i> Buat Tugas</a>
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
  </table>
</div>



