<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Hasil Kuisioner</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
        <div class="input-group-prepend">

        </div>


        <span id="date_time"></span>
        <script type="text/javascript">window.onload = date_time('date_time');</script>
      </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-20">
      <h3 class="box-title" style="margin-top: 10px;">Pilih Tipe Kuisioner</h3>
      <div class="box box-primary">
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-row">
              <a href="<?php echo base_url()?>index.php/main_controller/view_pilih_tipe_kuisioner_tipe_satu/" class="btn btn-sm"><i class="fa fa-edit"></i> Tipe Satu</a>
              <a href="<?php echo base_url()?>index.php/main_controller/redirect_tipe_kuisioner/" class="btn btn-sm"><i class="fa fa-trash"></i> Tipe Dua</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
