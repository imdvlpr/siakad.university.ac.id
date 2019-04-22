<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Input Nilai
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Jadwal</li>
        <li class="active"> Jadwal Dosen</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->
              <div class="col-md-20">

              <?php
              if ($mhs->num_rows()>0) {
                ?>
                <h3 class="box-title" style="margin-top: 10px;">Keterangan Mata Kuliah</h3>
                  <div class="box box-primary">

                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($mhs->row()->keterangan, 0,4)); echo "-"; echo substr($mhs->row()->keterangan, -1);?></p>
                        <label class="col-sm-1 from-control-label">Kode Mata Kuliah</label><p>: <?php echo ($mhs->row()->kode_mk); ?></p>
                        <label class="col-sm-1 from-control-label">Nama Mata Kuliah</label><p>: <?php echo ($mhs->row()->nama_mk); ?></p>
                        <label class="col-sm-1 from-control-label">Kelas</label><p>: <?php echo ($mhs->row()->nama_kelas); ?></p>
                      </div>
                    </div>
                  </form>
                </div>

                <?php echo form_open("main_controller/nilai_addNew"); ?>
                <h3 class="box-title" style="margin-top: 10px;">Daftar Mahasiswa</h3>
                  <div class="box box-primary">
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div style="padding-left: 10px">
                        <form>
                        <table id='tabelkeren' class="table table-bordered" id="tabelkeren">
                          <thead>
                          <tr>
                            <th id='s' style="width: 13px ">No</th>
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
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="A"></center></td>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="AB"></center></td>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="B"></center></td>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="BC"></center></td>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="C"></center></td>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="D"></center></td>
                                <td><center><input type="radio" name="<?php echo $data->nim; ?>" value="E" checked></center></td>
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
                <?php
              }else{
                ?>
                <div class="callout callout-info">
                  <h4>Informasi !</h4>
                  Tidak ada mahasiswa yang terdaftar pada jadwal ini.

                  <br>Terimakasih.
                </div>
                <?php
              } ?>


            </div>
          </div>

    </section>
</div>
