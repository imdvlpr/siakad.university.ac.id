<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard Mahasiswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> </a></li>
        <li class="active"><i class="fa fa-home"></i> Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-7">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jumsks;?></h3>
              <p>SKS Terpenuhi</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="<?php echo base_url()?>source/AdminLTE_2/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-4 col-xs-7">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jadwal->num_rows(); ?></h3>
              <p>Mata Kuliah</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-7">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $pert->num_rows(); ?></h3>
              <p>Pertemuan</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-7">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Tabel Kalendar Akademik</h3>

            </div>
            <!-- /.box-header -->


            <div class="box-body">
              <table id="tabelkeren" class="table  table-striped  table-hover">
                <thead>
                <tr>
                  <th id="s">NO</th>
                  <th>TAHUN AKADEMIK</th>
                  <th>NAMA KEGIATAN</th>
                  <th>UNTUK</th>
                  <th>TANGGAL</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0; ?>
                  <?php foreach($event->result() as $data):?>
                  <?php $i += 1; ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                    <td><?php echo $data->nama_kegiatan; ?></td>
                    <td><?php if ($data->level == 2) {
                      echo "Dosen";
                    }else if ($data->level==3) {
                      echo "Mahasiswa";
                    }?></td>
                    <td><?php echo $data->tanggal_mulai.' s/d '.$data->tanggal_selesai; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>


                <tfoot>
                <tr>
                  <th>NO</th>
                  <th>TAHUN AKADEMIK</th>
                  <th>NAMA KEGIATAN</th>
                  <th>UNTUK</th>
                  <th>TANGGAL</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-lg-5">
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->

                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- Left col -->

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
