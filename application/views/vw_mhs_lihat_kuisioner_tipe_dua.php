<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Lihat Kuisioner
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
                <h3 class="box-title" style="margin-top: 10px;">Keterangan Mahasiswa</h3>
                <div class="box box-primary">

                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-1 from-control-label">NIM</label><p>: <?php echo $this->session->kode_user ?></p>
                      <label class="col-sm-1 from-control-label">Nama Lengkap</label><p>: <?php echo $this->session->display_name ?></p>
                    </div>
                  </div>
                </form>
              </div>

              <h3 class="box-title" style="margin-top: 10px;">Keterangan Kuisioner</h3>
                <div class="box box-primary">

                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($kuisioner->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner->row()->keterangan, -1);?></p>
                      <label class="col-sm-1 from-control-label">Judul</label><p>: <?php echo $kuisioner->row()->judul;?></p>
                    </div>
                  </div>
                </form>
              </div>

              <h3 class="box-title" style="margin-top: 10px;">List Pertanyaan</h3>
                <div class="box box-primary">
                <form class="form-horizontal">
                  <div class="box-body">
                    <div style="padding-left: 10px">
                      <form>
                      <table class="table table-bordered" id="">
                        <thead>
                        <tr>
                          <th style="width: 13px">No</th>
                          <th style="width: 15px">Pertanyaan</th>
                          <th style="width: 13px"><center>Sangat Setuju</center></th>
                          <th style="width: 13px"><center>Setuju</center></th>
                          <th style="width: 13px"><center>Tidak Setuju</center></th>
                          <th style="width: 13px"><center>Sangat Tidak Setuju</center></th>
                        </tr>
                        </thead>

                        <tbody>
                          <?php $i = 0; ?>
                          <?php foreach($kuisioner->result() as $data):?>
                          <?php $i += 1; ?>
                            <tr>
                              <td><?php echo ($i);?></td>
                              <td><?php echo ($data->pertanyaan);?></td>
                              <?php if($data->hasil == 1) : ?>
                                <td><center><input type="radio" value="1" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" value="1" disabled></center></td>
                              <?php endif; ?>
                              <?php if($data->hasil == 2) : ?>
                                <td><center><input type="radio" value="2" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" value="2" disabled></center></td>
                              <?php endif; ?>
                              <?php if($data->hasil == 3) : ?>
                                <td><center><input type="radio" value="3" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" value="3" disabled></center></td>
                              <?php endif; ?>
                              <?php if($data->hasil == 4) : ?>
                                <td><center><input type="radio" value="4" checked></center></td>
                              <?php else : ?>
                                <td><center><input type="radio" value="4" disabled></center></td>
                              <?php endif; ?>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>

                      </table>
                      </form>
                      </div>
                  </div>
                </form>
              </div>

            </div>
          </div>

    </section>
</div>
