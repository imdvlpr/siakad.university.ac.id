<!DOCTYPE html>
<head>
<title>Kartu Ujian Mahasiswa</title>
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
	padding-left: 30px;
	padding-right: 30px;
  padding-top: 30px;
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
    <div style="padding-bottom:30px">
      <table width="100%" border="0px" style="padding-bottom: 20px;">
  			<tbody>
  				<tr>
  					<td width="15%">
  						<table width="100%" border="0">
  							<tbody>
  								<tr>
  									<td>
                      <div style="width:auto;float:left;">
                        <img src="rio.jpg" style="width:30mm;height:40mm">
                      </div>
                    </td>
                </tbody>
  						</table>
  					</td>
            <td width="85%">
  						<table width="100%" border="0">
  							<tbody>
  								<tr>
  									<td><div class="hd_print_biodatamhs" width="100%" align="center">
                			<div style="width:auto;float:left;margin:5px;">
                				<img src="STKIP Yasika Majalengka.png" style="width:20mm;height:22mm">
                			</div>
                				<div align="left" style="float:left;margin:10px 10px 0px 10px;padding-top: 5px">
                					<address><b>STKIP Yasika Majalengka</b>
                					<br>
                						Kasokandel, Majalengka <br>
                						Jawa Barat 45453 <br>
                						Indonesia <br>
                					</address>
                				</div>
                				<div style="display:block;width:100%;clear:both;">
                				</div>
                				<hr style="border : 1px solid;"></hr>
                        <h2 align="center" style="margin-bottom: 5px;">Kartu Ujian</h2>
                		</div></td>
  								</tr>
                  <tr>
                    <td>
                      <div id="table_bio">
                    		<table width="100%" border="0px">
                    			<tbody>
                    				<tr>
                    					<td width="50%">
                    						<table border="0">
                    							<tbody>
                    								<tr>
                    									<td>Nama</td>
                    									<td>:</td>
                    									<td><?php echo $this->session->display_name; ?></td>
                    								</tr>
                    								<tr>
                    									<td>NIM</td>
                    									<td>:</td>
                    									<td><?php echo $this->session->kode_user; ?></td>
                    								</tr>
                    								<tr>
                    									<td>Program Studi</td>
                    									<td>:</td>
                    									<td><?php echo $this->main_model->getNameSatuProdi($mahasiswa->row()->kampus_prodi); ?></td>
                    								</tr>
                    						</table>
                    					</td>
                    				</tr>
                    			</tbody>
                    		</table>
                    	</div>
                    </td>
                  </tr>
                </tbody>
  						</table>
  					</td>
  				</tr>
  			</tbody>
  		</table>
    </div>
	</header>

  <?php
    $jumdat = 0;
    foreach($jadwalmhs->result() as $data):
      if ($data->jenis_ujian == 1) {
        $jumdat++;
      }
    endforeach;
    if ($jumdat>0) {
      ?>
      <table class="tabelksm" border="1px" style="width: 100%;">
        <thead>
          <tr style="height: 30px">
            <th rowspan="2">No</th>
            <th rowspan="2">Mata Kuliah</th>
            <th colspan="4">UTS</th>
          </tr>
          <tr style="height: 30px">
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Ruangan</th>
            <th>Paraf</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          <?php foreach($jadwalmhs->result() as $data):?>
          <?php $i += 1; ?>
          <?php if ($data->jenis_ujian == 1) {
            ?>
            <tr>
              <td><?php echo $i?></td>
              <td><?php echo ($data->nama_mk); ?></td>
              <td><?php echo ($data->nama_hari); ?></td>
              <td><?php echo ($data->jam_mulai); ?></td>
              <td><?php echo ($data->nama_ruangan); ?></td>
              <td>...</td>
            </tr>
            <?php
          } ?>
          <?php endforeach; ?>
        </tbody>

      </table>
      <?php
    }
    $jumdat = 0;
    foreach($jadwalmhs->result() as $data):
      if ($data->jenis_ujian != 1) {
        $jumdat++;
      }
    endforeach;
    if ($jumdat>0) {
      ?>
      <table class="tabelksm" border="1px" style="width: 100%; margin-top:20px;">
        <thead>
          <tr style="height: 30px">
            <th rowspan="2">No</th>
            <th rowspan="2">Mata Kuliah</th>
            <th colspan="4">UAS</th>
          </tr>
          <tr style="height: 30px">
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Ruangan</th>
            <th>Paraf</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          <?php foreach($jadwalmhs->result() as $data):?>
          <?php $i += 1; ?>
          <?php if ($data->jenis_ujian != 1) {
            ?>
            <tr>
              <td><?php echo $i?></td>
              <td><?php echo ($data->nama_mk); ?></td>
              <td><?php echo ($data->nama_hari); ?></td>
              <td><?php echo ($data->jam_mulai); ?></td>
              <td><?php echo ($data->nama_ruangan); ?></td>
              <td>...</td>
            </tr>
            <?php
          } ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php
    }
  ?>

  <div style="padding-top:15px">
	  <p style="text-align: left; font-size: 10px;"><i>Kartu Ujian dicetak pada tanggal <?php echo date("Y-m-d"); ?> pukul <?php echo date("h-i-sa"); ?> oleh <?php echo $this->session->display_name; ?></i></p>
 ?></b> oleh <b><?php echo $this->session->display_name; ?></b></i></p>
  </div>
</body>
</html>
