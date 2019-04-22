<title>SIAKAD | DASHBOARD</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" type="image/x-icon" href="https://pbs.twimg.com/profile_images/825975579388239872/UiPXPhkL_400x400.jpg" />
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap-datepicker3.min.css">
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
    days = new Array('Minggu', 'Sening', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
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
<!-- CUSTOM CSS -->
<style media="screen">
  body{
    /* padding-top: 50px; */
    padding-bottom: 50px;
    letter-spacing: 0;
    margin: 0;
    font-family: "Segoe UI";
    font-size: 0.9rem;
    font-weight: 300;
    line-height: 1.5;
    color: #000;
    text-align: left;
    background-color: #fff;
  }
  .title-left{
    float: left;
  }
  .title-right{
    float: right;
  }
  .judul {
    margin-top: 0;
    margin-bottom: 5px;
    font-weight: 500;
    font-size: 20px;
    letter-spacing: 1px;

  }
  h6,h1{
    margin-top: 0;
    margin-bottom: 5px;
    font-weight: 500;
    font-size: 85%;
    color: #a2a9b1;
    letter-spacing: 1px;
    text-transform: uppercase;
  }
  h2{
    margin-bottom: 0.5rem;
    font-weight: 300;
    font-family: inherit;
    line-height: 1.2;
    color: inherit;
  }
  h4,h3{
    margin-bottom: 0px;
    font-weight: 300;
    font-family: inherit;
    color: inherit;
  }
  .col{
    padding: 0px;
  }
  .panel-title a{
    color: #1997c6;
    text-decoration: none;
    background-color: transparent;
    display: block;
    padding: 0.6rem 1rem;
    border-radius: 0.25rem;
    font-weight: 350;
    font-family: inherit;
    font-size: 15px;
  }
  .panel-title a.active{
    color: #fff;
    background-color: #1997c6;
  }
  .panel-title a i{
    margin-right: 13px;
  }
  #boxbox .col{
    margin:0px 10px;
  }
  .inner{
    padding:10px;
    color : #fff !important;
  }
  .icon{
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: -3px;
    right: 20px;
    z-index: 0;
    font-size: 65px;
    color: rgba(0,0,0,0.15);
  }
  .title-content{
    margin-bottom: 1rem;
  }
  #tabelkeren {
    width: 100%;
  }
  #tabelkeren_filter input{
    border: 1px solid #ccc;
    border-radius: 3px;
    min-height: 30px;
  }
  th {
    text-transform: lowercase;
  }

  th::first-letter {
      text-transform: uppercase;
  }
  #date_time{
    border: 1px solid #ccc;
    border-radius: 3px;
    min-height: 30px;
    padding: 10px;
  }
  .form-row input,select,textarea{
    margin-bottom: 10px;
  }
  #datepicker, #datepicker2{
    margin-bottom: 10px;
  }
  .modal-dialog {
    max-width: 700px;
  }
  .main-header {
      position: relative;
      max-height: 100px;
      z-index: 1030;
      background: #357CA5;
      color: #fff;
  }
  .main-header a{
    text-decoration: none !important;
    color: #fff;
  }
  .main-header .logo {
      -webkit-transition: width .3s ease-in-out;
      -o-transition: width .3s ease-in-out;
      transition: width .3s ease-in-out;
      display: block;
      float: left;
      height: 50px;
      font-size: 20px;
      line-height: 50px;
      text-align: center;
      width: 310px;
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      padding: 0 15px;
      font-weight: 300;
      overflow: hidden;

      background: #3C8DBC;
  }
  .main-header .logo .logo-mini {
      display: none;
  }
  b, strong {
      font-weight: 700;
  }
  .main-header .logo .logo-lg {
      display: block;
  }
  .main-header .navbar {
      -webkit-transition: margin-left .3s ease-in-out;
      -o-transition: margin-left .3s ease-in-out;
      transition: margin-left .3s ease-in-out;
      margin-bottom: 0;
      margin-left: 230px;
      border: none;
      min-height: 50px;
      border-radius: 0;
  }
  .main-header .navbar-custom-menu, .main-header .navbar-right {
      float: right;
  }
  .navbar-custom-menu>.navbar-nav>li {
      position: relative;
  }
  .main-header .sidebar-toggle {
      float: left;
      background-color: transparent;
      background-image: none;
      padding: 15px 15px;
      font-family: fontAwesome;
  }
  .navbar-custom-menu>.navbar-nav>li>.dropdown-menu {
      position: absolute;
      right: 0;
      left: auto;
      width: 250px;
  }
  .navbar-nav>.user-menu>.dropdown-menu>li.user-header {
      height: 175px;
      padding: 10px;
      text-align: center;
  }
  .navbar-nav>.user-menu>.dropdown-menu>li.user-header>img {
      z-index: 5;
      height: 90px;
      width: 90px;
      border: 3px solid;
      border-color: transparent;
      border-color: rgba(255,255,255,0.2);
  }
  .navbar-nav>.user-menu>.dropdown-menu>li.user-header>p {
      z-index: 5;
      color: #fff;
      color: rgba(255,255,255,0.8);
      font-size: 17px;
      margin-top: 10px;
  }
  .navbar-nav>.user-menu>.dropdown-menu>.user-body {
      padding: 15px;
      border-bottom: 1px solid #f4f4f4;
      border-top: 1px solid #dddddd;
  }
  .navbar-nav>.user-menu>.dropdown-menu, .navbar-nav>.user-menu>.dropdown-menu>.user-body {
      border-bottom-right-radius: 4px;
      border-bottom-left-radius: 4px;
  }
  .navbar-nav>.user-menu>.dropdown-menu>.user-body a {
      color: #444 !important;
  }
  .navbar-nav>.user-menu>.dropdown-menu>.user-footer {
      background-color: #f9f9f9;
      padding: 10px;
  }
  .navbar-nav>.user-menu>.dropdown-menu>.user-footer .btn-default {
      color: #666666;
  }
  .navbar-nav>.user-menu>.dropdown-menu>li.user-header>img {
      z-index: 5;
      height: 90px;
      width: 90px;
      border: 3px solid;
      border-color: transparent;
      border-color: rgba(255,255,255,0.2);
  }
  .navbar-nav>.user-menu .user-image {
      float: left;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      margin-right: 10px;
      margin-top: -2px;
  }
</style>
