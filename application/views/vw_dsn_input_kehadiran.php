<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Input Kehadiran
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Jadwal</li>
        <li class="active"> Jadwal Dosen</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->
              <div class="col-md-20">




                <div class="box box-primary">

                <form class="form-horizontal">
                  <div class="box-header">
                    <h3 class="box-title" style="margin-top: 10px;">Keterangan Jadwal</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($jadwal->row()->keterangan, 0,4)); echo "-"; echo substr($jadwal->row()->keterangan, -1);?></p>
                      <label class="col-sm-1 from-control-label">Hari</label><p>: <?php echo ($jadwal->row()->nama_hari); ?></p>
                      <label class="col-sm-1 from-control-label">Jam</label><p>: <?php echo ($jadwal->row()->jam_mulai); ?> - <?php echo ($jadwal->row()->jam_selesai); ?></p>
                      <label class="col-sm-1 from-control-label">Ruangan</label><p>: <?php echo ($jadwal->row()->nama_ruangan); ?></p>
                      <label class="col-sm-1 from-control-label">Mata Kuliah</label><p>: <?php echo ($jadwal->row()->nama_mk); ?></p>
                      <label class="col-sm-1 from-control-label">Kelas</label><p>: <?php echo ($jadwal->row()->nama_kelas); ?></p>
                    </div>
                  </div>
                </form>
              </div>

              <?php echo form_open("main_controller/kehadiran_addNew"); ?>
              <h3 class="box-title" style="margin-top: 10px;">Kehadiran Mahasiswa</h3>
                <div class="box box-primary">
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
                          <th style="width: 150px">Kelas</th>
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
                              <td><?php echo ($data->nama_kelas);?></td>
                              <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="0"></center></td>
                              <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="1"></center></td>
                              <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="2"></center></td>
                              <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="3" checked></center></td>
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
