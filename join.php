<!DOCTYPE html>
<html>
<head>
<?php include "header.php"; ?>
	<title>Kususon - Gabung Menjadi Member Kami</title>
	<?php
		$membergratis = mysqli_num_rows(mysqli_query($konek, "select id from membergratis"));
		$memberbayar = mysqli_num_rows(mysqli_query($konek, "select id from memberbayar")); 
	?>

	<style>
		.columns
		{
			float: left;
		    width: 33.3%;
		    padding: 8px;
		}

		.price 
		{
		    list-style-type: none;
		    border: 1px solid #eee;
		    margin: 0;
		    padding: 0;
		    -webkit-transition: 0.3s;
		    transition: 0.3s;
		}

		.price:hover
		 {
		    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
		}

		.price .header 
		{
		    background-color: #1abc9c;
		    color: white;
		    font-size: 25px;
		}

		.price li 
		{
		    border-bottom: 1px solid #eee;
		    padding: 20px;
		    text-align: center;
		}

		.price .grey 
		{
		    background-color: #eee;
		    font-size: 20px;
		}

		.button 
		{
		    background-color: #3498db;
		    border: none;
		    color: white;
		    padding: 10px 25px;
		    text-align: center;
		    text-decoration: none;
		    font-size: 18px;
		}

		.button:hover
		{
			text-decoration: none;
			color: white;
			background-color: #2980b9;
		}

		.green
		{
			color: green;
		}

		@media only screen and (max-width: 720px) 
		{
		    .columns 
		    {
		        width: 100%;
		    }
		}		
	</style>
</head>
<body>
	<div class="container">
	<center><h2>Paket Member</h2></center>
		<div class="columns">
		  <ul class="price">
		    <li class="header">Regular</li>
		    <li class="grey">Gratis</li>
		    <li><span class="green">Gratis Akun Affiliate<span class="green"></li>
		    <li><span class="green">Gratis Buka Toko</span></li>
			<li><span class="green">Bisa Download Konten</span></li>
		    <li><span class="green"><b><?= $membergratis; ?></b> Pengguna Terdaftar</span></li>	
		    <li class="grey"><a href="register.php?account=free" class="button">Daftar Sekarang</a></li>
		  </ul>
		</div>

		<div class="columns">
		  <ul class="price" style="border-color: #777; box-shadow: 1px 2px 8px 2px rgba(0, 0, 0, 0.8);">
		    <li class="header" style="background-color:#2980b9;">Premium</li>
		    <li class="grey">
		    		<span style="text-decoration: line-through;">Rp 149.000 / Bulan</span>
		    		<br>Rp 99.000 / Bulan</li>
		    <li><span class="green">Akses Seluruh Konten</span></li>
		    <li><span class="green">Gratis Akun Affiliate<span class="green"></li>
		    <li><span class="green">Prioritas Premium</span></li>
		    <li><span class="green">Gratis Buka Toko</span></li>
			<li><span class="green">Bisa Download Konten</span></li>
			<li><span class="green"><b><?= $memberbayar; ?></b> Pengguna Terdaftar</span></li>		    
		    <li class="grey"><a href="register.php?account=paid&utm=<?= $_GET[utm]; ?>" class="button">Daftar Sekarang</a></li>
		  </ul>
		</div>

		<div class="columns">
		  <ul class="price">
		    <li class="header">Super</li>
		    <li class="grey">Coming Soon</li>
		    <li>Coming Soon</li>
		    <li>Coming Soon</li>
		    <li>Coming Soon</li>
		    <li>Coming Soon</li>
		  </ul>
		</div>
	</div><br><br><br>
</body>
</html>
<?php footer(); ?>