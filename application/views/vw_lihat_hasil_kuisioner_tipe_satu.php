<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Hasil Kuisioner</h2>
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
        <h4 class="title-content">Tabel Kuisioner By Jadwal Master</h4>
      </div>
    </div>
    <h3 class="box-title" style="margin-top: 10px;">Keterangan Kuisioner</h3>
    <div class="box box-primary">
      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($kuisioner->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner->row()->keterangan, -1);?></p>
            <label class="col-sm-1 from-control-label">Judul</label><p>: <?php echo $kuisioner->row()->judul;?></p>
          </div>
        </div>
      </form>
    </div>
    <h3 class="box-title" style="margin-top: 10px;">Keterangan Mata Kuliah</h3>
    <div class="box box-primary">
      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($kuisioner->row()->keterangan, 0,4)); echo "-"; echo substr($kuisioner->row()->keterangan, -1);?></p>
            <label class="col-sm-1 from-control-label">Mata Kuliah</label><p>: <?php echo $kuisioner->row()->nama_mk;?></p>
            <label class="col-sm-1 from-control-label">NIDN</label><p>: <?php echo $kuisioner->row()->nidn;?></p>
            <label class="col-sm-1 from-control-label">Dosen</label><p>: <?php echo $kuisioner->row()->nama_lengkap;?></p>
          </div>
        </div>
      </form>
    </div>
    <h3 class="box-title" style="margin-top: 10px;">Keterangan Koresponden</h3>
    <div class="box box-primary">
      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-row">
            <?php
              $jumlah_koresponden = ($kuisioner->num_rows() / $pertanyaan_kuisioner->num_rows());
            ?>
            <label class="col-sm-1 from-control-label">Jumlah Koresponden</label><p>: <?php echo $jumlah_koresponden;?></p>
          </div>
        </div>
      </form>
    </div>
  </div>
  <table class="table table-bordered" id="">
    <thead>
    <tr>
      <th style="width: 13px">#</th>
      <th style="width: 15px">Pertanyaan</th>
      <th style="width: 13px"><center>Sangat Setuju</center></th>
      <th style="width: 13px"><center>Setuju</center></th>
      <th style="width: 13px"><center>Tidak Setuju</center></th>
      <th style="width: 13px"><center>Sangat Tidak Setuju</center></th>
    </tr>
    </thead>

    <tbody>
      <?php $i = 0; ?>
      <?php foreach($pertanyaan_kuisioner->result() as $data):?>
      <?php $i += 1; ?>
        <tr>
          <td><?php echo ($i);?></td>
          <td><?php echo ($data->pertanyaan);?></td>
          <?php
            $sangat_setuju = 0;
            $setuju = 0;
            $tidak_setuju = 0;
            $sangat_tidak_setuju = 0;
            foreach($kuisioner->result() as $hasil){
              if(($hasil->id_kuisioner_pertanyaan == $data->id_kuisioner_pertanyaan) && ($hasil->hasil == '1')){
                $sangat_setuju += 1;
              } elseif(($hasil->id_kuisioner_pertanyaan == $data->id_kuisioner_pertanyaan) && ($hasil->hasil == '2')){
                $setuju += 1;
              } elseif(($hasil->id_kuisioner_pertanyaan == $data->id_kuisioner_pertanyaan) && ($hasil->hasil == '3')){
                $tidak_setuju += 1;
              } elseif(($hasil->id_kuisioner_pertanyaan == $data->id_kuisioner_pertanyaan) && ($hasil->hasil == '4')){
                $sangat_tidak_setuju += 1;
              }
            }
          ?>
          <?php if($sangat_setuju != 0) :?>
            <td><?php echo (($sangat_setuju / $jumlah_koresponden) * 100) .'%'; ?></td>
          <?php else : ?>
            <td>-</td>
          <?php endif; ?>
          <?php if($setuju != 0) :?>
            <td><?php echo (($setuju / $jumlah_koresponden) * 100) .'%'; ?></td>
          <?php else : ?>
            <td>-</td>
          <?php endif; ?>
          <?php if($tidak_setuju != 0) :?>
            <td><?php echo (($tidak_setuju / $jumlah_koresponden) * 100) .'%'; ?></td>
          <?php else : ?>
            <td>-</td>
          <?php endif; ?>
          <?php if($sangat_tidak_setuju != 0) :?>
            <td><?php echo (($sangat_tidak_setuju / $jumlah_koresponden) * 100) .'%'; ?></td>
          <?php else : ?>
            <td>-</td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>
