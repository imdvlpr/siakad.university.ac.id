<!DOCTYPE html>
<head>
	<title>Kartu Hasil Studi</title>
	<style type="text/css"></style>
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
	border-left: 1px solid #000000;
	border-right: 1px solid #000000;
	padding: 0px;
	background : none;
}
.tabelkhs tr{
	text-align: center;
}
.tabelkhs td:nth-child(2){
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

</style>
 <body onload="window.print()">
	<header>
		<h3 align="center">KARTU HASIL STUDI MAHASISWA</h3>
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
									<td><?php echo $mahasiswa->row()->nama; ?></td>
								</tr>
								<tr>
									<td>NIM</td>
									<td>:</td>
									<td><?php echo $mahasiswa->row()->nim; ?></td>
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
									<td>Genap 2020</td>
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

	<header>
		<h3 align="center">Mata Kuliah Lulus</h3>
	</header>
	<table class="tabelkhs" style="width: 100%; border-bottom: 1px solid #000000; border-top: 1px solid #000000;">
		<thead>
			<tr style="height: 30px">
				<th>Semester</th>
				<th>Kode Mata Kuliah</th>
				<th>Nama Mata Kuliah</th>
				<th>SKS</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
		<?php $i = 0; ?>
    	<?php foreach($nilaimhs->result() as $data):?>
    	<?php $i += 1; ?>
			<tr>
				<th>1</tH>
				<th><?php echo $data->kode_mk	 ?></th>
				<th><?php echo $data->nama_mk	 ?></th>
				<th><?php echo $data->sks_mk	 ?></th>
				<th><?php echo $data->nilai 	 ?></th>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<header>
		<h3 align="center">Mata Kuliah yang Belum Lulus </h3>
	</header>
	<table class="tabelkhs" style="width: 100%; border-bottom: 1px solid #000000; border-top: 1px solid #000000;">
		<thead>
			<tr style="height: 30px">
				<th>Semester</th>
				<th>Kode Mata Kuliah</th>
				<th>Nama Mata Kuliah</th>
				<th>SKS</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
		<?php $i = 0; ?>
    	<?php foreach($nilaimhsngulang->result() as $data):?>
    	<?php $i += 1; ?>
			<tr>
				<th>1</tH>
				<th><?php echo $data->kode_mk	 ?></th>
				<th><?php echo $data->nama_mk	 ?></th>
				<th><?php echo $data->sks_mk	 ?></th>
				<th><?php echo $data->nilai 	 ?></th>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<header>
		<h3 align="center">Mata Kuliah yang Diulang</h3>
	</header>
	<table class="tabelkhs" style="width: 100%; border-bottom: 1px solid #000000; border-top: 1px solid #000000;">
		<thead>
			<tr style="height: 30px">
				<th>Semester</th>
				<th>Kode Mata Kuliah</th>
				<th>Nama Mata Kuliah</th>
				<th>SKS</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>




	<div id="table_IP" style="padding-top: 20px; margin-bottom: 20px;">
		<table width="60%" border="0px">
			<tbody>
				<tr>
					<td width="50%">
						<table width="100%" border="0">
							<tbody>
								<tr>
									<td>Tingkat I</td>
									<td>:</td>
									<td>49 SKS</td>
								</tr>
								<tr>
									<td>Tingkat II</td>
									<td>:</td>
									<td>79 SKS</td>
								</tr>
								<tr>
									<td>Tingkat III</td>
									<td>:</td>
									<td>106 SKS</td>
								</tr>
								<tr>
									<td>Total SKS</td>
									<td>:</td>
									<td>106 SKS</td>
								</tr>
						</table>
					</td>
					<td width="50%">
						<table width="100%" border="0">
							<tbody>
								<tr>
									<td>Lulus tanggal 01-08-2017</td>
									<td>IP :</td>
									<td>4.00</td>
								</tr>
								<tr>
									<td>Belum lulus</td>
									<td>IP :</td>
									<td>4.00</td>
								</tr>
								<tr>
									<td>Belum lulus</td>
									<td>IP :</td>
									<td>4.00</td>
								</tr>
								<tr>
									<td></td>
									<td>IPK :</td>
									<td>4.00</td>
								</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>


	<p style="text-align: left; font-family: arial; font-size: 10px;">Total SKS dan IPK dihitung mata kuliah dan mata kuliah belum lulus. Nilai kosong dan T tidak diikutkan dalam perhitungan IPK.

	<div style="display:block;width:100%;clear:both;">
	</div>
	<hr style="border : 0.5px solid;"></hr>
	<p style="text-align: left; font-size: 10px;"><i>KHS dicetak pada tanggal <?php echo date("Y-m-d"); ?> pukul <?php echo date("h-i-sa"); ?> oleh <?php echo $this->session->display_name; ?></i></p>

</body>
