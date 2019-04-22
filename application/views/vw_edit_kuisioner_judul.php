  
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
            <h3 class="box-title">Edit Judul Kuisioner</h3>
            
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <?php echo form_open("main_controller/kuisioner_judul_update"); ?>
                  
              <input type="hidden" class="form-control" name="id_kuisioner_judul" value="<?php echo $kuisioner_judul->row()->id_kuisioner_judul; ?>" readonly>

              <div class="form-row">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_tahun_akademik">
                    <option value="<?php echo ($kuisioner_judul->row()->id_tahun_akademik);?>"><?php echo (substr($kuisioner_judul->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner_judul->row()->keterangan, -1);?></option>
                    <?php foreach($tahun_akademik->result() as $data):?>
                      <option value="<?php echo $data->tahun_akademik_id; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Tipe</label>
                <div class="col-md-9">
                  <select class="form-control" name="tipe">
                    <?php if($kuisioner_judul->row()->tipe == 1) : ?>
                      <option value="1"> 1</option>
                      <option value="2"> 2</option>
                    <?php else : ?>
                      <option value="2"> 2</option>
                      <option value="1"> 1</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Judul Kuisioner</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="judul_kuisioner" placeholder="Judul Kuisioner" value="<?php echo $kuisioner_judul->row()->judul ?>" required>
                </div>
              </div>

            <input type="submit" class="btn btn-success" name="update" value="Submit"></input>

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