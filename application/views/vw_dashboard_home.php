<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Control Panel</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
          <span id="date_time"></span>
          <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="">
  <div class="row" id="boxbox">
    <div class="col rounded-lg" style="background-color:#00c0ef !important;">
      <div class="inner">
        <h3><?php echo $mahasiswa->num_rows();?></h3>
        <p>Mahasiswa</p>
      </div>
      <div class="icon">
        <i class="fas fa-user"></i>
      </div>
    </div>
    <div class="col rounded-lg" style="background-color:#00a65a !important;">
      <div class="inner">
        <h3><?php echo $dosen->num_rows();?></h3>
        <p>Dosen</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
    </div>
    <div class="col rounded-lg" style="background-color:#f39c12 !important;">
      <div class="inner">
        <h3><?php echo $this->db->count_all_results('akademik_prodi');?></h3>
        <p>Program Studi</p>
      </div>
      <div class="icon">
        <i class="fas fa-chalkboard"></i>
      </div>
    </div>
    <div class="col rounded-lg" style="background-color:#dd4b39 !important;">
      <div class="inner">
        <h3><?php echo $matkul->num_rows();?></h3>
        <p>Mata Kuliah</p>
      </div>
      <div class="icon">
        <i class="fas fa-sticky-note"></i>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="col">
  <?php if ($this->session->flashdata('success')) : ?>
  <div class="row mt-3">
      <div class="col">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $this->session->flashdata('success'); ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
  </div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('danger')) : ?>
  <div class="row mt-3">
      <div class="col">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $this->session->flashdata('danger'); ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
  </div>
  <?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Tabel Kalender Akademik</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="Tambah Kegiatan">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-hover">
    <thead>
    <tr>
      <th id="s">#</th>
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
      <th>#</th>
      <th>TAHUN AKADEMIK</th>
      <th>NAMA KEGIATAN</th>
      <th>UNTUK</th>
      <th>TANGGAL</th>
      <th>OPERASI</th>
    </tr>
    </tfoot>
  </table>
</div>
<section class="content-popup">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Tambah Gedung Baru</h4>
              </div>
              <div class="modal-body">
              <?php echo form_open("main_controller/event_addNew"); ?>
                  <div class="form-row">
                   <label for="" class="col-md-3">Tahun Akademik</label>
                   <div class="col-md-9">
                     <select class="form-control" name="tahun_akademik">
                       <?php foreach($tahun_ak->result() as $data):?>
                         <option value="<?php echo $data->tahun_akademik_id; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></option>
                       <?php endforeach; ?>
                     </select>
                   </div>
                 </div>

                 <div class="form-row">
                  <label for="" class="col-md-3">Nama Kegiatan</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
                  </div>
                </div>

                <div class="form-row">
                  <label class="col-md-3">Tanggal Mulai</label>
                  <div class="col-md-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class=""></i>
                    </div>
                    <input type="text" name='tgl_mulai' class="form-control pull-right" id="datepicker">
                  </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-row">
                  <label class="col-md-3">Tanggal Selesai</label>
                  <div class="col-md-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class=""></i>
                    </div>
                    <input type="text" name='tgl_selesai' class="form-control pull-right" id="datepicker2">
                  </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-row">
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-success" name="addnew" value="Submit"></input>

              </div>
              <?php echo form_close(); ?>
              </div>
            </div>
          </div>


    </section>
</div>
