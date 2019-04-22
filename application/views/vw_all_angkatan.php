  
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
            <h3 class="box-title">Tabel Angkatan</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>
                
                <th>TAHUN ANGKATAN</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              <?php foreach($angkatan->result() as $d):?>
              <?php $i += 1; ?>
                              
              <tr>
                
                <td><?php echo ($d->tahun); ?></td>
                <td>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_angkatan/<?php echo ($d->id_angkatan); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                </td>
              </tr>
              
              <?php endforeach; ?>
              </tbody>
              <tfoot>

              <tr>
                
                <th>TAHUN ANGKATAN</th>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Tahun Angkatan Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/Angkatan_addNew"); ?>
              <div class="form-group">
                <label for="" class="col-md-3">Tahun Angkatan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tahun" placeholder="Tahun Angkatan" required>
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
        1. Tambah Tahun Angkatan <br>
        Admin dapat menambahkan angkatan jika nanti ada angkatan mahasiswa baru. <br><br>
        2. Melihat Tahun Angkatan <br>
        Admin dapat melihat tahun angkatan.<br><br>
        3. Mengubah Tahun Angkatan<br>
        Admin dapat mengubah tahun angkatan jika ini diperlukan. <br><br>
        4. Menghapus Tahun Angkatan <br>
        dapat menghapus tahun angkatan jika ini diperlukan.
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