<!DOCTYPE html>
<html>
<head>
<?php include "header.php"; 
	  $oop = new oop("login.php");
	  require_once("lib/cipher.php");
	  $cipher = new cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
?>
<title>Login - Kususon</title>
</head>
<body style="background-color: #eee;">
<div class="container">
<br>
<form method="post" action="<?= htmlspecialchars('login.php?forgot=password') ;?>">
<?php 
	error_reporting(0);

		if ($_GET['forgot'] == "password")
		{
			if (isset($_POST['lupapassword']))
			{
				$to = $_POST['email'];
				$email = $oop->amandata($to);
				$datapaid = mysqli_query($konek, "select password from memberbayar where email = '".$email."'");
				$datafree = mysqli_query($konek, "select password from membergratis where email = '".$email."'");
				
				$arrpaid = mysqli_fetch_array($datapaid);
				$jumlahpaid = mysqli_num_rows($datapaid);

				$arrfree = mysqli_fetch_array($datafree);
				$jumlahfree = mysqli_num_rows($datafree);
			
				if (($jumlahpaid > 0) || ($jumlahfree > 0))
				{
					$from = "alexandromeo@makinrajin.com";
					$subjek = "Pengiriman Password Kususon";
					$pesan = "Hai. Apakah Anda lupa password Anda ? Kalau begitu, akan kami kirimkan password Anda agar bisa login kembali.
						<br><br>Ini password akun berbayar Anda : ".$datapaid['password']."
						<br><br>Ini password akun gratis Anda 	:".$datafree['password']."";
					$headers = "From : " .$from;
					$kirim = mail($to, $subjek, $pesan, $headers);

					if ($kirim)
					{
						?><div class="alert-green">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						  Berhasil Mengirim Password ! Cek Email Anda
						</div><?php
					}

					else
					{
						?><div class="alert-red">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						  Gagal Mengirim Password ! Terjadi Kesalahan
						</div><?php
					}
				}

				elseif ($jumlah <= 0) 
				{
					?><div class="alert-red">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						 Email Belum Terdaftar ! Mungkin Anda Salah Ketik
						</div><?php
				}
			}
			lupapassword();
		}
?>
</form>
<form method="post" action="<?= htmlspecialchars(''); ?>">

	<?php
		if (isset($_POST['loginfree']))
		{
			$email = $oop->amandata($_POST['email']);
			$pass = $oop->amandata($_POST['password']);

			$d = mysqli_query($konek, "select *from membergratis where email='".$email."'");
			$arrd = mysqli_fetch_array($d);
			$password = $cipher->encrypt($pass, "as8jwqe923rjwesdnq8w0ej3whrffdsf");
  				
  			if ($d)
			{
				if ($password == $arrd['password'])
				{
					session_start();
					$online = mysqli_query($konek, "update membergratis set online = '1' where email = '".$email."'");

					$_SESSION['passwordfree'] = $arrd['password'];
					$_SESSION['email'] = $arrd['email'];
						
					?><div class="alert-blue">
							  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
							  Berhasil Masuk Sebagai Member Gratis ! Tunggu Sejenak
							</div><?php
	  				echo '<meta content="1; url=member" http-equiv="refresh">';					
				}

				elseif (!$password)
				{
					?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Gagal Masuk ! Periksa Kembali Data Anda
				</div><?php
				}

				else
				{
					?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Gagal Masuk ! Terjadi Kesalahan
				</div><?php
				}

  			}

			else
			{
				?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Gagal Masuk ! Periksa Kembali Data Anda
				</div><?php
			}
		}

		elseif(isset($_POST['loginpaid']))
		{
			$pass = $oop->amandata($_POST["password"]);
			$email = $oop->amandata($_POST["email"]);

			$db = mysqli_query($konek, "select *from memberbayar where email ='".$email."'");
			$arrdb = mysqli_fetch_array($db);
			$password = $cipher->encrypt($pass, "as8jwqe923rjwesdnq8w0ej3whrffdsf");

			if ($password == $arrdb['password'])
			{
				if ($pecah[0] > date("Y") || ($pecah[1] > date("m")) || ($pecah[2] > date("d")))
				{
					$habis = mysqli_query($konek, "update memberbayar set bayar = '2', mulai = '0', akhir='0' where email = '".$email."'");

						?><div class="alert-red">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						  Gagal Masuk ! Masa Berlaku Akun Anda Telah Habis. Anda Bisa Daftar di <a style="text-decoration: underline; font-weight: bolder; color: white;" href="<?= htmlspecialchars('join.php?page=join&utm=perpanjang'); ?>">sini </a>
								</div><?php						
				}

				else
				{
					if ($arrdb['bayar'] == "1")
					{

						session_start();
						$online = mysqli_query($konek, "update memberbayar set online = '1' where email = '".$email."'");
						$_SESSION['email'] = $arrdb['email'];
						$_SESSION['passwordpaid'] = $arrdb['password'];
							
						?><div class="alert-green">
								  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
								  Berhasil Masuk Sebagai Member Berbayar ! Tunggu Sejenak
								</div>
	  							<meta content="1; url=member" http-equiv="refresh"><?php
					}

					elseif ($arrdb['bayar'] == "0")
					{
						?><meta content="0; url=confirm.php?id=<?= $arrdb[id]; ?>" http-equiv="refresh"><?php
					}
				}	

				$pecah = explode(" ", $arrdb['akhir']);
  			}

			else
			{
				?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Gagal Masuk ! Periksa Kembali Data Anda
				</div><?php
			}
		}

		elseif (isset($_POST['loginadmin']))
		{
			$email = $oop->amandata($_POST['email']);
			$pass = $oop->amandata($_POST['password']);

			$db = mysqli_query($konek, "select *from admin where email='".$email."'");
			$arrdb = mysqli_fetch_array($db);
			$password = $cipher->encrypt($pass, "as8jwqe923rjwesdnq8w0ej3whrffdsf");

			if ($password == $arrdb['pass'])
			{
				session_start();
				$_SESSION['pass'] = $arrdb['pass'];
				$_SESSION['email'] = $arrdb['email'];
					
				?><div class="alert-green">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				 Berhasil Login Sebagai Admin ! Tunggu Sebentar
				</div><?php
  				echo '<meta content="1; url=admin" http-equiv="refresh">';
			}
		}


  		if ($_GET['account'] == "paid")
		{
			loginpaid();
		}

		elseif ($_GET['account'] == "free")
		{
			loginfree();
		}

		elseif ($_GET['account'] == "admin") 
		{
			loginadmin();
		}
	?>

</form>
</div>
</body>
</html>