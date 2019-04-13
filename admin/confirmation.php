<!DOCTYPE html>
<html>
<head>
<?php 	

include "header.php"; 
$oop = new oop("content.php");

		$paymember = mysqli_query($konek, "select strukmember.idmember, strukmember.foto, memberbayar.email,  memberbayar.biaya, memberbayar.username from strukmember, memberbayar where strukmember.idmember = memberbayar.id and memberbayar.bayar != '1'");
		$jmlmember = mysqli_num_rows($paymember);

		$arr = mysqli_fetch_array(mysqli_query($konek, "select jabatan from admin where email = '".$_SESSION[email]."'"));

		if ($arr['jabatan'] != "Master")
		{
			header("location:../");
		}
?>
	<title>Kususon - Kursus Pemrograman no. 1 di Indonesia</title>
</head>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">

	<?php
	if ($_GET['email'])
	{		
		$email = $_GET['email'];

		if (isset($_POST['setujui']))
		{
			$update = mysqli_query($konek, "update memberbayar set bayar = '1' where email = '".$email."'");
			$insertmoney = mysqli_query($konek, "insert into virtualmoney values ('$email','0'");

			$oop->settanggal($email);

			if ($update)
			{
				?><div class="alert-green">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Akun Dengan Email <?= $email; ?> Berhasil Diaktifkan
				</div><meta content="0; url=confirmation.php" http-equiv="refresh">
				<?php
			}

			else
			{
				?><div class="alert-red">
				  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				  Terjadi Kesalahan. Akun Dengan Email <?= $email; ?> Tidak Berhasil Diaktifkan
				</div><meta content="0; url=confirmation.php" http-equiv="refresh">
				<?php
			}
		}
		
		$show = mysqli_fetch_array(mysqli_query($konek, "select strukmember.foto, memberbayar.email, memberbayar.biaya, memberbayar.username from strukmember, memberbayar where memberbayar.email = '".$email."' and strukmember.idmember = memberbayar.id"));	

		?><form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
			<h3><b>Detail Data Member Berbayar</b></h3><br>
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10 col-md-8">
				<input style="cursor: no-drop;" type="text" class="form-control" name="email" value="<?= $show['email']; ?>" readonly required>
			</div>
		</div>

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10 col-md-8">
				<input style="cursor: not-allowed;" type="text" class="form-control" name="username" value="<?= $show['username']; ?>" readonly required>
			</div>
		</div>

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Biaya</label>
			<div class="col-sm-10 col-md-8">
				<input style="cursor: not-allowed;" type="text" class="form-control" name="email" value="<?= "Rp "; ?><?= number_format($show['biaya'],"0",",","."); ?>" readonly required>
			</div>
		</div>

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Bukti Transfer</label>
			<div class="col-sm-10 col-md-8">
				<img src="../img/strukmember/<?= $show[foto]; ?>" style="width: 60%;">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="setujui" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Setujui dan Aktifkan Akun</button>&nbsp;
			</div>
		</div>
		</form><br><?php
	}

	else
	{
	?>
	<h3><b>Daftar Member Berbayar Yang Belum Diaktifkan</b></h3><br>
	<table class="table table-bordered table-hover table-striped" id="datatable">
		<thead>
			<tr>
				<th>No. </th>
				<th>Email</th>
				<th>Username</th>
				<th>Biaya Pembayaran</th>
				<th>Struk Pembayaran</th>
			</tr>
		</thead>

		<tbody>
			<?php
			if ($jmlmember >0)
			{
				$no = 1;
				while ($arr = mysqli_fetch_array($paymember))
				{
					?><tr>
						<td><?= $no; ?></td>
						<td><a href="?email=<?= $arr[email]; ?>"><?= $arr['email']; ?></a></td>
						<td><?= $arr['username']; ?></td>
						<td>Rp <?= number_format($arr['biaya'],"0",",","."); ?></td>
						<td><img src="../img/strukmember/<?= $arr[foto]; ?>" alt="<?= $arr[foto]; ?>" style="width: 100px; height: 100px;"></td>
					</tr><?php
					$no++;
				}
			}

			else
			{
				?><tr>
					<td colspan="5"><center>Tidak Ada Member Berbayar Yang Belum Aktif</center></td>
				</tr><?php
			}?>
			
		</tbody>
	</table>
	<br><?php 
	}?>

<script>
      $(document).ready(function()
      {
      	$('#datatable').DataTable();
      });
</script>