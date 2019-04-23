<head>
<title>Biodata Dosen</title>
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
	font-size:14px;
}
table{
	border-collapse: collapse;
}
table th{
	border-bottom: 1px solid #000000;
	border-top: 1px solid #000000;
	padding: 1px;
	background : none;
}
table tfoot td{
	border-top: 1px solid #000000;
	padding: 1px;
}
table td{
	padding-top: 10px;
}
#table_bio{
	font-size: 13px;
	font-family: arial;
	padding-top: 15px;
	padding-right: 10px;
	padding-bottom: 25px;
	padding-left: 50px;
}
</style>
 <body onload="window.print()">
	<header>
		<div class="hd_print_biodatamhs" width="100%" align="center" style="float:">
			<div style="width:auto;float:left;margin:5px;">
				<img src="<?php echo base_url(); ?>source/img/logo.jpg" style="width:20mm;height:22mm">
			</div>
				<div align="left" style="float:left;margin:10px 10px 0px 10px;padding-top: 5px">
					<address><b>Universitas</b>
					<br>
						Bojong Soang, Bandung <br>
						Java Barat 45453 <br>
						Indonesia <br>
					</address>
				</div>
				<div style="width:auto;float:right;">
					<!-- <img src="" style="width:20mm;height:22mm"> -->
				</div>
				<div style="display:block;width:100%;clear:both;">
				</div>
				<hr style="border : 1px solid;"></hr>
				<h3 align="center">DATA DOSEN</h3>
		</div>
	</header>
	<div style="display:block;width:100%;clear:both;">
				</div>
				<hr style="border : 0.5px solid;"></hr>
	<div id="table_bio">
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td width="200px">NIDN</td>
					<td width="10px">: </td>
					<td><?php echo $dosen->row()->nidn; ?></td>
				</tr>
				<tr>
					<td width="50px">Nama Lengkap</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->nama_lengkap; ?> </td>
				</tr>
				<tr>
					<td width="50px">Status Pekerjaan</td>
					<td width="5px">:</td>
					<?php if($dosen->row()->status_pekerjaan == 1) : ?>
						<td>Tetap </td>
					<?php elseif($dosen->row()->status_pekerjaan == 2) : ?>
						<td>Tidak Tetap </td>
					<?php else: ?>
						<td>Uknown </td>
					<?php endif; ?>
				</tr>
				<tr>
					<td width="50px">NIP</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->nip; ?></td>
				</tr>
				<tr>
					<td width="50px">No KTP</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->no_ktp; ?></td>
				</tr>
				<tr>
					<td width="50px">Alamat</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->alamat; ?></td>
				</tr>
				<tr>
					<td width="170px">Jenis Kelamin</td>
					<td width="5px">:</td>
					<td><?php
						if ($dosen->row()->gender == 'L') {
						 	echo "Pria";
						 }
						 else{
						 	echo "Wanita";
						 }?><td>
				</tr>
				<tr>
					<td width="170px">Agama</td>
					<td width="5px">:</td>
					<td><?php echo $this->main_model->getNameSatuAgama($dosen->row()->agama_id);?></td>
				</tr>
				<tr>
					<td width="170px">Status Kawin</td>
					<td width="5px">:</td>
					<td><?php
						if ($dosen->row()->status_kawin == '1') {
						 	echo "Sudah Menikah";
						 }
						 else{
						 	echo "Belum Menikah";
						 }?></td>
				</tr>
				<tr>
					<td width="170px">Tempat Lahir</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->tempat_lahir; ?></td>
				</tr>
				<tr>
					<td width="170px">Tanggal Lahir</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->tanggal_lahir; ?></td>
				</tr>
				<tr>
					<td width="170px">Nomor HP</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->hp; ?></td>
				</tr>
				<tr>
					<td width="170px">Email</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->email; ?></td>
				</tr>
				<tr>
					<td width="170px">Gelar Pendidikan</td>
					<td width="5px">:</td>
					<td><?php echo $dosen->row()->gelar_pendidikan; ?></td>
				</tr>
				<tr>
					<td width="170px">Program Studi</td>
					<td width="5px">:</td>
					<td><?php echo $this->main_model->getNameSatuProdi($dosen->row()->prodi_id);?></td>
				</tr>
		</table>
	</div>
	<div style="display:block;width:100%;clear:both;">
	</div>
	<hr style="border : 1px solid;"></hr>
</body>

</html>
