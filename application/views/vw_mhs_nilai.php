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
                    <p align="justify">Pada Halaman ini, anda dapat melihat keseluruhan nilai yang anda peroleh dari semester satu hingga semester saat ini. Bobot nilai mencakup semua yaitu (UTS, UAS, TUGAS, KUIS).
                    <br></br>
                    <br>Anda juga dapat melihat perolehan Nilai Indeks Prestasi Kumulatif dan Indeks Prestasi Semester.</br>
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
        Nilai
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li class="active">Nilai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- left colum -->
          <div class="col-md-20">
          <div class="col-xs-20">
            <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Nilai</h3>
            </div>
              <div class="box-body">
                <table id="tabelkeren" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Indeks Nilai</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0; ?>
                  <?php foreach($nilaimhs->result() as $data):?>
                  <?php $i += 1; ?>
                <tr>
                  <td><?php echo $data->kode_mk; ?></td>
                  <td><?php echo $data->nama_mk; ?></td>
                  <td><?php echo $data->sks_mk; ?></td>
                  <td><?php echo $data->nilai; ?></td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Indeks Nilai</th>
                </tr>
              </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <h3 class="box-title" style="margin-top: 10px;">Nilai Indeks Prestasi</h3>
                <div class="box box-primary">

                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-1 from-control-label">IPS</label><p>: <?php echo $ips; ?></p>
                      <label class="col-sm-1 from-control-label">IPK</label><p>: <?php echo $ipk; ?></p>
                    </div>
                  </div>
                </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
