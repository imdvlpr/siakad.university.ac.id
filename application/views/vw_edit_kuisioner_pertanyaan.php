  
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
            <h3 class="box-title">Edit Pertanyaan Kuisioner</h3>
            
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/kuisioner_pertanyaan_update"); ?>
                  
              <input type="hidden" class="form-control" name="id_kuisioner_judul" value="<?php echo $kuisioner_judul->row()->id_kuisioner_judul; ?>" readonly>
              <input type="hidden" class="form-control" name="id_kuisioner_pertanyaan" value="<?php echo $kuisioner_pertanyaan->row()->id_kuisioner_pertanyaan; ?>" readonly>

              <div class="form-group">
                <label for="" class="col-md-3"> Pertanyaan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pertanyaan_kuisioner" value="<?php echo $kuisioner_pertanyaan->row()->pertanyaan ?>" required>
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