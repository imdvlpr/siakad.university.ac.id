  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div style="font-size: 13.5px; text-align: right;">
      <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
    </div>
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb" style="margin-top: 20px">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Mata Kuliah</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="tabelkeren" class="table  table-striped  table-hover table-striped">
              <thead>
              <tr>
                
                <th>KODE MATA KULIAH</th>
                <th>NAMA MATA KULIAH</th>
                <th>PROGRAM STUDI</th>
                <th>SKS</th>
                <th>SEMESTER</th>
                <th>TINGKAT</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              <tbody> 
              <?php $i = 0; ?>
              <?php foreach($mk->result() as $data):?>
              <?php $i += 1; ?>
                             
              <tr>
                <td><?php echo ($data->kode_mk); ?></td>
                <td><?php echo ($data->nama_mk); ?></td>
                <td><?php echo ($data->nama_prodi); ?></td>
                <td><?php echo ($data->sks_mk); ?></td>
                <?php if ($data->semester == 1) :?>
                  <td> Ganjil</td>
                <?php else: ?>
                  <td> Genap</td>
                <?php endif; ?>
                <td><?php echo ($data->tingkat); ?></td>
                <td>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_matkul/<?php echo ($data->kode_mk); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/mk_delete/<?php echo ($data->kode_mk); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>

              </tbody>
              <tfoot>
              <tr>
                
                <th>KODE MATA KULIAH</th>
                <th>NAMA MATA KULIAH</th>
                <th>PROGRAM STUDI</th>
                <th>SKS</th>
                <th>SEMESTER</th>
                <th>TINGKAT</th>
                <th id="s">OPERASI</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>


  <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Mata Kuliah Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/mk_addNew"); ?>

              <div class="form-group">
                <label for="" class="col-md-3">Kode MK</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="kode_mk" placeholder="Kode Mata Kuliah" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nama MK</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_mk" placeholder="Nama Mata Kuliah" required>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_prodi">
                    <option value="0">-- Pilih --</option>
                  <?php foreach($prodi as $data):?>
                    <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div> 

              <div class="form-group">
                <label for="" class="col-md-3">SKS MK</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="sks_mk" placeholder="SKS Mata Kuliah" required>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-md-3">Semester</label>
                <div class="col-md-9">
                  <select class="form-control" name="semester">
                    <option value="1"> Ganjil </option>
                    <option value="2"> Genap </option>
                  </select>
                </div>
              </div> 

              <div class="form-group">
                <label for="" class="col-md-3">Tingkat</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tingkat" placeholder="Tingkat" required>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        1. Tambah Mata Kuliah<br>
        Admin dapat menambahkan mata kuliah baru apabila ada mata kuliah baru dengan menambahkan informasi yang diperlukan. Mata kuliah tidak dapat ditambahkan apabila sudah ada nama mata kuliah yang sama pada program studi yang sama. <br><br>
        2. Melihat Mata Kuliah <br>
        Admin dapat melihat Mata Kuliah.<br><br>
        3. Mengubah Mata Kuliah<br>
        Admin dapat mengubah informasi mata kuliah apabila terjadi kesalahan dalam penginputan pertama ataupun apabila ada perububahan kurikulum (perubahan sks) tetapi tidak dapat merubah kode mata kuliah. <br><br>
        4. Menghapus Mata Kuliah <br>
        Admin dapat menghapus data mata kuliah apabila kondisi ini diperlukan. <br><br>
        5. Excel <br>
        Admin dapat mengunduh data mata kuliah apa saja yang ada di STKIP Yasika. 
        </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
   </section>

  <!-- /.content -->    
</div>