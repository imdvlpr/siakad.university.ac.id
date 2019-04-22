<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li class="active">Akun</li>
        <li class="active">Ubah Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-20">
            <!-- data form elements -->
            
               <!-- box-header  -->
               <!-- from start -->
              <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Ubah Password</h3>
              </div> 
               <!-- box-header  -->
               <!-- from start -->
              <?php echo form_open("main_controller/changepass"); ?>
               <div class="box-body">
                  <div class="form-group">
                     <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                     </table>
                     <label class="col-sm-3 from-control-label">Password Lama</label>
                     <div class="col-sm-5">
                        <input type="password" name="pwd_old" class="form-control" placeholder="ketik disini...">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 from-control-label">Password Baru</label>
                     <div class="col-sm-5">
                        <input type="password" name="pwd_new1" class="form-control" placeholder="ketik disini...">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-3 from-control-label">Masukkan Password Baru Kembali</label>
                     <div class="col-sm-5">
                        <input type="password" name="pwd_new2" class="form-control" placeholder="ketik disini...">
                     </div>
                  </div>
                  <!-- Box Body -->
                  <div class="card-footer">
                     <input type="submit" class="btn btn-info"></button>
                  </div>
               </div>
            <?php echo form_close(); ?> 

            </div>
            <!-- Box -->
          
      </div>
    </section>
</div>
              





