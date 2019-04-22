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
                     <p align="justify">Pada halaman ini anda dapat melihat presensi kehadiran anda sesuai dengan mata kuliah yang anda ambil pada semester ini.</p>
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
            Kehadiran
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
            <li class="active"> Kehadiran</li>
          </ol>
        </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- left colum -->


        <div class="col-xs-20">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar Kehadiran <i><b><?php echo $this->session->display_name; ?></b></i></h3>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <table id="tabelkeren" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Jumlah Kehadiran</th>
                  <th>Jumlah Pertemuan Kelas</th>
                  <th>Presentase Pertemuan</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0; ?>
                  <?php foreach($presensi->result() as $data):?>
                  <?php $i += 1; ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $data->kode_mk ?></td>
                  <td><?php echo $data->nama_mk ?></td>
                  <td><?php echo $this->main_model->getJumKehadiran($data->id_jadwal_master,$this->session->kode_user); ?></td>
                  <td><?php echo $this->main_model->getJumPresensiPerJadwal($data->id_jadwal_master); ?></td>
                  <td>
                    <?php
                      if($this->main_model->getJumPresensiPerJadwal($data->id_jadwal_master) == 0){
                        echo " - ";
                      } else{
                        $result = ($this->main_model->getJumKehadiran($data->id_jadwal_master,$this->session->kode_user) / $this->main_model->getJumPresensiPerJadwal($data->id_jadwal_master)) * 100;
                        echo (round($result,2)) . "%";
                      }
                    ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Jumlah Kehadiran</th>
                <th>Jumlah Pertemuan Kelas</th>
                <th>Presentase Pertemuan</th>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
