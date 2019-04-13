<!DOCTYPE html>
<html>
<head>
<?php 	include "header.php";
		$oop = new oop("materi.php");
		require_once("../lib/cipher.php");
		$cipher = new cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
?>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
</head>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
	<?php
		if ($_GET['auth'])
		{
			$q = mysqli_query($konek, "select *from konten where pembuat = '".$_GET['auth']."' order by id desc");
		}

		elseif ($_GET['lang'])
		{
			$q = mysqli_query($konek, "select *from konten where bahasa = '".$_GET['lang']."' order by id desc");
		}

		elseif($_GET['category'])
		{
			$q = mysqli_query($konek, "select *from konten where kategori = '".$_GET['category']."' order by id desc");
		}

		else
		{
			$q = mysqli_query($konek, "select *from konten order by id desc");
		} 

		$email = $_SESSION['email'];
		$pembuat = mysqli_query($konek, "select distinct pembuat from konten order by pembuat");
		$bahasa = mysqli_query($konek, "select distinct bahasa from konten order by bahasa");
		$kategori = mysqli_query($konek, "select distinct kategori from konten order by kategori");
	

		if ($_GET['id'])
		{
			$id = $_GET['id'];
			$show = mysqli_fetch_array(mysqli_query($konek, "select *from konten where id='".$id."'"));
			$numcomment = mysqli_num_rows(mysqli_query($konek, "select *from komentar where komentar.idkonten = '".$id."'"));
			?>				
				<ol class="breadcrumb">
					<li><a href="materi.php">Home</a></li>
				    <li><a href="?category=<?= $show['kategori']; ?>"><?= $show['kategori']; ?></a></li>   
				    <li><a href="?lang=<?= $show[bahasa]; ?>"><?= $show['bahasa']; ?></a></li> 
				    <li><?= $show['judul']; ?></li>     
				</ol>
			<?php
			if ($show['bayar'] == "1")
			{
				if($_SESSION['passwordpaid'])
				{
					if ($show['modul'] != "0")
					{
						header("location:../modul/$show[modul]");
					}

					else
					{
						?><center><b><h1 style="color: #7373db;"><?= $show['judul']; ?></h1></b>
						<img style="width: 35%;" src="../img/konten/<?= $show[gambar]; ?>"></center>
						<br>Created by <b><?= $show['pembuat']; ?></b>. <?= $numcomment; ?> Komentar<br>
						<br><p><?= $show['isi']; ?></p>

						<a href="?lang=<?= $show[bahasa] ;?>"><span class="btn btn-success"><?= $show['bahasa']; ?></span></a>
						<a href="?category=<?= $show[kategori]; ?>"><span class="btn btn-default"><?= $show['kategori']; ?></span></a>
						<?php	
						if ($show['bayar'] == "0")
						{
						 	?><span class="btn btn-info"><img src="../icon/member.svg" style="width: 20px; height: 20px;"> Gratis</span><?php
						}

						else
						{
							if ($_SESSION['passwordpaid'])
							{
								?><span class="btn btn-primary"><img src="../icon/paidmember.svg" style="width: 20px; height: 20px;"> Berbayar</span><?php
							}

							else
							{
								?><a href="../join.php"><span class="btn btn-danger"><img src="../icon/paidmember.svg" style="width: 20px; height: 20px;"> Berbayar</span></a><?php									
							}
						}	?>

					<hr noshade style="width: 100%; height: 3px; background-color: #3498ff;">

					<b><h4>Related Posts :</h4></b><br>
					<table border="0">
					<tr>
					<?php

					$rel = mysqli_query($konek, "select *from konten where bahasa = '".$show['bahasa']."' and id != '".$id."' limit 0,2");

					while ($related = mysqli_fetch_array($rel))
					{
					?>
						<td style="padding-left: 45px;">
						<a href="?id=<?= $related[id] ;?>">
							<img alt="../img/konten/<?= $related[gambar];?>" style="width: 300px; height: 325px; padding: 10px;" src="../img/konten/<?= $related[gambar];?>">
							<div style="padding-left: 10px; color: black;">
									<center><b><?= $related['judul']; ?></b></center>
								</div>
							</a>
							</td><?php
					}
					?>
					</tr></table>

					<hr noshade style="width: 90%; height: 3px; background-color: #3498ff;">
					<b><h4>Tinggalkan Komentar ?</h4></b><br>

					<form method="post" role="form" class="form-horizontal">
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10 col-md-8">
							<input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama Anda" required>
						</div>
					</div>

					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10 col-md-8">
							<input type="text" id="email" style="cursor: no-drop;" class="form-control" name="email" placeholder="Kami Tidak Akan Mempublikasikan Email Anda" value="<?= $_SESSION['email']; ?>" readonly>
						</div>
					</div>

					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Website</label>
						<div class="col-sm-10 col-md-8">
							<input type="text" id="website" class="form-control" name="website" placeholder="Masukkan Website (Jika Punya). Tulis Beserta https:// atau http://">
						</div>
					</div>

					<div class="form-group">
						<label for="isikonten" id="isilabel" class="col-sm-2 control-label">Komentar</label>
						<div class="col-sm-10 col-md-10">
							<textarea required id="komentar" class="col-md-10 col-sm-10 form-control" name="komentar" style="overflow-y: scroll; max-width: 79%; max-height: 250px; min-height: 250px;"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-10 col-md-10" style="float: right;">
							<button type="submit" id="send" name="kirimkomentar" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Kirim</button>&nbsp;
						</div>
					</div>
				</form>

					<hr noshade style="width: 90%; height: 3px; background-color: #3498ff;">
					<b><h4>Yang Telah Berkomentar :</h4></b><br>
					<ul id="comm">
					</ul><?php		
					}
				}

				elseif ($_SESSION['passwordfree'])
				{
					?><meta content="0; url=materi.php?act=mustpay" http-equiv="refresh"><?php
				}
			}

			else
			{
				if ($show['modul'] != "0")
				{
					?><meta content="0; url=../modul/<?= $show[modul]; ?>" http-equiv="refresh"><?php
				}

				else
				{
					//free artikel for everyone (member)
					?>  
					<center><b><h1 style="color: #7373db;"><?= $show['judul']; ?></h1></b>
					<img style="width: 35%;" src="../img/konten/<?= $show[gambar]; ?>"></center>
					<br>Created by <b><?= $show['pembuat']; ?></b>. <?= $numcomment; ?> Komentar<br>
					<br><p><?= $show['isi']; ?></p>

					<a href="?lang=<?= $show[bahasa] ;?>"><span class="btn btn-success"><?= $show['bahasa']; ?></span></a>
					<a href="?category=<?= $show[kategori]; ?>"><span class="btn btn-default"><?= $show['kategori']; ?></span></a>
								
					<?php
					if ($show['bayar'] == "0")
					{
					 	?><span class="btn btn-info"><img src="../icon/member.svg" style="width: 20px; height: 20px;"> Gratis</span><?php
					}

					else
					{
						if ($_SESSION['passwordpaid'])
						{
							?><span class="btn btn-primary"><img src="../icon/paidmember.svg" style="width: 20px; height: 20px;"> Berbayar</span><?php
						}

						else
						{
							?><a href="../join.php"><span class="btn btn-danger"><img src="../icon/paidmember.svg" style="width: 20px; height: 20px;"> Berbayar</span></a><?php									
						}
					}?>
					<hr noshade style="width: 100%; height: 3px; background-color: #3498ff;">

					<b><h4>Related Posts :</h4></b><br>
					<table border="0">
					<tr>
					<?php

					$rel = mysqli_query($konek, "select *from konten where bahasa = '".$show['bahasa']."' and id != '".$id."' limit 0,2");

					while ($related = mysqli_fetch_array($rel))
					{
					?>
						<td style="padding-left: 45px;">
						<a href="?id=<?= $related[id] ;?>">
							<img alt="../img/konten/<?= $related[gambar];?>" style="width: 300px; height: 325px; padding: 10px;" src="../img/konten/<?= $related[gambar];?>">
							<div style="padding-left: 10px; color: black;">
									<center><b><?= $related['judul']; ?></b></center>
								</div>
							</a></td><?php
					}
					?>
					</tr></table>

					<hr noshade style="width: 90%; height: 3px; background-color: #3498ff;">
					<b><h4>Tinggalkan Komentar ?</h4></b><br>

					<form method="post" role="form" class="form-horizontal">
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10 col-md-8">
							<input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama Anda" required>
						</div>
					</div>

					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10 col-md-8">
							<input type="text" id="email" style="cursor: no-drop;" class="form-control" name="email" placeholder="Kami Tidak Akan Mempublikasikan Email Anda" value="<?= $_SESSION['email']; ?>" readonly>
						</div>
					</div>

					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Website</label>
						<div class="col-sm-10 col-md-8">
							<input type="text" id="website" class="form-control" name="website" placeholder="Masukkan Website (Jika Punya). Tulis Beserta https:// atau http://">
						</div>
					</div>

					<div class="form-group">
						<label for="isikonten" id="isilabel" class="col-sm-2 control-label">Komentar</label>
						<div class="col-sm-10 col-md-10">
							<textarea required id="komentar" class="col-md-10 col-sm-10 form-control" name="komentar" style="overflow-y: scroll; max-width: 79%; max-height: 250px; min-height: 250px;"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-10 col-md-10" style="float: right;">
							<button type="submit" id="send" name="kirimkomentar" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Kirim</button>&nbsp;
						</div>
					</div>
				</form>

					<hr noshade style="width: 90%; height: 3px; background-color: #3498ff;">
					<b><h4>Yang Telah Berkomentar :</h4></b><br>
					<ul id="comm">
					</ul>

					<script>
						
					</script>
					<?php
				}
			}
		}

		else
		{		
			if($_GET['act'] == "mustpay")
			{
				?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Konten Ini Hanya Bisa Diakses Member Berbayar. Anda Bisa Menjadi Member Berbayar <a style="color: white; font-weight: bolder; text-decoration: underline;" href="../join.php">Di Sini</a>
				</div><?php
			}
			?>
			<h3><b>Data Konten</b></h3>
			<h4>
			<form method="get" action="">
			<select name="auth" class="btn btn-warning">
			<option value="">Pilih Pembuat</option>
			<?php
			while ($arr = mysqli_fetch_array($pembuat))
			{
				?><option value=<?=$arr['pembuat'];?>><?= $arr['pembuat']; ?></option><?php
			}?>
			</select>&nbsp;&nbsp;&nbsp;

			<select name="lang" class="btn btn-info">
			<option value="">Pilih Bahasa Pemrograman</option>
			<?php 
			while ($arr = mysqli_fetch_array($bahasa))
			{
				?><option value=<?=$arr['bahasa'];?>><?php echo $arr['bahasa']; ?></option><?php
			}?>
			</select>&nbsp;&nbsp;&nbsp;


			<select name="category" class="btn btn-success">
			<option value="">Pilih Kategori</option>
			<?php 
			while ($arr = mysqli_fetch_array($kategori))
			{
				?><option value=<?=$arr['kategori'];?>><?= $arr['kategori']; ?></option><?php
			}?>
			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<button type="submit" class="btn btn-default">Filter Pencarian</button>
			</form>
			
			<table border="0" id="datatable">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<tr>
				<?php
					$column = 3;
					$cnt = 0;

					while ($arr = mysqli_fetch_array($q))
					{
						if ($cnt >= $column)
						{
							echo "</tr><tr>";
							$cnt = 0;
						}

						$cnt++;
						?>
							<td style="padding-left: 45px; padding-top: 50px;">
							<div class="img-thumbnail" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
							<a href="?id=<?= $arr[id] ;?>">
								<?php

								if (($_SESSION['passwordpaid']) && ($arr['bayar']) == '1')
								{
									?><img alt="../img/konten/<?= $arr[gambar];?>" style="opacity: 0.2; width: 300px; height: 325px; padding: 10px; display: block;" src="../img/konten/<?= $arr[gambar];?>"><?php
								}

								else
								{
									?><img alt="../img/konten/<?= $arr[gambar];?>" style="width: 300px; height: 325px; padding: 10px; display: block;" src="../img/konten/<?= $arr[gambar];?>"><?php
								}?>

								<div style="padding-left: 10px; color: black;">
										<center><b><span><?= $arr['judul']; ?></span></b>
										</center>
								</div>
							</a>

							<br>
							<center>
							<a href="?lang=<?= $arr[bahasa] ;?>"><span class="label label-success"><?= $arr['bahasa']; ?></span></a>
							<a href="?auth=<?= $arr[pembuat]; ?>"><span class="label label-warning"><?= $arr['pembuat']; ?></span></a>
							<br><br>
							<a href="?category=<?= $arr[kategori]; ?>"><span class="label label-primary"><?= $arr['kategori']; ?></span></a>

								
								<?php
								if ($arr['bayar'] == "0")
								{
								 	?><span class="label label-info"><img src="../icon/member.svg" style="width: 20px; height: 20px;"> Gratis</span><?php
								}

								else
								{
									if ($_SESSION['passwordpaid'])
									{
										?><span class="label label-primary"><img src="../icon/paidmember.svg" style="width: 20px; height: 20px;"> Berbayar</span><?php
									}

									else
									{
										?><a href="../join.php"><span class="btn btn-danger"><img src="../icon/paidmember.svg" style="width: 20px; height: 20px;"> Berbayar</span></a><?php									
									}
								}?>
								</center>
								</div>
							</td>
							</div> 
						<?php
					}
				?>
				</tr>
				</tbody>
			</table>
		<?php 
		}?>
</div><br><br>
</body>
</html>

<script>
      $(document).ready(function()
      {
      	$('#datatable').DataTable();

		function showcomment()
		{
			var id = <?= $_GET['id']; ?>;
			$.ajax
			({
				type: "POST",
				url: "ajax.php",
				data: "act=showcomment&id="+id,
				success: function(data)
				{
					$('#comm').html(data);
				}
			});
		}

		setInterval(function()
		{
			showcomment();
		}, 100);
	})

						$('#send').click(function()
						{
							var id = <?= $_GET['id']; ?>;
							var nama = $('#nama').val();
							var email = $('#email').val();
							var website = $('#website').val();
							var komentar = $('#komentar').val();

							$.ajax
							({
								type: "POST",
								url: "ajax.php",
								data: "act=addcomment&id="+id+"&nama="+nama+"&email="+email+"&website="+website+"&komentar="+komentar,
								success: function(data)
								{
									showcomment();
								}
							});

							$('#nama').val('');
							$('#email').val('<?= $_SESSION[email]; ?>');
							$('#website').val('');
							$('#komentar').val('');
						});
</script>