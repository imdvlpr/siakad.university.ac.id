<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Profil</h6>
        <h2>Preview</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
          <span id="date_time"></span>
          <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="col">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Ubah Password</h4>
      </div>
    </div>
  </div>
  <br>
  <?php echo form_open("main_controller/changepass"); ?>
   <div class="box-body">
      <div class="form-row">
         <!-- <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">asdasdasd
         </table> -->
         <label class="col-sm-3 from-control-label">Password Lama</label>
         <div class="col-sm-12">
            <input type="password" name="pwd_old" class="form-control" placeholder="ketik disini...">
         </div>
      </div>
      <div class="form-row">
         <label class="col-sm-3 from-control-label">Password Baru</label>
         <div class="col-sm-12">
            <input type="password" name="pwd_new1" class="form-control" placeholder="ketik disini...">
         </div>
      </div>
      <div class="form-row">
         <label class="col-sm-3 from-control-label">Ulangi Password Baru</label>
         <div class="col-sm-12">
            <input type="password" name="pwd_new2" class="form-control" placeholder="ketik disini...">
              <input type="submit" value="Ubah"  style="float:right; "class="btn btn-info float-right col-lg-2"></button>
          </div>
      </div>

      <div class="card-footer">

      </div>
   </div>
<?php echo form_close(); ?>



</div>
