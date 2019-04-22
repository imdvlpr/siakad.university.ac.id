
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
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
            <h3 class="box-title">Tabel Jadwal Master</h3>
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
              <?php foreach($jadwal_master->result() as $data):?>
              <?php $i += 1; ?>

              <tr>
                <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                <td><?php echo ($data->nama_mk); ?></td>
                <td><?php echo ($data->nama_prodi); ?></td>
                <td><?php echo ($data->nama_kelas); ?></td>
                <td><?php echo ($data->nama_lengkap); ?></td>
                <td>
                  <?php if($data->kuisioner_isFilled == 1) : ?>
                    <a href="<?php echo base_url()?>index.php/main_controller/redirect_hasil_kuisioner_per_jadwal_master/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat Hasil Kuisioner</a>
                  <?php else : ?>
                    Belum ada koresponden
                  <?php endif; ?>
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

  <!-- /.content -->
</div>
