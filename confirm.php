<!DOCTYPE html>
<html>
<head>
<?php include "header.php"; $oop = new oop("confirm.php"); ?>
	<title>Kususon - Konfirmasi Pembayaran</title>
</head>
<body>
	<div class="kontenadmin" style=" padding-right: 6%; padding-left: 6%; padding-top: 2%; margin-top: 3%;">
<?php

	if ($_GET['id'])
	{
		if ($_GET['act'] == "confirm")
		{
			if (isset($_POST['konfirmasi']))
			{
				$id = $_GET['id'];
				$email = $oop->amandata($_POST['email']);
				$biaya = $oop->amandata($_POST['biaya']);
				$foto = $_FILES['struk'];
				$namafoto = time().$foto['name'];
				$tmpfoto = $foto['tmp_name'];

				$check = mysqli_fetch_array(mysqli_query($konek, "select * from memberbayar where email = '".$email."' and id='".$id."'"));

				if ($check['email'] == $email)
				{
					if ($check['biaya'] == $biaya)
					{
						$check = mysqli_num_rows(mysqli_query($konek, "select *from strukmember where idmember = '".$id."'"));

						if ($check < 1)
						{
							$exploded = explode(".", $namafoto);
							$extension = strtolower(end($exploded));
							$allowedext = array("jpeg","jpg","png","gif");

							if (in_array($extension, $allowedext))
							{
								$mv = move_uploaded_file($tmpfoto, "img/strukmember/" .$namafoto);
								$insert = mysqli_query($konek, "insert into strukmember (idmember, foto) values ('$id','$namafoto')");
								
								if ($mv && $insert)
								{
									?><div class="alert-blue">
									  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
									  Konfirmasi Pembayaran Berhasil Dilakukan. Silahkan Tunggu 1 x 24 Jam Untuk Mengecek Pembayaran Anda
									</div><?php
								}

								else
								{
									?><div class="alert-red">
									  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
									  Gagal Konfirmasi Pembayaran. Terjadi Kesalahan
									</div><?php								
								}
							}
							
							else
							{
								?><div class="alert-red">
								  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
								  Terjadi Kesalahan. Ekstensi Gambar Harus .JPG, .JPEG, .PNG, .GIF
								</div>
								<?php									
							}
						}

						elseif ($check >0)
						{
							?><div class="alert-red">
							  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
							  Anda Telah Melakukan Konfirmasi Pembayaran. Tunggu 1 x 24 Untuk Diproses Oleh Tim Kami
							</div>
							<?php							
						}
					}

					else
					{
						?><div class="alert-red">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						  Konfirmasi Pembayaran Gagal Dilakukan. Biaya Transfer Yang Anda Masukkan Salah
						</div>
						<?php							
					}
				}

				else
				{
						?><div class="alert-red">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						  Konfirmasi Pembayaran Gagal Dilakukan. Email Tidak Sesuai
						</div>
						<?php	
				}
			}
			?><h3><b>Konfirmasi Pembayaran</b></h3><br><br>
			<?= payconfirm();
		}

		else
		{
			$q = mysqli_fetch_array(mysqli_query($konek, "select *from memberbayar where id='".$_GET['id']."' and bayar = '0' or bayar = '2'"));
			?><h3><b>Detail Pembayaran</b></h3><br><br>
			<h5>Terima kasih, Anda telah berhasil mendaftar sebagai member berbayar dan Anda tinggal melakukan pembayaran sebesar :</h5><br>
			<center><b><h1>Rp <?= number_format($q['biaya'],"0",",","."); ?></h1></b><br>
			<a href="confirm.php?id=<?= $_GET[id];?>&act=confirm"><button class="btn btn-success">Konfirmasi Pembayaran</button></a>
			</center>
			<br><br>
			<pre>Agar Anda bisa menjadi member berbayar, Anda ikuti langkah di bawah ini :
				<pre>1. Transfer sejumlah Rp <?= number_format($q['biaya'],"0",",","."); ?> ke nomor rekening Kususon di bawah ini
							<center><pre style="width: 30%; overflow: hidden;"><b>Bank Central Asia</b><br>
										<center><img src="img/bca.svg" style="width: 180px; height: 60px;"></center>
										<pre style="overflow: hidden;">
											<center><b>Cab. Wonosobo</b><br>0035 931 5555 3<br>a/n Alexandromeo Lawrence Gunawan</center>
										</pre>
									</pre></center> 
				</pre>
				<pre style="overflow: hidden;">2. Setelah melakukan transfer, segera lakukan <a href="confirm.php?id=<?= $_GET[id];?>&act=confirm">Konfirmasi Pembayaran</a>. Pembayaran tanpa melakukan konfirmasi tidak akan kami proses lebih lanjut.</pre>
			</pre><?php
		}
	}

	else
	{
		?><h3><b>Cek Pembayaran</b></h3>Masukkan Email Yang Telah Anda Daftarkan Sebagai Member Berbayar, Kami Akan Tampilkan Tagihan Pembayarannya :<br><br>

		<form method="post" role="form" class="form-horizontal" style="width: 95%;" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
		<div class="form-group">
			<label for="judulkonten" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="email" placeholder="Masukkan Email Anda" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="kirim" class='btn btn-success'><img src='icon/list.svg' style='width: auto; height: 30px;'>&nbsp;Cek Tagihan Anda</button>&nbsp;
			</div>
		</div>
		</form>
		<?php

		if (isset($_POST['kirim']))
		{
			$email = $oop->amandata($_POST['email']);
			$show = mysqli_fetch_array(mysqli_query($konek, "select * from memberbayar where email = '".$email."' and bayar='0'"));

			?><meta content="0; url=?id=<?= $show[id]; ?>" http-equiv="refresh"><?php
		}
	}?>

<br><br>
</div><br><br><br><br><br><br><br><br><br>
</body>
</html>

<?php footer(); ?>