<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Akademik</h2>
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
        <h4 class="title-content">Tabel Tahun Akademik</h4>
      </div>
      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-success" name="login" data-target="#myModal" value="+">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>TAHUN AKADEMIK</th>
      <th>KETERANGAN</th>
      <th>BATAS REGISTRASI</th>
      <th>STATUS</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>


    <tbody>
    <?php $i = 0; ?>
    <?php foreach($tahun_akademik->result() as $data):?>
    <?php $i += 1; ?>
    <tr>
      <td><?php echo (substr($data->keterangan, 0,4)); echo "-"; echo substr($data->keterangan, -1);?></td>
      <td>
        <?php
          if (substr($data->keterangan, -1) == 1) {
            echo "Semester Ganjil";
          }else{
            echo "Semester Genap";
          }
        ?>
      </td>
      <td><?php echo ($data->batas_registrasi); ?></td>
      <td>


        <?php
          if (($data->status) == 'y') {
            //echo "OPEN";
            echo 'Aktif';

          }else{
            //echo "CLOSE";
            echo 'Tidak Aktif';
          }
        ?>
      </td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/redirect_update_tahunakademik/<?php echo ($data->tahun_akademik_id); ?>" class="btn btn-sm"><i class="fa fa-edit"></i> Ubah</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>


    <tfoot>
    <tr>
      <th>TAHUN AKADEMIK</th>
      <th>KETERANGAN</th>
      <th>BATAS REGISTRASI</th>
      <th>STATUS</th>
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
            <h4 class="modal-title" id="myModalLabel" style="float:left;">Tambah Tahun Akademik</h4>

          </div>
          <div class="modal-body">
          <?php echo form_open("main_controller/tahunAkademik_addNew"); ?>

            <div class="form-row">
              <label for="" class="col-md-3">Tahun Akademik</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="tahun_akademik" placeholder="Tahun Akademik" required>
              </div>
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Semester</label>
              <div class="col-md-9">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios1" id="sms_ganjil" value="1" checked>
                    Ganjil
                  </label>
                  <label>
                    <input type="radio" name="optionsRadios1" id="sms_genap" value="2">
                    Genap
                  </label>
                </div>
              </div>
            </div>

             <div class="form-row">
              <label class="col-md-3">Batas Registrasi</label>
              <div class="col-md-9">
              <div class="input-group date">

                <div class="input-group mb-3">
                  <input type="text" name='bts_regis' class="form-control pull-right" id="datepicker">
                </div>
              </div>
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-row">
              <label for="" class="col-md-3">Status</label>
              <div class="col-md-9">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="status_open" value="y" checked>
                    Open
                  </label>
                  <label>
                    <input type="radio" name="optionsRadios" id="status_close" value="n">
                    Close
                  </label>
                </div>
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
       1. Tambah Tahun Akademik <br>
       Admin dapat menambahkan tahun akademik baru dengan memasukan informasi tahun berapa, pada semester genap/ganji, lalu memasukan informasi mengenai batas registrasi untuk tahun akademik baru, dan mengatur status apakah tahun akademik tersebut sedang open atau close. JIka sedang open, maka mahasiswa dapat melakukan registrasi, jika close mahasiswa tidak dapat melakukan registrasi.<br><br>
       2. Lihat Tahun Akademik <br>
       Admin dapat melihat daftar tahun akademik.<br><br>
       3. Menghubah Tahun akademik<br>
       Admin adapt mengubah informasi mengenai tahun akademik, admin dapat merubah batas registrasi dan status tahun akadeik itu on atau close.<br><br>
       4. Menghapus Tahun Akademik  <br>
       Admin dapat menghapus informasi tahun akademik apabila diperlukan. <br><br>
       5. Excel <br>
       Admin dapat mengunduh seluruh data tahun akademik dalam bentuk excel.
      </div>
     </div>
     <div class="modal-footer">

     </div>
    </div>
   </div>
  </div>
 </section>
