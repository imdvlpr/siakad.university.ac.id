<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $mahasiswa->num_rows();?></h3>

              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/main_controller/view_all_mhs/1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $dosen->num_rows();?></h3>
              <p>Dosen</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/main_controller/view_all_dosen/1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $this->db->count_all_results('akademik_prodi');?></h3>
              <p>Program Studi</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-photos"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/main_controller/view_all_prodi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $matkul->num_rows();?></h3>
              <p>Mata Kuliah</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/main_controller/view_all_mk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
      <div class="row">
        <div class="col-lg-7">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Tabel Kalendar Akademik</h3>
              <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Tambah Kegiatan">
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
                  <th id="s">OPERASI</th>
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
                    <td>
                      <a href="<?php echo base_url()?>index.php/main_controller/del_event/<?php echo ($data->id_kegiatan); ?>" class="btn btn-sm" onclick="return confirm('Anda Yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
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
                  <th>OPERASI</th>
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
              <?php echo form_open("main_controller/event_addNew"); ?>
                  <div class="form-group">
                   <label for="" class="col-md-3">Tahun Akademik</label>
                   <div class="col-md-9">
                     <select class="form-control" name="tahun_akademik">
                       <?php foreach($tahun_ak->result() as $data):?>
                         <option value="<?php echo $data->tahun_akademik_id; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></option>
                       <?php endforeach; ?>
                     </select>
                   </div>
                 </div>

                 <div class="form-group">
                  <label for="" class="col-md-3">Nama Kegiatan</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3">Tanggal Mulai</label>
                  <div class="col-md-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name='tgl_mulai' class="form-control pull-right" id="datepicker">
                  </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label class="col-md-3">Tanggal Selesai</label>
                  <div class="col-md-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name='tgl_selesai' class="form-control pull-right" id="datepicker2">
                  </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                 <label for="" class="col-md-3">Kegiatan Untuk</label>
                 <div class="col-md-9">
                   <select class="form-control" name="level">
                     <option value="3">Mahasiswa</option>
                     <option value="2">Dosen</option>
                   </select>
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
    <!-- /.content -->
  </div>
