<!DOCTYPE html>
<html>
<head>
<?php 	

include "header.php"; 
$oop = new oop("content.php");

		$struk = mysqli_query($konek, "select pesananbarang.biaya, pesananbarang.id, transaksibarang.invoice, transaksibarang.struk from pesananbarang, transaksibarang where pesananbarang.tagihan = transaksibarang.invoice and pesananbarang.status = '0'");
		$jmlstruk = mysqli_num_rows($struk);

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
	if ($_GET['i'])
	{
		if (isset($_POST['accept']))
		{
			$invoice = $oop->amandata($_POST['invoice']);
			
			$accept = mysqli_query($konek, "update pesananbarang set status = '1' where tagihan = '".$invoice."'");

			if ($accept)
			{
				?><div class="alert-blue">Anda Berhasil Menerima Konfirmasi Pembayaran</div><?php
				$getemailseller = mysqli_fetch_array(mysqli_query($konek, "select barang.email, pembeli.idbarang, pesananbarang.id from barang, pembeli, pesananbarang where pesananbarang.tagihan = '".$invoice."' and pesananbarang.tagihan = pembeli.id and pembeli.idbarang = barang.id"));

				$to =  $getemailseller['email'];
				$from = "alexandromeo@makinrajin.com";
				$subjek = "Ada Pesanan Baru Untuk Toko Anda";
				$pesan = "Anda Menerima Pesananan Barang. Anda Bisa Cek Detail Pesanan di Sini :
					<a href='../login.php?account=paid'>Paid Member</a>
					<a href='../login.php?account=free'>Free Member</a>";
					$headers = "From : " .$from;
					$kirim = mail($to, $subjek, $pesan, $headers);
			}

			else
			{
				?><div class="alert-red">Terjadi Kesalahan. Anda Gagal Menerima Konfirmasi Pembayaran</div><?php
			}
		}

		$oop->confirmstruk($_GET['i'], $struk);	
	}

	else
	{
	?>
	<h3><b>Daftar Bukti Transaksi yang Belum Dikonfirmasi</b></h3><br>
	<table class="table table-bordered table-hover table-striped" id="datatable">
		<thead>
			<tr>
				<th>No. </th>
				<th>Nominal Pembayaran</th>
				<th>Struk Pembayaran</th>

			</tr>
		</thead>

		<tbody>
			<?php
			if ($jmlstruk >0)
			{
				$no = 1;
				while ($arr = mysqli_fetch_array($struk))
				{
					?><tr>
						<td><?= $no; ?></td>
						<td><a href="?i=<?= $arr[invoice]; ?>">Rp <?= number_format($arr['biaya'],"0","","."); ?></a></td>
						<td><a href="?i=<?= $arr[invoice]; ?>"><img style="width: 100px; height: 100px;" alt="../img/struktransaksi/<?= $arr[struk]; ?>" src="../img/struktransaksi/<?= $arr[struk]; ?>"></a></td>
					</tr><?php
					$no++;
				}
			}

			else
			{
				?><tr>
					<td colspan="5"><center>Tidak Ada Bukti Pembayaran yang Belum Dikonfirmasi</center></td>
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