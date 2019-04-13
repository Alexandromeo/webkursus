<!DOCTYPE html>
<html>
<head>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
</head>
<!DOCTYPE html>
<html>
<head>
<?php 	
include "header.php";
require_once("../lib/cipher.php");
$cipher = new cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
?>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php 	
	
	$belumaktif = mysqli_num_rows(mysqli_query($konek, "select memberbayar.id, strukmember.idmember from memberbayar, strukmember where memberbayar.id = strukmember.idmember and memberbayar.bayar != '1'"));
	
	$jumlahmember = mysqli_num_rows(mysqli_query($konek, "select online from memberbayar")) + mysqli_num_rows(mysqli_query($konek, "select online from membergratis"));

	$kontenterbaru = mysqli_query($konek, "select id, judul from konten order by id desc limit 0,10");
	$kategoribahasa = mysqli_query($konek, "select distinct (bahasa) from konten order by bahasa asc");
	$jumlahkonten = mysqli_num_rows(mysqli_query($konek, "select id, judul from konten"));

	$jmladmin = mysqli_num_rows(mysqli_query($konek, "select id from admin"));

	$struk = mysqli_query($konek, "select pesananbarang.biaya, pesananbarang.id, transaksibarang.invoice, transaksibarang.struk from pesananbarang, transaksibarang where pesananbarang.tagihan = transaksibarang.invoice and pesananbarang.status = '0'");

	$belumaccpembayaran = mysqli_num_rows($struk);

	$penarikan = mysqli_num_rows(mysqli_query($konek, "select id from penarikan where persetujuan = '0'"));
?>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
		<center>
			<table>
				<tr>
					<td class="responsive" style="padding-right: 60px;">
						<div class="member-online col-md-12 col-sm-12">
							<b><h3>Member Belum Aktif<img src="../icon/onman.svg" style="height: 65px;width: 65px; float: right;">
							<br><h4><?= $belumaktif; ?> Orang</h4></h3></b>
						</div>
					</td>

					<td class="responsive" style="padding-right: 60px;">
						<div class="member-all">
							<b><h3>Semua Member<img src="../icon/allman.svg" style="height: 65px;width: 65px; float: right;">
							<br><h4><?= $jumlahmember; ?> Orang</h4></h3></b>
						</div>
					</td>

					<td>
						<div class="jumlah-konten">
							<b><h3>Jumlah Konten<img src="../icon/jumlah-konten.svg" style="height:65px;width: 65px; float: right;">
							<br><h4><?= $jumlahkonten; ?> Konten</h4></h3></b>
						</div>
					</td>
				</tr>	
			</table>
			</center>
			
			<br><h3 style="color: #6287da;"><b>Data Konten dan Admin</b></h3><br>
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>Jumlah Konten</th>
					<th>Konten Belum Diterbitkan</th>
					<th>Jumlah Admin</th>
				</tr>

				<tr>
					<td><?= $jumlahkonten; ?> Konten</td>
					<td><?= mysqli_num_rows(mysqli_query($konek, "select id from konten where penerbit = ''")); ?> Konten</td>
					<td><?= $jmladmin; ?> Orang</td>
				</tr>
			</table>

			<br><h3 style="color: #6287da;"><b>Data Transaksi</b></h3><br>
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>Member Belum Aktif</th>
					<th>Transaksi Belum Tekonfirmasi</th>
					<th>Pencairan Saldo Belum Terkonfirmasi</th>
				</tr>

				<tr>
					<td><?= $belumaktif; ?> Orang</td>
					<td><?= $belumaccpembayaran; ?> Transaksi</td>
					<td><?= $penarikan; ?> Penarikan</td>
				</tr>
			</table>			
		</div>
		<br><br>
		</div>
</body>
</html>