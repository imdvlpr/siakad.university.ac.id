<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Pembayaran</h6>
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
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Tabel Keuangan</h4>
      </div>

      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-hover">
    <thead>
      <tr>
        <th>AKADEMIK</th>
        <th>BULAN</th>
        <th>STATUS</th>
        <th>TANGGAL</th>
        <th id="s">BUKTI PEMBAYARAN</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0; ?>
      <?php foreach($k_status->result() as $data):?>
      <?php $i += 1; ?>
    <tr>
      <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
      <td>
        <?php
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
          ?>
      </td>
      <td><?php
        if ($data->status_pembayaran_mhs == 1) {
          echo "Approved";
        } else if ($data->status_pembayaran_mhs == 2){
          echo "Cancelled";
        } else{
          echo "Waiting";
        }
      ?></td>
      <td><?php echo ($data->tanggal); ?></td>
      <td><a href="<?php echo base_url()?>index.php/main_controller/download/<?php echo ($data->buktipembayaran); ?>" class="btn btn-sm"><i class="fa fa-download"></i> Download</a></td>
    </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>AKADEMIK</th>
      <th>BULAN</th>
      <th>STATUS</th>
      <th>TANGGAL</th>
      <th id="s">BUKTI PEMBAYARAN</th>
    </tr>
    </tfoot>
  </table>
</div>
<hr>
<?php if (isset($tahun_ak_open->row()->tahun_akademik_id)) {
  ?>
<div class="col">

  <div class="row">
    <div class="col-12 ">
      <div class="box box-primary">
        <div class="box-header with-border">

          <h3 class="box-title">Pembayaran Baru</h3>
          <hr class="">
        </div>
        <br>
        <div class="box-body ">
          <?php echo form_open_multipart('main_controller/do_upload');?>
          <input type="hidden" name="nim" value="<?php echo $this->session->kode_user; ?>">
          <input type="hidden" name="id_tahun_akademik" value="<?php echo $tahun_ak_open->row()->tahun_akademik_id; ?>">
          <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
          <input type="hidden" name="judul" value="TX_<?php echo $tahun_ak_open->row()->keterangan;?>_<?php echo $this->session->kode_user ?>"/>

          <div class="form-row">
            <label for="" class="col-md-1">Tahun Akademik</label>
            <div class="col-md-10">
              <select class="form-control">
                <option value=""><?php echo (substr($tahun_ak_open->row()->keterangan, 0,4)); echo "-"; echo substr($tahun_ak_open->row()->keterangan, -1);?></option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <label for="" class="col-md-1">Jenis Pembayaran</label>
            <div class="col-md-10">
              <select class="form-control" name="j_bayar">
                <option>-- Pilih Jenis Pembayaran --</option>
                <option value="1">Registrasi</option>
                <option value="2">Bulanan</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <label for="" class="col-md-1">Bulan</label>
            <div class="col-md-10">
              <select class="form-control" name="bulan">
                <option>-- Pilih Bulan --</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <label for="" class="col-md-1">Bukti Pembayaran</label>
            <div class="col-md-10">
              <div class="input-grup">
                <div class="custom-file">
                    <input type="file" name="userfile" class="custum-file-input" id="InputFile" />
                    <label class="custum-file-input" for="InputFile"></label>

                </div>
              </div>
            </div>
          </div>

          <div class="form-row">
            <label for="" class="col-md-9 "></label>
            <div class="col-md-2">
              <div class="input-grup">
                <div class="custom-file">
                    <input type="submit" value="Upload"  style="float:right;  "class="btn btn-info col-md-6 "></button>
                <br><br><br>

                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php
} ?>


<section class="content-popup">
      <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">

                  <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
               </div>
               <div class="modal-body">
                  <div>
                    p align="justify">Pada halaman ini;
                      <br>1. Perhatikan status pembayaran anda pada tabel dibawah, jika ada penagihan segerakan untuk membayar. Apabila sudah dibayar harap bukti pembayaran di-upload pada kotak yang sudah disediakan yang bersifat wajib.</br>
                      <br>2. Perhatikan pada saat peng-upload-an tahun akademik dan bulan pembayaran anda, lalu pilih file pembayaran yang akan di-upload sesuai dengan deskripsi yang anda pilih, lalu Klik Upload. Jika status "Approved" maka pembayaran pada bulan tersebut telah diterima oleh pihak administrasi. Jika anda sudah upload namun masih belum di-approve harap hubungi pihak administrasi.</p>                  </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>

          <?php echo form_close(); ?>
      </div>


   </section>
