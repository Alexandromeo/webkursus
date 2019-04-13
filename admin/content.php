<!DOCTYPE html>
<html>
<head>
<?php 	include "header.php"; 
		$oop = new oop("content.php");
		$admin = mysqli_query($konek, "select *from admin where email='".$_SESSION['email']."'");
		$arradmin = mysqli_fetch_array($admin);

		$master = mysqli_query($konek, "select *from admin where email = '".$_SESSION['email']."' and jabatan='Master'");
		$fetchmaster = mysqli_fetch_array($master);
		$arrmaster = mysqli_num_rows($master);

		$isi = mysqli_query($konek, "select *from konten where penerbit !=''");
		$isiarr = mysqli_fetch_array($isi);

		if ($_GET['pembuat'])
		{
			$isi = mysqli_query($konek, "select *from konten where pembuat = '".$_GET['pembuat']."' order by id desc");
		}

		elseif ($_GET['bahasa'])
		{
			$isi = mysqli_query($konek, "select *from konten where bahasa = '".$_GET['bahasa']."' order by id desc");
		}

		elseif($_GET['kategori'])
		{
			$isi = mysqli_query($konek, "select *from konten where kategori = '".$_GET['kategori']."' order by id desc");
		}

		else
		{
			$isi = mysqli_query($konek, "select *from konten order by id desc");
		} 
?>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
</head>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
	<?php
	if ($_GET['act'] == "create")
	{	
		if (isset($_POST['kirimkonten']))
		{
			$judul = $oop->amandata($_POST['judul']);
			$bahasa = $oop->amandata($_POST['bahasa']);
			$pembuat = $arradmin['nama'];
			$modul = "0";
			$kategori = "Artikel";
			$kontenberbayar = $_POST['kontenberbayar'];

			$multimedia = $_FILES['multimedia'];
			$namamultimedia = time().$multimedia['name'];
			$tmpmultimedia = $multimedia['tmp_name'];
			$isi = $oop->amandata($_POST['isi']);

			if ($arrmaster>0)
			{
				$penerbit = $fetchmaster['nama'];
			}

			else
			{
				$penerbit = "";
			}

			$exploded = explode(".", $namamultimedia);
			$extention = strtolower(end($exploded));
			$allowedext = array("jpg","png","gif","jpeg");

			if (in_array($extention, $allowedext))
			{
				$mv = move_uploaded_file($tmpmultimedia, "../img/konten/" .$namamultimedia);	
				$insert = mysqli_query($konek, "insert into konten (judul, gambar, pembuat, bahasa, kategori, modul, bayar, isi, penerbit) values ('$judul','$namamultimedia', '$pembuat', '$bahasa', '$kategori', '$modul', '$kontenberbayar', '$isi', '$penerbit')");

				if ($mv && $insert)
				{
					?><div class="alert-blue">
					  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
					  Data Konten Berhasil Dimasukkan
					</div><meta content="0; url=content.php" http-equiv="refresh">
					<?php			
				}

				else
				{
					?><div class="alert-red">
						<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
						Gagal Membuat Konten. Terjadi Kesalahan
					</div><?php
				}
			}

			else
			{
				?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Data Konten Tidak Berhasil Dimasukkan. Gambar Harus Dengan Format .JPEG, .JPG, .PNG, .GIF
				</div><?php						
			}

		}

		createcontent();
		?><br><?php
	}

	elseif ($_GET['act'] == "createmodul")
	{
		if (isset($_POST['kirimmodul']))
		{
			$bayar = $_POST['kontenberbayar'];
			$judul = $oop->amandata($_POST['judul']);

			$modul = $_FILES['modul'];
			$namamodul = time().$modul['name'];
			$tmpmodul = $modul['tmp_name'];

			$kategori = "Modul";

			$gambar = $_FILES['multimedia'];
			$namagambar = time().$gambar['name'];
			$tmpgambar = $gambar['tmp_name'];

			$bahasa = $oop->amandata($_POST['bahasa']);
			$kontenberbayar = $_POST['kontenberbayar'];
			$pembuat = $arradmin['nama'];

			if ($arrmaster > 0)
			{
				$penerbit = $fetchmaster['nama'];
			}

			else
			{
				$penerbit = "";
			}

				if (preg_match("/pdf\z/i", $namamodul))
				{
					$mv = move_uploaded_file($tmpgambar, "../img/konten/" .$namagambar);
					$mvmodul = move_uploaded_file($tmpmodul, "../modul/" .$namamodul);			
					$insert = mysqli_query($konek, "insert into konten (judul,gambar,pembuat,bahasa, kategori,modul,bayar,penerbit) values ('$judul','$namagambar','$pembuat','$bahasa','$kategori','$namamodul','$bayar','$penerbit')");
					
					if ($mv && $mvmodul && $insert)
					{
						?><div class="alert-blue">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						  Data Modul Berhasil Dimasukkan
						</div><meta content="0; url=content.php" http-equiv="refresh">
						<?php			
					}

					else
					{
						?><div class="alert-red">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						  Data Modul Gagal Dimasukkan. Terjadi Kesalahan
						</div>
						<?php	
					}
				}

				else
				{
						?><div class="alert-red">
						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						  Gagal Membuat Modul. Format Modul Harus PDF
						</div>
						<?php	
				}

		}
		createmodul();?><br><?php
	}

	else
	{

		if ($_GET['act'] == "delete")
		{
			if($arrmaster<=0)
			{
				header("location:admin.php");
			}
		
			if ($_GET['id'])
			{
				?><div class="alert-red">
			 	Apakah Anda Yakin Akan Menghapus Konten dengan ID <b><?= $_GET['id']; ?></b> ?
			 	<ul>
			 		<a style="color: white; text-decoration: none;" href="?delete=success&id=<?=$_GET[id];?>"><li style="background-color: #ff5779">Ya, Saya Akan Menghapusnya </li></a><br>
			 		<a style="color: white; text-decoration: none;" href="?delete=failed&id=<?=$_GET[id];?>"><li style="background-color: #ff5779">Tidak, Saya Tidak Akan Menghapusnya</a></li>
			 	</ul>
				</div><?php	
			}
		}

		if ($_GET['delete'] == "success")
		{
			if ($_GET['id'])
			{
				$id = $_GET['id'];

				$select = mysqli_query($konek, "select *from konten where id ='".$id."'");
				$delete = mysqli_query($konek, "delete from konten where id ='".$id."'");

				$un = mysqli_fetch_array($select);

				$unlinkimg = unlink("../img/konten/".$un['gambar']."");
				$unlinkmdl = unlink("../modul/".$un['modul']."");

				if ($delete)
				{
					?><div class="alert-blue">
				  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				 	 Data Konten Berhasil Dihapus
					</div>
					<meta content="1; url=content.php" http-equiv="refresh"><?php
				}

				else
				{
					?><div class="alert-green">
				  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				 	 Data Konten Tidak Berhasil Dihapus
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

		?><h3><b>Data Konten</b></h3><?php
	
		$pembuat = mysqli_query($konek, "select distinct pembuat from konten order by pembuat");
		$bahasa = mysqli_query($konek, "select distinct bahasa from konten order by bahasa");
		$kategori = mysqli_query($konek, "select distinct kategori from konten order by kategori");
		
		?>
		<h4>
		<form method="get" action="">
		<select name="pembuat" class="btn btn-warning">
		<option value="">Pilih Pembuat</option>
		<?php
		while ($arr = mysqli_fetch_array($pembuat))
		{
			?><option value=<?=$arr['pembuat'];?>><?= $arr['pembuat']; ?></option><?php
		}?>
		</select>&nbsp;&nbsp;&nbsp;


		<select name="bahasa" class="btn btn-info">
		<option value="">Pilih Bahasa Pemrograman</option>
		<?php 
		while ($arr = mysqli_fetch_array($bahasa))
		{
			?><option value=<?=$arr['bahasa'];?>><?php echo $arr['bahasa']; ?></option><?php
		}?>
		</select>&nbsp;&nbsp;&nbsp;


		<select name="kategori" class="btn btn-success">
		<option value="">Pilih Kategori</option>
		<?php 
		while ($arr = mysqli_fetch_array($kategori))
		{
			?><option value=<?=$arr['kategori'];?>><?= $arr['kategori']; ?></option><?php
		}?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<button type="submit" class="btn btn-default">Filter Pencarian</button>
		</form>

		<a href="?act=create"><button class="btn-link" style="float: right; border: 1px;">Buat Artikel</button></a>
		<span style="float: right;">||</span>
		<a href="?act=createmodul"><button class="btn-link" style="float: right; border: 1px;">Buat Modul</button></a>
		</h4>

		<br><br>
			<table class="table table-striped table-hover table-bordered" id="datatable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Judul Konten</th>
						<th>Gambar Konten</th>
						<th>Bahasa Pemrograman</th>
						<th>Kategori</th>
						<th>Pembuat</th>
						<th>Penerbit</th>
						<th>Gratis</th>
						<?php 
						if ($arrmaster>0)
						{
							echo "<th>Hak</th>";
						}
						?>
					</tr>
				</thead>
				<tbody>
				<?php
				$jmlkonten = mysqli_num_rows($isi);

				$no = 1;
				if ($jmlkonten>0)
				{
					while ($isiarr = mysqli_fetch_array($isi))
					{
						if (!empty($isiarr['penerbit']))
						{?>
							<tr>
								<td><?= $no; ?><?= "."; ?></td>
								<td><?= $isiarr['judul']; ?></td>
								<td><?= "<center><img id='myImg' src='../img/konten/$isiarr[gambar]'  alt='".$isiarr['gambar']."' width='100' height='100'></center>"; ?></td>
								<td><?= $isiarr['bahasa']; ?></td>
								<td><?= $isiarr['kategori']; ?></td>
								<td><?= $isiarr['pembuat']; ?></td>
								<td><?= $isiarr['penerbit']; ?></td>
								<td><?= $isiarr['bayar'] == "0" ? "<center><img style='padding-top: 50%; width: 30px;' src='../icon/correct-symbol.svg'></center>" : "<center><img style='padding-top: 50%; width: 30px;' src='../icon/remove-symbol.svg'></center>"; ?></td>
								<?php 
								if ($arrmaster>0)
								{
								echo "<td>
										<a style='color: white; text-decoration: none;' href='?act=delete&id=".$isiarr['id']."'><button class='btn btn-danger'><img src='../icon/dlt.svg' style='width: 20px; height: 20px;'>&nbsp;Hapus</button></a>
										<br><br>
										
										<a style='color: white; text-decoration: none;' href='recent.php?id=".$isiarr['id']."'><button class='btn btn-info'><img src='../icon/pencil.svg' style='width: 20px; height: 20px;'>&nbsp;Edit</button></a>
										</td>";
								}
								?>
							</tr><?php $no++;
						}
					}
				}
				
				else
				{
					?><td colspan="9"><center>Tidak Ada Konten</center></td><?php
				}?>
				</tbody>
				</table><br><br><?php
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

// Get the image and insert it inside the modal - use its "alt" text as a caption
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

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("tutup")[0];

      $(document).ready(function()
      {
      	$('#datatable').DataTable();
      });
</script>