<head>
<title>Biodata Mahasiswa</title>
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
        <img src="https://pbs.twimg.com/profile_images/825975579388239872/UiPXPhkL_400x400.jpg" style="width:20mm;height:22mm">
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

				</div>
				<div style="display:block;width:100%;clear:both;">
				</div>
				<hr style="border : 1px solid;"></hr>
				<h3 align="center">DATA MAHASISWA</h3>
		</div>
	</header>
	<div style="display:block;width:100%;clear:both;">
				</div>
				<hr style="border : 0.5px solid;"></hr>
	<div id="table_bio">
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td width="200px">NIM</td>
					<td width="10px">: </td>
					<td><?php echo $mahasiswa->row()->nim; ?></td>
				</tr>
				<tr>
					<td width="50px">Nama</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->nama; ?></td>
				</tr>
				<tr>
					<td width="50px">Angkatan</td>
					<td width="5px">:</td>
					<td>
						<?php echo $this->main_model->getNameSatuAngkatan($mahasiswa->row()->angkatan_id);?></td>
				</tr>
				<tr>
					<td width="50px">Program Studi</td>
					<td width="5px">:</td>
					<td><?php echo $this->main_model->getNameSatuProdi($mahasiswa->row()->kampus_prodi);?></td>
				</tr>
				<tr>
					<td width="50px">Kelas</td>
					<td width="5px">:</td>
					<td><?php echo $this->main_model->getNameSatuKelas($mahasiswa->row()->id_kelas);?></td>
				</tr>
				<tr>
					<td width="170px">Alamat</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->alamat; ?></td>
				</tr>
				<tr>
					<td width="170px">Jenis Kelamin</td>
					<td width="5px">:</td>
					<td>
						<?php
						if ($mahasiswa->row()->gender == 'p') {
						 	echo "Pria";
						 }
						 else{
						 	echo "Wanita";
						 }?>

					</td>
				</tr>
				<tr>
					<td width="170px">Agama</td>
					<td width="5px">:</td>
					<td><?php echo $this->main_model->getNameSatuAgama($mahasiswa->row()->agama_id);?></td>
				</tr>
				<tr>
					<td width="170px">Tanggal Lahir</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->tanggal_lahir; ?></td>
				</tr>
				<tr>
					<td width="170px">Tempat Lahir</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->tempat_lahir; ?></td>
				</tr><tr>
					<td width="170px">Nama Ayah</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->nama_ayah; ?></td>
				</tr><tr>
					<td width="170px">Nama Ibu</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->nama_ibu; ?></td>
				</tr><tr>
					<td width="170px">Nomor Telepon Orang Tua</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->no_hp_ortu; ?></td>
				</tr><tr>
					<td width="170px">Pekerjaan Ayah</td>
					<td width="5px">:</td>
					<td><?php echo $this->main_model->getNameSatuPekerjaan($mahasiswa->row()->pekerjaan_id_ayah);?></td>
				</tr><tr>
					<td width="170px">Pekerjaan Ibu</td>
					<td width="5px">:</td>
					<td><?php echo $this->main_model->getNameSatuPekerjaan($mahasiswa->row()->pekerjaan_id_ibu);?></td>
				</tr><tr>
					<td width="170px">Alamat Ayah</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->alamat_ayah; ?></td>
				</tr><tr>
					<td width="170px">Alamat Ibu</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->alamat_ibu; ?></td>
				</tr><tr>
					<td width="170px">Penghasilan Ayah</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->penghasilan_ayah; ?></td>
				</tr><tr>
					<td width="170px">Penghasilan Ibu</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->penghasilan_ibu; ?></td>
				</tr><tr>
					<td width="170px">Nama Sekolah</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->sekolah_nama; ?></td>
				</tr><tr>
					<td width="170px">Nomor Telepon Sekolah</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->sekolah_telpon; ?></td>
				</tr><tr>
					<td width="170px">Alamat Sekolah</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->sekolah_alamat; ?></td>
				</tr><tr>
					<td width="170px">Jurusan Sekolah</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->sekolah_jurusan; ?></td>
				</tr><tr>
					<td width="170px">Tahun Lulus</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->sekolah_tahun_lulus; ?></td>
				</tr><tr>
					<td width="170px">Semester Aktif</td>
					<td width="5px">:</td>
					<td><?php echo $mahasiswa->row()->semester_aktif; ?></td>
				</tr>
		</table>
	</div>
	<div style="display:block;width:100%;clear:both;">
	</div>
	<hr style="border : 1px solid;"></hr>
</body>

</html>
