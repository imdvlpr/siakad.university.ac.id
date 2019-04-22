<!DOCTYPE html>
<head>
<title>Kartu Studi Mahasiswa</title>
<style type="text/css">
</style>
</head>
<style type="text/css" media="print,screen">
.crud_table tfoot td{
    background-color: #FFFFFF;
    border-bottom: 2px solid #6678B1;
    border-top: 2px solid #6678B1;
    color: #003399;
    cursor: pointer;
    font-size: 12px;
    font-weight: normal;
    padding: 2px;
}
body{
	font-family:arial;
	font-size:12px;
	padding-left: 50px;
	padding-right: 50px;
}
table{
	border-collapse: collapse;
}
table th{
	border-bottom: 1px solid #000000;
	border-top: 1px solid #000000;
	padding: 0px;
	background : none;
}
.tabelksm tr{
	text-align: center;
}
.tabelksm td:nth-child(2){
	text-align: left;
}

table tfoot td{
	border-top: 1px solid #000000;
	padding: 1px;
}
table td{
	padding-left: 10px;
	padding-right: 10px;
}
/*#table_bio{
	font-size: 13px;
	font-family: arial;
	padding-top: 5px;
	padding-right: 10px;
	padding-bottom: 5px;
	padding-left: 10px;
}*/
</style>
 <body onload="window.print()">
	<header>
		<div class="hd_print_biodatamhs" width="100%" align="center" style="float:">
			<div style="width:auto;position: middle;margin:5px;">
				<img src="STKIP Yasika Majalengka.png" style="width:30mm;height:33mm">
			</div>
			<h3 align="center">KARTU STUDI MAHASISWA</h3>
		</div>
	</header>
	<div id="table_bio" style="padding-top: 20px; margin-bottom: 20px;">
		<table width="100%" border="0px">
			<tbody>
				<tr>
					<td width="50%">
						<table width="100%" border="0">
							<tbody>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $this->session->display_name; ?></td>
								</tr>
								<tr>
									<td>NIM</td>
									<td>:</td>
									<td><?php echo $this->session->kode_user ?></td>
								</tr>
								<tr>
									<td>Program Studi</td>
									<td>:</td>
									<td><?php echo $this->main_model->getNameSatuProdi($mahasiswa->row()->kampus_prodi); ?></td>
								</tr>
						</table>
					</td>
					<td width="50%">
						<table width="100%" border="0">
							<tbody>
								<tr>
									<td>Semester</td>
									<td>:</td>
									<td><?php echo $mahasiswa->row()->semester_aktif; ?></td>
								</tr>
								<tr>
									<td>Angkatan</td>
									<td>:</td>
									<td><?php echo $this->main_model->getNameSatuAngkatan($mahasiswa->row()->angkatan_id);?></td>
								</tr>
								<tr>
									<td>Kelas</td>
									<td>:</td>
									<td><?php echo $this->main_model->getNameSatuKelas($mahasiswa->row()->id_kelas);?></td>
								</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<table class="tabelksm" style="width: 100%; border-bottom: 1px solid #000000; border-top: 1px solid #000000;">
		<thead>
			<tr style="height: 30px">
				<th>No</th>
				<th>Mata Kuliah</th>
				<th>SKS</th>
				<th>Kelas</th>
			</tr>
		</thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($jadwalmhs->result() as $data):?>
    <?php $i += 1; ?>

    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo ($data->nama_mk); ?></td>
      <td><?php echo ($data->sks_mk); ?></td>
      <td><?php echo ($data->nama_kelas); ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
	<!-- <p><b>Total SKS ...</b></p> -->
	<p style="text-align: right; font-family: arial; font-size: 10px;" ><i>Majalengka, 18-05-2018</i><br>Manager Bagian Administrasi Akademik</p>

	<p style="text-align: left; font-family: arial; font-size: 10px;">Bukti pengambilan mata kuliah berdasarkan KSM terakhir yang dicetak
		<br>Pengubahan atau pemalsuan data KSM akan dikenakan sanksi
		<br>KSM ini hanya berlaku pada semester saat ini</p>
	<div style="display:block;width:100%;clear:both;">
	</div>
	<hr style="border : 0.5px solid;"></hr>
	<p style="text-align: left; font-size: 10px;"><i>KSM dicetak pada tanggal <?php echo date("Y-m-d"); ?> pukul <?php echo date("h-i-sa"); ?> oleh <?php echo $this->session->display_name; ?></i></p>
</body>
</html>
