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
                    <p align="justify">Pada bagian ini menampilkan pilihan pengisian kuisioner, isi semua kuisioner dibawah untuk membantu perkembangan Stkip Yasika Majalengka dengan meng-klik "Input Kuisioner" dan akan muncul beberapa pertanyaan.</p>
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
        Pilih Kuisioner
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Kuisioner</li>
        <li class="active"> Pilih Kuisioner</li>
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
                  <h3 class="box-title">List Mata Kuliah</h3>
                </div>
                <!-- /.box-header -->
                  <div class="box-body">
                    <table id="tabelkeren" class="table  table-striped  table-hover">
                      <thead>
                      <tr>
                        <th>AKADEMIK</th>
                        <th>MATA KULIAH</th>
                        <th>KELAS</th>
                        <th>DOSEN</th>
                        <th>OPERASI</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $id_kuisioner_judul = $kuisioner_judul->row()->id_kuisioner_judul; ?>
                      <?php $i = 0; ?>
                      <?php foreach($matkul->result() as $data):?>
                      <?php $i += 1; ?>

                      <tr>
                        <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                        <td><?php echo ($data->nama_mk); ?></td>
                        <td><?php echo ($data->nama_kelas); ?></td>
                        <td><?php echo ($data->nama_lengkap); ?></td>
                        <td>
                            <a href="<?php echo base_url()?>index.php/main_controller/redirect_input_kuisioner_mhs_tipe_satu/<?php echo ($id_kuisioner_judul); ?>/<?php echo($data->id_jadwal_master); ?>/<?php echo $this->session->kode_user ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Input Kuisioner</a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>AKADEMIK</th>
                        <th>MATA KULIAH</th>
                        <th>KELAS</th>
                        <th>DOSEN</th>
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
