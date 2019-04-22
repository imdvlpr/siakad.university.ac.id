

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div style="font-size: 13.5px; text-align: right;">
      <a href="#" data-toggle="modal" name="login" data-target="#help_modal"><i style="color: black">Bantuan </i><i class="fa fa-question-circle"></i></a>
    </div>
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb" style="margin-top: 20px">
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
            <table id="tabelkeren" class="table  table-striped  table-hover">
              <thead>
              <tr>

                <th>NIM</th>
                <th>NAMA</th>
                <th>ANGKATAN</th>
                <th>KELAS</th>
                <th>PRODI</th>
                <th>SEMESTER</th>
                <th>STATUS</th>
                <th id="s">OPERASI</th>
              </tr>
              </thead>


              <tbody>
              <?php $i = 0; ?>
              <?php foreach($mahasiswa->result() as $M):?>
              <?php $i += 1; ?>
              <tr>

                <td><?php echo ($M->nim); ?></td>
                <td><?php echo ($M->nama); ?></td>
                <td><?php echo ($M->tahun); ?></td>
                <td><?php echo ($M->nama_kelas); ?></td>
                <td><?php echo ($M->nama_prodi); ?></td>
                <td><?php echo ($M->semester_aktif); ?></td>
                <td><?php if ($M->status_mahasiswa == 1) {
                  echo "Aktif";
                } else{
                  echo "Alumni";
                }?></td>
                <td>
                  <a href="<?php echo base_url()?>index.php/main_controller/pg_biodata_mhs/<?php echo ($M->nim); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                  <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_mhs/<?php echo ($M->nim); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>

                <th>NIM</th>
                <th>NAMA</th>
                <th>ANGKATAN</th>
                <th>KELAS</th>
                <th>PRODI</th>
                <th>SEMESTER</th>
                <th>STATUS</th>
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

  <?php echo form_open("main_controller/MHS_addNew"); ?>
  <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 750px">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Mahasiswa Baru</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="" class="col-md-3">NIM</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nama Lengkap</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Mahasiswa" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Angkatan</label>
                <div class="col-md-9">
                  <select class="form-control" name="angkatan">
                  <?php foreach($angkatan->result() as $data):?>
                    <option value="<?php echo $data->id_angkatan; ?>"><?php echo $data->tahun;?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="programstudi" id="prodi">
                  <option value='0'>-- Pilih Program Studi --</option>
                  <?php
                      foreach ($prodi as $prov) {
                          echo "<option value='$prov[id_prodi]'>$prov[nama_prodi]</option>";
                      }
                  ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Kelas</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_kelas" id="kelas">
                    <option value="0">-- Pilih Kelas --</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Alamat</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap"></textarea>
                </div>
              </div>

              <div class="form-group">
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

              <div class="form-group">
                <label for="" class="col-md-3">Agama</label>
                <div class="col-md-9">
                  <select class="form-control" name="agama">
                    <?php foreach($agama->result() as $data):?>
                      <option value="<?php echo $data->agama_id; ?>"><?php echo $data->keterangan;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3">Tanggal Lahir</label>
                <div class="col-md-9">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name='tgl_lahir' class="form-control pull-right" id="datepicker">
                </div>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Tempat Lahir</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir Mahasiswa" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nama Ayah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah Mahasiswa" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nama Ibu</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu Mahasiswa" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nomor Telfon Orang Tua </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telfon Orang Tua" required>
                </div>
              </div>

                  <div class="form-group">
                <label for="" class="col-md-3">ID Pekerjaan Ibu</label>
                <div class="col-md-9">
                  <select class="form-control" name="ID_p_ibu">
                  <?php foreach($pekerjaan->result() as $data):?>
                    <option value="<?php echo $data->pekerjaan_id; ?>"><?php echo $data->keterangan;?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>

                <div class="form-group">
                <label for="" class="col-md-3">ID Pekerjaan Bapak</label>
                <div class="col-md-9">
                  <select class="form-control" name="ID_p_bpk">
                  <?php foreach($pekerjaan->result() as $data):?>
                    <option value="<?php echo $data->pekerjaan_id; ?>"><?php echo $data->keterangan;?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Alamat Ayah</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_ayah" placeholder="Alamat Lengkap"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Alamat Ibu</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_ibu" placeholder="Alamat Lengkap"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Penghasilan Ayah</label>
                <div class="col-md-9">
                  <select class="form-control" name="hasil_ayah">
                    <option value="<3000000"> < 3.000.000</option>
                    <option value="<5000000"> < 5.000.000</option>
                    <option value="<10000000"> < 10.000.000</option>
                    <option value=">10000000"> > 10.000.000</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Penghasilan Ibu</label>
                <div class="col-md-9">
                  <select class="form-control" name="hasil_ibu">
                    <option value="<3000000"> < 3.000.000</option>
                    <option value="<5000000"> < 5.000.000</option>
                    <option value="<10000000"> < 10.000.000</option>
                    <option value=">10000000"> > 10.000.000</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nama Sekolah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Nomor Telfon Sekolah</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="notelp_sekolah" placeholder="Nomor Telfon Sekolah" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Alamat Sekolah</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="3" name="alamat_sekolah" placeholder="Alamat Sekolah"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Jurusan</label>
                <div class="col-md-9">
                  <select class="form-control" name="jurusan">
                    <option value="ipa">IPA</option>
                    <option value="ips">IPS</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Tahun Lulus</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tahunlulus" placeholder="Tahun Lulus" required>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-3">Semester Aktif</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="semester_aktif" placeholder="Semester Aktif" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  </section>
  <?php echo form_close(); ?>
  <section class="content-popup">
    <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
       </div>
       <div class="modal-body">
        <div>
         1. Tambah Mahasiswa<br>
         Admin dapat menambahkan mahasiswa baru, apabila ada mahasiswa baru pindahan ataupun mahasiswa yang baru daftar dengan syarat sudah lolos seleksi masuk STKIP Yasika. Saat admin menambahkan mahasiswa baru, pastikan sudah mengisi semua data yang tersedia di menu Master Data, seperti kelas, tahun angkatan, dan program studi sehingga saat menambahkan mahasiswa baru admin harus memasukan mahasiswa tersebut kedalam program studi mana, jurusan mana dan pada angkatan berapa.<br><br>
         2. Lihat Mahasiswa<br>
         Admin dapat melihat informasi mahasiswa jika diperlukan dan langsung dapat diprint.<br><br>
         3. Mengubah Data Mahasiswa<br>
         Admin dapat mengubah data mahasiswa apabila terjadi kesalahan saat memasukan data.<br><br>
         4. Menghapus Data Mahasiswa <br>
         Admin dapat menghapus data mahasiswa jika diperlukan. <br><br>
         5. Excel <br>
         Admin dapat mengunduh semua data mahasiswa yang ada dalam bentuk excel.
        </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
   </section>
<!-- /.content -->
</div>
