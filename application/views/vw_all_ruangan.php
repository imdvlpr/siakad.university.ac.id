
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
            <h3 class="box-title">Tabel Ruangan</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
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
              <h4 class="modal-title" id="myModalLabel">Tambah Gedung Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/Ruangan_addNew"); ?>

              <div class="form-group">
                <label for="" class="col-md-3">Nama Ruangan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan" required>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-md-3">Nama Gedung</label>
                <div class="col-md-9">

                  <select class="form-control" name="gedung_id">
                  <?php foreach($Gedung->result() as $data):?>
                    <option value="<?php echo $data->gedung_id; ?>"><?php echo $data->nama_gedung;?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Kapasitas</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas Ruangan" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Keterangan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        1. Tambah Data Ruangan<br>
        Jika di klik akan muncul seperti ini  Masukan informasi ruangan seperti, nama ruangan, ruangan tersebut terletak pada gedung mana, kapasitas ruangan, dan keterangan ruangan. Data ruangan hanya dapat ditambahkan pada gedung yang sudah dibuat dan diinputkan oleh admin.  .<br><br>
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
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
   </section>

  <!-- /.content -->
</div>
