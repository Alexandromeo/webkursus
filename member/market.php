<!DOCTYPE html>
<html>
<head>
<?php 	include "header.php";
		$oop = new oop("market.php"); ?>
		
	<title>
	<?php if ($_GET['id'])
	{
		$title = mysqli_fetch_array(mysqli_query($konek, "select nama from barang where id = '".$_GET['id']."'"));
		?>Jual <?php echo $title['nama'];
	} ?>
	</title>
</head>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
		<?php

		if ($_GET['po'] == "success")
		{
			?><div class="alert-blue">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				Anda Berhasil Melakukan Permohonan Penarikan. Akan Segera Kami Proses
			</div><?php
		}

		$showmoney = mysqli_fetch_array(mysqli_query($konek, "select *from virtualmoney where email = '".$_SESSION['email']."'"));

		if ($_GET['msg'] == "1")
		{
			 ?><div class="alert-green">
				 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Barang Berhasil Ditambahkan
				  <meta content="0; url=market.php" http-equiv="refresh">
				</div><?php	
		}

		elseif ($_GET['msg'] == "2")
		{
			 ?><div class="alert-red">
				 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Barang Tidak Berhasil Ditambahkan
				</div><?php	
		}

		elseif ($_GET['msg'] == "3")
		{
			 ?><div class="alert-green">
				 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Toko Anda Berhasil Diubah
				</div>
				<meta content="0; url=market.php" http-equiv="refresh"><?php	
		}


		$email = $_SESSION['email'];
		$toko = mysqli_query($konek, "select *from toko where email='".$email."'");
		$arr = mysqli_fetch_array($toko);

		if (isset($_POST['buattoko']))
		{
			$nama = $oop->amandata($_POST['nama']);
			$alamat = $oop->amandata($_POST['alamat']);
			$kota = $oop->amandata($_POST['kota']);
			$provinsi = $oop->amandata($_POST['provinsi']);
			$foto = $_FILES['foto'];
			$namafoto = time().$foto['name'];
			$tmpfoto = $foto['tmp_name'];

			$q = mysqli_query($konek, "insert into toko (email, nama, alamat, kota, provinsi, foto) values ('$email','$nama','$alamat','$kota','$provinsi','$namafoto')");

			$mv = move_uploaded_file($tmpfoto,"../img/toko/".$namafoto);

			if ($q && $mv)
			{
				?><div class="alert-blue">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Toko Berhasil Dibuat
				</div><meta content="0; url=market.php" http-equiv="refresh">
				<?php	
			}

			else
			{
				?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Toko Gagal Dibuat
				</div><meta content="0; url=index.php" http-equiv="refresh">
				<?php	
			}
		}

		if (empty($arr['email']))
		{
			echo "<h2><center>Form Pembuatan Toko</center></h2>
			<hr noshade width='90%'' style='height: 5px; background-color: #ddd;'>";

			createtoko();
		}

		elseif($arr['email'])
		{
			if ($_GET['act'] == "add")
			{
				additems();

				if (isset($_POST['tambahbarang']))
				{
					$nama = $oop->amandata($_POST['nama']);
					$foto = $_FILES['foto'];
					$namafoto = time().$foto['name'];
					$tmpfoto = $foto['tmp_name'];
					$stok = $_POST['stok'];
					$harga = $_POST['harga'];
					$kondisi = $_POST['kondisi'];
					$deskripsi = $oop->amandata($_POST['deskripsi']);
					$berat = $_POST['berat'];
					$kategori = $oop->amandata($_POST['kategori']);

					$mv = move_uploaded_file($tmpfoto, "../img/barang/" .$namafoto);
					$insert = mysqli_query($konek, "insert into barang (nama, foto, stok, harga, kondisi, deskripsi, berat, kategori, email) values ('$nama','$namafoto','$stok', '$harga', '$kondisi', '$deskripsi', '$berat', '$kategori', '$email')");

					if ($mv && $insert)
					{
						echo "
						<script type=\"text/javascript\" language=\"javascript\">
							window.location.replace(\"?act=add&msg=1\");
						</script>";	
					}

					else
					{
						echo "
						<script type=\"text/javascript\" language=\"javascript\">
							window.location.replace(\"?act=add&msg=2\");
						</script>";
					}
				}
			}

			elseif ($_GET['act'] == "edit")
			{
				$oop->edittoko($arr['nama'], $arr['alamat'], $arr['kota'], $arr['provinsi']);
				
				if (isset($_POST['edittoko']))
				{
					$nama = $oop->amandata($_POST['nama']);
					$alamat = $oop->amandata($_POST['alamat']);
					$kota = $oop->amandata($_POST['kota']);
					$provinsi = $oop->amandata($_POST['provinsi']);
					$foto = $_FILES['foto'];
					$namafoto = time().$foto['name'];
					$tmpfoto = $foto['tmp_name'];

					$dltphoto = unlink("../img/toko/" .$arr['foto']);
					$edit = mysqli_query($konek, "update toko set nama='".$nama."', alamat = '".$alamat."', kota = '".$kota."', provinsi = '".$provinsi."', foto = '".$namafoto."' where email = '".$_SESSION['email']."'");
					$mv = move_uploaded_file($tmpfoto, "../img/toko/" .$namafoto);

					if ($edit && $mv)
					{
						echo "
						<script type=\"text/javascript\" language=\"javascript\">
							window.location.replace(\"?act=edit&msg=3\");
						</script>";	
					}
				}
			}

			elseif ($_GET['inv'])
			{
				if ($_GET['send'] == "true")
				{					
					if (isset($_POST['inputresi']))
					{
						$resi = $oop->amandata($_POST['resi']);
						$query = mysqli_query($konek, "update transaksibarang set dikirim = '1', resi = '".$resi."' where invoice = '".$_GET['inv']."'");
						?>
							<div class="alert-green">
								<b>Resi Berhasil Ditambahkan.</b>
							</div>
							<meta content="0; url=market.php" http-equiv="refresh">
						<?php
					}

					$oop->resi();
				}
			}

			elseif ($_GET['id'])
			{
					$q = mysqli_query($konek, "select *from barang, transaksibarang where barang.id = transaksibarang.idbarang and barang.id = '".$_GET['id']."'");
					$qun = mysqli_query($konek, "select *from barang where id = '".$_GET['id']."'");

					$show = mysqli_fetch_array($qun);
					$rate = mysqli_num_rows($q);
					?>

					<ol class="breadcrumb">
					    <li><a href="shop.php">Home</a></li>
					    <li><a href="shop.php?category=<?= $show['kategori']; ?>"><?= $show['kategori']; ?></a></li>   
					    <li><?= $show['nama']; ?></li>     
					</ol>

					<?php
					if ($_GET['act'] == "dlt")
					{
						?><div class="alert-red">
					 	Apakah Anda Yakin Akan Menghapus Barang Ini ?<br><br>
					 	<ul>
					 		<a style="color: white;" href="?delete=success&id=<?=$_GET[id];?>"><li style="background-color: #ff5779">Ya, Saya Akan Menghapusnya </li></a><br>
					 		<a style="color: white;" href="?delete=failed&id=<?=$_GET[id];?>"><li style="background-color: #ff5779">Tidak, Saya Tidak Akan Menghapusnya</a></li>
					 	</ul>
						</div>
						<?php						
					}

					elseif ($_GET['act'] == "edt")
					{
						if (isset($_POST['editbarang']))
						{
							$nama = $oop->amandata($_POST['nama']);
							$foto = $_FILES['foto'];
							$namafoto = time().$foto['name'];
							$tmpfoto = $foto['tmp_name'];
							$stok = $oop->amandata($_POST['stok']);
							$harga = $oop->amandata($_POST['harga']);
							$kondisi = $_POST['kondisi'];
							$berat = $oop->amandata($_POST['berat']);
							$deskripsi = $oop->amandata($_POST['deskripsi']);
							$kategori = $oop->amandata($_POST['kategori']);

							$unlink = unlink("../img/barang/".$show['foto']);
							$update = mysqli_query($konek, "update barang set nama = '".$nama."', foto = '".$namafoto."', stok = '".$stok."', harga = '".$harga."', kondisi = '".$kondisi."', deskripsi = '".$deskripsi."', berat='".$berat."', kategori='".$kategori."' where id = '".$_GET['id']."' ");
							$mv = move_uploaded_file($tmpfoto, "../img/barang/".$namafoto);

							if ($update)
							{
								?><div class="alert-green">
								 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> Berhasil Edit Barang
								  <meta content="0; url=market.php" http-equiv="refresh">
								</div><?php
							}
						}

						$oop->editbarang($show['nama'], $show['stok'], $show['harga'], $show['deskripsi'], $show['berat'], $show['kategori']);
					}

					else
					{
						if ($_GET['delete'] == "failed")
						{
							?><div class="alert-green">
							 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
							  Barang Tidak Berhasil Dihapus
							</div><?php
						}

						elseif($_GET['delete'] == "success")
						{
							$deleteimg = unlink("../img/barang/".$show['foto']);
							$delete = mysqli_query($konek, "delete from barang where id = '".$_GET['id']."'");	
							?><div class="alert-red">
							 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
							  Barang Berhasil Dihapus
							  <meta content="0; url=market.php" http-equiv="refresh">
							</div><?php
						}?>
						
						<table border="0">
						<tr>
							<td>
								<img style="width: 250px; height: 300px;" src="../img/barang/<?= $show[foto]; ?>">
							</td>

							<td colspan="3">
								<h3 style="font-weight: bold;"><?= $show['nama']; ?></h3>
								<h6>Terjual <?= $rate; ?>x</h6>
								<hr noshade style="width: 100%; height: 1px;">
								<h2 style="color: #5693dd; font-weight: bolder;">Rp. <?= $show['harga']; ?></h2>
								<b>Tersedia <span style="color: green;"><?= $show['stok']; ?> stok</span> barang</b><br><br>
							</td>
						</tr>

						<tr>
							<td colspan="2" style="padding-top: 30px;">
								<a href="?act=edt&id=<?= $show[id]; ?>"><button class="btn btn-primary"><b><img src="../icon/pencil.svg" style="width: 30px; height: 30px;">&nbsp;&nbsp;Edit Barang</b></button></a>&nbsp;&nbsp;&nbsp;
								<a href="?act=dlt&id=<?= $show['id']; ?>"><button style="height: 45px;" class="btn btn-danger"><b><img src="../icon/dlt.svg" style="width: 30px; height: 30px;">&nbsp;&nbsp;Hapus Barang</b></button></a>&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
					</table><br><br><?php
					$oop->descpenjual($show['berat'], $show['kategori'], $show['kondisi'], $show['deskripsi']);
				}
			}

			elseif($_GET['order'])
			{
				$show = mysqli_fetch_array(mysqli_query($konek, "select barang.*, barang.nama as namabarang, barang.id as idbarang, pembeli.*, pesananbarang.* from barang, pembeli, pesananbarang where barang.id = pembeli.idbarang and pesananbarang.id = pembeli.id and pesananbarang.tagihan = '".$_GET['order']."'"));
				if ($show['jasaongkir'] == "Pos Indonesia")
				{
					$ongkir = 17500;
				}

				elseif ($show['jasaongkir'] == "TIKI")
				{
					$ongkir = 20000;
				}

				elseif ($show['jasaongkir'] == "JNE")
				{
					$ongkir = 24000;
				}

				$biaya = $show['biaya'] - $ongkir;
				$total = $biaya + $ongkir;

				$oop->showtagihan($show['tagihan'], $show['namabarang'], $show['foto'], $show['kondisi'], $show['jumlah'], $biaya, $ongkir, $total, $show['nama'], $show['alamat'], $show['kecamatan'], $show['kota'], $show['provinsi'], $show['hp'], "market");
			}

			else
			{
				?><center>
					<img src="../img/toko/<?= $arr[foto]; ?>" style="border-radius: 50%; width: 128px; height: 128px;"><br>
					<b><h3><?= $arr['nama']; ?></h3></b><br>

				<a style='color: white; text-decoration: none;' href='?act=edit'><button class='btn btn-info'><img style='width: 20px; height: 20px;' src="../icon/pencil.svg"> Edit Toko</button></a>

				<a style='color: white; text-decoration: none;' href='?act=add'><button class='btn btn-warning'><img style='width: 20px; height: 20px;' src="../icon/plus.svg"> Tambah Barang</button></a><br><br></center>

				<hr noshade width="90%" style="height: 3px;" id="datatable">
				<span style="float: right; font-weight: bolder; font-size: 16px;">DuitKu : <span style="color: green;">Rp <?= number_format($showmoney['uang'],"0","","."); ?></span></span>

				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#home"><img src="../icon/colorall.svg" style="width: 25px; height: 25px;">&nbsp;Barang Dagangan Anda</a></li>
				    <li><a data-toggle="tab" href="#menu1"><img src="../icon/colorbought.svg" style="width: 25px; height: 25px;">&nbsp;Pesanan Barang</a></li>
				    <li><a data-toggle="tab" href="#menu2"><img src="../icon/cair.svg" style="width: 25px; height: 25px;">&nbsp;Cairkan DuitKu</a></li>
			  	</ul>

			  <div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
				<table border="0">
					<tr><br>
					<h3 style="color: #6287da;"><b>Data Barang Anda</b></h3>
				<?php

				$brg = mysqli_query($konek, "select *from barang where email = '".$_SESSION['email']."'");
				$jml = mysqli_num_rows($brg);

				$cnt = 0;
				$column = 3;


					if ($jml>0)
					{
						$paid = mysqli_query($konek, "select pesananbarang.tagihan, transaksibarang.dikirim, transaksibarang.resi, transaksibarang.berhasil, pesananbarang.biaya, pesananbarang.jumlah, pembeli.nama, barang.nama as namabarang from pesananbarang, pembeli, barang, transaksibarang where transaksibarang.invoice = pesananbarang.tagihan and pesananbarang.id = pembeli.id and pesananbarang.status = '1' and pembeli.idbarang = barang.id and barang.email = '".$_SESSION['email']."' order by transaksibarang.id desc");

						while ($barang = mysqli_fetch_array($brg))
						{
							$judul = substr($barang['nama'], 0, 25);

							if ($cnt >= $column)
							{
								?></tr><tr><?php
								$cnt = 0;
							}
							$cnt++;
							?>
							
							<td style="padding-left: 45px; padding-top: 30px;">
							<div class="img-thumbnail" style="	box-shadow: 0 4px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
							<a href="?id=<?= $barang[id] ;?>">
								<img alt="../img/barang/<?= $barang[foto];?>" style="width: 300px; height: 325px; padding: 10px;" src="../img/barang/<?= $barang[foto];?>">
							</a>								
								<div style="padding-left: 10px;">
										<a href="?id=<?= $barang[id];?>"><button style="width: 97%; background-color: #f1f1f1;" class="btn">
										<center><b><?= $judul; ?>...</b>
										<br><b><span style="color: #54db94;">Rp <?= number_format($barang['harga'],"0","","."); ?></span></b></center></button>
								</a>
								</div>
							</div>
							</td>
							<?php
						}

						?></tr></table>
						</div>


						<div id="menu1" class="tab-pane fade in">
							<br><h3 style="color: #6287da;"><b>Pesanan Barang Anda</b></h3>
							<?php
							while ($pay = mysqli_fetch_array($paid))
							{
								?>
								<a href="?order=<?= $pay[tagihan]; ?>" style="text-decoration: none;">
									<div style="padding: 10px; margin: 1%; background-color: #eee; box-shadow: 1px 2px 4px 1px rgba(0,0,0,0.4);">
										<b style="font-size: 16px;"><?= $pay['namabarang']; ?><br>
										<b style="color: #45cc77;">Rp <?= number_format($pay['biaya'], "0", "", "."); ?></b><br>
										<b style="color: #666;"><?= $pay['jumlah']; ?> Barang</b><br>
										<?php
										if ($pay['dikirim'] == "1")
										{
											?><label class="label label-success">Sudah Dikirim</label>
											<?php
											if ($pay['berhasil'] == "1")
											{
												?><label class="label label-info">Transaksi Berhasil</label><?php
											}?>
											<br><br>
											No. Resi : <?= $pay['resi'];
										}
										else
										{
											?><label class="label label-default">Belum Dikirim</label><?php
										}
										?>
										<span style="float: right;">Lihat Detail</span>
									</div></b>
								</a><?php
							}?></div>
						

						<div id="menu2" class="tab-pane fade in">
							<br><h3 style="color: #6287da;"><b>Cairkan DuitKu</b></h3><br>
							<?php 
							if (isset($_POST['payout']))
							{
								$email = $_SESSION['email'];
								$rekening = $oop->amandata($_POST['rekening']);
								$bank = $oop->amandata($_POST['bank']);
								$cabang = $oop->amandata($_POST['cabang']);
								$nama = $oop->amandata($_POST['nama']);
								$tarik = $showmoney['uang'];
								$tanggal = date("d m Y");

								$send = mysqli_query($konek, "insert into penarikan (email, rekening, bank, cabang, nama, nominal, tanggal, persetujuan, pengirim) values('$email','$rekening','$bank','$cabang','$nama','$tarik','$tanggal','0','null')");

								$minus = mysqli_query($konek, "update virtualmoney set uang = uang-'".$tarik."' where email='".$email."'");

								if ($send && $minus)
								{
									?><script>window.location = '?po=success'</script><?php
								}
							}

							$oop->payout($showmoney['uang']); 
							?><hr noshade style="width: 90%;"><?php

							$query = mysqli_query($konek, "select *from penarikan where email = '".$_SESSION['email']."' order by id desc");

							?><br><h3 style="color: #6287da;"><b>Histori Pencairan DuitKu</b></h3><br><?php

							while ($queries = mysqli_fetch_array($query))
							{
								$oop->showhistory($queries); ?></div><?php
							}
					}

					else
					{
							?><center><div class="alert-red" style="width: 60%;"><img src="../icon/warn.svg" style="width: 17px; height: 17px;">&nbsp;
							 Barang Belum Ditambahkan. Anda Bisa Tambah Barang <a style="color: white; font-weight: bolder; text-decoration: underline;" href="?act=add">Di Sini.</a> 
							</div></center><?php
					}?>
					</tr><?php
			}
		}

		?><br><br>
		</table><br><br>
		</div>
	</div>
</div>
</body>
</html>