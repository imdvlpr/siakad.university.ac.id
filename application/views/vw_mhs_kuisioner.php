<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Kuisioner</h6>
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
        <h4 class="title-content">Daftar Kuisioner</h4>
      </div>

      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>AKADEMIK</th>
        <th>JUDUL</th>
        <th>OPERASI</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0; ?>
      <?php foreach($judul_kuisioner->result() as $data):?>
      <?php $i += 1; ?>
    <tr>
      <td><?php echo ($i); ?></td>
      <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
      <td><?php echo ($data->judul); ?></td>
      <td>
          <a href="<?php echo base_url()?>index.php/main_controller/redirect_input_kuisioner_mhs/<?php echo ($data->id_kuisioner_judul); ?>/<?php echo $this->session->kode_user ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Input Kuisioner</a>
      </td>
    </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>#</th>
      <th>AKADEMIK</th>
      <th>JUDUL</th>
      <th>OPERASI</th>
    </tr>
    </tfoot>
  </table>
</div>


<section class="content-popup">
      <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">

                  <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
               </div>
               <div class="modal-body">
                  <div>
                    <p align="justify">Pada halaman ini anda <b>wajib</b> mengisi kuisioner setiap sebelum UTS dan UAS. Apbila anda tidak mengisi kuisioner maka anda tidak akan mendapatkan jadwal ujian UTS maupun UAS. Klik tombol "Input Kuisioner" disebelah kanan anda untuk melakukan pengisian kuisioner.</p>
                  </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>

          <?php echo form_close(); ?>
      </div>


   </section>
