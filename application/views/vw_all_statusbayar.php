
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
              <h3 class="box-title">Tabel Keuangan</h3>
              <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
            </div>
            <!-- /.box-header -->


            <div class="box-body">
              <table id="tabelkeren" class="table  table-striped  table-hover">
                <thead>
                <tr>
                  <th>AKADEMIK</th>
                  <th>NIM</th>
                  <th>JENIS PEMBAYARAN</th>
                  <th>BULAN</th>
                  <th>BIAYA</th>
                  <th>STATUS</th>
                  <th>TANGGAL</th>
                  <th id="s">OPERASI</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                <?php foreach($k_status->result() as $data):?>
                <?php $i += 1; ?>

                <tr>
                  <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
                  <td><?php echo ($data->nim); ?></td>
                  <td><?php if ($data->jenis_pembayaran == 1) {
                    echo "Registrasi Semester";
                  }else if ($data->jenis_pembayaran == 2) {
                    echo "SPP Bulanan";
                  }else{
                    echo "Unknown";
                  }?></td>
                  <td><?php
                    $favcolor = $data->bulan;

                    switch ($favcolor) {
                        case "1":
                            echo "Januari";
                            break;
                        case "2":
                            echo "Februari";
                            break;
                        case "3":
                            echo "Maret";
                            break;
                        case "4":
                            echo "April";
                            break;
                        case "5":
                            echo "Mei";
                            break;
                        case "6":
                            echo "Juni";
                            break;
                        case "7":
                            echo "Juli";
                            break;
                        case "8":
                            echo "Agustus";
                            break;
                        case "9":
                            echo "September";
                            break;
                        case "10":
                            echo "Oktober";
                            break;
                        case "11":
                            echo "November";
                            break;
                        case "12":
                            echo "Desember";
                            break;
                        default:
                            echo "";
                    }
                    ?></td>
                  <td>Rp. <?php echo number_format(($data->jumlah_biaya)); ?></td>
                  <td><?php
                    if ($data->status_pembayaran_mhs == 1) {
                      echo "Approved";
                    } else if ($data->status_pembayaran_mhs == 2){
                      echo "Cancelled";
                    } else if ($data->status_pembayaran_mhs == 3){
                      echo "Waiting";
                    }
                  ?></td>
                  <td><?php echo ($data->tanggal); ?></td>
                  <td>
                    <?php if ($data->status_pembayaran_mhs != 1) {
                      ?><a href="<?php echo base_url()?>index.php/main_controller/redirect_update_status_bayar/<?php echo ($data->id_transaksi); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a><?php
                    } ?>

                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>AKADEMIK</th>
                  <th>NIM</th>
                  <th>JENIS PEMBAYARAN</th>
                  <th>BULAN</th>
                  <th>BIAYA</th>
                  <th>STATUS</th>
                  <th>TANGGAL</th>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Pembayaran Baru</h4>
              </div>
              <div class="modal-body">
              <?php echo form_open("main_controller/status_bayar_addNew"); ?>
              <div class="form-group">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_tahun_akademik">
                    <?php foreach($tahun_akademik->result() as $data):?>
                      <option value="<?php echo $data->tahun_akademik_id; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

                <div class="form-group">
                  <label for="" class="col-md-3">NIM</label>
                  <div class="col-md-9">
                    <select class="form-control" name="nim">
                      <?php foreach($mahasiswa->result() as $data):?>
                        <option value="<?php echo $data->nim; ?>"><?php echo $data->nim;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3">Semester</label>
                  <div class="col-md-9">
                    <select class="form-control" name="semester">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-md-3">Jumlah Bayar</label>
                  <div class="col-md-9">
                    <select class="form-control" name="jumlah_pembayaran">
                      <?php foreach($biaya->result() as $data):?>
                        <option value="<?php echo $data->jumlah_biaya; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?> - <?php echo ($data->nama_prodi); ?> - <?php echo ($data->jumlah_biaya) ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-md-3">Status</label>
                  <div class="col-md-9">
                    <select class="form-control" name="status">
                        <option value="1">Approved</option>
                        <option value="2">Cancelled</option>
                        <option value="3">Waiting</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3">Tanggal</label>
                  <div class="col-md-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name='tanggal' class="form-control pull-right" id="datepicker">
                  </div>
                  </div>
                  <!-- /.input group -->
                </div>

                <input type="submit" class="btn btn-Warning" name="addnew" value="Submit"></input>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              <div class="modal-footer">
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
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
        </div>
        <div class="modal-body">
         <div>
          1. Tambah Kelola Bayar <br>
          Admin dapat menambahkan kelola bayar semua mahasiswa dengan memasukan data.<br><br>
          2. Melihat Kelola Status Bayar<br>
          Admin dapat melihat kelola bayar mahasiswa.<br><br>
          3. Mengubah Kelola Status Bayar <br>
          Admin dapat mengubah status kelola bayar mahasiswa, apabila sudah bayar dan divalidasi oleh admin maka statusnya approve. <br><br>
          4. Menghapus Kelola Status Bayar <br>
          Admin dapat mengapus kelola bayar jika diperlukan. <br><br>
          5. Excel <br>
          Admin dapat mengunduh semua data kelola bayar mahasiswa
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
