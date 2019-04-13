<html>
<title>Dashboard - Kususon </title>
<body>
<div class="sidebar">
	<center><?= $_SESSION['passwordpaid'] ? "Premium Member" : "Member"; ?></center>
			<div class="sidebar-profil">

				<center><a href="profile.php">
				<?php 
				if ($_SESSION['passwordfree'])
				{
					$ft = mysqli_query($konek, "select * from membergratis where email='".$_SESSION['email']."'");
				}
				elseif($_SESSION['passwordpaid'])
				{
					$ft = mysqli_query($konek, "select * from memberbayar where email='".$_SESSION['email']."'");
				}

				$arr = mysqli_fetch_array($ft);
				
				if ($arr['foto'] != "")
				{
					echo "<img src='../img/user/$arr[foto]'  alt='".$arr['foto']."' class='sidebar-foto'>";
				}
				else
				{
					echo '<img src="../icon/user.svg" class="sidebar-foto">';
				}
				?>

				<br><br><?= $_SESSION['email']; ?></a><br></center>
			</div>

				<a href="index.php">
				<div class="sidebar-tulisan">
					<img src="../icon/home.svg" style="width:25px; height: 25px;"> <span class="accordion">Beranda</span>
				</div>
				</a>

				<a href="materi.php">
				<div class="sidebar-tulisan">
					<img src="../icon/gear.svg" style="width: 25px; height: 25px;"><span class="accordion"> Materi</span>
				</div>
				</a>

				<a href="shop.php">
				<div class="sidebar-tulisan">
					<img src="../icon/cart.svg" style="width: 25px;height: 25px;"> <span class="accordion">Belanja</span>
				</div>
				</a>

					<?php 
					$email = $_SESSION['email'];
					$toko = mysqli_query($konek, "select *from toko where email='".$email."'");
					$arr = mysqli_fetch_array($toko);

	  						?>
	  						<a href="market.php">
	  						<div class="sidebar-tulisan">
								<img src="../icon/market.svg" style="width: 25px; height: 25px;"> <span class="accordion myBtn">Toko Anda</span>
							</div>
							</a>
							<?php
	  					
					?>

			<a href="logout.php">
				<div class="sidebar-tulisan">
					<img src="../icon/logout.svg" style="width: 25px; height: 25px;"> Logout
				</div>
			</a>
	</div>
	<a href="#" id="totop"><img src="../icon/scrolltop.svg" class="sidebar-foto" style="z-index: -111111;"></a>	
</body>
</html>

	<script>

$(document).ready(function()
	{
		$(window).scroll(function()
		{
			if ($(this).scrollTop() > 200)
			{
				$('#totop').fadeIn();
			}

			else
			{
				$('#totop').fadeOut();
			}
		});

		$('#totop').click(function()
		{
			$('html, body').animate({scrollTop:0}, 'slow');
			return false;
		});
	});
	</script>