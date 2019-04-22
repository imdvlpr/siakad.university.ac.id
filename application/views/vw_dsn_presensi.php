<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DOSEN</h6>
        <h2>Presensi</h2>
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
        <h4 class="title-content">Tabel Presensi</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Tambah Presensi">
      </div>
    </div>
  </div>
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>PERTEMUAN</th>
                <th>JUDUL PERTEMUAN</th>
                <th>TANGGAL</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              <?php foreach($jadwal_dosen->result() as $data):?>
              <?php $i += 1; ?>

              <tr>
                <td><?php echo ($i);?></td>
                <td><?php echo ($data->pertemuan);?></td>
                <td><?php echo $data->judul_pertemuan; ?></td>
                <td><?php echo ($data->tanggal); ?></td>
                <td>
                  <?php if($data->is_filled == 0) : ?>
                    <a href="<?php echo base_url()?>index.php/main_controller/redirect_input_kehadiran/<?php echo ($data->id_presensi); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Input Kehadiran</a>
                  <?php else : ?>
                    <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_kehadiran/<?php echo ($data->id_presensi); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah Kehadiran</a>
                  <?php endif; ?>

                  <a href="<?php echo base_url()?>index.php/main_controller/presensi_delete/<?php echo ($data->id_presensi); ?>/<?php echo $id_jadwal; ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>PERTEMUAN</th>
                <th>JUDUL PERTEMUAN</th>
                <th>TANGGAL</th>
                <th id="s">OPERASI</th>
              </tr>
              </tfoot>
            </table>

 <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Tambah Presensi Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/presensi_addNew"); ?>

              <div class="form-row">
                <label for="" class="col-md-3">Pertemuan </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pertemuan" placeholder="Pertemuan ke- " required>
                </div>
              </div>
              <div class="form-row">
                <label for="" class="col-md-3">Judul Pertemuan </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="j_pert" placeholder="Judul Pertemuan" required>
                </div>
              </div>

              <div class="form-row">
                <label class="col-md-3">Tanggal</label>
                <div class="col-md-9">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class=""></i>
                  </div>
                  <input type="text" name='tanggal' class="form-control pull-right" id="datepicker">
                </div>
                </div>
                <!-- /.input group -->
              </div>

              <input type="hidden" class="form-control" name="id_jadwal_matkul" value="<?php echo $id_jadwal ?>" readonly>
              <input type="submit" class="btn btn-info" style="float: left;" name="addnew" value="Submit"></input>
              <!-- <button type="button" class="btn btn-danger" style="float: right;" data-dismiss="modal">Close</button> -->
            </div>
            <div class="modal-footer">
            </div>
            <?php echo form_close(); ?>
            </div>
          </div>
        </div>


  </section>
</div>
