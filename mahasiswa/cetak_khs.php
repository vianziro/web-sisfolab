<?php
session_start();
include "../conn.php";
$today = date('d-m-Y');
$today2 = date('Y');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 

function bobot($data){
	if($data=='A'){ $bobot = 4; }
	else if($data=='B'){$bobot = 3;}
	else if($data=='C') { $bobot = 2; }
	else if($data=='E') { $bobot = 0; }
	else { $bobot = 0; }	
	return $bobot;
}

function data_smstr($Semester){
	if($Semester==1){ $data_smstr = 'Awal'; }
	else if($Semester==2) {$data_smstr = 'Akhir';}
	else if($Semester==3) { $data_smstr = 'Awal'; }
	else if($Semester==4) { $data_smstr = 'Akhir'; }
	else if($Semester==5) { $data_smstr = 'Awal'; }
	else if($Semester==6) { $data_smstr = 'Akhir'; }
	else if($Semester==7) { $data_smstr = 'Awal'; }
	else if($Semester==8) { $data_smstr = 'Akhir'; }
	else { $data_smstr = ''; }	
	return $data_smstr;
}
function belanja($ipk){
	if($ipk>=round(0.1,1) && $ipk<=round(2.0,1)){
		echo "SKS Yang dapat di belanjakan : 12"; }
	else if($ipk>=round(2.1,1)&&$ipk<=round(2.5,1)){
		echo "SKS Yang dapat di belanjakan : 17 "; }
	else if($ipk>=round(2.6,1)&&$ipk<=round(3.0,1)){
		echo "SKS Yang dapat di belanjakan : 20 "; }
	else if($ipk>=round(3.1,1)&&$ipk<=round(4.0,1)){
		echo "SKS Yang dapat di belanjakan : 24 "; }	
	else { echo "SKS Yang dapat di belanjakan : 0";
	}
}
?>
<head>
	<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css">
	<style type="text/css">
	<!--
	body {
	margin-left: 15%;
	margin-right: 15%;
	}
	-->
	</style>
</head>
<body onload="window.print()">
<table>
	<tr>
		<td style="font-weight: bold;">
			<br>
			UNIVERSITAS MUSLIM INDONESIA <span style="margin:0 3px;"></span>
			<br>
			FAKULTAS ILMU KOMPUTER <span style="margin:0 3px;"></span><br>
		</td>
	</tr>
</table>
<h3>KARTU HASIL STUDI MAHASISWA</h3>
<h3>JURUSAN TEKNIK INFORMATIKA</h3>
		<?php
		$Semester=$_GET['id'];
		$query = mysql_query("select * from identitas where Stb='$_SESSION[Stb]'")or die(mysql_error());
		while($data=mysql_fetch_array($query)){
		?>
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	<th style="text-align:left;">Semester / Tahun Ajaran</th>
	<td>:</td>
	<td style="text-align: left;"><?php echo data_smstr($Semester); ?> / <?php echo $today2; ?></td>
	</tr>
	
	<tr>
	<th style="text-align:left;">Stb / Nama Mahasiswa</th>
	<td>:</td>
	<td style="text-align: left;"><?php echo $data['Stb']; ?> / <?php echo $data['Nama']; ?></td>
	</tr>

	<tr>
	<th style="text-align:left;">Jenis Kelamin</th>
	<td>:</td>
	<td style="text-align: left;"><?php echo $data['JK']; ?></td>
	</tr>
		<?php } ?>
</table>

<table border="1" class="data">
	<tr style="font-weight: bold; text-align:center;">
		<td class="data">No.</td>
		<td class="data">Kode</td>
		<td class="data">Mata Kuliah</td>
		<td class="data">SKS</td>
		<td class="data">Nilai</td>
		<td class="data">Bobot</td>
		<td class="data">NxB</td>
	</tr>
	<?php
		
		$Semester=$_GET['id'];
		$query = mysql_query("select * from inputkrs a , jadwal b where a.indeks = b.indeks and a.Stb='$_SESSION[Stb]' and b.Semester='$Semester'")or die(mysql_error());
		$summary = 0;
		$sumSks = 0;
	
		$no = 1;
		while($data=mysql_fetch_array($query)){
	?>

		<tr>
			<td class="data" style="text-align: center;"><?php echo $no; ?></td>
			<td class="data" style="text-align: center;"><?php echo $data['Kode']; ?></td>
			<td class="data"><?php echo $data['Matkul']; ?></td>
			<td class="data" style="text-align: center;">
			<?php 
			echo $data['SKS'];
			$sumSks += $data['SKS'];
			?>
			</td>
			<td class="data" style="text-align: center;"><?php echo $data['Nilai']; ?></td>
			<td class="data" style="text-align: center;"><?php echo bobot($data['Nilai']); ?></td>
			<td class="data" style="text-align: center;">
			<?php 
			echo $sumTemp = $data['SKS'] * bobot($data['Nilai']); 
			$summary += $sumTemp;
			?>
			</td>
			
		</tr>
	<?php
		$no++;
		}
	?>

	<tr>
		<td colspan="7" class="data" style="font-weight: bold;">
			Total yang di belanja : <span style="margin:0 3px;"><?php echo $sumSks; ?></span>
			<br>
			IPK Semester Kini : <span style="margin:0 3px;"><?php echo $ipk=round($summary/$sumSks,2); ?></span><br>
			<?php belanja($ipk); ?>
		</td>
	</tr>

</table>
<table border="0" width="100%">
<tr>
	<td width="55%"></td>
	<td align="center" nowrap="nowrap">
	Makassar, <?php echo $today; ?><br>
	Wakil Dekan I
	<br><br><br><br><br>
	(A. SURYANTO, ST., MT)<br>															
	</td>
	</tr>
	</table>
</body>
