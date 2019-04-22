<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DOSEN</h6>
        <h2>Materi Perkuliahan</h2>
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
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="box-title">Daftar Materi Kelas <b><?php echo $kelas->row()->nama_kelas; ?></b></h3>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Tambah Materi">
      </div>
    </div>
  </div>
  <br>
      <table id="tabelkeren" class="table  table-striped  table-hover">
                <thead>
                <tr>
                  <th id='s'>#</th>
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
                  <th>#</th>
                  <th>JUDUL MATERI</th>
                  <th id="s">OPERASI</th>
                </tr>
                </tfoot>
              </table>
    <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title" id="myModalLabel">Tambah Materi Perkuliahan</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open_multipart('main_controller/do_upload_materi');?>
              <input type="hidden" name="id_jadwal_master" value="<?php echo $id_jadwal; ?>">

              <div class="form-row"  style="padding-bottom: 30px">
                <label for="" class="col-md-3">Judul Materi</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="judul" placeholder="Judul Materi" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">File Materi</label>
                <div class="col-md-9">
                  <div class="input-grup">
                    <div class="custom-file">
                        <input type="file" name="userfile" class="custum-file-input" id="InputFile" />
                        <label class="custum-file-input" for="InputFile"></label>



                    </div>
                    <input type="submit" value="Upload" class="btn btn-info float-right "></button>
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
