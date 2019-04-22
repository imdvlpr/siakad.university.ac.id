<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Registrasi Mata Kuliah</h6>
        <h2>Preview</h2>
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
<div class="col">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Registrasi Mata Kuliah</h4>
      </div>
    </div>

  </div>
<hr>
  <?php
    if (($status_bayar_mhs == 3) || ($status_bayar_mhs == 0)){
      ?><div class="callout callout-warning">
        <h4>Informasi !</h4>
        Silahkan lakukan pembayaran untuk mengakses halaman ini, petunjuk dapat diakses melalui
        <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_registrasimk">Halaman Pembayaran</a>
        <br>Terimakasih.
      </div><?php
    }
    else if ($status_bayar_mhs == 1){
      if ($status_regis_mhs == 1) {
        ?><div class="callout callout-warning">
          <h4>Informasi !</h4>
          Anda sudah melakukan Registrasi pada Tahun Akademik ini. Silahkan cek jadwal kuliah anda.
          <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_jadwalkuliah">Halaman Jadwal Kuliah</a>
          <br>Terimakasih.
        </div><?php
      }else if ($status_regis_mhs == 2) {
        ?><div class="callout callout-warning">
          <h4>Informasi !</h4>
          Data Registrasi anda belum disetujui oleh admin. Silahkan cek status registrasi anda
          <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_statusregistrasi">Halaman Status Registrasi</a>
          <br>Terimakasih.
        </div><?php
      }
      else if ($status_regis_mhs == 0){
        ?>
            <div class="col-md-12">
                <div class="box box-primary">
              <div class="box-body">
                <div class="form-row">
                    <label class="col-sm-2 from-control-label">NIM</label>
                    <div class="col-sm-5">
                      : <?php echo $this->session->kode_user;?>
                    </div>
                  </div><br>
                  <div class="form-row">
                    <label class="col-sm-2 from-control-label">Nama Lengkap</label>
                    <div class="col-sm-5">
                      : <?php echo $this->session->display_name;?>
                    </div>
                  </div><br>
                  <div class="form-row">
                    <label class="col-sm-2 from-control-label">IPK</label>
                    <div class="col-sm-5">
                      : <?php echo $this->session->display_name;?>
                    </div>
                  </div><br>
                  <div class="form-row">
                    <label class="col-sm-2 from-control-label">Tahun Akademik</label>
                    <div class="col-sm-5">
                      : <?php echo $this->session->tahun_akademik;?>
                    </div>
                  </div><br>
                  <div class="form-row">
                    <label class="col-sm-2 from-control-label">Kelas</label>
                    <div class="col-sm-5">
                      : <?php
                      $uhuy=$this->db->query('SELECT * FROM akademik_kelas WHERE id_kelas='.$this->session->id_kelas);
                      echo $uhuy->row()->nama_kelas;

                      ?>
                    </div>
                  </div><br>
              </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="box box-primary">

            <div class="box-body">


                <div style="padding-left: 10px">
                <h3 style="margin-top: 10px;">Mata Kuliah Tersedia</h3>
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#panetingkat1">Tingkat 1</a></li>
                    <li><a data-toggle="tab" href="#panetingkat2">Tingkat 2</a></li>
                    <li><a data-toggle="tab" href="#panetingkat3">Tingkat 3</a></li>
                    <li><a data-toggle="tab" href="#panetingkat4">Tingkat 4</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="panetingkat1" class="tab-pane fade in active" style="padding-top: 10px">
                      <form>
                      <table class="table table-bordered" id="tabeltk1">
                        <thead>
                          <tr>
                            <th>Mata Kuliah</th>
                            <th style="width: 13px">SKS</th>
                            <th>Kelas / Kelas Peminatan</th>
                            <th style="width: 15px">Pilih</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 0; ?>
                          <?php foreach($mk1->result() as $data):?>
                          <?php $i += 1; ?>

                          <tr>
                            <td><?php echo ($data->nama_mk)?></td>
                            <td><?php echo ($data->sks_mk); ?></td>
                            <td><?php echo ($data->nama_kelas); ?></td>
                            <td>
                             <a href="<?php echo base_url()?>index.php/main_controller/input_mk_temp/<?php echo ($data->id_jadwal_master); ?>"><i class="btn  fa fa-check-square-o"></i></a></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>

                      </table>
                      </form>
                    </div>
                    <div id="panetingkat2" class="tab-pane fade" style="padding-top: 10px">
                      <form>
                      <table class="table table-bordered" id="tabeltk2">
                        <thead>
                        <tr>
                          <th>Mata Kuliah</th>
                          <th style="width: 13px">SKS</th>
                          <th>Kelas / Kelas Peminatan</th>
                          <th style="width: 15px">Pilih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($mk2->result() as $data):?>
                        <?php $i += 1; ?>

                        <tr>
                          <td><?php echo ($data->nama_mk)?></td>
                          <td><?php echo ($data->sks_mk); ?></td>
                          <td><?php echo ($data->nama_kelas); ?></td>
                           <td>
                             <a href="<?php echo base_url()?>index.php/main_controller/input_mk_temp/<?php echo ($data->id_jadwal_master); ?>"><i class="btn  fa fa-check-square-o"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                      </form>
                    </div>
                    <div id="panetingkat3" class="tab-pane fade"  style="padding-top: 10px">
                      <form>
                      <table class="table table-bordered" id="tabeltk3">
                        <thead>
                        <tr>
                          <th>Mata Kuliah</th>
                          <th style="width: 13px">SKS</th>
                          <th>Kelas / Kelas Peminatan</th>
                          <th style="width: 15px">Pilih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($mk3->result() as $data):?>
                        <?php $i += 1; ?>

                        <tr>
                          <td><?php echo ($data->nama_mk)?></td>
                          <td><?php echo ($data->sks_mk); ?></td>
                          <td><?php echo ($data->nama_kelas); ?></td>
                          <td>
                             <a href="<?php echo base_url()?>index.php/main_controller/input_mk_temp/<?php echo ($data->id_jadwal_master); ?>"><i class="btn  fa fa-check-square-o"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                      </form>
                    </div>
                    <div id="panetingkat4" class="tab-pane fade"  style="padding-top: 10px">
                      <form>
                      <table class="table table-bordered" id="tabeltk4">
                        <thead>
                        <tr>
                          <th>Mata Kuliah</th>
                          <th style="width: 13px">SKS</th>
                          <th>Kelas / Kelas Peminatan</th>
                          <th style="width: 15px">Pilih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($mk4->result() as $data):?>
                        <?php $i += 1; ?>

                        <tr>
                          <td><?php echo ($data->nama_mk)?></td>
                          <td><?php echo ($data->sks_mk); ?></td>
                          <td><?php echo ($data->nama_kelas); ?></td>
                           <td>
                             <a href="<?php echo base_url()?>index.php/main_controller/input_mk_temp/<?php echo ($data->id_jadwal_master); ?>"><i class="btn  fa fa-check-square-o"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                      </form>
                    </div>
                  </div>
                  <!-- <button type="submit" class="btn btn-primary">Pilih</button> -->
                </div>
                  <!-- end new feat -->
                  </div>
              </div>
            <!-- /.box-body -->
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <!-- /.box-header -->
              <div class="box-body">
                <div style="padding-left: 10px">
                <h3 class="box-title" style="margin-top: 10px;">Mata Kuliah Dipilih</h3>
                <form>
                <table class="table table-bordered" id="tabelregis">
                  <thead>
                  <tr>
                    <th>Mata Kuliah</th>
                    <th style="width: 13px">SKS</th>
                    <th>Kelas / Kelas Peminatan</th>
                    <th style="width: 15px">Pilih</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 0; ?>
                  <?php foreach($tempkrs->result() as $data):?>
                  <?php $i += 1; ?>

                  <tr>
                    <td><?php echo ($data->nama_mk)?></td>
                    <td><?php echo ($data->sks_mk); ?></td>
                    <td><?php echo ($data->nama_kelas); ?></td>

                    <td><button type="submit" class="btn btn-danger fa fa-trash"></button></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <!-- <tbody>
                  <tr>
                    <td>Bahasa Indonesia</td>
                    <td>3</td>
                    <td>BI-01</td>
                    <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                  </tr>
                  <tr>
                    <td>Kalkulus</td>
                    <td>3</td>
                    <td>KA-01</td>
                    <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                  </tr>
                  <tr>
                    <td>Logika Matematika</td>
                    <td>2</td>
                    <td>LM-01</td>
                  <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                  </tr>
                  <tr>
                    <td>Matrik dan Vektor</td>
                    <td>2</td>
                    <td>MV-01</td>
                  <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                  </tr>
                  </tbody> -->
                </table>
                  <!-- <button type="submit" class="btn btn-primary">Hapus</button> -->
                  <a href="<?php echo base_url()?>index.php/main_controller/submit_temp_krs/"><i class="btn btn-primary">Submit</i></a>
                </form>
                </div>
              </div>
            <!-- /.box-body -->
          </div>





        <?php
      }
    }
   ?>
</div>
