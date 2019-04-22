  
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
            <h3 class="box-title">Edit Program Studi</h3>
            
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/Prodi_update"); ?>

              <input type="hidden" class="form-control" name="id_prodi" placeholder="ID Program Studi" value="<?php echo $prodi->row()->id_prodi; ?>" readonly>

              <div class="form-group">
                <label for="" class="col-md-3">Nama Program Studi</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_prodi" placeholder="Nama Program Studi" value="<?php echo $prodi->row()->nama_prodi; ?>">
                </div>
              </div>

            <input type="submit" class="btn btn-Warning" name="update" value="Submit"></input>

            <?php echo form_close(); ?>

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


  <!-- /.content -->    
</div>