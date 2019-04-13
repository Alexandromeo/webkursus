<?php
include "header.php"; 
$arr = mysqli_fetch_array(mysqli_query($konek, "select jabatan from admin where email = '".$_SESSION[email]."'"));
$tagihan = mysqli_query($konek, "select id, email, rekening, nominal, tanggal from penarikan where persetujuan != '2' and pengirim = '".$_SESSION['email']."' or pengirim = 'null'");

$oop = new oop("payout.php");

if ($arr['jabatan'] != "Master")
{
	header("location:../");
}?>

<html>
<body>
<div class="kontenadmin">
	<div class="konten-tulisan">
	<?php

	if ($_GET['id'])
	{
		$tagihan = mysqli_fetch_array(mysqli_query($konek, "select *from penarikan where id = '".$_GET['id']."'"));

		if (isset($_POST['konfirmasipencairan']))
		{
			$ubah = mysqli_query($konek, "update penarikan set persetujuan = '2' where id = '".$_GET['id']."'");

			$from = "alexandromeo@makinrajin.com";
			$subjek = "Hore.. Pencairan Saldo DuitKu Telah Sukses";
			$pesan = "Saldo DuitKu milik Anda telah berhasil dicairkan. Anda bisa mengecek di Bank Anda";
					$headers = "From : " .$from;
					$kirim = mail($tagihan['email'], $subjek, $pesan, $headers);			

			if ($ubah)
			{
				?><div class="alert-green">
				Konfirmasi Pencairan Telah Berhasil Dilakukan <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				</div><?php
			}
		}

		if (isset($_POST['prosespencairan']))
		{	
			$ubah = mysqli_query($konek, "update penarikan set persetujuan = '1', pengirim = '".$_SESSION['email']."' where id = '".$_GET['id']."'");

			if ($ubah)
			{
				?><div class="alert-blue">
				Informasi tentang Detail Rekening Telah Dikirim ke Email Anda. Lakukan Konfirmasi Setelah Anda Selesai Transfer <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				</div><?php

					$from = "alexandromeo@makinrajin.com";
					$subjek = "Notifikasi Pencairan Saldo DuitKu";
					$pesan = "Anda Belum Melakukan Pencairan Saldo DuitKu ke Salah Satu Pelanggan dengan Data Sebagai Berikut :<br><br>
					<table>
						<tr>
							<td>Nama</td>
							<td>'".$tagihan[nama]."'</td>
						</tr>

						<tr>
							<td>Email</td>
							<td>'".$tagihan[email]."'</td>
						</tr>

						<tr>
							<td>No. Rekening</td>
							<td>'".$tagihan[rekening]."'</td>
						</tr>

						<tr>
							<td>Nama Bank</td>
							<td>'".$tagihan[bank]."'</td>
						</tr>						

						<tr>
							<td>Cabang</td>
							<td>'".$tagihan[cabang]."'</td>
						</tr>

						<tr>
							<td>Nominal</td>
							<td>'".$tagihan[nominal]."'</td>
						</tr>
					</table>
					Jangan lupa, setelah membayar lakukan konfirmasi pembayaran di halaman super admin.";
					$headers = "From : " .$from;
					$kirim = mail($_SESSION['email'], $subjek, $pesan, $headers);
					?><?php
			}
		}

		$oop->poagreement($tagihan);
	}

	else
	{?>
		<h3><b>Daftar Permohonan Penarikan Saldo DuitKu</b></h3><br>
		<table class="table table-bordered table-hover table-striped" id="datatable">
			<thead>
				<tr>
					<th>No. </th>
					<th>Email</th>
					<th>No. Rekening</th>
					<th>Nominal</th>
					<th>Tanggal</th>
					<th>Setujui</th>
				</tr>
			</thead>

			<tbody>
			<?php 
			$no = 1;
			while ($payout = mysqli_fetch_array($tagihan))
			{
				?><td><?= $no; ?></td>
					<td><?= $payout['email']; ?></td>
					<td><?= $payout['rekening']; ?></td>
					<td>Rp <?= number_format($payout['nominal'],"0","","."); ?></td>
					<td><?= $payout['tanggal']; ?></td>
					<td><a href="?id=<?= $payout[id]; ?>">Lihat Detail</a></td><?php
					$no++;
			}?>
			</tbody>
		</table><?php
	}?>
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