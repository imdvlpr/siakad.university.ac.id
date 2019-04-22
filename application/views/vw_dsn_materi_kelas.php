<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
               </div>
               <div class="modal-body">
                  <div>
                     <p align="justify">Pada halaman ini anda dapat melihat daftar materi perkuliahan pada kelas tertentu. anda juga dapat menambahkan materi baru, dengan cara klik tombol <b>"Tambah Materi Baru"</b> dan perhatikan pada saat mengisi informasinya. Setelah selesai, Klik tombol <b>"Submit"</b>. Materi yang anda buat telah muncul pada daftar materi kelas.</p>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
    <section class="content-header">

      <h1>
        Materi Perkuliahan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"> Materi Perkuliahan</li>
        <li class="active"> Upload Materi</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Materi Kelas <b><?php echo $kelas->row()->nama_kelas; ?></b></h3>
              <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Tambah Materi Baru">
            </div>
            <!-- /.box-header -->


            <div class="box-body">
              <table id="tabelkeren" class="table  table-striped  table-hover">
                <thead>
                <tr>
                  <th id='s'>NO</th>
                  <th>JUDUL MATERI</th>
                  <th id="s">OPERASI</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                <?php foreach($materi->result() as $data):?>
                <?php $i += 1; ?>

                <tr>
                  <td><?php echo $i?></td>
                    <td><?php echo ($data->judul_materi); ?></td>
                  <td>
                    <a href="<?php echo base_url()?>index.php/main_controller/download/<?php echo ($data->id_file); ?>" class="btn btn-sm"><i class="fa fa-download"></i> Download Materi</a>
                    <a href="<?php echo base_url()?>index.php/main_controller/del_materi/<?php echo ($data->id_materi); ?>" class="btn btn-sm" onclick="return confirm('Anda Yakin?')"><i class="fa fa-trash"></i> Hapus Materi</a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NO</th>
                  <th>JUDUL MATERI</th>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Materi Perkuliahan</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open_multipart('main_controller/do_upload_materi');?>
              <input type="hidden" name="id_jadwal_master" value="<?php echo $id_jadwal; ?>">

              <div class="form-group"  style="padding-bottom: 30px">
                <label for="" class="col-md-3">Judul Materi</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="judul" placeholder="Judul Materi" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">File Materi</label>
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
