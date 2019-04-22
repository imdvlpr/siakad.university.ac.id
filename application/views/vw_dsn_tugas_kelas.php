<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Tugas Perkuliahan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"> Tugas Mahasiswa</li>
        <li class="active"> Buat Tugas</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Tugas Kelas <i><b><?php echo $kelas->row()->nama_kelas; ?></b></i></h3>
              <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Tambah Tugas">
            </div>
            <!-- /.box-header -->


            <div class="box-body">
              <table id="tabelkeren" class="table table-striped table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>JUDUL TUGAS</th>
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
                    <td><?php echo $data->batas_upload; ?></td>
                  <td>
                    <a href="<?php echo base_url()?>index.php/main_controller/redirect_uploaded_tugas/<?php echo ($data->id_tugas); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat Hasil</a>
                    <a href="<?php echo base_url()?>index.php/main_controller/download/<?php echo ($data->id_file); ?>" class="btn btn-sm"><i class="fa fa-download"></i> Download Tugas</a>
                    <a href="<?php echo base_url()?>index.php/main_controller/del_tgs/<?php echo ($data->id_tugas); ?>" class="btn btn-sm" onclick="return confirm('Anda Yakin?')"><i class="fa fa-trash"></i> Hapus Tugas</a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NO</th>
                  <th>JUDUL TUGAS</th>
                  <th>BATAS UPLOAD</th>
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

              <div class="form-group" style="padding-bottom: 30px">
                <label class="col-md-3">Batas Upload</label>
                <div class="col-md-9">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name='bts_upload' class="form-control pull-right" id="datepicker">
                </div>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">File Tugas</label>
                <div class="col-md-9">
                  <div class="input-grup">
                    <div class="custom-file">
                        <input type="file" name="userfile" class="custum-file-input" id="InputFile" />
                        <label class="custum-file-input" for="InputFile"></label>
                        <div class="card-footer">
                          <input type="submit" value="Upload" class="btn btn-info float-right"></button>
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
</div>
