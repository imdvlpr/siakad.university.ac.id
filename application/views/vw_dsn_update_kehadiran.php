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
                     <p align="justify">Silahkan isi kehadiran mahasiswa pada tabel di bawah ini.  Jika sudah selesai klik <b>"Submit"</b>.</p>
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
        Update Kehadiran
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"> Kehadiran</li>
        <li class="active"> Ubah Kehadiran</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->
              <div class="col-md-20">
                  


              <div class="box box-primary">
              <div class="box-header">
              <h3 class="box-title">Keterangan Jadwal</h3>
                </div>

                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($jadwal->row()->keterangan, 0,4)); echo "-"; echo substr($jadwal->row()->keterangan, -1);?></p>
                      <label class="col-sm-2 from-control-label">Hari</label><p>: <?php echo ($jadwal->row()->nama_hari); ?></p>
                      <label class="col-sm-2 from-control-label">Jam</label><p>: <?php echo ($jadwal->row()->jam_mulai); ?> - <?php echo ($jadwal->row()->jam_selesai); ?></p>
                      <label class="col-sm-2 from-control-label">Ruangan</label><p>: <?php echo ($jadwal->row()->nama_ruangan); ?></p>
                      <label class="col-sm-2 from-control-label">Mata Kuliah</label><p>: <?php echo ($jadwal->row()->nama_mk); ?></p>
                      <label class="col-sm-2 from-control-label">Kelas</label><p>: <?php echo ($jadwal->row()->nama_kelas); ?></p>
                    </div>
                  </div>
                </form>
              </div>

              <?php echo form_open("main_controller/kehadiran_update"); ?>
              <div class="box box-primary">
                <div class="box-header">
              <h3 class="box-title">Kehadiran Mahasiswa</h3>
                </div>
                <form class="form-horizontal">
                  <div class="box-body">
                    <div style="padding-left: 10px">
                      <form>
                      <table class="table table-bordered" id="">
                        <thead>
                        <tr>
                          <th style="width: 13px">No</th>
                          <th style="width: 15px">NIM</th>
                          <th style=" width: 350px">Nama Mahasiswa</th>
                          <th style="width: 13px"><center>Hadir</center></th>
                          <th style="width: 13px"><center>Izin</center></th>
                          <th style="width: 13px"><center>Sakit</center></th>
                          <th style="width: 13px"><center>Alfa</center></th>
                        </tr>
                        </thead>

                        <tbody>
                          <?php $i = 0; ?>
                          <?php foreach($mahasiswa->result() as $data):?>
                          <?php $i += 1; ?>
                            <tr>
                              <td><?php echo ($i);?></td>
                              <td><?php echo ($data->nim);?></td>
                              <td><?php echo ($data->nama);?></td>
                              <?php if($data->kehadiran == 0) : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="0" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="0"></center></td>
                              <?php endif; ?>
                              <?php if($data->kehadiran == 1) : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="1" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="1"></center></td>
                              <?php endif; ?>
                              <?php if($data->kehadiran == 2) : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="2" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="2"></center></td>
                              <?php endif; ?>
                              <?php if($data->kehadiran == 3) : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="3" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="3"></center></td>
                              <?php endif; ?>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>

                      </table>
                        <input type="hidden" class="form-control" name="id_jadwal_matkul" value="<?php echo $jadwal->row()->id_jadwal_matkul; ?>" readonly>
                        <input type="hidden" class="form-control" name="id_presensi" value="<?php echo $jadwal->row()->id_presensi; ?>" readonly>
                        <input type="hidden" class="form-control" name="jumlah_mhs" value="<?php echo $i; ?>" readonly>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      </div>
                  </div>
                </form>
              </div>
              <?php echo form_close(); ?>

            </div>
          </div>

    </section>
</div>
