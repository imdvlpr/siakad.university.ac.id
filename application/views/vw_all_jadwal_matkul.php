<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div style="font-size: 13.5px; text-align: right;">
        <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
      </div>
      <h1>
        Lihat Jadwal
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb" style="margin-top: 20px">
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
                  <div class="box-header">
                    <h3 class="box-title" style="margin-top: 10px;">Keterangan Mata Kuliah</h3>
                  </div>
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($jadwal_master->row()->keterangan, 0,4)); echo "-"; echo substr($jadwal_master->row()->keterangan, -1);?></p>
                      <label class="col-sm-1 from-control-label">Program Studi</label><p>: <?php echo ($jadwal_master->row()->nama_prodi); ?></p>
                      <label class="col-sm-1 from-control-label">Mata Kuliah</label><p>: <?php echo ($jadwal_master->row()->nama_mk); ?></p>
                      <label class="col-sm-1 from-control-label">Kelas</label><p>: <?php echo ($jadwal_master->row()->nama_kelas); ?></p>
                      <label class="col-sm-1 from-control-label">Dosen</label><p>: <?php echo ($jadwal_master->row()->nama_lengkap); ?></p>
                    </div>
                  </div>
                </form>
              </div>

              <h3 class="box-title" style="margin-top: 10px;">List Jadwal</h3>

                <div class="box box-primary">
                  <div class="box-header">

                    <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
                  </div>
                  <form class="form-horizontal">
                  <div class="box-body">
                    <table id="tabelkeren" class="table  table-striped  table-hover">
                      <thead>
                      <tr>
                        <th>HARI</th>
                        <th>JAM</th>
                        <th>RUANGAN</th>
                        <th id="s">OPERASI</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 0; ?>
                      <?php foreach($jadwal->result() as $data):?>
                      <?php $i += 1; ?>

                      <tr>
                        <td><?php echo ($data->nama_hari); ?></td>
                        <td><?php echo ($data->jam_mulai); ?> - <?php echo ($data->jam_selesai); ?></td>
                        <td><?php echo ($data->nama_ruangan); ?></td>
                        <td>

                          <a href="<?php echo base_url()?>index.php/main_controller/jadwal_matkul_delete/<?php echo ($data->id_jadwal_matkul); ?>/<?php echo($data->id_jadwal_master); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>HARI</th>
                        <th>JAM</th>
                        <th>RUANGAN</th>
                        <th id="s">OPERASI</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                </form>
              </div>

            </div>
          </div>

    </section>

    <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/jadwal_mk_addNew"); ?>

              <input type="hidden" class="form-control" name="id_jadwal_master" value="<?php echo $jadwal_master->row()->id_jadwal_master; ?>" readonly>

              <div class="form-group">
                <label for="" class="col-md-3">Hari</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_hari">
                    <?php foreach($hari->result() as $data):?>
                      <option value="<?php echo $data->id_hari; ?>"><?php echo $data->nama_hari;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Jam Mulai</label>
                <div class="col-md-9">
                  <select class="form-control" name="jam_mulai">
                    <?php foreach($shift->result() as $data):?>
                      <option value="<?php echo $data->jam_mulai; ?>"><?php echo $data->jam_mulai;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Jam Akhir</label>
                <div class="col-md-9">
                  <select class="form-control" name="jam_selesai">
                    <?php foreach($shift->result() as $data):?>
                      <option value="<?php echo $data->jam_selesai; ?>"><?php echo $data->jam_selesai?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>


              <div class="form-group">
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

              <div class="form-group">
                <label for="" class="col-md-3">Ruangan</label>
                <div class="col-md-9">
                  <select class="form-control" name="ruangan_id" id="ruangan_id">
                    <option value="0">-- Pilih --</option>
                  </select>
                </div>
              </div>

              <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-footer">
            </div>
            <?php echo form_close(); ?>
            </div>
          </div>
        </div>


  </section>
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
        1. Tambah Mata Kuliah<br>
        Admin dapat menambahkan jadwal Mata Kuliah dengan mengisikan infomasi.<br><br>
        2. Melihat Mata Kuliah <br>
        Admin dapat melihat jadwal Mata Kuliah.<br><br>
        3. Mengubah Jadwal Ujian<br>
        Admin dapat mengubah jadwal Mata Kuliah jika ada yang bentrok atau salah memasukan informasi.<br><br>
        4. Menghapus Mata Kuliah <br>
        Admin dapat menghapus data jadwal Mata Kuliah jika diperlukan. <br><br>
        5. Excel <br>
        Admin dapat mengunduh seluruh data Mata Kuliah dalam bentuk excel.
        </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
   </section>
</div>
