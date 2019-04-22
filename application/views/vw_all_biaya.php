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
        <h4 class="title-content">Tabel Kelola Biaya</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>#</th>
      <th>AKADEMIK</th>
      <th>PRODI</th>
      <th>JENIS PEMBAYARAN</th>
      <th>BULAN</th>
      <th>JUMLAH BIAYA</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($biaya->result() as $data):?>
    <?php $i += 1; ?>

    <tr>
      <td><?php echo ($i);?></td>
      <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
      <td><?php echo ($data->nama_prodi); ?></td>
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
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_biaya/<?php echo ($data->id_biaya); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>#</th>
      <th>AKADEMIK</th>
      <th>PRODI</th>
      <th>JENIS PEMBAYARAN</th>
      <th>BULAN</th>
      <th>JUMLAH BIAYA</th>
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

              <h4 class="modal-title" id="myModalLabel">Tambah Biaya Baru</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open("main_controller/biaya_addNew"); ?>
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
                <label for="" class="col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="id_prodi">
                    <option value="0">-- Pilih Program Studi--</option>
                  <?php foreach($prodi as $data):?>
                    <option value="<?php echo $data['id_prodi']; ?>"><?php echo $data['nama_prodi'];?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <label for="" class="col-md-3">Jenis Pembayaran</label>
                <div class="col-md-9">
                  <select class="form-control" name="jenis_p">
                    <option value="0">-- Pilih Jenis Pembayaran --</option>
                    <option value="1">Registrasi Semester</option>
                    <option value="2">SPP Bulanan</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <label for="" class="col-md-3">Bulan</label>
                <div class="col-md-9">
                  <select class="form-control" name="bulan">
                    <option value="0">-- Pilih Bulan --</option>
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
                <label for="" class="col-md-3">Jumlah Biaya</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="jumlah_biaya" placeholder="Biaya" required>
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
         Pada menu ini admin dapat menambahkan, melihat, mengubah dan menghapus kelola biaya, baik biaya awal masuk, spp maupun yang lainya. Yang nanti dapat dirubah status bayarnya di kelola status bayar.
        </div>
       </div>
       <div class="modal-footer">

       </div>
      </div>
     </div>
    </div>
   </section>
