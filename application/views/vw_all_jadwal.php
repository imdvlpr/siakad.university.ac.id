  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div style="font-size: 13.5px; text-align: right;">
    <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
  </div>
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb" style="margin-top: 20px">
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
            <table id="tabelkeren" class="table table-bordered table-hover">
              <thead>
              <tr>
                
                <th>HARI</th>
                <th>JAM</th>                                 
                <th>GEDUNG</th>
                <th>RUANGAN</th>
                <th>MATA KULIAH</th>
                <th>PROGRAM STUDI</th>
                <th>KELAS</th>
                <th>DOSEN</th>
                <th>OPERASI</th>
              </tr>
              </thead>
              <tbody> 
              <?php $i = 0; ?>
              <?php foreach($jadwal->result() as $data):?>
              <?php $i += 1; ?>
                             
              <tr>
                
                <td><?php echo ($data->nama_hari); ?></td>
                <td><?php echo ($data->jam_mulai); ?> - <?php echo ($data->jam_selesai); ?></td>
                <td><?php echo ($data->nama_gedung); ?></td>
                <td><?php echo ($data->nama_ruangan); ?></td>
                <td><?php echo ($data->nama_mk); ?></td>
                <td><?php echo ($data->nama_prodi); ?></td>
                <td><?php echo ($data->nama_kelas); ?></td>
                <td><?php echo ($data->nama_lengkap); ?></td>
                <td>
                  <a class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_dosen/<?php echo ($data->id_jadwal); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/dosen_delete/<?php echo ($data->id_jadwal); ?>" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                
                <th>HARI</th>
                <th>JAM</th>                               
                <th>GEDUNG</th>
                <th>RUANGAN</th>
                <th>MATA KULIAH</th>
                <th>PROGRAM STUDI</th>
                <th>KELAS</th>
                <th>DOSEN</th>
                <th>OPERASI</th>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/jadwal_addNew"); ?>

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
              
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3">Jam Mulai:</label>
                <div class="col-md-9">

                  <div class="input-group">
                    <input type="text" name="jam_mulai" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>

              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3">Jam Selesai:</label>
                <div class="col-md-9">

                  <div class="input-group">
                    <input type="text" name="jam_selesai" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Gedung</label>
                <div class="col-md-9">
                  <select class="form-control" name="gedung_id">
                    <?php foreach($gedung->result() as $data):?>
                      <option value="<?php echo $data->gedung_id; ?>"><?php echo $data->nama_gedung;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Ruangan</label>
                <div class="col-md-9">
                  <select class="form-control" name="ruangan_id">
                    <?php foreach($ruangan->result() as $data):?>
                      <option value="<?php echo $data->ruangan_id; ?>"><?php echo $data->nama_ruangan;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
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

              <div class="form-group">
                <label for="" class="col-md-3">Kelas</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_kelas" id="kelas">
                    <option value="0">-- Pilih --</option>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Mata Kuliah</label>
                <div class="col-md-9">
                  <select class="form-control" name="kode_mk" id="matkul">
                    <option value="0">-- Pilih --</option>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">NIDN</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nidn" placeholder="NIDN Dosen" required>
                </div>
              </div>

              <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-footer">
              <!-- <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
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
        Menu ini digunakan untuk mengolah jadwal
        </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
   </section>

  <!-- /.content -->    
</div>