<!DOCTYPE html>
<html>
<head>
<?php 
		include "header.php";
		$oop = new oop("profile.php");
		require_once("../lib/cipher.php");
		$cipher = new cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
		$email = $_SESSION['email'];

			$q = mysqli_query($konek, "select *from admin where email='".$email."'");	
			$arr = mysqli_fetch_array($q);		
 		?>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
</head>
<body>
<div class="kontenadmin">
<div class="konten-tulisan">

<?php

if (isset($_POST['kirimfoto']))
{
	$foto = $_FILES['foto'];
	$namafoto = time().$foto['name'];
	$tmpfoto = $foto['tmp_name'];

	$exploded = explode(".", $namafoto);
	$extention = strtolower(end($exploded));
	$allowedext = array("jpg","jpeg","gif","png");

	if (in_array($extention, $allowedext))
	{
		$unlink = unlink("../img/admin/".$arr['foto']."");
		$query = mysqli_query($konek, "update admin set foto = '$namafoto' where email = '$email'");		
		$mv = move_uploaded_file($tmpfoto, "../img/admin/".$namafoto);
		
		if ($query && $mv)
		{
			?><div class="alert-blue">
					  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
					  Foto Profil Berhasil Diubah
					  <meta content="0; url=index.php" http-equiv="refresh">
					</div><?php
		}

		else
		{
			?><div class="alert-red">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				Terjadi Kesalahan Ketika Anda Mengubah Foto Profil Anda
			</div><?php 
		}
	}

	else
	{
		?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Foto Profil Gagal Diubah. Format Foto Harus .JPG, .JPEG, .GIF, .PNG
				</div><?php
	}
}

elseif(isset($_POST['kirimpassword']))
{
	$passwordbaru = $oop->amandata($_POST['passwordbaru']);
	$konfirmasipasswordbaru = $oop->amandata($_POST['konfirmasipasswordbaru']);
	$password = $cipher->encrypt($passwordbaru, "as8jwqe923rjwesdnq8w0ej3whrffdsf");

	if ($passwordbaru == $konfirmasipasswordbaru)
	{
		$query = mysqli_query($konek, "update admin set pass = '".$password."' where email = '".$email."'");	

		if($query)
		{
			?><div class="alert-blue">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Password Berhasil Diubah
				</div><?php
		}

		else
		{
			?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Password Tidak Berhasil Diubah ! Terjadi Kesalahan
				</div><?php
		}
	}

	elseif($passwordlama != $passwordbaru)
	{
		?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Gagal Ganti Password ! Password dan Konfirmasi Password Tidak Sama
				</div><?php
	}
}
?>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#photo">Ganti Foto Profil</a></li>
    <li><a data-toggle="tab" href="#password">Ganti Password</a></li>
  </ul>
  <div class="tab-content">
    <div id="photo" class="tab-pane fade in active">
    	<form method="post" action="?action=edit" enctype="multipart/form-data">
			<center><h2>Ubah Foto Profil</h2><br>
			<hr noshade width="90%" style="height: 5px; background-color: #ddd;">
						<?php 
						if ($arr['foto'] != "")
						{
							echo "<img src='../img/admin/$arr[foto]'  alt='".$arr['foto']."' style='width: 150px; height: 150px; border-radius: 50%;'>";
						}

						else
						{
							?><img src="../icon/user.svg" style="width: 150px; height: 150px; border-radius: 50%;"><?php
						}	?>	
						
			<br><br>
			<input type="file" name="foto" class="btn btn-default" required><br>
			<input type="submit" name="kirimfoto" value="Ganti Foto" class="btn btn-primary"></center>
		</form>
	</div>

	<div id="password"  class="tab-pane fade in">
		<form method="post" action="?action=edit" enctype="multipart/form-data">
			<center><h2>Ubah Password Anda</h2><br>
			<hr noshade width="90%" style="height: 5px; background-color: #ddd;">
			Password Baru : <br><img src="../icon/password.svg" height="30" width="30"> <input required minlength="8" type="password" name="passwordbaru" style="width: 400px;"><br><br>

			Konfirmasi Password Baru : <br><img src="../icon/password.svg" height="30" width="30"> <input required minlength="8" type="password" name="konfirmasipasswordbaru" style="width: 400px;"><br><br>
			<input type="submit" name="kirimpassword" value="Ganti Password" class="btn btn-primary"></center>
		</form>
	</div>
  </div><br>

</div>
</div>
</body>
</html>