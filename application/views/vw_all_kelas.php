<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Master Data</h2>
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
        <h4 class="title-content">Tabel Kelas</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>NAMA KELAS</th>
      <th>PROGRAM STUDI</th>
      <th>JUMLAH MAHASISWA</th>
      <th>KUOTA</th>
    </tr>
    </thead>
    <tbody>
      <?php $i = 0; ?>
      <?php foreach($kelas->result() as $data):?>
      <?php
          $i += 1;
          $jml = $this->db->query('SELECT * FROM app_kelas_mhs WHERE id_kelas='.$data->id_kelas);
      ?>
      <tr>
        <td><?php echo ($data->nama_kelas); ?></td>
        <td><?php echo ($data->nama_prodi); ?></td>
        <td><?php echo ($jml->num_rows()); ?></td>
        <td><?php echo ($data->kuota); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>NAMA KELAS</th>
      <th>PROGRAM STUDI</th>
      <th>JUMLAH MAHASISWA</th>
      <th>KUOTA</th>
    </tr>
    </tfoot>
  </table>
</div>
<section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Tambah Kelas Baru</h4>
            </div>
            <div class="modal-body">

            <?php echo form_open("main_controller/Kelas_addNew"); ?>
              <div class="form-row">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_prodi">
                  <?php foreach($prodi as $data):?>
                    <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <label for="" class="col-md-3">Tahun Angkatan</label>
                <div class="col-md-9">
                  <select class="form-control" name="Angkatan">
                  <?php foreach($angkatan->result() as $data):?>
                    <option value="<?php echo $data->tahun; ?>"><?php echo $data->tahun;?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Nomor Kelas</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_kelas" placeholder="Nomor Kelas" required>
                </div>
              </div>



              <div class="form-row">
                <label for="" class="col-md-3">Jumlah Mahasiswa</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="jumlah_mhs" placeholder="Jumlah Mahasiswa" required>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-success" name="addnew" value="Submit"></input>
              
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
        
        <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
       </div>
       <div class="modal-body">
        <div>
        1. Tambah Kelas<br>
        Admin harus menambahkan kelas sebelum menambahkan informasi mahasiswa, agar mahasiswa nanti dimasukan kedalam kelas yang sudah dibuat oleh admin berdasarkan jurusanya. Sebelum menambahkan kelas, admin harus menambahkan dulu program studi agar kelas ini sesuai dengan program studinya. <br><br>
        2. Melihat Kelas<br>
        Admin dapat melihat Kelas.<br><br>
        3. Mengubah Informasi Kelas<br>
        Admin dapat mengubah informasi kelas jika diperlukan. <br><br>
        4. Menghapus Informasi Kelas <br>
        Admin dapat menghapus informasi kelas jika diperlukan.
       </div>
       <div class="modal-footer">
        
       </div>
      </div>
     </div>
    </div>
   </section>
