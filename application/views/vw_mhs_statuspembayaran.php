<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
               </div>
               <div class="modal-body">
                  <div>
                    <p align="justify">Pada halaman ini;
                      <br>1. Perhatikan status pembayaran anda pada tabel dibawah, jika ada penagihan segerakan untuk membayar. Apabila sudah dibayar harap bukti pembayaran di-upload pada kotak yang sudah disediakan yang bersifat wajib.</br>
                      <br>2. Perhatikan pada saat peng-upload-an tahun akademik dan bulan pembayaran anda, lalu pilih file pembayaran yang akan di-upload sesuai dengan deskripsi yang anda pilih, lalu Klik Upload. Jika status "Approved" maka pembayaran pada bulan tersebut telah diterima oleh pihak administrasi. Jika anda sudah upload namun masih belum di-approve harap hubungi pihak administrasi.</p>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>

    <section class="content-header">
      <h1>
        Pembayaran
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li class="active"> Pembayaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-20">
            <div class="box box-primary">
              <div class="">

                        <div class="box-header with-border">
                          <h3 class="box-title">Tabel Keuangan</h3>
                        </div>
                        <!-- /.box-header -->


                        <div class="box-body">
                          <table id="tabelkeren" class="table  table-striped  table-hover">
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
                        <!-- /.box-body -->

                  <!-- /.row -->
              </div>
            </div>

            </div>
          </div>
        </div>
        <?php if (isset($tahun_ak_open->row()->tahun_akademik_id)) {
          ?>
          <div class="row">
            <div class="col-xs-5">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pembayaran Baru</h3>
                </div>
                <div class="box-body ">
                  <?php echo form_open_multipart('main_controller/do_upload');?>
                  <input type="hidden" name="nim" value="<?php echo $this->session->kode_user; ?>">
                  <input type="hidden" name="id_tahun_akademik" value="<?php echo $tahun_ak_open->row()->tahun_akademik_id; ?>">
                  <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
                  <input type="hidden" name="judul" value="TX_<?php echo $tahun_ak_open->row()->keterangan;?>_<?php echo $this->session->kode_user ?>"/>

                  <div class="form-group">
                    <label for="" class="col-md-7">Tahun Akademik</label>
                    <div class="col-md-5">
                      <select class="form-control">
                        <option value=""><?php echo (substr($tahun_ak_open->row()->keterangan, 0,4)); echo "-"; echo substr($tahun_ak_open->row()->keterangan, -1);?></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-md-7">Jenis Pembayaran</label>
                    <div class="col-md-5">
                      <select class="form-control" name="j_bayar">
                        <option>-- Pilih Jenis Pembayaran --</option>
                        <option value="1">Registrasi</option>
                        <option value="2">Bulanan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-md-7">Bulan</label>
                    <div class="col-md-5">
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
                  <div class="form-group">
                    <label for="" class="col-md-7">Bukti Pembayaran</label>
                    <div class="col-md-5">
                      <div class="input-grup">
                        <div class="custom-file">
                            <input type="file" name="userfile" class="custum-file-input" id="InputFile" />
                            <label class="custum-file-input" for="InputFile"></label>
                            <div class="card-footer">
                              <input type="submit" value="Upload" class="btn btn-info float-right"></button>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
          <?php
        } ?>

      </div>
    </section>
  <!-- /.content-wrapper -->
