
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Jadwal Mahasiswa</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>
                <th>AKADEMIK</th>
                <th>HARI</th>
                <th>JAM</th>
                <th>RUANGAN</th>
                <th>MATA KULIAH</th>
                <th>PROGRAM STUDI</th>
                <th>KELAS</th>
                <th>DOSEN</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              <?php foreach($jadwal->result() as $data):?>
              <?php $i += 1; ?>

              <tr>
                <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                <td><?php echo ($data->nama_hari); ?></td>
                <td><?php echo ($data->jam_mulai); ?> - <?php echo ($data->jam_selesai); ?></td>
                <td><?php echo ($data->nama_ruangan); ?></td>
                <td><?php echo ($data->nama_mk); ?></td>
                <td><?php echo ($data->nama_prodi); ?></td>
                <td><?php echo ($data->nama_kelas); ?></td>
                <td><?php echo ($data->nama_lengkap); ?></td>
                <td>
                  <a class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_dosen/<?php echo ($data->id_jadwal_matkul); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/jadwal_ujian_delete/<?php echo ($data->id_jadwal_matkul); ?>" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>

                <th>HARI</th>
                <th>JAM</th>
                <th>RUANGAN</th>
                <th>MATA KULIAH</th>
                <th>PROGRAM STUDI</th>
                <th>KELAS</th>
                <th>DOSEN</th>
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
              
              <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/jadwal_mk_addNew"); ?>
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
                <label for="" class="col-md-3">Hari</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_hari">
                    <?php foreach($hari->result() as $data):?>
                      <option value="<?php echo $data->id_hari; ?>"><?php echo $data->nama_hari;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- <div class="form-row">
                <label for="" class="col-md-3">Shift</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="id_shift" placeholder="Shift" required>
                </div>
              </div> -->
              <div class="form-row">
                <label for="" class="col-md-3">Jam Mulai</label>
                <div class="col-md-9">
                  <select class="form-control" name="jam_mulai">
                    <?php foreach($shift->result() as $data):?>
                      <option value="<?php echo $data->jam_mulai; ?>"><?php echo $data->jam_mulai;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Jam Akhir</label>
                <div class="col-md-9">
                  <select class="form-control" name="jam_selesai">
                    <?php foreach($shift->result() as $data):?>
                      <option value="<?php echo $data->jam_selesai; ?>"><?php echo $data->jam_selesai?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>


              <div class="form-row">
                <label for="" class="col-md-3">Gedung</label>
                <div class="col-md-9">
                  <select class="form-control" name="gedung_id" id="gedung">
                    <option value="0">-- Pilih --</option>
                    <?php foreach($gedung->result() as $data):?>
                      <option value="<?php echo $data->gedung_id; ?>"><?php echo $data->nama_gedung;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Ruangan</label>
                <div class="col-md-9">
                  <select class="form-control" name="ruangan_id" id="ruangan_id">
                    <option value="0">-- Pilih --</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_prodi" id="prodi">
                    <option value="0">-- Pilih --</option>
                    <?php foreach($prodi as $data):?>
                      <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Kelas</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_kelas" id="kelas">
                    <option value="0">-- Pilih --</option>

                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Mata Kuliah</label>
                <div class="col-md-9">
                  <select class="form-control" name="kode_mk" id="matkul">
                    <option value="0">-- Pilih --</option>

                  </select>
                </div>
              </div>





              <div class="form-row">
                <label for="" class="col-md-3">NIDN</label>
                <div class="col-md-9">
                  <select class="form-control" name="nidn" id="dosen">
                    <option value="0">-- Pilih --</option>

                  </select>
                </div>
              </div>

              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-success" name="addnew" value="Submit"></input>
              
            </div>
            <div class="modal-footer">
            </div>
            <?php echo form_close(); ?>
            </div>
          </div>
        </div>


  </section>

  <!-- /.content -->
</div>
