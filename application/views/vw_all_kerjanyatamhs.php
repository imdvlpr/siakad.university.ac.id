
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
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
            <h3 class="box-title">Tabel Program Studi</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>
                
                <th>NAMA PROGRAM STUDI</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              
              
              <tbody> 
              <?php $i = 0; ?>
              <?php foreach($prodi as $data):?>
              <?php $i += 1; ?>               
              <tr>
                
                <td><?php echo ($data['nama_prodi']); ?></td>
                <td>
                  <a class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_prodi/<?php echo ($data['id_prodi']); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/prodi_delete/<?php echo ($data['id_prodi']); ?>"class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>

              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                
                <th>NAMA PROGRAM STUDI</th>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Dosen Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/Prodi_addNew"); ?>
              <div class="form-group">
                <label for="" class="col-md-3">Nama Prodi</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_prodi" placeholder="Nama Program Studi" required>
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
  <!-- /.content -->    
</div>