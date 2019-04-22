<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Kerja Nyata Mahasiswa
         <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
         <li class="active"> Kerja Nyata Mahasiswa</li>
      </ol>
   </section>
   
   <div class="content-header">
      <div class="callout callout-info">
         <h4>Informasi !</h4>
         Halaman ini dapat diakses hanya untuk mahasiswa semester 6
      </div>
   </div>

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
                     
                     <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
                  </div>
                  <div class="modal-body">
                     <p>
                        <j>Halaman ini hanya menampilkan tempat anda melaksanakan Kuliah Nyata yang sudah diatur oleh tim Prodi</j>
                        <br></br>
                        <br>
                        <j>Apabila terdapat keluhan diharapkan untuk mendatangi gedung Prodi, Terima Kasih.</j>
                        </br>
                     </p>
                  </div>
                  <div class="modal-footer">
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
         <div class="row">
            <!-- left colum -->
            <div class="col-md-20">
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <h3 class="box-title">Kuliah Nyata Mahasiswa</h3>
                  </div>
                  <form class="form-horizontal">
                     <div class="box-body">
                        <div class="form-row">
                           <label class="col-sm-3 from-control-label">NIM</label>
                           <p>: <?php echo $this->session->kode_user ?></p>
                           <div class="col-sm-5">
                           </div>
                        </div>
                        <div class="form-row">
                           <label class="col-sm-3 from-control-label">Nama Lengkap</label>
                           <p>: <?php echo $this->session->display_name ?></p>
                           <div class="col-sm-5">
                           </div>
                        </div>
                        <div class="form-row">
                           <label class="col-sm-3 from-control-label">Tahun Akademik</label>
                           <p>: <?php echo (substr($tahun_ak_open, 0,4)); echo "-"; echo substr($tahun_ak_open, -1);?></p>
                           <div class="col-sm-5">
                           </div>
                        </div>
                        <div class="form-row">
                           <label class="col-sm-3 from-control-label">Semester</label>
                          <p>: </p>
                           <div class="col-sm-5">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
   </section>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <!-- left colum -->
            <div class="col-md-20">
               <div class="box box-primary">
                  <form class="form-horizontal">
                     <div class="box-body">
                        <div class="form-row">
                           <label class="col-sm-3 from-control-label">Ditempatkan di</label><p>: Telkom University</p>
                           <div class="col-sm-5">
                           </div>
                        </div>
                     <div class="form-row">
                        <label class="col-sm-3 from-control-label">Alamat KNM</label><p>: Jln Telekomunikasi No.55 Kabupaten Bandung</p>
                        <div class="col-sm-5">
                        </div>
                     </div>
                     <div class="form-row">
                        <label class="col-sm-3 from-control-label">Pembimbing Kerja Nyata</label><p>: Bpk. Wahyu S.K</p>
                        <div class="col-sm-5">
                        </div>
                     </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.row -->
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->