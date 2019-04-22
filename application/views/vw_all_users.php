<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Users Account</h2>
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
        <h4 class="title-content">Tabel Pengguna</h4>
      </div>
      <div class="col">
        
      </div>
    </div>
  </div>
  <table id="tabelkeren" class="table  table-striped  table-hover">
    <thead>
    <tr>
      <th>NIM/NIDN</th>
      <th>NAMA LENGKAP</th>
      <th>USERNAME</th>
      <th>LEVEL</th>
      <th>LOGIN TERAKHIR</th>
      <th id="s">OPERASI</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($user->result() as $data):?>
    <tr>
      <td><?php echo ($data->kode_user); ?></td>
      <td><?php echo ($data->display_name); ?></td>
      <td><?php echo ($data->username); ?></td>
      <td><?php if ($data->level == 1) {
        echo "Admin";
      }else if ($data->level==2) {
        echo "Dosen";
      }else if ($data->level==3) {
        echo "Mahasiswa";
      }?></td>
      <td><?php echo ($data->last_login); ?></td>
      <td>
        <a href="<?php echo base_url()?>index.php/main_controller/resetPwd/<?php echo ($data->kode_user); ?>" class="btn btn-sm"><i class="fa fa-key"></i> Reset Password</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>

    <tfoot>
    <tr>
      <th>NIM/NIDN</th>
      <th>NAMA LENGKAP</th>
      <th>USERNAME</th>
      <th>LEVEL</th>
      <th>LOGIN TERAKHIR</th>
      <th id="s">OPERASI</th>
    </tr>
    </tfoot>
  </table>
</div>
