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
                    <p align="justify">Pada halaman ini anda <b>wajib</b> mengisi kuisioner setiap sebelum UTS dan UAS. Apbila anda tidak mengisi kuisioner maka anda tidak akan mendapatkan jadwal ujian UTS maupun UAS. Klik tombol "Input Kuisioner" disebelah kanan anda untuk melakukan pengisian kuisioner.</p>
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
        Kuisioner
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Kuisioner</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->

            <div class="col-xs-20">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Daftar Kuisioner</h3>
                  </div>
                <!-- /.box-header -->
                  <div class="box-body">
                    <table id="tabelkeren" class="table  table-striped  table-hover">
                      <thead>
                      <tr>
                        <th>NO</th>
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
                        <th>NO</th>
                        <th>AKADEMIK</th>
                        <th>JUDUL</th>
                        <th>OPERASI</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
            </div>
          </div>
    </section>
</div>
