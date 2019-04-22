<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>Input Kuisioner</h6>
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
        <h4 class="title-content">Jadwal Dosen</h4>
      </div>
    </div>
  </div>
<div class="row">
  <!-- left colum -->
    <div class="col-md-12">
      <h3 class="box-title" style="margin-top: 10px;">Keterangan Mahasiswa</h3>
      <div class="box box-primary">

      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-row">
            <label class="col-sm-1 from-control-label">NIM</label><p>: <?php echo $this->session->kode_user ?></p>
          </div>
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Nama Lengkap</label><p>: <?php echo $this->session->display_name ?></p>
          </div>
        </div>
      </form>
    </div>

    <h3 class="box-title" style="margin-top: 10px;">Keterangan Kuisioner</h3>
      <div class="box box-primary">

      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($judul_kuisioner->row()->keterangan, 0,4)); echo "-"; echo substr($judul_kuisioner->row()->keterangan, -1);?></p>
          </div>
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Judul</label><p>: <?php echo $judul_kuisioner->row()->judul;?></p>
          </div>
        </div>
      </form>
    </div>

    <h3 class="box-title" style="margin-top: 10px;">Keterangan Mata Kuliah</h3>

      <div class="box box-primary">

      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Tahun Akademik</label><p>: <?php echo (substr($jadwal->row()->keterangan, 0,4)); echo "-"; echo substr($jadwal->row()->keterangan, -1);?></p>
          </div>
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Mata Kuliah</label><p>: <?php echo $jadwal->row()->nama_mk;?></p>
          </div>
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Kelas</label><p>: <?php echo $jadwal->row()->nama_kelas;?></p>
          </div>
          <div class="form-row">
            <label class="col-sm-1 from-control-label">Dosen</label><p>: <?php echo $jadwal->row()->nama_lengkap;?></p>
          </div>
        </div>
      </form>
    </div>

    <?php echo form_open("main_controller/kuisioner_mhs_tipe_satu_addNew"); ?>
    <h3 class="box-title" style="margin-top: 10px;">List Pertanyaan</h3>
      <div class="box box-primary">
      <form class="form-horizontal">
        <div class="box-body">
          <div style="padding-left: 10px">
            <form>
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
                    <td><center><input type="radio" name="<?php echo $data->id_kuisioner_pertanyaan; ?>" value="1"></center></td>
                    <td><center><input type="radio" name="<?php echo $data->id_kuisioner_pertanyaan; ?>" value="2"></center></td>
                    <td><center><input type="radio" name="<?php echo $data->id_kuisioner_pertanyaan; ?>" value="3"></center></td>
                    <td><center><input type="radio" name="<?php echo $data->id_kuisioner_pertanyaan; ?>" value="4" checked></center></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>

            </table>
              <input type="hidden" class="form-control" name="id_kuisioner_judul" value="<?php echo $judul_kuisioner->row()->id_kuisioner_judul; ?>" readonly>
              <input type="hidden" class="form-control" name="nim" value="<?php echo $this->session->kode_user; ?>" readonly>
              <input type="hidden" class="form-control" name="id_jadwal_master" value="<?php echo $jadwal->row()->id_jadwal_master; ?>" readonly>
              <input type="hidden" class="form-control" name="jumlah_pertanyaan" value="<?php echo $i; ?>" readonly>
              <?php if ($pertanyaan_kuisioner->num_rows()>0) {
                ?>
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                <?php
              } ?>


            </form>
            </div>
        </div>
      </form>
    </div>
    <?php echo form_close();?>
  </div>
</div>


</div>
