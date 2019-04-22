<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
      Input Nilai
      <small>Jadwal Mengajar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#"> Nilai</a></li>
      <li class="active"> Input Nilai</li>
    </ol>
  </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- left colum -->

         <!-- File yang diupload berupa excel dan di upload pada admin -->
<!-- MATA KULIAH DIPILIH -->
      <h3 class="box-title" style="margin-top: 10px;">Daftar Mahasiswa</h3>
      <div class="box box-primary ">
        <!-- /.box-header -->
          <div class="box-body">
            <div style="padding-left: 10px">

            <form>
            <table id="tabelkeren" class="table table-bordered table-striped">
              <thead>
                <th>#</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kelas</th>
                <th>Nama Mata Kuliah</th>
                <th>Kode Mata Kuliah</th>
                <th id='s' style="width: 15px">A</th>
                <th id='s' style="width: 15px">AB</th>
                <th id='s' style="width: 15px">B</th>
                <th id='s' style="width: 15px">BC</th>
                <th id='s' style="width: 15px">C</th>
                <th id='s' style="width: 15px">D</th>
                <th id='s' style="width: 15px">E</th>
              </thead>
              <tbody>
                <?php $i = 0; ?>
                <?php foreach($mhs->result() as $data):?>
                <?php $i += 1; ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data->nim; ?></td>
                <td><?php echo $data->nama;?></td>
                <td><?php echo $data->nama_kelas; ?></td>
                <td><?php echo $data->nama_mk; ?></td>
                <td><?php echo $data->kode_mk; ?></td>
                <td><center><input type="radio" name="Nilai" value="A"></center></td>
                <td><center><input type="radio" name="Nilai" value="AB"></center></td>
                <td><center><input type="radio" name="Nilai" value="B"></center></td>
                <td><center><input type="radio" name="Nilai" value="BC"></center></td>
                <td><center><input type="radio" name="Nilai" value="C"></center></td>
                <td><center><input type="radio" name="Nilai" value="D"></center></td>
                <td><center><input type="radio" name="Nilai" value="E"></center></td>
              </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
              <button type="submit" class="btn btn">Edit</button>
              <button type="submit" class="btn btn-primary">Submit Nilai</button>
            </form>
            </div>
          </div>
        <!-- /.box-body -->
      </div>
    <!-- AKHIR MATA KULIAH DIPILIH -->




        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
