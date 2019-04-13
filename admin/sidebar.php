<div class="sidebar">
			<div class="sidebar-profil">
			<a href="profile.php">
				<center>

				<?php 
				
				$ft = mysqli_query($konek, "select * from admin where email='".$_SESSION['email']."'");
				$arr = mysqli_fetch_array($ft);
				
				if ($arr['foto'] != "")
				{
					echo $arr['jabatan'] == "Master" ? "SUPER ADMIN" : "ADMIN";
					echo "<br><img src='../img/admin/$arr[foto]'  alt='".$arr['foto']."' class='sidebar-foto'>";
				}
				else
				{
					echo $arr['jabatan'] == "Master" ? "SUPER ADMIN" : "ADMIN";
					echo '<br><img src="../icon/user.svg" class="sidebar-foto">';
				}
				?>

				<br><?= $_SESSION['email']; ?></center>
			</a>
			</div>

				<a href="index.php">
				<div class="sidebar-tulisan">
					<img src="../icon/home.svg" style="width:25px; height: 25px;"> <span class="accordion">Beranda</span>
				</div>
				</a>

				<?php if ($arr['jabatan'] == "Master")
				{
					?>
					<a href="confirmation.php">
					<div class="sidebar-tulisan">
						<img src="../icon/membercard.svg" style="width: 25px; height: 25px;"> <span class="accordion">Aktifkan Member</span>	
					</div></a>

					<a href="payment.php">
					<div class="sidebar-tulisan">
						<img src="../icon/paid.svg" style="width: 25px; height: 25px;"> <span class="accordion">Konfirmasi Pembayaran</span>	
					</div></a>	

					<a href="payout.php">
					<div class="sidebar-tulisan">
						<img src="../icon/payout.svg" style="width: 25px; height: 25px;"> <span class="accordion">Cairkan Saldo Member</span>	
					</div></a>					

					<a href="recent.php">
					<div class="sidebar-tulisan">
						<img src="../icon/eye.svg" style="width: 25px; height: 25px;"> <span class="accordion">Terbitkan Konten</span>	
					</div></a><?php
				}?>

				<a href="content.php">
				<div class="sidebar-tulisan">
					<img src="../icon/gear.svg" style="width: 25px; height: 25px;"> <span class="accordion">Buat Konten</span>
				</div>
				</a>

				<a href="admin.php">
				<div class="sidebar-tulisan">
					<img src="../icon/admin.svg" style="width: 25px; height: 25px;"> Data Admin
				</div>
				</a>

				<a href="logout.php">
				<div class="sidebar-tulisan">
					<img src="../icon/logout.svg" style="width: 25px; height: 25px;"> Logout
				</div>
				</a>

				<div class="online">
					<div class="on"></div>Online
				</div>
</div>