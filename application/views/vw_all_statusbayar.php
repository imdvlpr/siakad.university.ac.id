<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Keuangan</h2>
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
<div class="col" style="overflow: auto;">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Tabel Keuangan</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
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
    <section class="content-popup">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Tambah Pembayaran Baru</h4>
              </div>
              <div class="modal-body">
              <?php echo form_open("main_controller/status_bayar_addNew"); ?>
              <div class="form-row">
                <label for="" class="col-md-3">Tahun Akademik</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_tahun_akademik">
                    <?php foreach($tahun_akademik->result() as $data):?>
                      <option value="<?php echo $data->tahun_akademik_id; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

                <div class="form-row">
                  <label for="" class="col-md-3">NIM</label>
                  <div class="col-md-9">
                    <select class="form-control" name="nim">
                      <?php foreach($mahasiswa->result() as $data):?>
                        <option value="<?php echo $data->nim; ?>"><?php echo $data->nim;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-row">
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

                <div class="form-row">
                  <label for="" class="col-md-3">Jumlah Bayar</label>
                  <div class="col-md-9">
                    <select class="form-control" name="jumlah_pembayaran">
                      <?php foreach($biaya->result() as $data):?>
                        <option value="<?php echo $data->jumlah_biaya; ?>"><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?> - <?php echo ($data->nama_prodi); ?> - <?php echo ($data->jumlah_biaya) ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <label for="" class="col-md-3">Status</label>
                  <div class="col-md-9">
                    <select class="form-control" name="status">
                        <option value="1">Approved</option>
                        <option value="2">Cancelled</option>
                        <option value="3">Waiting</option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <label class="col-md-3">Tanggal</label>
                  <div class="col-md-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class=""></i>
                    </div>
                    <input type="text" name='tanggal' class="form-control pull-right" id="datepicker">
                  </div>
                  </div>
                  <!-- /.input group -->
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

        </div>
       </div>
      </div>
     </div>
    </section>
