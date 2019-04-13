<!DOCTYPE html>
<html>
<head>
<?php 	
include "header.php";
require_once("../lib/cipher.php");
$cipher = new cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

?>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
</head>
<?php 	
	$oop = new oop("admin.php");
	$q = mysqli_query($konek, "select *from admin");
	$jmlsemua = mysqli_num_rows($q);

	$admin = mysqli_query($konek, "select *from admin where email='".$_SESSION['email']."' and jabatan='Master'");
	$arradmin = mysqli_fetch_array($admin);
	$jml = mysqli_num_rows($admin);

	$ad = mysqli_query($konek, "select *from admin where id='".$_GET['id']."'");
	$arr = mysqli_fetch_array($ad);
?>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
	<?php

	if ($_GET['act'] == "create")
	{
		if($jml<=0)
		{
			header("location:admin.php");
		}

		if (isset($_POST['tambahadmin']))
		{
			$email = $oop->amandata($_POST['email']);
			$nama = $oop->amandata($_POST['nama']);
			$password = $cipher->encrypt($nama, "as8jwqe923rjwesdnq8w0ej3whrffdsf");
			$jabatan = $oop->amandata($_POST['jabatan']);

			$insert = mysqli_query($konek, "insert into admin (email, pass, nama, jabatan) values ('$email', '$password','$nama','$jabatan')");

			$check = mysqli_query($konek, "select *from admin where email='".$email."'");
			$jml = mysqli_num_rows($check);


			if ($insert && filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				?><div class="alert-green">
			  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			 	 Data Admin Berhasil Dimasukkan
				</div>
				<meta content="1; url=admin.php" http-equiv="refresh"><?php
			}

			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				?><div class="alert-red">
			  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			 	 Email Tidak Valid
				</div><?php				
			}

			elseif($jml>0)
			{
				?><div class="alert-red">
			  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			 	 Maaf, Email Telah Terdaftar Sebagai Admin Sebelumnya
				</div><?php					
			}

			else
			{
				?><div class="alert-red">
			  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			 	Data Admin Tidak Berhasil Dimasukkan
				</div><?php	
			}
		}
		createadmin(); echo "<br>";
	}

	else
	{
		if ($_GET['act'] == "delete")
		{
			if($jml<=0)
			{
				header("location:admin.php");
			}
		
			if ($_GET['id'])
			{
				?><div class="alert-red">
			 	Apakah Anda Yakin Akan Menghapus Admin dengan Email <b><?= $arr['email']; ?></b> ?
			 	<ul>
			 		<a style="color: white; text-decoration: none;" href="?delete=success&id=<?=$arr[id];?>"><li style="background-color: #ff5779">Ya, Saya Akan Menghapusnya </li></a><br>
			 		<a style="color: white; text-decoration: none;" href="?delete=failed&id=<?=$arr[id];?>"><li style="background-color: #ff5779">Tidak, Saya Tidak Akan Menghapusnya</a></li>
			 	</ul>
				</div><?php	
			}
		}

		if ($_GET['delete'] == "success")
		{
			if ($_GET['id'])
			{
				$id = $_GET['id'];
				$delete = mysqli_query($konek, "delete from admin where id ='".$id."'");

				if ($delete)
				{
					?><div class="alert-blue">
				  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				 	 Data Admin Berhasil Dihapus
					</div>
					<meta content="1; url=admin.php" http-equiv="refresh"><?php
				}

				else
				{
					?><div class="alert-green">
				  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				 	 Data Admin Tidak Berhasil Dihapus
					</div><?php
				}
			}
		}

		elseif($_GET['delete'] == "failed")
		{
			?><div class="alert-green">
			 	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				 Data Admin Tidak Jadi Dihapus
				</div><?php			
		}

		echo "<h3><b>Data Admin</b></h3>";

		if ($arradmin['jabatan'] == "Master")
		{
			?><h4><a href="?act=create"><button class="btn-link" style="float: right; border: 1px;">Tambah Admin</button></a></h4><br><br><?php
		}
	?>
		<table class="table table-striped table-hover table-bordered" id="datatable">
			<thead>
				<tr>
					<th>Nama Admin</th>
					<th>Jabatan</th>
					<th>Foto</th>
					<th>Email</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while ($arr = mysqli_fetch_array($q))
			{?>
				<tr>
					<td><?= $arr['nama']; ?></td>
					<td><?= $arr['jabatan']; ?></td>
					<td><?php 
					if (empty($arr['foto'])) 
					{
						echo "<center><img src='../icon/user.svg'></center>";
					} 

					else
					{
						echo "<center><img id='myImg' src='../img/admin/$arr[foto]'  alt='".$arr['foto']."' width='100' height='100'></center>"; 
					} ?></td>
					<td><?= $arr['email']; ?></td>
					<td>
						<?php
						if ($arr['email'] == $_SESSION['email'])
						{
							echo "<br><br><center><a style='color: white; text-decoration: none;' href='profile.php'><button class='btn btn-info'><img src='../icon/pencil.svg' style='width: 20px; height: 20px;'>&nbsp;Edit Data Anda</button></a></center>";
						}

						elseif($jml>0)
						{
							echo "<center><br><br><a style='color: white; text-decoration: none;' href='?act=chat&id=".$arr['id']."'><button class='btn btn-success'><img src='../icon/chat.svg' style='width: 20px; height: 20px;'>&nbsp;Hubungi</button></a>&nbsp;&nbsp;";
							echo "<a style='color: white; text-decoration: none;' href='?act=delete&id=".$arr['id']."'><button class='btn btn-danger'><img src='../icon/dlt.svg' style='width: 20px; height: 20px;'>&nbsp;Hapus</button></a></center>";
						}

						else
						{
							echo "<br><br><center><a style='color: white; text-decoration: none;' href='?act=chat&id=".$arr['id']."'><button class='btn btn-success'><img src='../icon/chat.svg' style='width: 20px; height: 20px;'>&nbsp;Hubungi</button></a></center>&nbsp;&nbsp;";
						}
						?>
					</td>
				</tr><?php
				}?>
			</tbody>
		</table><br><br>
			<script>
			function cariadmin()
			{
				var keyword = $('#cariadmin').val();

				if (keyword != "")
				{
					$.ajax
					({
						type: "POST",
						url: "",
						success: function(e)
						{
							alert('a');
						}
					});
				}
			}
			</script>
		<?php
		}?>
	</div>
</div>

			<div id="myModal" class="modal">
				<span class="tutup" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
			  	<img class="modal-content" id="img01">
			  	<div id="caption"></div>
			</div>
</body>
</html>

<script>
var modal = document.getElementById('myModal');

var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function()
{
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
}

var span = document.getElementsByClassName("tutup")[0];

      $(document).ready(function()
      {
      	$('#datatable').DataTable();
      });
</script>