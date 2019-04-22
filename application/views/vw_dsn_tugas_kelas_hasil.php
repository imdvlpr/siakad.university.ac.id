<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Daftar Hasil Tugas Mahasiswa
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"> Tugas Mahasiswa</li>
        <li class="active"> Lihat Hasil</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
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


            <div class="box-body">
              <table id="tabelkeren" class="table  table-striped  table-hover">
                <thead>
                <tr>
                  <th id='s'>NO</th>
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
                  <th>NO</th>
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
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Upload Tugas Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open_multipart('main_controller/do_upload_tugas');?>
              <input type="hidden" name="id_jadwal_master" value="<?php echo $id_jadwal; ?>">

              <div class="form-group"  style="padding-bottom: 30px">
                <label for="" class="col-md-3">Judul Tugas</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="judul" placeholder="Judul Tugas" required>
                </div>
              </div>

              <div class="form-group">
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
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>
            </div>
          </div>
        </div>


  </section>
</div>
