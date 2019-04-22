<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Lihat Hasil Kuisioner
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
        <li class="active"> Jadwal</li>
        <li class="active"> Jadwal Dosen</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
          <div class="container-fluid">
            <div class="row">
            <!-- left colum -->
              <div class="col-md-20">

              <h3 class="box-title" style="margin-top: 10px;">Pilih Tipe Kuisioner</h3>
                <div class="box box-primary">

                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-row">
                      <a href="<?php echo base_url()?>index.php/main_controller/view_list_kuisioner_by_jadwal_master/" class="btn btn-sm"><i class="fa fa-edit"></i> By Jadwal Master</a>
                      <a href="<?php echo base_url()?>index.php/main_controller/view_list_kuisioner_by_dosen/" class="btn btn-sm"><i class="fa fa-trash"></i> By Dosen</a>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>

    </section>

</div>
