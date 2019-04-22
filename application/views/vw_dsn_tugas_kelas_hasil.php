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
<div class="col">

  <div class="row">
    <div class="container">
    <div class="box box-primary">
      <div class="box-header with-border">
          <?php if (isset($tugas->row()->judul_tugas)) {
            ?><h3 class="box-title">Tugas : <b><?php echo $tugas->row()->judul_tugas; ?></b>, Kelas : <b><?php echo $tugas->row()->nama_kelas; ?> </b></i>, Batas Upload : <b><?php echo $tugas->row()->batas_upload; ?></b></h3><?php
          }else{
            ?><h3 class="box-title">Daftar Hasil Tugas Kelas</h3>
            <?php
          } ?>


      </div>
      <!-- /.box-header -->
    </div>
    <br>

      <div class="box-body">
        <table id="tabelkeren" class="table  table-striped  table-hover">
          <thead>
          <tr>
            <th id='s'>#</th>
            <th>JUDUL TUGAS</th>
            <th>KELAS</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>TANGGAL UPLOAD</th>
            <th>STATUS TUGAS</th>
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
            <td><?php echo $data->nama_kelas; ?></td>
            <td><?php echo $data->nim; ?></td>
            <td><?php echo $data->nama; ?></td>
            <td><?php echo $data->uploaded_time; ?></td>
            <td><?php if ($data->uploaded_time > $data->batas_upload) {
              ?><p class="btn btn-sm btn-danger">Terlambat</p><?php
            }else{
              ?><p class="btn btn-sm btn-success">Tepat Waktu</p><?php
            } ?></td>
            <td>
              <a href="<?php echo base_url()?>index.php/main_controller/download/<?php echo ($data->id_file); ?>" class="btn btn-sm"><i class="fa fa-download"></i> Download Hasil</a>
            </td>
          </tr>
          <?php endforeach; ?>
          </tbody>
          <tfoot>
          <tr>
            <th>#</th>
            <th>JUDUL TUGAS</th>
            <th>KELAS</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>TANGGAL UPLOAD</th>
            <th>STATUS TUGAS</th>
            <th id="s">OPERASI</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


  <section class="content-popup">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title" id="myModalLabel">Upload Tugas Baru</h4>
          </div>
          <div class="modal-body">
          <?php echo form_open_multipart('main_controller/do_upload_tugas');?>
            <input type="hidden" name="id_jadwal_master" value="<?php echo $id_jadwal; ?>">

            <div class="form-row"  style="padding-bottom: 30px">
              <label for="" class="col-md-3">Judul Tugas</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="judul" placeholder="Judul Tugas" required>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">File Tugas</label>
              <div class="col-md-9">
                <div class="input-grup">
                  <div class="custom-file">
                      <input type="file" name="userfile" class="custum-file-input" id="InputFile" />
                      <label class="custum-file-input" for="InputFile"></label>
                      <div class="card-footer">
                        <input type="submit" value="Upload" class="btn btn-default float-right"></button>
                      </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">

          </div>
        </form>
          </div>
        </div>
      </div>


</section>
