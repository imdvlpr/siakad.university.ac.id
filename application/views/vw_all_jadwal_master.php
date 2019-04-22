
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
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>
                <th>AKADEMIK</th>
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
                <td><?php echo ($data->nama_mk); ?></td>
                <td><?php echo ($data->nama_prodi); ?></td>
                <td><?php echo ($data->nama_kelas); ?></td>
                <td><?php echo ($data->nama_lengkap); ?></td>
                <td>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_lihat_jadwal/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat Jadwal</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_jadwal_master/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/jadwal_master_delete/<?php echo ($data->id_jadwal_master); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>AKADEMIK</th>
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
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/jadwal_master_addNew"); ?>
            
            <div class="form-group">
              <label for="" class="col-md-3">Tahun Akademik</label>
              <div class="col-md-9">
                <select class="form-control" name="id_tahun_akademik">
                  <?php foreach($tahun_akademik->result() as $data):?>
                    <option value="<?php echo $data->tahun_akademik_id; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></option>
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
                  <select class="form-control" name="nidn" id="dosen">
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
         1. Tambah Jadwal Mata Kuliah Master<br>
         Admin dapat menambahkan jadwal mata kuliah dengan memasukan informasi. Menambahkan jadwal mata kuliah disini agar nanti mahasiswa saat mengambil mata kuliahnya sudah memiliki jadwal.<br>
         Admin hanya dapat menambahkan jadwal mata kuliah jika sudah memasukan tahun akademik, program studi, kelas, mata kuliah, dan dosen. Jadi jadwal disini itu seperti menambahkan jadwal master, maksudnya jadwal master adalah jadwal utama dari semua mata kuliah yang ada berdasarkan kelas yang sudah ada.  Tetapi untuk menambahkan jadwal detail seperti hari, jam, dan ruangan admin harus membuka dulu lihat jadwal kuliah.<br><br>
         2. Lihat Jadwal Kuliah Master <br>
         Setelah menambahkan jadwal master, lalu klik Lihat jadwal kuliah. Disini admin harus memasukan jadwal mata kuliah berdasarkan kelas itu ada di hari apa saja, jam berapa, dan di ruangan mana.<br>
         Jika sudah disubmit, maka jadwal mata kuliah tertentu dan di kelas tertentu sudah dibuat. Nantinya didalam sini admin dapat mengubah jadwal tersbut.<br><br>
         3. Mengubah Jadwal Mata Kuliah Master<br>
         Admin dapat merubah informasi mata kuliah, kelas mana nya dan dosen yang mengajar kelas tersebut.<br><br>
         4. Menghapus Jadwal Master <br>
         Admin dapat menghapus jadwal master.<br><br>
         5. Excel <br>
         Admin dapat mengunduh seluruh jadwal master jika dibutuhkan.
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
