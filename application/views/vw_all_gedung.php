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
        <h4 class="title-content">Tabel Gedung</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>NAMA GEDUNG</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($gedung->result() as $data):?>
    <?php $i += 1; ?>
    <tr>
      <td><?php echo ($data->nama_gedung); ?></td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_gedung/<?php echo ($data->gedung_id); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
        <a href="<?php echo base_url()?>index.php/main_controller/gedung_delete/<?php echo ($data->gedung_id); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>NAMA GEDUNG</th>
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
            <?php echo form_open("main_controller/Gedung_addNew"); ?>
              <div class="form-row">
                <label for="" class="col-md-3">Nama Gedung</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_gedung" placeholder="Nama Gedung" required>
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
        1. Tambah data gedung<br>
        Masukan informasi nama gedung yang akan ditambahkan lalu tekan submit. (nama gedung tidak bisa sama, jika ingin sama berilah angka dibelakangnya agar berbeda).
        <br><br>
        2. Melihat data gedung <br>
        Admin dapat melihat data gedung.<br><br>
        3. Mengubah data gedung<br>
        Edit dalam gedung yaitu hanya dapat mengedit nama gedung tersebut.<br><br>
        4. Menghapus data gedung <br>
        Jika kita mendelete gedung maka kita otomatis akan menghapus data ruangan yang ada didalam gedung tersebut.  <br><br>
        5. Excel <br>
        Admin dapat mengunduh data gedung dengan menekan tombol ini lalu data gedung akan diunduh dalam bentuk excel.
        </div>
       </div>
       <div class="modal-footer">

       </div>
      </div>
     </div>
    </div>
   </section>
</div>
