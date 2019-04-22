<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div style="font-size: 13.5px; text-align: right;">
        <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
      </div>
      <h1>
        Lihat Pertanyaan Kuisioner
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb" style="margin-top: 20px">
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

              <h3 class="box-title" style="margin-top: 10px;">Keterangan Kuisioner</h3>
                <div class="box box-primary">

                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($kuisioner_judul->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner_judul->row()->keterangan, -1);?></p>
                      <label class="col-sm-1 from-control-label">Judul</label><p>: <?php echo ($kuisioner_judul->row()->judul); ?></p>
                    </div>
                  </div>
                </form>
              </div>

              <h3 class="box-title" style="margin-top: 10px;">List Pertanyaan Kuisioner</h3>

                <div class="box box-primary">
                  <div class="box-header">
                    
                    <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
                  </div>
                  <form class="form-horizontal">
                  <div class="box-body">
                    <table id="tabelkeren" class="table  table-striped  table-hover">
                      <thead>
                      <tr>
                        <th>NO</th>
                        <th>PERTANYAAN</th>
                        <th id="s">OPERASI</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 0; ?>
                      <?php foreach($kuisioner_pertanyaan->result() as $data):?>
                      <?php $i += 1; ?>

                      <tr>
                        <td><?php echo ($i); ?></td>
                        <td><?php echo ($data->pertanyaan); ?></td>
                        <td>
                          <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_kuisioner_pertanyaan/<?php echo ($data->id_kuisioner_pertanyaan); ?>/<?php echo($kuisioner_judul->row()->id_kuisioner_judul); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                          <a href="<?php echo base_url()?>index.php/main_controller/pertanyaan_kuisioner_delete/<?php echo ($data->id_kuisioner_pertanyaan); ?>/<?php echo($kuisioner_judul->row()->id_kuisioner_judul); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>NO</th>
                        <th>PERTANYAAN</th>
                        <th id="s">OPERASI</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                </form>
              </div>

            </div>
          </div>

    </section>

    <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Pertanyaan Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/pertanyaan_kuisioner_addNew"); ?>

              <input type="hidden" class="form-control" name="id_kuisioner_judul" value="<?php echo $kuisioner_judul->row()->id_kuisioner_judul; ?>" readonly>

              <div class="form-group">
                <label for="" class="col-md-3"> Pertanyaan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pertanyaan_kuisioner" placeholder="Pertanyaan Kuisioner" required>
                </div>
              </div>

              <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-footer">
            </div>
            <?php echo form_close(); ?>
            </div>
          </div>
        </div>


  </section>
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
         Admin dapat mengolah kuisioner
        </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
   </section>

</div>
