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
        <h4 class="title-content">Tabel Ruangan</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>NAMA RUANGAN</th>
      <th>NAMA GEDUNG</th>
      <th>KAPASITAS</th>
      <th>KETERANGAN</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($ruangan->result() as $data):?>
    <?php $i += 1; ?>
    <tr>
      <td><?php echo ($data->nama_ruangan); ?></td>
      <td><?php echo ($data->nama_gedung); ?></td>
      <td><?php echo ($data->kapasitas); ?></td>
      <td><?php echo ($data->keterangan); ?></td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_ruangan/<?php echo ($data->ruangan_id); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
        <a href="<?php echo base_url()?>index.php/main_controller/ruangan_delete/<?php echo ($data->ruangan_id); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>NAMA RUANGAN</th>
      <th>NAMA GEDUNG</th>
      <th>KAPASITAS</th>
      <th>KETERANGAN</th>
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
              
              <h4 class="modal-title" id="myModalLabel">Tambah Gedung Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/Ruangan_addNew"); ?>

              <div class="form-row">
                <label for="" class="col-md-3">Nama Ruangan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan" required>
                </div>
              </div>

               <div class="form-row">
                <label for="" class="col-md-3">Nama Gedung</label>
                <div class="col-md-9">

                  <select class="form-control" name="gedung_id">
                  <?php foreach($Gedung->result() as $data):?>
                    <option value="<?php echo $data->gedung_id; ?>"><?php echo $data->nama_gedung;?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Kapasitas</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas Ruangan" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Keterangan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required>
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
        1. Tambah Data Ruangan<br>
        Jika di klik akan muncul seperti ini Masukan informasi ruangan seperti, nama ruangan, ruangan tersebut terletak pada gedung mana, kapasitas ruangan, dan keterangan ruangan. Data ruangan hanya dapat ditambahkan pada gedung yang sudah dibuat dan diinputkan oleh admin. .<br><br>
        2. Melihat Data Ruangan <br>
        Admin dapat melihat data ruangan.<br><br>
        3. Mengubah Data Ruangan<br>
        Edit dalam ruangan ini dapat mengedit informasi nama ruangan, terletak pada gedung mana ruangan tersebut, kapasitas ruangan (jika ada pembesaran atau pengecilan ruangan), dan keterangan ruangan. <br><br>
        4. Menghapus Data Ruangan <br>
        admin dapat menghapus data ruangan, jika ruangan terletak pada gedung 1 lalu admin akan menghapus data ruangan, maka yang akan terhapus hanyalah ruangannya tanpa menghapus informasi gedung tersebut.<br><br>
        5. Excel <br>
        Admin dapat mengunduh data ruangan dengan menekan tombol ini lalu data gedung akan diunduh dalam bentuk excel.
        </div>
       </div>
       <div class="modal-footer">
        
       </div>
      </div>
     </div>
    </div>
   </section>
