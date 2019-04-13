<!DOCTYPE html>
<html>
<head>
<?php 	
include "header.php"; 
$oop = new oop("shop.php");
require_once("../lib/cipher.php");
$cipher = new cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

?>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
</head>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
		<?php

		$showmoney = mysqli_fetch_array(mysqli_query($konek, "select *from virtualmoney where email = '".$_SESSION['email']."'"));

		if ($_GET['id'])
		{
			$inv = bin2hex(rand(00000001,99999999));
			$q = mysqli_query($konek, "select *from barang, transaksibarang where barang.id = '".$_GET['id']."' and barang.id = transaksibarang.idbarang");
			$qun = mysqli_query($konek, "select *from barang where id = '".$_GET['id']."'");

			$show = mysqli_fetch_array($qun);
			$rate = mysqli_num_rows($q);

			if ($_GET['act'] == "process")
			{
				$jmlinvoice = mysqli_num_rows(mysqli_query($konek, "select *from pesananbarang"));

				if($_GET['tagihan'] == "wait")
				{
					$email = $_SESSION['email'];
					$nama = $oop->amandata($_POST['nama']);
					$alamat = $oop->amandata($_POST['alamat']);
					$kecamatan = $oop->amandata($_POST['kecamatan']);
					$kota = $oop->amandata($_POST['kota']);
					$provinsi = $oop->amandata($_POST['provinsi']);
					$hp = $_POST['hp'];
					$jumlah = $_POST['jumlah'];
					$idbarang = $_GET['id'];

					$jasaongkir = $oop->amandata($_POST['jasaongkir']);

					if ($jasaongkir == "JNE")
					{
						$ongkir = 24000;
					}

					elseif($jasaongkir == "TIKI")
					{
						$ongkir = 20000;
					}

					elseif($jasaongkir == "Pos Indonesia")
					{
						$ongkir = 17500;
					}

					$biaya = $show['harga']*$jumlah+$ongkir;

					$buyer = mysqli_query($konek, "insert into pembeli (email, nama, alamat, kecamatan, kota, provinsi, hp, idbarang) values ('$email','$nama','$alamat','$kecamatan','$kota','$provinsi','$hp','$idbarang')");

					$transaction = mysqli_query($konek, "insert into pesananbarang (tagihan, biaya, jasaongkir, status, jumlah) values ('$inv','$biaya','$jasaongkir', 0, '$jumlah')");

					echo "<meta content='0; url=?id=".$_GET[id]."&act=process&tagihan=true' http-equiv='refresh'>"; 
				}

				elseif($_GET['tagihan'] == "true")
				{
					$detail = mysqli_fetch_array(mysqli_query($konek, "select *from pembeli, pesananbarang where pembeli.id = pesananbarang.id and pembeli.idbarang = '".$_GET['id']."' and pembeli.email = '".$_SESSION['email']."' order by pembeli.id desc limit 1"));

					$biaya = $show['harga']*$detail['jumlah'];
					$ongkir = $detail['biaya']-$biaya;

					if ($_GET['payment'] == "true")
					{
						?><pre><h5>Silahkan lakukan pembayaran sebesar Rp <?= number_format($detail['biaya'],"0",",","."); ?> menuju salah satu rekening di bawah ini, dan konfirmasi pembayaran jika sudah transfer.</h5><center><h3><b style="color: #5687dd;">Rp <?= number_format($detail['biaya'],"0",",","."); ?></b></h3></center>
						<center><pre style="width: 30%; overflow: hidden;"><b>Virtual Account BCA</b><br>
										<center><img src="../img/bca.svg" style="width: 180px; height: 60px;"></center>
										<pre style="overflow: hidden;">
											<center>No Rekening : <?= "8290-".$detail['hp']; ?></center>
										</pre>
								</pre><center>No. Tagihan : <b><?= $detail['tagihan']; ?></b><br><br><a href="shop.php?con=t"><button class="btn btn-default">Konfirmasi Pesanan</button></a></center></center><br><h5>Langkah Membayar dengan Virtual Account BCA</h5><ol><li>Masukkan Kartu ATM BCA Anda</li><li>Masukkan Kartu PIN ATM BCA Anda</li><li>Pilih Menu "Transaksi Lainnya"</li><li>Pilih Menu "Ke Rek. BCA Virtual Account</li><li>Masukkan Angka <?= "8290-".$detail['hp']; ?>, Lalu Pilih "<b>Benar</b>"</li><li>Perhatikan Apakah Data Transaksi Sudah Benar, Lalu Pilih "<b>Ya</b>"</li><li>Anda Berhasil Melakukan Transaksi</li></ol>
							</pre>
							<?php
					}

					else
					{
						?><h3><b>Tagihan Pembayaran</b>
						<span style="color: #6489dd; float: right; font-weight: bold;">Nomor Tagihan : <?= $detail['tagihan']; ?></span>
						</h3>

						<?php $oop->showtagihan($show['id'], $show['nama'], $show['foto'], $show['kondisi'], $detail['jumlah'], $biaya, $ongkir, $detail['biaya'], $detail['nama'], $detail['alamat'], $detail['kecamatan'], $detail['kota'], $detail['provinsi'], $detail['hp'], "shop");
					}
				}
				 

				else
				{
					?>
					<form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="?id=<?= $_GET[id]; ?>&act=process&tagihan=wait">
						<h3>Alamat Pengiriman Barang</h3><br>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10 col-md-8">
								<input type="text" class="form-control" value="<?= $_SESSION[email]; ?>" name="email" readonly style="cursor: no-drop;" required>
							</div>
						</div>

						<div class="form-group">
							<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
							<div class="col-sm-10 col-md-8">
								<input type="text" class="form-control" name="nama" required>
							</div>
						</div>

						<div class="form-group">
							<label for="alamat" class="col-sm-2 control-label">Alamat Lengkap</label>
							<div class="col-sm-10 col-md-8">
								<textarea class="form-control" name="alamat" style="min-height: 200px; max-height: 200px;"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="nama" class="col-sm-2 control-label">Kecamatan</label>
							<div class="col-sm-10 col-md-8">
								<input type="text" class="form-control" name="kecamatan" required>
							</div>
						</div>

						<div class="form-group">
							<label for="kota" class="col-sm-2 control-label">Kota</label>
							<div class="col-sm-10 col-md-8">
								<input type="text" class="form-control" name="kota" required>
							</div>
						</div>

						<div class="form-group">
							<label for="provinsi" class="col-sm-2 control-label">Provinsi</label>
							<div class="col-sm-10 col-md-8">
								<input type="text" class="form-control" name="provinsi" required>
							</div>
						</div>

						<div class="form-group">
							<label for="hp" class="col-sm-2 control-label">No. HP</label>
							<div class="col-sm-10 col-md-8">
								<input type="number" min="1" class="form-control" name="hp" required>
							</div>
						</div>

						<div class="form-group">
							<label for="hp" class="col-sm-2 control-label">Jumlah Item</label>
							<div class="col-sm-10 col-md-8">
								<input type="number" min="1" max="<?= $show['stok']; ?>" value="<?= $_POST['jumlah']; ?>" class="form-control" name="jumlah" required>
							</div>
						</div>
						
						<br>
						<hr noshade width="100%">
						<br>

						<h3>Biaya Pengiriman Barang</h3>
						<div class="form-group">
							<label for="hp" class="col-sm-2 control-label">Biaya Pengiriman</label>
							<div class="col-sm-10 col-md-8">
								<?php $oop->kurirtable(); ?>							
							</div>
						</div>

						<div class="form-group">
							<label for="hp" class="col-sm-2 control-label"></label>
							<div class="col-sm-10 col-md-8">
								<input type="submit" value="Proses Pesanan" class="btn btn-primary">
							</div>
						</div>

					</form><?php
				}
			}

			else
			{
				?>
				<ol class="breadcrumb">
				    <li><a href="shop.php">Home</a></li>
				    <li><a href="shop.php?category=<?= $show['kategori']; ?>"><?= $show['kategori']; ?></a></li>   
				    <li><?= $show['nama']; ?></li>     
				</ol>

				<form method="post" action="?id=<?= $show[id]; ?>&act=process">
				<table border="0">
					<tr>
						<td>
							<img style="width: 250px; height: 300px;" src="../img/barang/<?= $show[foto]; ?>">
						</td>

						<td colspan="1">
							<h3 style="font-weight: bold;"><?= $show['nama']; ?></h3>
							<h6>Terjual <?= $rate; ?>x</h6>
							<hr noshade style="width: 100%; height: 1px;">
							<h2 style="color: #5693dd; font-weight: bolder;">Rp <?= number_format($show['harga'],"0","","."); ?></h2>
							<b>Tersedia <span style="color: green;"><?= $show['stok']; ?> stok</span> barang</b><br><br>
							Masukkan Jumlah yang Akan Dibeli <input class="form-control" min="1" max="<?= $show[stok]; ?>" type="number" name="jumlah">
						</td>
					</tr>

					<tr>
						<td colspan="2" style="padding-top: 30px;">
							<button name="beli" class="btn btn-primary"><b><img src="../icon/cart.svg" style="width: 30px; height: 30px;">&nbsp;&nbsp;Beli Produk Ini</b></button>&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
				</table><br><br>
				</form>
				<?php
					$oop->descpembeli($show['berat'], $show['kategori'], $show['kondisi'], $show['deskripsi']);
			}
		}

		elseif ($_GET['con']) 
		{
			if (isset($_POST['konfirmasipembayaran']))
			{
				$invoice = $oop->amandata($_POST['invoice']);
				$struk = $_FILES['struk'];
				$namastruk = time().$struk['name'];
				$tmpstruk =  $struk['tmp_name'];

				$exploded = explode(".", $namastruk);
				$extention = strtolower(end($exploded));
				$allowedext = array("jpg","png","gif","jpeg");

				if (in_array($extention, $allowedext))
				{
					$inv = mysqli_query($konek, "select pesananbarang.status, pesananbarang.id, pembeli.idbarang from pesananbarang, pembeli where pesananbarang.tagihan = '".$invoice."' and pembeli.id = pesananbarang.id");
					$ambilid = mysqli_fetch_array($inv);
					$jmlh = mysqli_num_rows($inv);

					$cekinvoice = mysqli_num_rows(mysqli_query($konek, "select invoice from transaksibarang where invoice = '".$invoice."'"));

					if ($cekinvoice>0)
					{
						?><div class="alert-red">
							Anda Telah Melakukan Konfirmasi Pembayaran Sebelumnya
						</div><?php
					}

					else
					{					
						if ($jmlh<1)
						{
							?><div class="alert-red">
								Gagal Konfirmasi Pendaftaran. Nomor Tagihan Tidak Tersedia
							</div><?php							
						}

						else
						{
							$insert = mysqli_query($konek, "insert into transaksibarang (invoice, idpembeli, idbarang, struk) values ('$invoice','$ambilid[id]','$ambilid[idbarang]','$namastruk')");
							$masukgambar = move_uploaded_file($tmpstruk, "../img/struktransaksi/".$namastruk);	

							if ($insert && $masukgambar)
							{
								?><div class="alert-blue">
									Anda Berhasil Melakukan Konfirmasi Pembayaran. Anda Tinggal Menunggu
								</div><?php
							}
						}
					}
				}

				else
				{
					?><div class="alert-red">
						Struk Gambar Harus Berekstensi .JPG, .PNG, .GIF, .JPEG
					</div><?php					
				}
			}

			?><h4 style="font-family: 'Firasans-SemiBold">KONFIRMASI PESANAN BARANG</h4><br>
			<form role="form" class="form-horizontal" action="<?= htmlspecialchars(''); ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">No. Tagihan</label>
					<div class="col-sm-10 col-md-8">
						<input type="number" class="form-control" name="invoice" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Bukti Transfer</label>
					<div class="col-sm-10 col-md-8">
						<input type="file" class="btn btn-link" name="struk" required>
					</div>
				</div>	

				<center><button type="submit" name="konfirmasipembayaran" class="btn btn-danger"><img src="../icon/konfirmasipembayaran.svg" style="width: 30px; height: 30px; ">&nbsp;&nbsp;<b>Kirim Konfirmasi</b></button></center>
			</form>

			<?php
		}

		else
		{
			$q = mysqli_query($konek, "select pesananbarang.jumlah, pesananbarang.biaya, pesananbarang.id,  pesananbarang.status, transaksibarang.dikirim, transaksibarang.resi, transaksibarang.berhasil, barang.nama, barang.foto, pembeli.email from pesananbarang, barang, pembeli, transaksibarang where pembeli.email = '".$_SESSION['email']."' and pembeli.id = pesananbarang.id and pembeli.idbarang = barang.id and transaksibarang.invoice = pesananbarang.tagihan order by pesananbarang.id desc");



			if ($_GET['d'])
			{
				$id = $_GET['d'];
				$transaksi = mysqli_fetch_array(mysqli_query($konek, "select pesananbarang.tagihan, pesananbarang.biaya, pesananbarang.jasaongkir, pesananbarang.status, pesananbarang.jumlah, pembeli.nama, pembeli.alamat, pembeli.kecamatan, pembeli.kota, pembeli.provinsi, pembeli.hp, barang.nama as namabarang, barang.id, barang.foto from barang, pesananbarang, pembeli where pesananbarang.id = '".$id."' and pesananbarang.id = pembeli.id and pembeli.idbarang = barang.id"));

				?><h4 style="font-family: 'Firasans-SemiBold';">DETAIL TRANSAKSI<span style="color: #1794dd; font-size: 23px; float: right;">No. Tagihan : <?= $transaksi['tagihan']; ?></span></h4><br>

				<h4 style="font-family: 'Firasans-SemiBold">Info Pembeli</h4>
				<hr noshade style="width: 80%;">
				<table>
					<tr>
						<td>Nama Pembeli&nbsp;&nbsp;&nbsp;</td>
						<td>:&nbsp;&nbsp;&nbsp;</td>
						<th><?= $transaksi['nama']; ?></th>
					</tr>

					<tr>
						<td>Alamat Lengkap</td>
						<td>:</td>
						<th><?= $transaksi['alamat']; ?></th>
					</tr>

					<tr>
						<td>Kecamatan</td>
						<td>:</td>
						<th><?= $transaksi['kecamatan']; ?></th>
					</tr>	

					<tr>
						<td>Kabupaten/Kota</td>
						<td>:</td>
						<th><?= $transaksi['kota']; ?></th>
					</tr>	

					<tr>
						<td>Provinsi</td>
						<td>:</td>
						<th><?= $transaksi['provinsi']; ?></th>
					</tr>

					<tr>
						<td>No. HP</td>
						<td>:</td>
						<th><?= $transaksi['hp']; ?></th>
					</tr>
				</table>

				<br><br>
				<h4 style="font-family: 'Firasans-SemiBold">Info Barang</h4>
				<hr noshade style="width: 80%;">				
				<table>
					<tr>
						<td>Barang Pesanan&nbsp;&nbsp;&nbsp;</td>
						<td>:&nbsp;&nbsp;&nbsp;</td>
						<th><a href="shop.php?id=<?= $transaksi[id]; ?>"><?= $transaksi['namabarang']; ?></a></th>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<th><a href="shop.php?id=<?= $transaksi[id]; ?>"><img alt="<?= $transaksi[namabarang]; ?>" src="../img/barang/<?= $transaksi[foto]; ?>" style="width: 200px; height: 350px;"></a></th>
					</tr>																						
				</table>

				<br><br>
				<h4 style="font-family: 'Firasans-SemiBold">Info Transaksi</h4>
				<hr noshade style="width: 80%;">				
				<table>
					<tr>
						<td>Biaya Pemesanan&nbsp;&nbsp;&nbsp;</td>
						<td>:&nbsp;&nbsp;&nbsp;</td>
						<th>Rp <?= number_format($transaksi['biaya'],"0","","."); ?></th>
					</tr>

					<tr>
						<td>Jasa Pengiriman Barang</td>
						<td>:</td>
						<td><?= $transaksi['jasaongkir']; ?></td>
					</tr>

					<tr>
						<td>Jumlah Pesanan</td>
						<td>:</td>
						<td><?= $transaksi['jumlah']; ?></td>
					</tr>	

					<tr>
						<td>Status</td>
						<td>:</td>
						<?php
						if ($transaksi['status'] == 1)
						{
							?><td><span style="color: green; font-weight: bold;">Sudah Dibayar</span></td></tr></table><?php
							$confirmbutton = mysqli_fetch_array(mysqli_query($konek, "select dikirim, resi, berhasil from transaksibarang where idpembeli ='".$_GET['d']."'"));

							if ($confirmbutton['dikirim'] == 1)
							{
								?><form action="<?= htmlspecialchars(''); ?>" method="post">
								<br><label class="label label-success">Sudah Dikirim</label><br>
									<label class="label label-primary">No Resi : <?= $confirmbutton['resi']; ?></label><br><br><br>
									<?php
									if ($confirmbutton['berhasil'] == 0)
									{
										?><button type="submit" class="btn btn-danger" name="terima"><b>Konfirmasi Terima Barang</b></button><?php
									}

									else
									{
										?><b style="color: #6286dd;">Transaksi Telah Berhasil</b><?php
									}
									?>
								</form><?php

								if (isset($_POST['terima']))
								{
									$terima = mysqli_query($konek, "update transaksibarang set berhasil = '1' where idpembeli = '".$_GET['d']."'");

									$relasiduit = mysqli_fetch_array(mysqli_query($konek, "select barang.id, barang.email, pesananbarang.biaya, transaksibarang.idpembeli, virtualmoney.email as emailpenjual from barang, pesananbarang, transaksibarang, virtualmoney where barang.email = virtualmoney.email and barang.id = transaksibarang.idbarang and pesananbarang.id = transaksibarang.idpembeli and transaksibarang.idpembeli = '11'"));
									$biaya = $relasiduit['biaya'];
									$email = $relasiduit['emailpenjual'];

									$duitmasuk = mysqli_query($konek, "update virtualmoney set uang = uang+'".$biaya."' where email = '".$email."'");

									if ($terima && $duitmasuk)
									{
										?><meta content="0; url=" http-equiv="refresh"><?php
									}
								}
							}

							else
							{
								?><br><label class="label label-default">Belum Dikirim</label><?php
							}
						}

						else
						{
							?><td><span style="color: red; font-weight: bold;">Belum Dibayar</span></td></tr></table>
							<br><a href="shop.php?con=t"><button class="btn btn-primary">Konfirmasi Pesanan</button></a><?php	
						} ?><?php
			}

			else
			{
				$barangterbaru = mysqli_query($konek, "select id, foto, harga, nama from barang order by id desc limit 0,3");
				slideshowbarang();
				?>
					<span style="float: right; font-weight: bolder; font-size: 16px;">DuitKu : <span style="color: green;">Rp. <?= number_format($showmoney['uang'],"0","","."); ?></span></span>
				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#home"><img src="../icon/colorall.svg" style="width: 25px; height: 25px;">&nbsp;Semua Barang</a></li>
				    <li><a data-toggle="tab" href="#menu1"><img src="../icon/colorbought.svg" style="width: 25px; height: 25px;">&nbsp;Barang Belanjaan</a></li>
			  	</ul>


				<div class="tab-content">
				    <div id="home" class="tab-pane fade in active">
				    	<br><h3 style="color: #6287da; font-weight: bolder;">Barang Terbaru</h3>
							<table>
								<?php

								while ($barangbaru = mysqli_fetch_array($barangterbaru))
								{
									?>
									<td style="padding-left: 45px; padding-top: 50px;">
									<div class="img-thumbnail" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
										<img style="width: 300px; height: 325px; padding: 10px;" src="../img/barang/<?= $barangbaru[foto]; ?>">
										<div style="padding-left: 10px;">
								<a href="?id=<?= $barangbaru[id];?>"><button style="width: 97%; background-color: #f1f1f1;" class="btn">
										<center><b><?= $barangbaru['nama']; ?></b>
										<br><b><span style="color: #54db94;">Rp. <?= number_format($barangbaru['harga'],"0","","."); ?></span></b></center></button>
								</a>
								</div>
									</div><?php
								}?>
							</table>

				    	<br><h3 style="color: #6287da; font-weight: bolder;">Semua Barang</h3>
							<table>
								<?php
								$barang = mysqli_query($konek, "select id, foto, harga, nama from barang");
								$cnt = 0;

								while ($semua = mysqli_fetch_array($barang))
								{
									if ($cnt >= 3)
									{
										echo "</tr><tr>";
									}
									$cnt++;
									?>
									<td style="padding-left: 45px; padding-top: 50px;">
									<div class="img-thumbnail" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
										<img style="width: 300px; height: 325px; padding: 10px;" src="../img/barang/<?= $semua[foto]; ?>" alt="../img/barang/<?= $semua[foto]; ?>">
										<div style="padding-left: 10px;">
											<a href="?id=<?= $semua[id];?>">
											<button style="width: 97%; background-color: #f1f1f1;" class="btn">
												<center><b><?= $semua['nama']; ?></b>
												<br><b><span style="color: #54db94;">Rp. <?= number_format($semua['harga'],"0","","."); ?></span></b></center>
											</button>
											</a>
										</div>
									</div>
									</td><?php
								}?>
							</table>
							</div>							

					<div id="menu1" class="tab-pane fade">
						<br><h3 style="color: #6287da; font-weight: bolder;">Barang Belanjaan</h3><br>

						<?php

						while ($arr = mysqli_fetch_array($q))
						{
							?>
							<a href="?d=<?= $arr[id]; ?>" style="text-decoration: none;">
							<div style="padding: 10px; margin: 1%; background-color: #eee; box-shadow: 1px 2px 4px 1px rgba(0,0,0,0.4);">
								<b style="font-size: 16px;"><?= $arr['nama']; ?></b><br>
									<b style="color: #45cc77;">Rp <?= number_format($arr['biaya'], "0", "", "."); ?></b><br>
									<b style="color: #666;"><?= $arr['jumlah']; ?> Barang</b><br>
									<?php 
									if ($arr['status'] == '1')
									{
										?><b style="font-size: 16px; color: green;">Sudah Dibayar</b><br><?php
										if ($arr['dikirim'] == 1)
										{
											?><label class="label label-success">Sudah Dikirim</label><br><br>
												<b>No. Resi : <?= $arr['resi']; ?></b><?php 

											if ($arr['berhasil'] == 1)
											{
												?><label class="label label-info" style="float: right;">Transaksi Selesai</label><?php
											}
										}

										else
										{
											?><label class="label label-default">Belum Dikirim</label><?php
										}
									}

									else
									{
										?><b style="font-size: 16px; color: red;">Belum Dibayar</b><?php
									}
									?>
							</div></a><?php
						}?>
					</div>
				</div>	
			<?php	
			}
		}?><br>
	</div><br><br>
</div>
</body>
</html>

<script>
	$(document).ready(function()
	{
			$('#datatable').DataTable();
	});
</script>