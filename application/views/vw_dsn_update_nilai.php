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
                     <p align="justify">Silahkan masukkan penilaian anda pada tabel dibawah ini. Ketika sudah selesai, klik tombol <b>"Submit"</b></p>
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
        Update Nilai
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"> Nilai</li>
        <li class="active"> Update Nilai</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->
              <div class="col-md-20">

            <div class="box box-primary">
              <div class="box-header">
              <h3 class="box-title">Keterangan Mata Kuliah</h3>
                </div>

                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($jadwal->row()->keterangan, 0,4)); echo "-"; echo substr($jadwal->row()->keterangan, -1);?></p>
                      <label class="col-sm-2 from-control-label">Kode Mata Kuliah</label><p>: <?php echo ($jadwal->row()->kode_mk); ?></p>
                      <label class="col-sm-2 from-control-label">Nama Mata Kuliah</label><p>: <?php echo ($jadwal->row()->nama_mk); ?></p>
                      <label class="col-sm-2 from-control-label">Kelas</label><p>: <?php echo ($jadwal->row()->nama_kelas); ?></p>
                    </div>
                  </div>
                </form>
              </div>

              <?php echo form_open("main_controller/nilai_update"); ?>
              <div class="box box-primary">
                <div class="box-header">
              <h3 class="box-title">Daftar Mahasiswa</h3>
                </div>
                <form class="form-horizontal">
                  <div class="box-body">
                    <div style="padding-left: 10px">
                      <form>
                      <table class="table table-bordered" id="tabelkeren">
                        <thead>
                        <tr>
                          <th id='s'style="width: 13px ">No</th>
                          <th style="width: 15px">NIM</th>
                          <th style="width: 350px">Nama Mahasiswa</th>
                          <th id='s' style="width: 15px"><center>A</center></th>
                          <th id='s' style="width: 15px"><center>AB</center></th>
                          <th id='s' style="width: 15px"><center>B</center></th>
                          <th id='s' style="width: 15px"><center>BC</center></th>
                          <th id='s' style="width: 15px"><center>C</center></th>
                          <th id='s' style="width: 15px"><center>D</center></th>
                          <th id='s' style="width: 15px"><center>E</center></th>
                        </tr>
                        </thead>

                        <tbody>
                          <?php $i = 0; ?>
                          <?php foreach($mhs->result() as $data):?>
                          <?php $i += 1; ?>
                            <tr>
                              <td><?php echo ($i);?></td>
                              <td><?php echo ($data->nim);?></td>
                              <td><?php echo ($data->nama);?></td>
                              <?php if($data->nilai == "A") : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="A" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="A"></center></td>
                              <?php endif; ?>
                              <?php if($data->nilai == "AB") : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="AB" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="AB"></center></td>
                              <?php endif; ?>
                              <?php if($data->nilai == "B") : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="B" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="B"></center></td>
                              <?php endif; ?>
                              <?php if($data->nilai == "BC") : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="BC" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="BC"></center></td>
                              <?php endif; ?>
                              <?php if($data->nilai == "C") : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="C" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="C"></center></td>
                              <?php endif; ?>
                              <?php if($data->nilai == "D") : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="D" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="D"></center></td>
                              <?php endif; ?>
                              <?php if($data->nilai == "E") : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="E" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="E"></center></td>
                              <?php endif; ?>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>

                      </table>
                        <input type="hidden" class="form-control" name="id_jadwal_master" value="<?php echo $mhs->row()->id_jadwal_master; ?>" readonly>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      </div>
                  </div>
                </form>
              </div>
              <?php echo form_close(); ?>

            </div>
          </div>

    </section>
</div>
