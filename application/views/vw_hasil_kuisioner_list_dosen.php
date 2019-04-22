
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
            <h3 class="box-title">Tabel Dosen</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>

                <th>NIDN</th>
                <th>NAMA</th>
                <th>NIP</th>
                <th>NO HP</th>
                <th>EMAIL</th>
                <th>PRODI</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              <?php foreach($dosen->result() as $d):?>
              <?php $i += 1; ?>

              <tr>

                <td><?php echo ($d->nidn); ?></td>
                <td><?php echo ($d->nama_lengkap); ?></td>
                <td><?php echo ($d->nip); ?></td>
                <td><?php echo ($d->hp); ?></td>
                <td><?php echo ($d->email); ?></td>
                <td><?php echo ($d->nama_prodi); ?></td>
                <td>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_hasil_kuisioner_per_dosen/<?php echo ($d->nidn); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>

              <tfoot>
              <tr>

                <th>NIDN</th>
                <th>NAMA</th>
                <th>NIP</th>
                <th>NO HP</th>
                <th>EMAIL</th>
                <th>PRODI</th>
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
