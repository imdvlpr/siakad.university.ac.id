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
        <h4 class="title-content">Tabel Tahun Angkatan</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>TAHUN ANGKATAN</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($angkatan->result() as $d):?>
    <?php $i += 1; ?>
    <tr>
      <td><?php echo ($d->tahun); ?></td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_angkatan/<?php echo ($d->id_angkatan); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>TAHUN ANGKATAN</th>
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

            <h4 class="modal-title" id="myModalLabel">Tambah Tahun Angkatan Baru</h4>
          </div>
          <div class="modal-body">
          <?php echo form_open("main_controller/Angkatan_addNew"); ?>
            <div class="form-row">
              <label for="" class="col-md-3">Tahun Angkatan</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="tahun" placeholder="Tahun Angkatan" required>
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
      1. Tambah Tahun Angkatan <br>
      Admin dapat menambahkan angkatan jika nanti ada angkatan mahasiswa baru. <br><br>
      2. Melihat Tahun Angkatan <br>
      Admin dapat melihat tahun angkatan.<br><br>
      3. Mengubah Tahun Angkatan<br>
      Admin dapat mengubah tahun angkatan jika ini diperlukan. <br><br>
      4. Menghapus Tahun Angkatan <br>
      dapat menghapus tahun angkatan jika ini diperlukan.
      </div>
     </div>
     <div class="modal-footer">

     </div>
    </div>
   </div>
  </div>
 </section>
