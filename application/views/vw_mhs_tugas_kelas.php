<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Tugas Kelas</h6>
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
        <h4 class="title-content">Daftar Tugas Kelas</h4>
      </div>

      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Upload Tugas">
      </div>

    </div>
  </div>
  <table id="tabelkeren" class="table  table-hover">
    <thead>
    <tr>
      <th id='s'>#</th>
      <th>JUDUL TUGAS</th>
      <th>STATUS</th>
      <th>BATAS UPLOAD</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
      <?php $i = 0; ?>
      <?php foreach($tugas->result() as $data):?>
      <?php $i += 1; ?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo ($data->judul_tugas); ?></td>
        <td><?php
        if ($this->main_model->getStatusTugas($data->id_tugas) == 1) {
          ?><p class="btn btn-sm btn-success">Sudah diunggah</p><?php
        }else{
          ?><p class="btn btn-sm btn-success">Belum diunggah</p><?php
        }
        ?></td>
        <td><?php echo $data->batas_upload; ?></td>
        <td>
          <a href="<?php echo base_url()?>index.php/main_controller/download/<?php echo ($data->id_file); ?>" class="btn btn-sm"><i class="fa fa-download"></i> Download Materi</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>#</th>
      <th>JUDUL TUGAS</th>
      <th>STATUS</th>
      <th>BATAS UPLOAD</th>
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

               <h4 class="modal-title " id="helpModalLabel">Bantuan</h4>
            </div>
            <div class="modal-body">
               <div>
                 <p align="justify">Pada halaman ini, anda dapat melihat tugas yang diberikan dosen, klik "Download Tugas". Setelah selesai mengerjakan tugas, upload tugas anda pada tombol "Upload Tugas" yang berwarna hijau di sebelah kanan anda.
                 <br></br>
                 <br><font style="color: red;">Perhatikan
                 dengan teliti pada saat akan meng-upload tugas. Karena kesalahan akan berdampak pada pengurangan nilai.</font></p></br>               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="content-popup">
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title" id="myModalLabel">Upload Tugas Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
        <?php echo form_open_multipart('main_controller/do_upload_hasil_tugas');?>
          <input type="hidden" name="id_jadwal_master" value="<?php echo $id_jadwal; ?>">
          <input type="hidden" name="upload_time" value="<?php echo date("Y-m-d"); ?>">

          <div class="form-group"  style="padding-bottom: 30px">
            <label for="" class="col-md-3">Judul Tugas</label>
            <div class="col-md-9">
              <!-- <input type="text" class="form-control" name="judul" placeholder="Judul Tugas" required> -->
              <select class="form-control" name="judul">
                <?php foreach($tugas->result() as $data):?>
                  <option value="<?php echo $data->id_tugas; ?>"><?php echo $kelas->row()->nama_mk; ?> - <?php echo $data->judul_tugas; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3">File Tugas</label>
            <div class="col-md-9">
              <div class="input-grup">
                <div class="custom-file">
                    <input type="file" name="userfile" class="custum-file-input" id="InputFile" />
                    <label class="custum-file-input" for="InputFile"></label>

                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
            <input type="submit" value="Upload" style="float: left;" class="btn btn-info float-right"></button>
        </div>
      </form>
        </div>
      </div>
    </div>


</section>
