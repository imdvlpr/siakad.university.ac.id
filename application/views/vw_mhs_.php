  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
            <h3 class="box-title">Tabel Mahasiswa</h3>
            <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
          </div>
          <!-- /.box-header -->


          <div class="box-body">
            <table id="example2" class="table  table-striped  table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>ANGKATAN</th>                                 
                <th>FAKULTAS</th>
                <th>PRODI</th>
                <th>SEMESTER</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>
              
              <?php $i = 0; ?>
              <?php foreach($mahasiswa->result() as $M):?>
              <?php $i += 1; ?>
              <tbody>                
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo ($M->nim); ?></td>
                <td><?php echo ($M->nama); ?></td>
                <td><?php echo ($M->angkatan_id); ?></td>
                <td><?php echo ($M->kampus_fakultas); ?></td>
                <td><?php echo ($M->kampus_prodi); ?></td>
                <td><?php echo ($M->semester_aktif); ?></td>
                <td>
                  <a class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                  <a class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                  <a class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>
              </tbody>
              <?php endforeach; ?>
              <tfoot>
              <tr>
                <th>#</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>ANGKATAN</th>                                 
                <th>FAKULTAS</th>
                <th>PRODI</th>
                <th>SEMESTER</th>
                <th id="s">OPERASI</th>
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
              
              <h4 class="modal-title" id="myModalLabel">Tambah Mahasiswa Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/MHS_addNew"); ?>
              <div class="form-row">
                <label for="" class="col-md-3">NIM</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa" required>
                </div>
              </div>
              
              <div class="form-row">
                <label for="" class="col-md-3">Nama Lengkap</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Mahasiswa" required>
                </div>
              </div>
              
              <div class="form-row">
                <label for="" class="col-md-3">Angkatan</label>
                <div class="col-md-9">
                  <select class="form-control" name="angkatan">
                    <option value="1">2019</option>
                    <option value="2">2017</option>

                  </select>
                </div>
              </div>
              
              <div class="form-row">
                <label for="" class="col-md-3">Alamat</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap"></textarea>
                </div>
              </div>
              
              <div class="form-row">
                <label for="" class="col-md-3">Gender</label>
                <div class="col-md-9">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="gendPria" value="pria" checked>
                      Pria
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" id="gendWanita" value="wanita">
                      Wanita
                    </label>
                  </div>
                </div>
              </div>
              
              <div class="form-row">
                <label for="" class="col-md-3">Agama</label>
                <div class="col-md-9">
                  <select class="form-control" name="agama">
                    <option value="1">Islam</option>
                    <option value="2">Kristen</option>
                    <option value="3">Tionghoa</option>
                    <option value="4">Hindu</option>
                    <option value="5">Lainnya</option>
                  </select>
                </div>
              </div> 

              <div class="form-row">
                <label for="" class="col-md-3">Tanggal Lahir</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tgl_lahir" placeholder="dd/mm/yyyy" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Tempat Lahir</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir Mahasiswa" required>
                </div>
              </div>
              
              <div class="form-row">
                <label for="" class="col-md-3">Nama Ayah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah Mahasiswa" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Nama Ibu</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu Mahasiswa" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Nomor Telfon Orang Tua </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telfon Orang Tua" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">ID Pekerjaan Ibu</label>
                <div class="col-md-9">
                  <select class="form-control" name="ID_p_ibu">
                    <option value="1">Tidak Bekerja</option>
                    <option value="2">Nelayan/option>
                    <option value="3">Petani</option>
                    <option value="4">Peternak</option>
                    <option value="5">PNS/TNI/Polri</option>
                    <option value="6">Karyawan Swasta</option>
                    <option value="7">Pedagang Kecil</option>
                    <option value="8">Pedagang Besar</option>
                    <option value="9">Wiraswasta</option>
                    <option value="10">Wirausaha</option>
                    <option value="11">Buruh</option>
                    <option value="12">Pensiunan</option>
                    <option value="13">Lainya</option>
                  </select>
                </div>
              </div> 
               <div class="form-row">
                <label for="" class="col-md-3">ID Pekerjaan Bapak</label>
                <div class="col-md-9">
                  <select class="form-control" name="ID_p_bpk">
                    <option value="1">Tidak Bekerja</option>
                    <option value="2">Nelayan/option>
                    <option value="3">Petani</option>
                    <option value="4">Peternak</option>
                    <option value="5">PNS/TNI/Polri</option>
                    <option value="6">Karyawan Swasta</option>
                    <option value="7">Pedagang Kecil</option>
                    <option value="8">Pedagang Besar</option>
                    <option value="9">Wiraswasta</option>
                    <option value="10">Wirausaha</option>
                    <option value="11">Buruh</option>
                    <option value="12">Pensiunan</option>
                    <option value="13">Lainya</option>
                  </select>
                </div>
              </div> 

              <div class="form-row">
                <label for="" class="col-md-3">Alamat Ayah</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_ayah" placeholder="Alamat Lengkap"></textarea>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Alamat Ibu</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_ibu" placeholder="Alamat Lengkap"></textarea>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Penghasilan Ayah</label>
                <div class="col-md-9">
                  <select class="form-control" name="hasil_ayah">
                    <option value="5000000">< 3.000.000</option>
                    <option value="<5000000">< 5.000.000</option>
                    <option value="<10000000">< 10.000.000</option>
                    <option value=">10000000">> 10.000.000</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Penghasilan Ibu</label>
                <div class="col-md-9">
                  <select class="form-control" name="hasil_ibu">
                    <option value="5000000">< 3.000.000</option>
                    <option value="<5000000">< 5.000.000</option>
                    <option value="<10000000">< 10.000.000</option>
                    <option value=">10000000">> 10.000.000</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Nama Sekolah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Nomor Telfon Sekolah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="notelp_sekolah" placeholder="Nomor Telfon Sekolah" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Alamat Sekolah</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_sekolah" placeholder="Alamat Sekolah"></textarea>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Jurusan</label>
                <div class="col-md-9">
                  <select class="form-control" name="jurusan">
                    <option value="ipa">IPA</option>
                    <option value="ips">IPS</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Tahun Lulus</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tahunlulus" placeholder="Tahun Lulus" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Fakultas</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="fakultas" placeholder="Fakultas" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="programstudi" placeholder="Program Studi" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Semester Aktif</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="semester_aktif" placeholder="Semester Aktif" required>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-success" name="addnew" value="Submit"></input>
              
            </div>
            <?php echo form_close(); ?>               
            </div>
          </div>
        </div>
      </div>
    
  </section>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
  <!-- /.content -->    
</div>