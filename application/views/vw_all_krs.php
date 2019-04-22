
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
            <h3 class="box-title">Tabel Kartu Rencana Studi</h3>

          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <form class="" action="index.html" method="post">

            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>
                <th>NIM</th>
                <th>TAHUN AKADEMIK</th>
                <th>STATUS REGISTRASI</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              <?php foreach($regis->result() as $data):?>
              <?php $i += 1; ?>
              <tr>
                <td><?php echo $data->nim; ?></td>
                <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                <td>
                  <?php
                    if ($data->status_regis == 0) {
                      echo "Belum Registrasi";
                    }else if ($data->status_regis == 1) {
                      echo "Approved";
                    }else if ($data->status_regis == 2) {
                      echo "Pending";
                    }else if ($data->status_regis == 3) {
                      echo "Rejected";
                    }
                   ?>
                </td>
                <td>
                  <a href="<?php echo base_url()?>index.php/main_controller/pg_mhs_jadwalkuliah/<?php echo ($data->nim); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>


              <tfoot>
              <tr>
                <th>NIM</th>
                <th>TAHUN AKADEMIK</th>
                <th>STATUS REGISTRASI</th>
                <th id="s">OPERASI</th>
              </tr>
              </tfoot>
            </table>

          </form>
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
         Dalam menu ini, admin dapat melihat beberapa mahasiswa yang sudah melakukan registrasi mata kuliah yang di approve oleh admin, maka mahasiswa yang mengajukan tersebut sudah dapat melihat jadwal kuliahnya. 
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
