<title>SIAKAD | DASHBOARD</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" type="image/x-icon" href="https://pbs.twimg.com/profile_images/825975579388239872/UiPXPhkL_400x400.jpg" />
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/customcss.css">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
