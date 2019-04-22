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
                     <p align="justify">Isi setiap pertanyaannya ya!</p>
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
        Lihat / Isi Kuisioner
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Kuisioner</li>
        <li class="active"> Pilih Kuisioner</li>
        <li class="active"> Lihat / Isi Kuisioner</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->
              <div class="col-md-20">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" style="font-size: 20px">Keterangan Kuisioner</h3>
                </div>              
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($kuisioner->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner->row()->keterangan, -1);?></p>
                      <label class="col-sm-1 from-control-label">Judul</label><p>: <?php echo $kuisioner->row()->judul;?></p>
                    </div>
                  </div>
                </form>
              </div>
                
                 <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title" style="font-size: 20px;">Keterangan Mata Kuliah</h3>
                  </div>
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($kuisioner->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner->row()->keterangan, -1);?></p>
                        <label class="col-sm-1 from-control-label">Mata Kuliah</label><p>: <?php echo $kuisioner->row()->nama_mk;?></p>
                        <label class="col-sm-1 from-control-label">Kelas</label><p>: <?php echo $kuisioner->row()->nama_kelas;?></p>
                        <label class="col-sm-1 from-control-label">Dosen</label><p>: <?php echo $kuisioner->row()->nama_lengkap;?></p>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title" style="font-size: 20px;">List Pertanyaan</h3>
                  </div>
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
