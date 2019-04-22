<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Kuesioner</h6>
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
        <h4 class="title-content">Tabel Kuisioner</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-hover">
    <thead>
      <tr>
        <th>AKADEMIK</th>
        <th>TIPE</th>
        <th>JUDUL</th>
        <th id="s">OPERASI</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0; ?>
      <?php foreach($judul_kuisioner->result() as $data):?>
      <?php $i += 1; ?>
    <tr>
        <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
        <td><?php echo ($data->tipe); ?></td>
        <td><?php echo ($data->judul); ?></td>
        <td>
          <a href="<?php echo base_url()?>index.php/main_controller/redirect_lihat_pertanyaan_kuisioner/<?php echo ($data->id_kuisioner_judul); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat Pertanyaan</a>
          <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_kuisioner_judul/<?php echo ($data->id_kuisioner_judul); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
          <a href="<?php echo base_url()?>index.php/main_controller/kuisioner_judul_delete/<?php echo ($data->id_kuisioner_judul); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
        </td>
    </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>AKADEMIK</th>
      <th>TIPE</th>
      <th>JUDUL</th>
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
                    <p align="justify">Pada halaman ini anda dapat melihat presensi kehadiran anda sesuai dengan mata kuliah yang anda ambil pada semester ini.</p>
                  </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>

          <?php echo form_close(); ?>
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
                     <j>1. Tambah Kuisioner<br>
                     Admin dapat menambahkan kuisioner.<br><br>

                     2. Melihat Kuisioner<br>
                     Admin dapat melihat kuisioner.<br><br>

                     3. Mengubah Kuisioner <br>
                     Admin dapat mengubah kuisioner yang telah dibuat.<br><br>

                     4. Menghapus Kuisioner <br>
                     Admin dapat mengapus kuisioner jika diperlukan.<br><br>

                     5. Excel <br>
                     Admin dapat mengunduh semua data kuisioner..</j>
                  </div>
               </div>
               <div class="modal-footer">

               </div>
            </div>
         </div>
      </div>
<section class="content-popup">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Baru</h4>
          </div>

          <div class="modal-body">
          <?php echo form_open("main_controller/judul_kuisioner_addNew"); ?>

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
            <label for="" class="col-md-3">Tipe</label>
            <div class="col-md-9">
              <select class="form-control" name="tipe">
                <option value="1"> 1</option>
                <option value="2"> 2</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <label for="" class="col-md-3">Judul Kuisioner</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="judul_kuisioner" placeholder="Judul Kuisioner" required>
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
     1. Tambah Kuisioner<br>
     Admin dapat menambahkan kuisioner.<br><br>

     2. Melihat Kuisioner<br>
     Admin dapat melihat kuisioner.<br><br>

     3. Mengubah Kuisioner <br>
     Admin dapat mengubah kuisioner yang telah dibuat.<br><br>

     4. Menghapus Kuisioner <br>
     Admin dapat mengapus kuisioner jika diperlukan.<br><br>

     5. Excel <br>
     Admin dapat mengunduh semua data kuisioner.
      </div>
     </div>
     <div class="modal-footer">

     </div>
    </div>
   </div>
  </div>
</section>
