<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Dosen</h2>
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
<div class="col" style="">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Tabel Dosen</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover" style="">
    <thead>
    <tr>

      <th>NIDN</th>
      <th>NAMA</th>
      <th>STATUS PEKERJAAN</th>
      <th>NIP</th>
      <th>NO HP</th>
      <th>EMAIL</th>
      <th>PRODI</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($dosen->result() as $d):?>
    <?php $i += 1; ?>

    <tr>

      <td><?php echo ($d->nidn); ?></td>
      <td><?php echo ($d->nama_lengkap); ?></td>
      <?php if($d->status_pekerjaan == 1) : ?>
        <td>Dosen Tetap</td>
      <?php elseif($d->status_pekerjaan == 2) : ?>
        <td>Dosen Tidak Tetap</td>
      <?php else : ?>
        <td>Uknown</td>
      <?php endif; ?>
      <td><?php echo ($d->nip); ?></td>
      <td><?php echo ($d->hp); ?></td>
      <td><?php echo ($d->email); ?></td>
      <td><?php echo ($d->nama_prodi); ?></td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/pg_biodata_dsn/<?php echo ($d->nidn); ?>" class="btn btn-sm"><i class="fa fa-eye"></i> Lihat</a>
        <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_dosen/<?php echo ($d->nidn); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
        <a href="<?php echo base_url()?>index.php/main_controller/dosen_delete/<?php echo ($d->nidn); ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm"><i class="fa fa-trash"></i> Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>

    <tfoot>
    <tr>

      <th>NIDN</th>
      <th>NAMA</th>
      <th>STATUS PEKERJAAN</th>
      <th>NIP</th>
      <th>NO HP</th>
      <th>EMAIL</th>
      <th>PRODI</th>
      <th id="s">OPERASI</th>
    </tr>
    </tfoot>
  </table>
</div>

  <section class="content-popup">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title" id="myModalLabel">Tambah Dosen Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/Dosen_addNew"); ?>
              <div class="form-row">
                <label for="" class="col-md-3">NIDN</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nidn" placeholder="NIDN Dosen" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Nama Lengkap</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap Dosen" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Status Pekerjaan</label>
                <div class="col-md-9">
                  <select class="form-control" name="status_pekerjaan">
                    <option value="1"> Dosen Tetap </option>
                    <option value="2"> Dosen Tidak Tetap </option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">NIP</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nip" placeholder="NIP Dosen" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">No KTP</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="no_ktp" placeholder="No KTP Dosen" required>
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
                  <select class="form-control" name="agama_id">
                    <?php foreach($agama->result() as $data):?>
                      <option value="<?php echo $data->agama_id; ?>"><?php echo $data->keterangan;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Status Kawin</label>
                <div class="col-md-9">
                  <select class="form-control" name="status_kawin">
                    <option value="1">Kawin</option>
                    <option value="2">Belum Kawin</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Tempat Lahir</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir Dosen" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Tanggal Lahir</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tanggal_lahir" id="datepicker" placeholder="yyyy-mm-dd" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">No HP</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="hp" placeholder="No HP Dosen" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Email</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="email" placeholder="Email Dosen" required>
                </div>
              </div>

              <div class="form-row">
                <label for="" class="col-md-3">Gelar Pendidikan</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="gelar_pendidikan" placeholder="Gelar Pendidikan Dosen" required>
                </div>
              </div>

               <div class="form-row">
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="prodi_id">
                  <?php foreach($prodi as $data):?>
                    <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                  <?php endforeach; ?>
                  </select>
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


  </section>
  <section class="content-popup">
    <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">

        <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
       </div>
       <div class="modal-body">
        <div>
        1. Tambah Dosen<br>
        Admin dapat menambahkan data dosen baru apabila tidak ada dosen yang sudah terdaftar dengan NIDN yang sama.<br><br>
        2. Melihat Dosen <br>
        Admin dapat melihat data dosen sekaligus dapat memprint-out data dosen yang ingin dilihat atau diprint sesuai kebutuhan. <br><br>
        3. Mengubah Dosen<br>
        Admin dapat mengubah data dosen apabila ada kesalahan saat penginputan data dosen pertama kali. <br><br>
        4. Menghapus Dosen<br>
        Admin dapat menghapus data dosen dari sistem sesuai kebutuhan.  <br><br>
        5. Excel <br>
        Admin dapat mengunduh seluruh data dosen yang ada pada database dalam bentuk excel.
        </div>
       </div>
       <div class="modal-footer">

       </div>
      </div>
     </div>
    </div>
   </section>

  <!-- /.content -->
</div>
