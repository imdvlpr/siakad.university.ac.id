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
        <h4 class="title-content">Tabel Program Studi</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>NAMA PROGRAM STUDI</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($prodi as $data):?>
    <?php $i += 1; ?>
    <tr>
      <td><?php echo ($data['nama_prodi']); ?></td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_prodi/<?php echo ($data['id_prodi']); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
      </td>
    </tr>

    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>

      <th>NAMA PROGRAM STUDI</th>
      <th id="s">OPERASI</th>
    </tr>
    </tfoot>
  </table>
</div>
<section class="content-popup">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            
            <h4 class="modal-title" id="myModalLabel">Tambah Program Studi Baru</h4>
          </div>
          <div class="modal-body">
          <?php echo form_open("main_controller/Prodi_addNew"); ?>
            <div class="form-row">
              <label for="" class="col-md-3">Nama Prodi</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="nama_prodi" placeholder="Nama Program Studi" required>
              </div>
            </div>
            <div class="form-row">
              <label for="" class="col-md-3">Kode Prodi</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="kode_prodi" placeholder="Kode Program Studi" required>
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
      1. Tambah Prodi<br>
      Admin dapat menambahkan program studi yang tersedia di UNIVERSITAS  Bandung apabila nantinya akan ada program studi baru dan juga belum ada program studi dengan nama yang sama sebelumnya. Dengan memasukan informasi sebagai berikut. Admin harus menambahkan program studi agar nanti saat menambahkan mahasiswa baru, langsung dimasukan ke jurusan mana dan kelas mana. <br><br>
      2. Melihat Prodi <br>
      Admin dapat melihat program studi.<br><br>
      3. Mengubah Prodi<br>
      Fitur ini dapat merubah nama program studi apabila nanti ada perubahan di UNIVERSITAS  terkait nama program studi ataupun apabila admin typo/salah memasukan data nama program studi. <br><br>
      4. Menghapus Prodi <br>
      Menghapus program studi apabila nanti program studi tersebut sudah tidak ada.
      </div>
     </div>
     <div class="modal-footer">
      
     </div>
    </div>
   </div>
  </div>
 </section>
</div>
