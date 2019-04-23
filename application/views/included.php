<title>SIAKAD | DASHBOARD</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>source/img/logo.jpg"/>
<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/customcss.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>source/font-awesome/css/font-awesome.min.css">
<!-- JS -->
<script src="<?php echo base_url(); ?>source/js/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>source/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/bootstrap-datepicker.min.js"></script>
<!-- CUSTOM JS -->
<script type="text/javascript">
  $(function() {
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
    $('#tabelkeren').DataTable();
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    // $('.timepicker').timepicker({
    //   showInputs: false,
    //   showMeridian: false
    // });
  });
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
