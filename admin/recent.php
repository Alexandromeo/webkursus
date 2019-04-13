<!DOCTYPE html>
<html>
<head>
<?php 	

include "header.php"; 
$oop = new oop("recent.php"); 
require_once("../lib/cipher.php");
$cipher = new cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

		$arr = mysqli_fetch_array(mysqli_query($konek, "select jabatan from admin where email = '".$_SESSION[email]."'"));

		if ($arr['jabatan'] != "Master")
		{
			header("location:../");
		}

?>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
</head>
<?php 	
	$auth = mysqli_query($konek, "select *from admin where email='".$_SESSION['email']."' and jabatan='Master'");
	$jmlauth = mysqli_num_rows($auth);
	$arrauth = mysqli_fetch_array($auth);

	$konten = mysqli_query($konek, "select *from konten where penerbit ='' order by id desc");
	$jmlkonten = mysqli_num_rows($konten);

	if ($jmlauth<0)
	{
		header("location:index.php");
	}
?>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
	<?php
	if ($_GET['id'])
	{
		$kontenedit = mysqli_query($konek, "select *from konten where id='".$_GET['id']."'");
		$arredit = mysqli_fetch_array($kontenedit);

		if ($_GET['msg'] == "1")
		{
			 ?><div class="alert-blue">
			 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			  Data Konten Berhasil Diterbitkan
				</div><meta content="0; url=content.php" http-equiv="refresh"><?php
		}

		elseif($_GET['msg'] == "2")
		{
			 ?><div class="alert-red">
			 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			  Data Konten Tidak Berhasil Diterbitkan
				</div><?php			
		}

		elseif($_GET['msg'] == "3")
		{
			 ?><div class="alert-red">
			 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			  Data Konten Tidak Berhasil Diterbitkan. Gambar Harus Berformat JPG, JPEG, PNG, GIF
				</div><?php			
		}	

		elseif($_GET['msg'] == "3")
		{
			 ?><div class="alert-red">
			 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			  Data Konten Tidak Berhasil Diterbitkan. Modul Harus Berekstensi PDF
				</div><?php			
		}	

			?><form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
			<div class="form-group">
				<label for="judulkonten" class="col-sm-2 control-label">Judul Konten</label>
				<div class="col-sm-10 col-md-8">
					<input type="text" class="form-control" value="<?=$arredit[judul]; ?>" id="judul" onkeyup="hitungchar()" name="judul" placeholder="Masukkan Judul Konten"><span style="font-weight: bolder;" id="char"></span> 
				</div>
			</div>

		<script>
	
		$(document).ready(function()
		{
			var char = $("#judul").val().length; 
			
			$("#char").text("Jumlah Karakter : "+char);
		});

		function hitungchar()
		{  
			var char = $("#judul").val().length; 
			$("#char").text("Jumlah Karakter : "+char);
			if (char>65)
			{ 
				$("#char").css("color","red"); 
				$("#char").text("Jumlah Karakter : "+char+ ". Tidak Direkomendasikan Untuk SEO");
			}

			else
			{
				$("#char").css("color","green");
			}
			
		}
		</script>

			<div class="form-group">
				<label for="kategorikonten" class="col-sm-2 control-label">Kategori Konten</label>
				<div class="col-sm-10 col-md-8">
						<input type="text" class="form-control" readonly style="cursor: not-allowed;" value="<?=$arredit[kategori]; ?>" name="kategori">
				</div>
			</div>

			<div class="form-group">
				<label for="kategorikonten" class="col-sm-2 control-label">Bahasa</label>
				<div class="col-sm-10 col-md-8">
					<select name="bahasa" class="btn btn-link">
						<option value="CSS" <?= $arredit['bahasa'] == "CSS" ? "selected" : ""; ?>>CSS</option>
						<option value="C" <?= $arredit['bahasa'] == "C" ? "selected" : ""; ?>>C</option>
						<option value="C#" <?= $arredit['bahasa'] == "C#" ? "selected" : ""; ?>>C#</option>
						<option value="C++" <?= $arredit['bahasa'] == "C++" ? "selected" : ""; ?>>C++</option>
						<option value="HTML" <?= $arredit['bahasa'] == "HTML" ? "selected" : ""; ?>>HTML</option>
						<option value="Java" <?= $arredit['bahasa'] == "Java" ? "selected" : ""; ?>>Java</option>
						<option value="Javascript" <?= $arredit['bahasa'] == "Javascript" ? "selected" : ""; ?>>Javascript</option>
						<option value="PHP" <?= $arredit['bahasa'] == "PHP" ? "selected" : ""; ?>>PHP</option>
						<option value="Phyton" <?= $arredit['bahasa'] == "Phyton" ? "selected" : ""; ?>>Phyton</option>
						<option value="SQL" <?= $arredit['bahasa'] == "SQL" ? "selected" : ""; ?>>SQL</option>
						<option value="Visual Basic" <?= $arredit['bahasa'] == "Visual Basic" ? "selected" : ""; ?>>Visual Basic</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="gambar" id="gambarlabel" class="col-sm-2 control-label">Multimedia</label>
				<div class="col-sm-10 col-md-10" id="gambar">
					<input type="file" name="multimedia" class="btn-link">
				</div>
			</div>

			<div class="form-group">
				<label for="kontenberbayar" class="col-sm-2 control-label">Konten Berbayar</label>
					<div class="col-sm-10 col-md-10">
						<label class="switch">
						  <input type="checkbox" name="kontenberbayar" value="1">
						  <div class="slider round"></div>
						</label>
					</div>
			</div>

		<?php
				$judul = $oop->amandata($_POST['judul']);
				$bahasa = $oop->amandata($_POST['bahasa']);
				$multimedia = $_FILES['multimedia'];
				$namamultimedia = time().$multimedia['name'];
				$tmpmultimedia = $multimedia['tmp_name'];
				$kontenberbayar = $_POST['kontenberbayar']; 
				$penerbit = $arrauth['nama'];

				$extention = strtolower(end(explode('.', $namamultimedia)));
				$allowedext = array("jpg","png","gif","jpeg");				

		if ($arredit['kategori'] == "Artikel")
		{?>
			<div class="form-group">
				<label for="isikonten" id="isilabel" class="col-sm-2 control-label">Isi Konten</label>
				<div class="col-sm-10 col-md-10" id="isi">
					<textarea class="col-md-10 col-sm-10 form-control" name="isi" style="overflow-y: scroll; max-width: 79%; max-height: 600px; min-height: 600px;"><?= $arredit['isi']; ?></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-md-10" style="float: right;">
					<button type="submit" name="terbitkan" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Terbitkan</button>&nbsp;
				</div>
			</div>
		</form><?php

			if (isset($_POST['terbitkan']))
			{
				$isi = $oop->amandata($_POST['isi']);

				if (in_array($extention, $allowedext))
				{
					$unlinkimg = unlink("../img/konten/".$arredit['gambar']."");
					$terbit = mysqli_query($konek, "update konten set judul='".$judul."', gambar = '".$namamultimedia."', bahasa = '".$bahasa."', bayar = '".$kontenberbayar."', isi = '".$isi."', penerbit='".$penerbit."' where id='".$_GET['id']."'");

					$mvimg = move_uploaded_file($tmpmultimedia, "../img/konten/" .$namamultimedia);

					if ($terbit && $mvimg)
					{
						echo "
						<script type=\"text/javascript\" language=\"javascript\">
							window.location.replace(\"?id=$_GET[id]&msg=1\");
						</script>";
					}

					else
					{
						echo "
						<script type=\"text/javascript\" language=\"javascript\">
							window.location.replace(\"?id=$_GET[id]&msg=2\");
						</script>";
					}
				}

				else
				{
						echo "
						<script type=\"text/javascript\" language=\"javascript\">
							window.location.replace(\"?id=$_GET[id]&msg=3\");
						</script>";					
				}
			}
		}

		else
		{?>
			<div class="form-group">
				<label for="gambar" id="gambarlabel" class="col-sm-2 control-label">Modul</label>
				<div class="col-sm-10 col-md-10">
					<input type="file" name="modul" class="btn-link">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-md-10" style="float: right;">
					<button type="submit" name="terbitkan" class='btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Terbitkan</button>&nbsp;
					</form><?php

			if (isset($_POST['terbitkan']))
			{
				$modul = $_FILES['modul'];
				$namamodul = $modul['name'];
				$tmpmodul = $modul['tmp_name'];

				if (preg_match("/pdf\z/i", $namamodul))
				{
					if (in_array($extention, $allowedext))
					{

						$unlinkimg = unlink("../img/konten/".$arredit['gambar']."");
						$unlinkmdl = unlink("../modul/".$arredit['modul']."");
						$terbit = mysqli_query($konek, "update konten set judul='".$judul."', gambar = '".$namamultimedia."', bahasa = '".$bahasa."', bayar = '".$kontenberbayar."',modul='".$namamodul."', penerbit='".$penerbit."' where id='".$_GET['id']."'");

						$mvmdl = move_uploaded_file($tmpmodul, "../modul/" .$namamodul);
						$mvimg = move_uploaded_file($tmpmultimedia, "../img/konten/" .$namamultimedia);

						if ($terbit && $mvimg)
						{
							echo "
							<script type=\"text/javascript\" language=\"javascript\">
								window.location.replace(\"?id=$_GET[id]&msg=1\");
							</script>";
						}

						else
						{
							echo "
							<script type=\"text/javascript\" language=\"javascript\">
								window.location.replace(\"?id=$_GET[id]&msg=2\");
							</script>";
						}
					}

					else
					{
							echo "
							<script type=\"text/javascript\" language=\"javascript\">
								window.location.replace(\"?id=$_GET[id]&msg=3\");
							</script>";						
					}
				}

				else
				{
							echo "
							<script type=\"text/javascript\" language=\"javascript\">
								window.location.replace(\"?id=$_GET[id]&msg=4\");
							</script>";
				}
			}
		}
	}

	else
	{?>
		<h3><b>Data Kiriman Konten</b></h3>
			<br>
			<table class="table table-striped table-hover table-bordered" id="datatable">
				<thead>
					<tr>
						<th>Judul Konten</th>
						<th>Gambar Konten</th>
						<th>Bahasa Pemrograman</th>
						<th>Kategori</th>
						<th>Pembuat</th>
						<th>Hak Super Admin</th>
					</tr>
				</thead>
				<tbody>
				<?php
				if ($jmlkonten>0)
				{
					while ($arr = mysqli_fetch_array($konten))
					{?><tr>
								<td><?= $arr['judul']; ?></td>
								<td><?= "<center><img id='myImg' src='../img/konten/$arr[gambar]'  alt='".$arr['foto']."' width='100' height='100'></center>"; ?></td>
								<td><?= $arr['bahasa']; ?></td>
								<td><?= $arr['kategori']; ?></td>
								<td><?= $arr['pembuat']; ?></td>
								<td><a href="?id=<?=$arr[id]; ?>"><button class="btn-link">Lihat dan Terbitkan</button></a></td>
							</tr><?php
					}
				}

				else
				{
					?><td colspan="6"><center>Tidak Ada Konten Yang Belum Diterbitkan</center></td>
					<?php
				}?>
				</tbody>
				</table><br><?php
	}?>
	</div>
	<br>
</div>
</body>
</html>


<script>
      $(document).ready(function()
      {
      	$('#datatable').DataTable();
      });
</script>