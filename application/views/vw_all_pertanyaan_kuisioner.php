<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Akademik</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
        <div class="input-group-prepend">

        </div>


        <span id="date_time"></span>
        <script type="text/javascript">window.onload = date_time('date_time');</script>
      </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="col-md-20">

  <h3 class="box-title" style="margin-top: 10px;">Keterangan Kuisioner</h3>
  <div class="box box-primary">
    <form class="form-horizontal">
      <div class="box-body">
        <div class="form-row">
          <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($kuisioner_judul->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner_judul->row()->keterangan, -1);?></p>
          <label class="col-sm-1 from-control-label">Judul</label><p>: <?php echo ($kuisioner_judul->row()->judul); ?></p>
        </div>
      </div>
    </form>
  </div>
</div>
<hr>
<div class="col" style="overflow: auto;">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">List Pertanyaan Kuisioner</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>#</th>
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
      <th>#</th>
      <th>PERTANYAAN</th>
      <th id="s">OPERASI</th>
    </tr>
    </tfoot>
  </table>
</div>

    <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title" id="myModalLabel">Tambah Pertanyaan Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/pertanyaan_kuisioner_addNew"); ?>

              <input type="hidden" class="form-control" name="id_kuisioner_judul" value="<?php echo $kuisioner_judul->row()->id_kuisioner_judul; ?>" readonly>

              <div class="form-row">
                <label for="" class="col-md-3"> Pertanyaan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pertanyaan_kuisioner" placeholder="Pertanyaan Kuisioner" required>
                </div>
              </div>

              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-success" name="addnew" value="Submit"></input>

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

        <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
       </div>
       <div class="modal-body">
        <div>
         Admin dapat mengolah kuisioner
        </div>
       </div>
       <div class="modal-footer">

       </div>
      </div>
     </div>
    </div>
   </section>

</div>
