<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Kehadiran Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>index.php/main_controller/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Registrasi</li>
        <li class="active">Input Kehadiran Mahasiswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <form class="form-horizontal">
        <div class="box-body">

            <div class="form-group">
                  <label class="col-sm-3 from-control-label">Mata Kuliah</label>
                    <div  class="col-sm-2">
                      <select class= "form-control" > 
                        <option>- Pilih -</option>                     
                        <option>Tata Tulis</option>
                        <option>Teori</option>
                        <option>Bahasa</option>
                        <option>Sastra</option>
                      </select>
                    </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 from-control-label">Kelas</label>
                    <div  class="col-sm-2">
                      <select class= "form-control" >
                        <option>- Pilih -</option>
                        <option>IF39-11</option>
                        <option>IF39-12</option>                        
                      </select>
                    </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 from-control-label">Waktu</label>
                    <div  class="col-sm-2">
                      <select class= "form-control" >
                        <option>- Pilih - </option>
                        <option>08.00-10.00</option>
                        <option>10.00-11.00</option>                        
                      </select>
                    </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 from-control-label">Hari</label>
                    <div  class="col-sm-2">
                      <select class= "form-control" >
                        <option>- Pilih -</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                      </select>
                    </div>
                </div> 
          </div>       
        <!-- /.box-body -->   
        </form>     
      </div>
      <!-- AKHIR MATA KULIAH TERSEDIA -->

      <!-- MATA KULIAH DIPILIH -->
      <h3 class="box-title" style="margin-top: 10px;">Mata Kuliah Dipilih</h3>
      <div class="box box-primary ">
        <!-- /.box-header -->
          <div class="box-body">
            <div style="padding-left: 10px">
            
            <form>
            <table class="table table-bordered" id="">
              <thead>
              <tr>
                <th style="width: 13px">No</th>
                <th style="width: 15px">NIM</th>
                <th style=" width: 350px">Nama Mahasiswa</th>
                <th style="width: 150px">Kelas</th>
                <th style="width: 50px">Ruangan</th>
                <th style="width: 13px"><center>Hadir</center></th>
                <th style="width: 13px"><center>Sakit</center></th>
                <th style="width: 13px"><center>Sakit</center></th>
                <th style="width: 13px"><center>Alfa</center></th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>1301154402</td>
                <td>Zakki Farhan</td>
                <td>IF39-11</td>
                <td>KU1.1.1</td>
                <form>
                <td><center><input type="radio" name="Presensi" value="Hadir"></center></td>
                <td><center><input type="radio" name="Presensi" value="Sakit"></center></td>
                <td><center><input type="radio" name="Presensi" value="Ijin"></center></td>
                <td><center><input type="radio" name="Presensi" value="Alfa"></center></td>
              </form>
              </tr>
              <tr>
                <td>2</td>
                <td>1301154401</td>
                <td>Wahyu Mustofa</td>
                <td>IF39-11</td>
                <td>KU1.1.1</td>
                <form>
                <td><center><input type="radio" name="Presensi" value="Hadir"></center></td>
                <td><center><input type="radio" name="Presensi" value="Sakit"></center></td>
                <td><center><input type="radio" name="Presensi" value="Ijin"></center></td>
                <td><center><input type="radio" name="Presensi" value="Alfa"></center></td>
              </form>
              </tr>
              <tr>
                <td>3</td>
                <td>1301154400</td>
                <td>Oki Pratama</td>
                <td>IF39-11</td>
                <td>KU1.1.1</td>
                <form>
                <td><center><input type="radio" name="Presensi" value="Hadir"></center></td>
                <td><center><input type="radio" name="Presensi" value="Sakit"></center></td>
                <td><center><input type="radio" name="Presensi" value="Ijin"></center></td>
                <td><center><input type="radio" name="Presensi" value="Alfa"></center></td>
              </form>
              </tr>
              <tr>
                <td>4</td>
                <td>1301154404</td>
                <td>Roky Sungkan</td>
                <td>IF39-11</td>
                <td>KU1.1.1</td>
                <form>
                <td><center><input type="radio" name="Presensi" value="Hadir"></center></td>
                <td><center><input type="radio" name="Presensi" value="Sakit"></center></td>
                <td><center><input type="radio" name="Presensi" value="Ijin"></center></td>
                <td><center><input type="radio" name="Presensi" value="Alfa"></center></td>
              </form>
              </tr>
              </tbody>
            </table>
              <button type="submit" class="btn btn">Edit</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
          </div>        
        <!-- /.box-body -->
      </div>
    <!-- AKHIR MATA KULIAH DIPILIH -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
