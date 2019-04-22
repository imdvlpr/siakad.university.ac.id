
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div style="text-align: right; font-size: 12.5px;">
         <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
      </div>
   </div>
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
                     <p align="justify">Pada halaman ini terdapat beberapa fungsi diantaranya;
                      <br>1. Tombol <b>"Tambah Presensi"</b> yang berwarna hijau disebelah kanan atas, berfungsi untuk menambahkan pertemuan, pertemuan keberapa dan beri keterangan materi apa yang akan diajarkan. Masukan informasi pertemuan keberapa, pada tanggal berapa, lalu klik submit. Kedua informasi tersebut harus diperthatikan dan sesuai.</br>
                      <br>2. <b>"Ubah Kehadiran",</b> Setelah menambahkan pertemuan, dosen dapat mengatur siapa saja yang hadir dikelas ataupun tidak dengan menekan tombol <b>“Ubah Kehadiran”</b> pada kolom operasi.</br>
                      <br>3. <b>"Hapus",</b> Tombol tersebut berfungsi untuk menghapus pertemuan yang sudah dibuat oleh dosen. Apabila dosen menghapus pertemuan ini, maka total jumlah pertemuan terhadap dosen akan berkurang, bukan jumlah pertemuan yang hadirnya.</br>
                     </p>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"> Presensi</a></li>
      <li class="active"> Tabel Presensi</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Presensi</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Tambah Presensi">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>
                <th>NO</th>
                <th>PERTEMUAN</th>
                <th>JUDUL PERTEMUAN</th>
                <th>TANGGAL</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              <?php foreach($jadwal_dosen->result() as $data):?>
              <?php $i += 1; ?>

              <tr>
                <td><?php echo ($i);?></td>
                <td><?php echo ($data->pertemuan);?></td>
                <td><?php echo $data->judul_pertemuan; ?></td>
                <td><?php echo ($data->tanggal); ?></td>
                <td>
                  <?php if($data->is_filled == 0) : ?>
                    <a href="<?php echo base_url()?>index.php/main_controller/redirect_input_kehadiran/<?php echo ($data->id_presensi); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Input Kehadiran</a>
                  <?php else : ?>
                    <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_kehadiran/<?php echo ($data->id_presensi); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah Kehadiran</a>
                  <?php endif; ?>

                  <a href="<?php echo base_url()?>index.php/main_controller/presensi_delete/<?php echo ($data->id_presensi); ?>/<?php echo $id_jadwal; ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>NO</th>
                <th>PERTEMUAN</th>
                <th>JUDUL PERTEMUAN</th>
                <th>TANGGAL</th>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Presensi Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/presensi_addNew"); ?>

              <div class="form-group">
                <label for="" class="col-md-3">Pertemuan </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pertemuan" placeholder="Pertemuan ke- " required>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-md-3">Judul Pertemuan </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="j_pert" placeholder="Judul Pertemuan" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3">Tanggal</label>
                <div class="col-md-9">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name='tanggal' class="form-control pull-right" id="datepicker">
                </div>
                </div>
                <!-- /.input group -->
              </div>

              <input type="hidden" class="form-control" name="id_jadwal_matkul" value="<?php echo $id_jadwal ?>" readonly>
              <input type="submit" class="btn btn-info" style="float: left;" name="addnew" value="Submit"></input>
              <!-- <button type="button" class="btn btn-danger" style="float: right;" data-dismiss="modal">Close</button> -->
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
