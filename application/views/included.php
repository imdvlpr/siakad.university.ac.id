<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SIAKAD UNIV | Dashboard</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="icon" type="image/png" href="<?php echo base_url()?>source/AdminLTE_2/dist/img/stkip_logo.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/morris.js/morris.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/plugins/pace/pace.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/plugins/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/select2/dist/css/select2.min.css">


<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/morris.js/morris.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/dist/js/demo.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/select2/dist/js/select2.full.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>source/AdminLTE_2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>source/AdminLTE_2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
function date_time(id)
{
      date = new Date;
      year = date.getFullYear();
      month = date.getMonth();
      months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'October', 'November', 'Desember');
      d = date.getDate();
      day = date.getDay();
      days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
      h = date.getHours();
      if(h<10)
      {
              h = "0"+h;
      }
      m = date.getMinutes();
      if(m<10)
      {
              m = "0"+m;
      }
      s = date.getSeconds();
      if(s<10)
      {
              s = "0"+s;
      }
      result = ''+days[day]+', '+d+' '+months[month]+'  '+year+' | '+h+':'+m+':'+s;
      document.getElementById(id).innerHTML = result;
      setTimeout('date_time("'+id+'");','1000');
      return true;
}
</script>
<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }
  .modal-dialog {
    width: 0;
    min-width: 700px !important;
    max-width: 800px;
    margin: 30px auto;
  }
  .example-modal .modal {
    background: transparent !important;
  }

  #tabelkeren_wrapper .row{
    overflow: auto;
  }
</style>

<script>

    $(function () {
      $.ajaxSetup({
        type:"POST",
        url: "<?php echo base_url()?>index.php/main_controller/ambil_data",
        cache: false,
      });

      $("#prodi").change(function(){
        var value=$(this).val();
        if(value>0){
          $.ajax({
            data:{modul:'kelas_prodi',id:value},
            success: function(respond){
              $("#kelas").html(respond);
            }
          })
          $.ajax({
            data:{modul:'mk_prodi',id:value},
            success: function(respond){
              $("#matkul").html(respond);
            }
          })
          $.ajax({
            data:{modul:'dosen',id:value},
            success: function(respond){
              $("#dosen").html(respond);
            }
          })
        }
      });

      $("#gedung").change(function(){
        var value=$(this).val();
        if(value>0){
          $.ajax({
            data:{modul:'ruangan',id:value},
            success: function(respond){
              $("#ruangan_id").html(respond);
            }
          })
        }
      });

      // Setup - add a text input to each footer cell
//     $('#tabelkeren thead tr').clone(true).appendTo( '#tabelkeren thead' );
//     $('#tabelkeren thead tr:eq(1) th').each( function (i) {
//         var title = $(this).text();
//         $(this).html( '<input type="text" size="16" placeholder="CARI '+title+'" />' );
//
//         $( 'input', this ).on( 'keyup change', function () {
//             if ( table.column(i).search() !== this.value ) {
//                 table
//                     .column(i)
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//
//     } );
//     $('#tabelkeren thead tr:eq(1) #s').each( function (i) {
//         $(this).html('');
//     } );
//
//
//     var table = $('#tabelkeren').DataTable( {
//         orderCellsTop: true,
//         fixedHeader: true,
//         //dom: 'lfrtipB',
//         dom: "<'row'<'col-sm-6'<'col-sm-3'l><'col-sm-3'B>><'col-sm-6'f>>" +
// "<'row'<'col-sm-12'tr>>" +
// "<'row'<'col-sm-5'i><'col-sm-7'p>>",
//         buttons: [
//             'excel'
//         ]
//     } );

    $('#tabelkeren thead tr').clone(true).appendTo( '#tabelkeren thead' );
    $('#tabelkeren thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" size="16" placeholder="CARI '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );

    } );
    $('#tabelkeren thead tr:eq(1) #s').each( function (i) {
        $(this).html('');
    } );


    var table = $('#tabelkeren').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        //dom: 'lfrtipB',
        dom: "<'row'<'col-sm-6'<'col-sm-3'l><'col-sm-3'B>><'col-sm-6'f>>" +
"<'row'<'col-sm-12'tr>>" +
"<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            'excel'
        ]
    } );

      $('#tabelregis').DataTable();
      $('#tabeltk1').DataTable();
      $('#tabeltk2').DataTable();
      $('#tabeltk3').DataTable();
      $('#tabeltk4').DataTable();


      $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
      $('#datepicker2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
      $('.timepicker').timepicker({
        showInputs: false,
        showMeridian: false
      })
  })
</script>
