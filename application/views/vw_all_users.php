
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
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
            <h3 class="box-title">Tabel Users</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
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
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

<script type="text/javascript">

</script>
  <!-- /.content -->
</div>
