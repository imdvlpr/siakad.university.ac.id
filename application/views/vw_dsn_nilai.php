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
                    <p align="justify">Pada halaman ini, anda dapat menginput nilai mahasiswa. Nilai yang diinputkan berupa nilai akhir(Indeks NIlai). Anda hanya dapat menginput nilai hanya pada mahasiswa yang anda ajar. Klik <b>Ubah Nilai</b> pada kolom "operasi". kemudian isi nilai mahasiswa.
                    <br></br>
                    <br><font style="color: red">Perhatian!</font></br>
                    <br>Nilai yang diinputkan akan dikelola oleh bagian administrasi, hal ini bertujuan untuk menghindari kecurangan penginputan nilai.</br>
                    </p>
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
        NIlai
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Nilai</li>
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
                    <h3 class="box-title">Daftar Kelas</h3>
                  </div>
                <!-- /.box-header -->
                  <div class="box-body">
                    <table id="tabelkeren" class="table  table-striped  table-hover">
                      <thead>
                      <tr>
                        <th>AKADEMIK</th>
                        <th>MATA KULIAH</th>
                        <th>KELAS</th>
                        <th>OPERASI</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 0; ?>
                      <?php foreach($jadwal_dosen->result() as $data):?>
                      <?php $i += 1; ?>

                      <tr>
                        <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                        <td><?php echo ($data->nama_mk); ?></td>
                        <td><?php echo ($data->nama_kelas); ?></td>
                        <td>
                          <?php if($data->nilai_is_filled == 0) : ?>
                            <a href="<?php echo base_url()?>index.php/main_controller/redirect_input_nilai/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Input Nilai</a>
                          <?php else : ?>
                            <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_nilai/<?php echo ($data->id_jadwal_master); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah Nilai</a>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>AKADEMIK</th>
                        <th>MATA KULIAH</th>
                        <th>KELAS</th>
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
