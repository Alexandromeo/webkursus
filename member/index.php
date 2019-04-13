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

	$jumlahonlinebayar = mysqli_num_rows(mysqli_query($konek, "select online from memberbayar where online = '1'"));
	$jumlahonlinegratis = mysqli_num_rows(mysqli_query($konek, "select online from membergratis where online = '1'"));
	$jumlahonline = $jumlahonlinebayar + $jumlahonlinegratis;

	$jumlahmember = mysqli_num_rows(mysqli_query($konek, "select online from memberbayar")) + mysqli_num_rows(mysqli_query($konek, "select online from membergratis"));

	$kontenterbaru = mysqli_query($konek, "select id, judul from konten order by id desc limit 0,10");
	$kategoribahasa = mysqli_query($konek, "select distinct (bahasa) from konten order by bahasa asc");
	$jumlahkonten = mysqli_num_rows(mysqli_query($konek, "select id, judul from konten"));

	$toko = mysqli_query($konek, "select *from toko where email = '".$_SESSION['email']."'");
	$showtoko = mysqli_fetch_array($toko);
	$tokoyes = mysqli_num_rows($toko);

	if ($_SESSION['passwordpaid'])
	{
		$showprofile = mysqli_fetch_array(mysqli_query($konek, "select *from memberbayar where email = '".$_SESSION['email']."'"));
	}	

	else
	{
		$showprofile = mysqli_fetch_array(mysqli_query($konek, "select *from membergratis where email = '".$_SESSION['email']."'"));		
	}
?>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
		<center>
			<table>
				<tr>
					<td class="responsive" style="padding-right: 60px;">
						<div class="member-online col-md-12 col-sm-12">
							<b><h3>Member Online<img src="../icon/onman.svg" style="height: 65px;width: 65px; float: right;">
							<br><h4><?= $jumlahonline; ?> Orang</h4></h3></b>
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

		<hr noshade style="width: 90%; height: 1px; background-color: #ddd;">

		<div style="position: relative;">
			<div style="position: absolute;">
				<h4 style="margin-left: 600px; font-family: 'Firasans-SemiBold';">PROFIL ANDA</h4>
					<div style="margin-left: 600px; width: 500px;">
						<center>
							<?php
							if ($showprofile['foto'] != "")
							{
								?><img src='../img/user/<?= $showprofile[foto];?>' alt='<?= $showprofile['foto']; ?>' class='sidebar-foto'><?php
							} 

							else
							{
								?><img src="../icon/user.svg" alt="Foto Profil" class="sidebar-foto"><?php
							}
							?>
						</center><br>
							
						<table>
							<tr>
								<td>Username&nbsp;&nbsp;&nbsp;</td>
								<td>:&nbsp;&nbsp;&nbsp;</td>
								<td><strong><?= $showprofile['username']; ?></strong></td>
							</tr>

							<tr>
								<td>Email</td>
								<td>:</td>
								<td><b><?= $showprofile['email']; ?></b></td>
							</tr>

							<tr>
								<td>Status</td>
								<td>:</td>
								<td><b><?= $_SESSION['passwordpaid'] ? "Premium Member" : "<a target='_blank' href='../join.php'>Regular Member"; ?></b></td>
							</tr>

							<tr>	
								<td></td>												
								<td></td>
								<td></td>
								<td><a href="profile.php"><span style="float: right;">Edit Profil</span></a></td>
							</tr>
						</table>
					</div>
			</div>

			<div style="position: relative;">
				<h4 style="font-weight: normal; font-family: 'Firasans-SemiBold';">KONTEN TERBARU</h4>
					<div style="overflow-y: scroll; width: 35%; height: 100px;">
						<?php
						while ($arrkontenterbaru = mysqli_fetch_array($kontenterbaru)) 
						{
							?><a style="border-bottom: 1px solid #ddd; display: block;" href="materi.php?id=<?= $arrkontenterbaru[id]; ?>"><?= $arrkontenterbaru['judul']; ?></a><br><?php
						}?>
					</div>
			</div>

			<div style="position: absolute;">
				<h4 style="margin-top: 130px; font-weight: normal; font-family: 'Firasans-SemiBold';">KATEGORI KONTEN</h4>
					<div style="overflow-y: scroll; width: 253%; height: 100px;">
						<?php
						while ($kategori = mysqli_fetch_array($kategoribahasa))
						{
							?><a style="border-bottom: 1px solid #ddd; display: block;" style="padding:10px;" href="materi.php?lang=<?= $kategori['bahasa']; ?>"><?= $kategori['bahasa']; ?></a><br><?php
						}?>
					</div>
			</div>

			<div>
				<h4 style="margin-top: 130px; margin-left: 600px; font-weight: normal; font-family: 'Firasans-SemiBold';">PROFIL TOKO</h4>
				<div style="margin-left: 600px; width: 500px;">

				<?php
				if ($tokoyes>0)
				{
					?><center><img class="sidebar-foto" alt="../img/toko/<?= $showtoko[foto]; ?>" src="../img/toko/<?= $showtoko[foto]; ?>"></center><br>

					<table>
						<tr>
							<td>Nama Toko&nbsp;&nbsp;&nbsp;</td>
							<td>:&nbsp;&nbsp;&nbsp;</td>
							<td><b><?= $showtoko['nama']; ?></b></td>
						</tr>

						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><b><?= $showtoko['alamat']; ?></b></td>
						</tr>

						<tr>
							<td>Kota</td>
							<td>:</td>
							<td><b><?= $showtoko['kota']; ?></b></td>
						</tr>	

						<tr>
							<td>Provinsi</td>
							<td>:</td>
							<td><b><?= $showtoko['provinsi']; ?></b></td>
						</tr>	

						<tr>	
							<td></td>												
							<td></td>
							<td></td>
							<td><a href="market.php?act=edit"><span style="float: right;">Edit Toko</span></a></td>
						</tr>																						
					</table>
					<?php
				}

				else
				{
					?><div style="background-image: url('../img/profiltoko.jpg'); width: 400px; height: 200px;">
					</div><?php
				}?>

				</div>
			</div>

		</div>
		<br><br><br><br>
</body>
</html>