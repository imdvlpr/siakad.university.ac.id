<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Nilai</h6>
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
<div class="">
  <div class="row" id="boxbox">
    <div class="col rounded-lg" style="background-color:#00c0ef !important;">
      <div class="inner">
        <h3><?php echo $ips ?></h3>
        <p>IPS</p>
      </div>
      <div class="icon">
        <i class="fas fa-user"></i>
      </div>
    </div>
    <div class="col rounded-lg" style="background-color:#00a65a !important;">
      <div class="inner">
        <h3><?php echo $ipk ?></h3>
        <p>IPK</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
    </div>

  </div>
</div>

<hr>
<div class="col">
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="title-content">Daftar Nilai</h4>
      </div>

      <div class="col">
        <input type="submit" style="margin-left: 10px; float:right" href="#" data-toggle="modal" class="btn btn-info" name="login" data-target="#help_modal" value="Bantuan">
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-hover">
    <thead>
      <tr>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>SKS</th>
        <th>Indeks Nilai</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0; ?>
      <?php foreach($nilaimhs->result() as $data):?>
      <?php $i += 1; ?>
    <tr>
      <td><?php echo $data->kode_mk; ?></td>
      <td><?php echo $data->nama_mk; ?></td>
      <td><?php echo $data->sks_mk; ?></td>
      <td><?php echo $data->nilai; ?></td>
    </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
      <th>Kode Mata Kuliah</th>
      <th>Nama Mata Kuliah</th>
      <th>SKS</th>
      <th>Indeks Nilai</th>
    </tr>
    </tfoot>
  </table>
</div>


<section class="content-popup">
      <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">

                  <h4 class="modal-title" id="helpModalLabel">Bantuan</h4>
               </div>
               <div class="modal-body">
                  <div>
                    <p align="justify">Pada Halaman ini, anda dapat melihat keseluruhan nilai yang anda peroleh dari semester satu hingga semester saat ini. Bobot nilai mencakup semua yaitu (UTS, UAS, TUGAS, KUIS).
                    <br></br>
                    <br>Anda juga dapat melihat perolehan Nilai Indeks Prestasi Kumulatif dan Indeks Prestasi Semester.</br>
                    </p>               </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>

          <?php echo form_close(); ?>
      </div>


   </section>
