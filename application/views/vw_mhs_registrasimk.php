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
      ?>
        <div class="callout callout-warning">
          <h4>Informasi !</h4>
          Silahkan lakukan pembayaran untuk mengakses halaman ini, petunjuk dapat diakses melalui
          <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_registrasimk">Halaman Pembayaran</a>
          <br>Terimakasih.
        </div>
      <?php
    }
    else if ($status_bayar_mhs == 1){
      if ($status_regis_mhs == 1) {
        ?>
          <div class="callout callout-warning">
            <h4>Informasi !</h4>
            Anda sudah melakukan Registrasi pada Tahun Akademik ini. Silahkan cek jadwal kuliah anda.
            <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_jadwalkuliah">Halaman Jadwal Kuliah</a>
            <br>Terimakasih.
          </div>
        <?php
      }else if ($status_regis_mhs == 2) {
        ?>
          <div class="callout callout-warning">
            <h4>Informasi !</h4>
            Data Registrasi anda belum disetujui oleh admin. Silahkan cek status registrasi anda
            <a href="<?php echo base_url()?>index.php/main_controller/view_mhs_statusregistrasi">Halaman Status Registrasi</a>
            <br>Terimakasih.
          </div>
        <?php
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
                </div>
                <div class="form-row">
                  <label class="col-sm-2 from-control-label">Nama Lengkap</label>
                  <div class="col-sm-5">
                    : <?php echo $this->session->display_name;?>
                  </div>
                </div>
                <div class="form-row">
                  <label class="col-sm-2 from-control-label">IPK</label>
                  <div class="col-sm-5">
                    : <?php echo $this->session->display_name;?>
                  </div>
                </div>

                <div class="form-row">
                  <label class="col-sm-2 from-control-label">Kelas</label>
                  <div class="col-sm-5">
                    : <?php
                    $uhuy=$this->db->query('SELECT * FROM akademik_kelas WHERE id_kelas='.$this->session->id_kelas);
                    echo $uhuy->row()->nama_kelas;
                    ?>
                  </div>
                </div>
                <br>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-body">
                  <div style="padding-left: 10px">
                  <h3 style="margin-top: 10px;">Mata Kuliah Tersedia</h3>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="pan1" data-toggle="tab" href="#panetingkat1" role="tab" aria-controls="panetingkat1" aria-selected="true">Tingkat 1</a></li>
                      <li class="nav-item"><a class="nav-link" id="pan2" data-toggle="tab" href="#panetingkat2" role="tab" aria-controls="panetingkat2" aria-selected="false">Tingkat 2</a></li>
                      <li class="nav-item"><a class="nav-link" id="pan3" data-toggle="tab" href="#panetingkat3" role="tab" aria-controls="panetingkat3" aria-selected="false">Tingkat 3</a></li>
                      <li class="nav-item"><a class="nav-link" id="pan4" data-toggle="tab" href="#panetingkat4" role="tab" aria-controls="panetingkat4" aria-selected="false">Tingkat 4</a></li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                      <div id="panetingkat1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="pan1" style="padding-top: 10px">
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
                      <div id="panetingkat2" class="tab-pane fade" role="tabpanel" aria-labelledby="pan2" style="padding-top: 10px">
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
                      <div id="panetingkat3" class="tab-pane fade"  role="tabpanel" aria-labelledby="pan3" style="padding-top: 10px">
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
                      <div id="panetingkat4" class="tab-pane fade"  role="tabpanel" aria-labelledby="pan4" style="padding-top: 10px">
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

                  </div>
                    </div>
                </div>
          </div>
          <div class="col-md-6">
            <div class="box box-primary">
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
                      </table>
                      <a href="<?php echo base_url()?>index.php/main_controller/submit_temp_krs/"><i class="btn btn-primary">Submit</i></a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php
      }
    }
   ?>
</div>
