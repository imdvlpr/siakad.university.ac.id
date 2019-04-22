<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Registrasi Matakuliah</h6>
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
  <!-- <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Statu Registrasi</h4>
      </div>
    </div>
  </div> -->

  <div class="col-md-20">
    <div class="box box-primary">

      <div class="row">
        <div class="col">
          <h3 class="title-content"> Mutasi Pembayaran</h3>
        </div>
        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right mr-1" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search ml-1"></i></button>
            </div>
          </div>
        </div>



      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th>Semester</th>
            <th>Tanggal Upload Pembayaran</th>
            <th>Status Pembayaran</th>
            <!-- <th>Reason</th> -->
          </tr>
          <tr>
            <td>1</td>
            <td> Semester 1</td>
            <td> 10-06-2018</td>
            <td><span class="label label-success">Lunas</span></td>
            <!-- <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> -->
          </tr>
          <tr>
            <td>2</td>
            <td>Semester 2</td>
            <td> - </td>
            <td><span class="label label-warning">Segera Dibayar</span></td>
            <!-- s<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> -->
          </tr>
          <tr>
          <tr>
            <td>3</td>
            <td>Semester 3</td>
            <td> - </td>
            <td><span class="label label-danger">Pembayaran Telah Lewat</span></td>
            <!-- <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> -->
          </tr>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
