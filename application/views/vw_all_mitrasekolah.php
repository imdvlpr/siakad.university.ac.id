
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Mitra Sekolah</a></li>
    </ol>
  </section>

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
                  <div>
                     <j>Halaman ini admin dapat menambah, edit, hapus data mitra sekolah. Setiap semester 6, admin dapat menentukan penempatan Kerja Nyata untuk mahasiswa.</j>
                  </div>
               </div>
               <div class="modal-footer">
                  
               </div>
            </div>
         </div>
      </div>
   </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Tabel Mitra Sekolah</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="example" class="table  table-striped  table-hover">
              <thead>
              <tr>
                
                <th id="s">Nama Mitra Sekolah </th>
                <th id="s">Alamat</th>
                <th id="s">Kuota</th>
                <th id="s">Penanggung Jawab</th>
                <th></th>
              </tr>
              </thead>
              
              <tbody>           
              <tr>
                <td>SMA 1 Cirebon</td>
                <td>Jln Cirebon</td>
                <td>3</td>
                <td>Bpk. Fazrian S.ip</td>
                <td>
                  <a class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                  <a class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <tr>
                <td>SMA 1 Malang</td>
                <td>Jln Malang</td>
                <td>3</td>
                <td>Bpk. Wahyu S.ip</td>
                <td>
                  <a class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                  <a class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <tr>
                <td>SMA 1 Bali</td>
                <td>Jln Bali</td>
                <td>3</td>
                <td>Bpk. Denny S.ip</td>
                <td>
                  <a class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                  <a class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th id="s">Nama Mitra Sekolah </th>
                <th id="s">Alamat</th>
                <th id="s">Penanggung Jawab</th>
                <th></th>
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
              
              <h4 class="modal-title" id="myModalLabel">Tambah Dosen Baru</h4>
            </div>
            <div class="modal-body">
              <div class="form-row">
                <label for="" class="col-md-3">Nama Mitra</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="" placeholder="Nama Mitra" required>
                </div>
              </div>
              <div class="form-row">
                <label for="" class="col-md-3">Alamat</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="" placeholder="Alamat" required>
                </div>
              </div>
              <div class="form-row">
                <label for="" class="col-md-3">Kuota</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="" placeholder="Kuota" required>
                </div>
              </div>
              <div class="form-row">
                <label for="" class="col-md-3">Penanggung Jawab</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="" placeholder="Penanggung Jawab" required>
                </div>
              </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-success" name="addnew" value="Submit"></input>
              
            </div>
            </div>
          </div>
        </div>
    
  </section>
  <!-- /.content -->    
</div>