

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
            <h3 class="box-title">Tabel Mahasiswa</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>

                <th>NIM</th>
                <th>NAMA</th>
                <th>ANGKATAN</th>
                <th>KELAS</th>
                <th>PRODI</th>
                <th>SEMESTER</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>


              <tbody>
              <?php $i = 0; ?>
              <?php foreach($mahasiswa->result() as $M):?>
              <?php $i += 1; ?>
              <tr>

                <td><?php echo ($M->nim); ?></td>
                <td><?php echo ($M->nama); ?></td>
                <td><?php echo ($M->tahun); ?></td>
                <td><?php echo ($M->nama_kelas); ?></td>
                <td><?php echo ($M->nama_prodi); ?></td>
                <td><?php echo ($M->semester_aktif); ?></td>
                <td>
                  <a href="<?php echo base_url()?>index.php/main_controller/pg_print_khs/<?php echo ($M->nim); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>

                <th>NIM</th>
                <th>NAMA</th>
                <th>ANGKATAN</th>
                <th>KELAS</th>
                <th>PRODI</th>
                <th>SEMESTER</th>
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
    <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
       </div>
       <div class="modal-body">
        <div>
         Dalam menu ini, admin dapat melihat kartu hasil studi mahasiswa. 
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
