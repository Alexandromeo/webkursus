<script>

		$(document).ready(function()
		{
			$("#char").text("Jumlah Karakter : 0");
		});

		function hitungchar()
		{ 
			var char = $("#judul").val().length;
			$("#char").text("Jumlah Karakter : "+char+ ". Direkomendasikan Untuk SEO");

			if (char>65)
			{ 
				$("#char").css("color","red"); 
				$("#char").text("Jumlah Karakter : "+char+ ". Terlalu Panjang. Tidak Direkomendasikan Untuk SEO");
			}

			else if (char<40)
			{
				$("#char").css("color","red");
				$("#char").text("Jumlah Karakter : "+char+ ". Terlalu Pendek. Tidak Direkomendasikan Untuk SEO");
			}

			else
			{
				$("#char").css("color","green");				
			}	
		}
		</script>

<?php

function home()
{
	?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/landing2.jpg" alt="Kelebihan Kususon 1" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/landing.jpg" alt="Kelebihan Kususon 2" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  
<div class="container-fluid bg-3 text-center" style="background-color: #ecf0f1;">    
  <div class="row">
  <h2><b>Kami Takkan Kalah dalam :</b></h2><br>
    <div class="col-sm-2 col-sm-offset-1">
      <img src="icon/price.svg" class="img-responsive" style="width:100%" alt="Image">
      <p><h2><b>Harga</b></h2></p>
      <p><h4>Harga yang kami tawarkan termasuk yang termurah jika dibandingkan dengan website kursus pemrograman lainnya.</h4></p>
    </div>
    <div class="col-sm-2 col-sm-offset-2"> 
      <img src="icon/customer-service.svg" class="img-responsive" style="width:100%" alt="Image">
      <p><h2><b>Pelayanan</b></h2></p>
      <p ><h4>Kami menyediakan pelayanan 24 jam via website dan melalui telepon. Kami mengutamakan kepuasan pelanggan.</h4></p>
    </div>
    <div class="col-sm-2 col-sm-offset-2"> 
      <img src="icon/materi.svg" class="img-responsive" style="width:100%" alt="Image">
      <p><h2><b>Konten</b></h2></p>
      <p><h4>Konten yang kami berikan pun berupa modul, video, dan artikel yang berkualitas. Dibuat oleh para ahli di bidangnya masing-masing.</h4></p>
    </div>

  </div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
  <h2><b>Pendapat Para Pelanggan :</b></h2><br>
    <div class="col-sm-2 col-sm-offset-1">
      <img src="img/Koala.jpg" class="img-responsive img-circle" style="width:100%" alt="Image">
    </div>

    <div class="col-sm-8 img-rounded" style="background-color: #eee;">
    <center><h4><b style="color: #4673dd;">Alexandromeo L.G</b> (Founder of Kususon.com)</h4></center><br>
    <span style="float: left;">Pelayanan di Kususon ini sangat menarik. Para pengajarnya pun menjelaskan dengan detail tentang konten yang dibuatnya. Selain itu, kita juga bisa bertanya jawab dengan para pengajar sesuai dengan bidang masing-masing. Kita juga bisa bertanya seputar projek yang kita kerjakan. Pokoknya, belajar di Kususon memang bikin ketagihan.</span>
    </div>
  </div>
</div><br>

<div class="container-fluid bg-3 text-center" style="background-color: #19b5fe; color: white">    
  <h2><b>Kini Saatnya Anda Mencoba</b></h2><br>
  <div class="container">
  	<center>
	  	<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		  	<span style="font-size: 17px;">Apakah Anda terkarik belajar dengan kami ? Setelah belajar, Anda akan mendapatkan ilmu pemrograman yang cukup bagus yang bisa Anda terapkan di rumah Anda sehingga Anda bisa menjadi programmer yang banyak dicari orang hanya dengan membayar sejumlah uang yang tidak seberapa jika dibandingkan dengan apa yang Anda dapatkan. <br><br>Anda tak perlu ragu, karena kami juga menyediakan paket 'Free Member' untuk Anda yang ingin belajar dengan gratis.<br><br>

			Anda Bisa Cek Paket di sini :<br><br>
			<a href="join.php?page=join&utm=index" style="color: white; text-decoration: none;">
				<div class="tengah" style="border: white solid; color: white;">
					Lihat Berbagai Paket Member</span>
				</div>
			</a>
		</div>
	</center>
	</div>
	<br><br>
</div>
<?php
}


function iming()
{
	?>	<center><h2>Kami Sangat Memperhatikan :</h2></center>
		
		<div class="col-sm-12 col-xs-12 col-md-4" style="background-color: #ffffff; font-family: 'Nobile-Medium'; box-shadow: 4px 8px 12px 4px rgba(0,0,0,0.4);">
			<br><br><center><img src="icon/teamwork/svg/user.svg" width="130" height="130">
			<br><h3>Pelayanan</h3></center>
			<hr noshade width="90%"><br>
			<center>Anda tahu kan bahwa pembeli itu raja ? Jadi, jika Anda akan membeli sesuatu, maka Anda akan menjadi raja bagi penjual, betul ?<br><br>Pastinya mereka akan melayani Anda sebaik mungkin, setuju ya ? <br><br>Tapi, pada praktiknya tidak demikian. Banyak sekali penjual yang kurang bisa memberikan pelayanan yang baik bagi pembelinya.<br><br>Tapi tidak dengan di sini. Pelanggan akan kami layani dengan baik seperti raja sungguhan.<br><br>Jika Anda mendapatkan pelayanan yang kurang baik dari tim kami, silahkan laporkan di <b>admin@kususon.com</b> dan lampirkan bukti screenshotnya.</center>
		</div>

		<div class="col-sm-12 col-xs-12 col-md-4" style=" background-color: #ffffff; font-family: 'Nobile-Medium'; box-shadow: 4px 8px 12px 4px rgba(0,0,0,0.4);">
			<br><br><center><img src="icon/teamwork/svg/businessman.svg" width="130" height="130">
			<br><h3>Harga</h3></center>
			<hr noshade width="90%"><br>
			<center>Saya tahu bahwa uang itu cukup berarti bagi Anda, iya kan ? Kalau tidak, buat apa Anda capek-capek belajar dan bekerja kalau bukan demi uang?<br><br>Udah ngaku aja, saya juga begitu ^_^<br><br>Uang memang penting, tapi yang lebih penting itu ilmu. Tentunya orang cerdas seperti Anda setuju dengan pendapat saya kan ?<br><br>Untungnya, di sini Anda bisa belajar sekaligus menghemat uang Anda. Karena, khusus bagi Anda, akan kami berikan harga spesial yang pastinya terjangkau.<br><br>Anda rugi kalau tidak mendaftar, karena ini investasi leher ke atas. Sangat penting bagi Anda.</center></span>
		</div>

		<div class="col-sm- col-xs-12 col-md-4" style=" background-color: #ffffff; font-family: 'Nobile-Medium'; box-shadow: 4px 8px 12px 4px rgba(0,0,0,0.4);">
			<br><br><center><img src="icon/teamwork/svg/reunion.svg" width="130" height="130">
			<br><h3>Waktu dan Tenaga Anda</h3></center>
			<hr noshade width="90%"><br>
			<center>Apakah Anda lelah jika harus keluar rumah, rela macet-macetan demi belajar ? <br><br>Dan parahnya lagi, ketika sampai tujuan, Anda sudah kelelahan hingga tidak bisa menyerap ilmu yang diberikan, kan ?<br><br>Ketika sampai di rumah, kondisi badan Anda sudah lelah seperti tisu basah. Anda pasti tidak betah dan ingin berubah ?<br><br>Sekarang sudah jamannya belajar dengan bermodalkan laptop atau smartphone yang terkoneksi internet. <br><br>Kabar baiknya, di sini Anda bisa belajar pemrograman hanya dengan koloran sehingga Anda pasti akan merasa nyaman tanpa beban.</center>
		</div>

		<div class="kenapa">
			<br><h2><center>Apa Yang Akan Anda Dapatkan</center></h2>
		</div><?php
}

function loginfree()
{
	echo '<div class="sign"><br><h4><center>Log In Free Member</center>
	<hr noshade width="90%" style="background-color: #46f; height: 3px;"></h4>
		<div style="margin-left: 15px;">
		Email :<br><img src="icon/mail.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="text" name="email" style="width: 310px; " required autocfocus><br><br>
		
		Password :<br><img src="icon/password.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="password" name="password" style="width: 310px;" required><br><br>
		<div>
		
		<center>
		<input type="submit" name="loginfree" value="Login" class="btn btn-primary" style="border-radius: 0;">
		<input type="button" value="Kembali" class="btn btn-primary" style="border-radius: 0;" onclick="kembali()">
		<h6><br>
		<a href="register.php?account=free">Daftar Akun (Khusus Free Register)</a><br>
		<a href="join.php?page=join&utm=form"><br>Upgrade Akun Anda</a> || 
		<a href="?forgot=password">Lupa Password ?</a><br><br>
		<a href="?account=paid">Login Sebagai Member Berbayar ?</a><br><br>
		<a href="?account=free">Login Sebagai Member Gratis ?</a></center>
	</div>';
}

function loginadmin()
{
	echo '<div class="sign" style="height: 10%;"><br><h4><center>Log In Admin</center>
	<hr noshade width="90%" style="background-color: #46f; height: 3px;"></h4>
		<div style="margin-left: 15px;">
		Email :<br><img src="icon/mail.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="text" name="email" style="width: 310px;" required autocfocus><br><br>
		
		Password :<br><img src="icon/password.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="password" name="password" style="width: 310px;" required><br><br>
		<div>
		
		<center>
		<input type="submit" name="loginadmin" value="Login Admin" class="btn btn-primary" style="border-radius: 0;">
		<input type="button" value="Kembali" class="btn btn-primary" style="border-radius: 0;" onclick="kembali()">
		<h6><br>
	</div>';	
}

function lupapassword()
{
	echo '<div class="sign"><br><h4><center>Lupa Password</center>
	<hr noshade width="90%" style="background-color: #46f; height: 3px;"></h4>
	<div style="margin-left: 15px; ">
	Masukkan Email Anda : <br><img src="icon/mail.svg" width="26" height="26">&nbsp;&nbsp;
	<input class="reg" type="text" name="email" style="width: 310px;" required autocfocus><br><br><br><br></div>
	
	<center>
	<input type="submit" name="lupapassword" value="Kirim Password" class="btn btn-primary" style="border-radius: 0;">
	<input type="button" value="Kembali" class="btn btn-primary" style="border-radius: 0;" onclick="kembali()">
		<div>
		<h6><br>
		<a href="register.php?account=free">Daftar Akun (Khusus Free Register)</a><br>
		<a href="join.php?page=join&utm=form"><br>Upgrade Akun Anda</a> || 
		<a href="?forgot=password">Lupa Password ?</a><br><br>
		<a href="?account=paid">Login Sebagai Member Berbayar ?</a><br><br>
		<a href="?account=free">Login Sebagai Member Gratis ?</a></center>
	</div>';
}

function loginpaid()
{
	echo '<div class="sign"><br><h4><center>Log In Paid Member</center>
	<hr noshade width="90%" style="background-color: #46f; height: 3px;"></h4>
		<div style="margin-left: 15px;">
		Email :<br><img src="icon/mail.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="text" name="email" style="width: 310px;"><br><br>
		Password :<br><img src="icon/password.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="password" name="password" style="width: 310px;" autocfocus><br><br>
		<div>
		<center><input type="submit" name="loginpaid" value="Login" class="btn btn-primary" style="border-radius: 0;">
		<input type="button" value="Kembali" class="btn btn-primary" style="border-radius: 0;" onclick="kembali()">
		<h6><br>
		<a href="register.php?account=free">Daftar Akun (Khusus Free Register)</a><br>
		<a href="join.php?page=join&utm=form"><br>Upgrade Akun Anda</a> || 
		<a href="?forgot=password">Lupa Password ?</a><br><br>
		<a href="?account=paid">Login Sebagai Member Berbayar ?</a><br><br>
		<a href="?account=free">Login Sebagai Member Gratis ?</a></center>
	</div>';
}

function registerfree()
{
	echo '<div class="sign" style="height: auto; margin-top: 0px;"><br><h4><center>Register Free Member</center>
	<hr noshade width="90%" style="background-color: #46f; height: 3px;"></h4>
		<div style="margin-left: 15px;">
		Email :<br><img src="icon/mail.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="text" name="email" style="width: 310px;" required autocfocus><br><br>
		Password :<br><img src="icon/password.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="password" name="password" style="width: 310px;" required minlength="8"><br><br>
		Confirm Password :<br><img src="icon/password.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="password" name="confirmpassword" style="width: 310px;" required minlength="8"><br><br>
		Username : <br><img src="icon/user.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="text" name="username" style="width: 310px;" required><br><br>
		<div>
		<center>
		<input type="submit" name="registerfree" value="Daftar Free Member" class="btn btn-primary" style="border-radius: 0;">
		<input type="button" value="Kembali" class="btn btn-primary" style="border-radius: 0;" onclick="kembali()">
		<h6><br>
		<a href="register.php?account=free">Daftar Akun (Khusus Free Register)</a><br>
		<a href="join.php?page=join&utm=form"><br>Upgrade Akun Anda</a> || 
		<a href="login.php?forgot=password">Lupa Password ?</a><br><br>
		<a href="login.php?account=">Login Sebagai Member Berbayar ?</a><br><br>
		<a href="login.php?account=free">Login Sebagai Member Gratis ?</a></center>
	</div>';
}

function registerpaid()
{
	echo '<div class="sign" style=" margin-top: 0px; height: auto;"><br><h4><center>Register Paid Member</center>
	<hr noshade width="90%" style="background-color: #46f; height: 3px;"></h4>
		<div style="margin-left: 15px;">
		Email : <br><img src="icon/mail.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="text" name="email" style="width: 310px;" required autocfocus><br><br>

		Nama : <br><img src="icon/user.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="text" name="username" style="width: 310px;" required><br><br>

		Password : <br><img src="icon/password.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="password" name="password" style="width: 310px;" required><br><br>

		Konfirmasi Password : <br><img src="icon/password.svg" width="26" height="26">&nbsp;&nbsp;
		<input class="reg" type="password" name="konfirmasipassword" style="width: 310px;" required><br><br>
		<div>
		
		<center>
		<input type="submit" name="registerpaid" value="Daftar Paid Member" class="btn btn-primary" style="border-radius: 0;">
		<input type="button" value="Kembali" class="btn btn-primary" style="border-radius: 0;" onclick="kembali()">
		<h6><br>
		<a href="register.php?account=free">Daftar Akun (Khusus Free Register)</a><br>
		<a href="join.php?page=join&utm=form"><br>Upgrade Akun Anda</a> || 
		<a href="login.php?forgot=password">Lupa Password ?</a><br><br>
		<a href="login.php?account=">Login Sebagai Member Berbayar ?</a><br><br>
		<a href="login.php?account=free">Login Sebagai Member Gratis ?</a></center>
	</div>';	
}

function footer()
{
	echo '<div class="footer">
		<br><center>Created by <a href="https://makinrajin.com" style="color: cyan;" target="_blank">Alexandromeo L.G</a> || Icon by <a href="http://flaticon.com" style="color: cyan;"  target="_blank">Flaticon</a> <br> Copyright &copy; 2017. All Right Reserved</center>
		</div>';
}

function createtoko()
{
	?><form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nama Toko</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Toko" required>
			</div>
		</div>

		<div class="form-group">
			<label for="alamat" class="col-sm-2 control-label">Alamat Toko</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Toko" required>
			</div>
		</div>

		<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Kabupaten/Kota</label>
				<div class="col-sm-10 col-md-8">
					<input type="text" class="form-control" name="kota" placeholder="Kabupaten/Kota" required>
				</div>
		</div>

		<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Provinsi</label>
				<div class="col-sm-10 col-md-8">
					<input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required>
				</div>
		</div>		

		<div class="form-group">
			<label for="gambar" id="gambarlabel" class="col-sm-2 control-label">Gambar Toko</label>
			<div class="col-sm-10 col-md-10">
				<input type="file" name="foto" class="btn-link" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="buattoko" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Buat Toko</button>&nbsp;
				<button class='btn btn-warning'><img src='../icon/reset.svg' style='width: auto; height: 30px;'>&nbsp;Ulangi</button>
			</div>
		</div>
	</form><?php
}

function createmodul()
{
	?><form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
		<h3><b>Buat Modul</b></h3><br>
		<div class="form-group">
			<label for="judulkonten" class="col-sm-2 control-label">Judul Modul</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" onkeyup="hitungchar()" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Modul" required>
				<span style="font-weight: bolder;" id="char"></span>
			</div>
		</div>	

		<div class="form-group">
			<label for="gambar" id="labelmultimedia" class="col-sm-2 control-label">Modul (PDF Only)</label>
			<div class="col-sm-10 col-md-10">
				<input type="file" name="modul" class="btn btn-link" required>
			</div>
		</div>


		<div class="form-group">
			<label for="gambar" id="labelmultimedia" class="col-sm-2 control-label">Gambar Cover</label>
			<div class="col-sm-10 col-md-10" id="gambar">
				<input type="file" name="multimedia" class="btn btn-link" id="multimedia" required>
			</div>
		</div>

		<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Bahasa</label>
			<div class="col-sm-10 col-md-8">
				<select name="bahasa" class="btn btn-link" required>
					<option value="CSS">CSS</option>
					<option value="C">C</option>
					<option value="C#">C#</option>
					<option value="C++">C++</option>
					<option value="HTML">HTML</option>
					<option value="Java">Java</option>
					<option value="Javascript">Javascript</option>
					<option value="PHP">PHP</option>
					<option value="Phyton">Phyton</option>
					<option value="SQL">SQL</option>
					<option value="Visual Basic">Visual Basic</option>
				</select>
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

		<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="kirimmodul" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Kirim</button>&nbsp;
				<button type="reset" class='btn btn-warning'><img src='../icon/reset.svg' style='width: auto; height: 30px;'>&nbsp;Ulangi</button>
			</div>
		</div>
		</form>
	<?php 
}

function createcontent()
{
	?><form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
	<h3><b>Buat Artikel</b></h3><br>
		<div class="form-group">
			<label for="judulkonten" class="col-sm-2 control-label">Judul Konten</label>
			<div class="col-sm-10 col-md-10">
				<input type="text" class="form-control" id="judul" name="judul" onkeyup="hitungchar()" placeholder="Masukkan Judul Konten" required><span style="font-weight: bolder;" id="char"></span>
			</div> 
		</div>
 
		<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Bahasa</label>
			<div class="col-sm-10 col-md-8">
				<select name="bahasa" class="btn btn-link" required>
					<option value="CSS">CSS</option>
					<option value="C">C</option>
					<option value="C#">C#</option>
					<option value="C++">C++</option>
					<option value="HTML">HTML</option>
					<option value="Java">Java</option>
					<option value="Javascript">Javascript</option>
					<option value="PHP">PHP</option>
					<option value="Phyton">Phyton</option>
					<option value="SQL">SQL</option>
					<option value="Visual Basic">Visual Basic</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="gambar" id="labelmultimedia" class="col-sm-2 control-label">Gambar Cover</label>
			<div class="col-sm-10 col-md-10" id="gambar">
				<input type="file" name="multimedia" class="btn-link" id="multimedia" required>
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

		<div class="form-group">
			<label for="isikonten" id="isilabel" class="col-sm-2 control-label">Isi Konten</label>
			<div class="col-sm-10 col-md-10">
				<textarea class="form-control" required name="isi" id="isi" style="min-width: 900px; max-width: 900px; max-width: 450px; min-height: 450px; overflow-y: scroll;"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="kirimkonten" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Kirim</button>&nbsp;
				<button type="reset" class='btn btn-warning'><img src='../icon/reset.svg' style='width: auto; height: 30px;'>&nbsp;Ulangi</button>
			</div>
		</div>
	</form><?php
}

function additems()
{
	?><form method="post" role="form" class="form-horizontal" style="width: 95%;" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Nama Barang</label>
		<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang" required>
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Foto Barang</label>
		<div class="col-sm-10 col-md-8">
				<input type="file" name="foto" class="btn btn-link" required>
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Stok Barang</label>
		<div class="col-sm-10 col-md-8">
				<input type="number" min="0" class="form-control" name="stok" required>
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Harga</label>
		<div class="col-sm-10 col-md-8">
				<input type="number" min="0" class="form-control" name="harga" required>
		</div>
	</div>

	<div class="form-group">
		<label for="kontenberbayar" class="col-sm-2 control-label">Bekas atau Baru</label>
				<div class="col-sm-10 col-md-10">
					<label class="switch">
					  <input type="checkbox" name="kondisi" value="1">
					  <div class="slider round"></div>
					</label>
				</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Deskripsi Produk</label>
		<div class="col-sm-10 col-md-8">
				<textarea required class="col-md-10 col-sm-10 form-control" name="deskripsi" style="overflow-y: scroll; max-width: 100%; max-height: 400px; min-height: 400px;"></textarea>
		</div>
	</div>

	<div class="form-group">
	<label for="berat" class="col-sm-2 control-label">Berat (Gram)</label>
		<div class="col-sm-10 col-md-8">
				<input type="number" min="0" class="form-control" name="berat" required>
		</div>
	</div>

	<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Kategori</label>
				<div class="col-sm-10 col-md-8">
					<select name="kategori" class="btn-link" required>
						<option value="">Pilih Kategori</option>
						<option value="Intrnet">Internet</option>
						<option value="Komputer Umum">Komputer Umum</option>
						<option value="Pemrograman">Pemrograman</option>
					</select>
				</div>
		</div>

	<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="tambahbarang" class='btn btn-warning'><img src='../icon/plus.svg' style='width: auto; height: 30px;'>&nbsp;Tambah Barang</button>&nbsp;
			</div>
		</div><?php
}

function payconfirm()
{
	?><form method="post" role="form" class="form-horizontal" style="width: 95%;" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
		<div class="form-group">
			<label for="judulkonten" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-12 col-md-8 col-xs-12">
				<input type="text" class="form-control" name="email" placeholder="Masukkan Email Anda" required>
			</div>
		</div>

		<div class="form-group">
			<label for="judulkonten" class="col-sm-2 control-label">Biaya Transfer</label>
			<div class="col-sm-12 col-md-8 col-xs-12">
				<input type="number" class="form-control" name="biaya" placeholder="Masukkan Biaya Transfer Anda" required>
			</div>
		</div>

		<div class="form-group">
			<label for="gambar" id="labelmultimedia" class="col-sm-2 control-label">Struk / Bukti Transfer</label>
			<div class="col-sm-12 col-md-8 col-xs-12" id="gambar">
				<input type="file" name="struk" class="btn-link" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="konfirmasi" class='btn btn-warning'><img src='icon/payment.svg' style='width: auto; height: 30px;'>&nbsp;Konfirmasi Pembayaran</button>&nbsp;
			</div>
		</div>
	</form><?php
}

function createadmin()
{
	?>
		<h3><b>Tambah Admin</b></h3>
		<form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="email" placeholder="Masukkan Email" required>
			</div>
		</div>

		<div class="form-group">
			<label for=alamat" class="col-sm-2 control-label">Nama Admin</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
			</div>
		</div>

		<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Jabatan</label>
				<div class="col-sm-10 col-md-8">
					<select name="jabatan" class="btn-link" required>
						<option value="">Pilih Jabatan</option>
						<option value="Trainer">Trainer</option>
					</select>
				</div>
		</div><br><br>

		<div class="form-group">
			<div class="col-sm-10 col-md-10">
				<button style="float: right;" type="submit" name="tambahadmin" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Tambah Admin</button>&nbsp;
			</div>
		</div><?php
}

function slideshowbarang()
{
	?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="../img/toko.jpg" alt="Los Angeles" style="width:100%;">
      </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div><br>
  	<?php
}

?><script>
function kembali()
{
	history.back()
}
</script><?php
class oop
{
	public function __construct($file)
	{
		$this->file = $file;
	}

	public function showhistory($query)
	{
		?><div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><strong>Rp. <?= number_format($query['nominal'], "0", "", "."); ?><?php
          if ($query['persetujuan'] == "2")
          {
          	?><label style="float: right;" class="label label-success">Berhasil</label><?php
          }

          elseif ($query['persetujuan'] == "1")
          {
          	?><label style="float: right;" class="label label-primary">Sedang Diproses</label><?php
          }

          else
          {
          	?><label style="float: right;" class="label label-danger">Belum Diproses</label><?php
          }?> </strong></a>
          <span class="close"></span>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
        	<table>
        		<tr>
        			<td>No. Rekening</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $query['rekening']; ?></b></td>
        		</tr>

        		<tr>
        			<td>Nama Bank</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $query['bank']; ?></b></td>
        		</tr>

        		<tr>
        			<td>Cabang</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $query['cabang']; ?></b></td>
        		</tr>

        		<tr>
        			<td>Nama Pemilik Rekening</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $query['nama']; ?></b></td>
        		</tr>        		
        	</table>
        </div>
      </div>
    </div><?php
	}

	public function poagreement($query)
	{
		?><form method="post" role="form" class="form-horizontal" action="<?= htmlspecialchars(''); ?>">
		<h3><b>Detail Permintaan Penarikan Saldo DuitKu</b></h3><br>
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="email" value="<?= $query[email]; ?>" class="form-control" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">No. Rekening</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="rekening" value="<?= $query[rekening]; ?>" class="form-control" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nama Bank</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="bank" value="<?= $query[bank]; ?>" class="form-control" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Cabang</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="cabang" value="<?= $query[cabang]; ?>" class="form-control" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nama Pemilik Rekening</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="nama" value="<?= $query[nama]; ?>" class="form-control" readonly>
			</div>
		</div>	

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nominal</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="email" value="Rp <?= number_format($query[nominal],"0","","."); ?>" class="form-control" readonly>
			</div>
		</div>			

		<center>
		<div class="form-group">
			<div class="col-sm-10 col-md-8">
			<?php
			if ($query['persetujuan'] == 0)
			{
				?><button type="submit" name="prosespencairan" class="btn btn-warning"><img src="../icon/payout.svg" style="width: 26px; height: 26px;">&nbsp;&nbsp;<b>Proses Pencairan</b></button><?php
			}

			elseif ($query['persetujuan'] == 1)
			{
				?><button type="submit" name="konfirmasipencairan" class="btn btn-danger"><img src="../icon/payout.svg" style="width: 26px; height: 26px;">&nbsp;&nbsp;<b>Konfirmasi Pencairan</b></button><?php			
			}?>
			</div>
		</div>
		</center>
		</form><?php
	}

	public function resi()
	{
		?><form method="post" role="form" class="form-horizontal" action="<?= htmlspecialchars(''); ?>">
		<h3>Masukkan No. Resi Barang</h3><br>
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">No. Resi</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="resi" class="form-control" required>
			</div>
		</div>

		<center>
		<div class="form-group">
			<div class="col-sm-10 col-md-8">
				<button type="submit" name="inputresi" class="btn btn-warning"><img src="../icon/resi.svg" style="width: 26px; height: 26px;">&nbsp;&nbsp;<b>Input Resi</b></button>
			</div>
		</div>
		</center>
		</form><?php
	}

	public function confirmstruk($invoice, $query)
	{
		$arr = mysqli_fetch_array($query);

		?><form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">No. Tagihan</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="invoice" class="form-control" required value="<?= $arr[invoice]; ?>" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nominal Transaksi</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" name="nominal" class="form-control" required value="Rp <?= number_format($arr['biaya'],"0","","."); ?>" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="alamat" class="col-sm-2 control-label">Struk Transaksi</label>
			<div class="col-sm-10 col-md-8">
				<img src="../img/struktransaksi/15155040191. The Master Of 3.jpg" name="struk">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="accept" class='btn btn-info'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;<b>Terima Konfirmasi Pembayaran</b></button><br><br>&nbsp;
			</div>
		</div></form><?php
	}

	public function settanggal($email)
	{
		$tglskrg = date("Y m d");
		$tgl31 = array("01","03","05","07","08","10","12");
		$tgl30 = array("04","06","09","11");

		$pecah = explode(" ", $tglskrg);

		$pecah[2] = $pecah[2] + 30;

		if (in_array($pecah[1], $tgl31))
		{
			if ($pecah[2] >31)
			{
				$pecah[2] = $pecah[2]-31;
				$pecah[1]++;

				if ($pecah[1]>12)
				{
					$pecah[1] = 01;
					$pecah[0]++;
				}
			}
		} 

		elseif(in_array($pecah[1], $tgl30))
		{
			if ($pecah[2]>30)
			{
				$pecah[2] = $pecah[2]-30;
				$pecah[1]++;
			}
		}

		else
		{
			if ($pecah[0] % 4 == 0)
			{
				if ($pecah[2]>29)
				{
					$pecah[2] = $pecah[2]-29;
					$pecah[1]++;
				}
			}

			else
			{
			 	if ($pecah[2]>28)
			 	{
			 		$pecah[2] = $pecah[2]-28;
			 		$pecah[1]++;
			 	}
			}
		}

		$konek = mysqli_connect("127.0.0.1","root","","kususon");
		$tanggalakhir = implode(" ", $pecah);
		$q = mysqli_query($konek, "update memberbayar set mulai = '".$tglskrg."', akhir = '".$tanggalakhir."' where email = '".$email."'");
	}

	public function payout($saldo)
	{
		?>
		<form method="post" role="form" class="form-horizontal" style="width: 95%;" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Saldo DuitKu</label>
		<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" id="duitku" name="saldo" value="<?= number_format($saldo,"0","","."); ?>" readonly>
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">No. Rekening Tujuan</label>
		<div class="col-sm-10 col-md-8">
				<input type="number" class="form-control" required name="rekening">
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Nama Bank</label>
		<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" required="" name="bank">
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Cabang</label>
		<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" required="" name="cabang">
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Nama pada Rekening</label>
		<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" required="" name="nama">
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Jumlah Penarikan</label>
		<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" required="" value="<?= number_format($saldo,"0","","."); ?>" name="tarik" readonly>
				<?php 
				if ($saldo >= "10000")
				{
					?><span style="font-size: 13px;" id="kurang">Anda hanya bisa menarik saldo semuanya</span><?php
				}
				else
				{
					?><span style="font-size: 13px;" id="kurang">Saldo Anda Tidak Cukup. Minimal Rp 10.000</span><?php	
				}?>
		</div>
	</div>
	<center><button type="submit" <?= $saldo <= "10000" ? "disabled" : "" ; ?> name="payout" class="btn btn-warning">Ambil Saldo Anda</button></center>
	</form>
	<?php
	}
	

	function amandata($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = htmlspecialchars($data, ENT_QUOTES);
		$data = strip_tags($data);
		$data = stripcslashes($data);
		$data = htmlentities($data);
		return $data;
	}

	function showtagihan($id, $nama, $foto, $kondisi, $jumlah, $biaya, $ongkir, $total, $pembeli, $alamat, $kecamatan, $kota, $provinsi, $hp, $file)
	{
		?><div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><strong>Detail Barang Pesanan</strong></a>
          <span class="close"></span>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
        	<table>
        		<tr>
        			<td>Nama Barang</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><a href="shop.php?id=<?= $id; ?>"><?= $nama; ?></a></b></td>
        		</tr>

        		<tr>
        			<td>Foto Barang</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><img class="img-responsive" style="width: 40%;" src="../img/barang/<?= $foto; ?>"></b></td>
        		</tr>

        		<tr>
        			<td>Kondisi Barang</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b>
        			    <?php
	      			if ($kondisi == "1")
	      			{
	      				echo "<span class='label label-success'>Baru</span>";
	      			}

	      			else
	      			{
	      				echo "<span class='label label-default'>Bekas</span>";
	      			}?></b></td>
        		</tr>

        		<tr>
        			<td>Jumlah Pesanan</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $jumlah; ?> Barang</b></td>
        		</tr>        		
        	</table>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><b>Jumlah Biaya</b></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        	<table>
	        	<tr>
	        		<td>Biaya Barang</td>
	        		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
	        		<td>&nbsp;&nbsp;<b>Rp. <?= number_format($biaya,"0",",","."); ?> (<?= $jumlah; ?> Barang)</b></td>
	        	</tr>

	        	<tr>
	        		<td>Biaya Pengiriman</td>
	        		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
	        		<td>&nbsp;&nbsp;<b>Rp. <?= number_format($ongkir,"0",",","."); ?></b></td>
	        	</tr>	

	        	<tr>
	        		<td><hr noshade width="800%"></td>
	        	</tr>

	        	<tr>
	        		<td>Total Biaya</td>
	        		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
	        		<td>&nbsp;&nbsp;<b>Rp. <?= number_format($total,"0",",","."); ?></b></td>
	        	</tr>
        	</table>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><b>Detail Alamat Pembeli</b></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">        	
        <table>
        		<tr>
        			<td>Nama Pembeli</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $pembeli; ?></b></td>
        		</tr>

        		<tr>
        			<td>Alamat Pembeli</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $alamat; ?></b></td>
        		</tr>

        		<tr>
        			<td>Kecamatan</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $kecamatan; ?></b></td>
        		</tr>   

        		<tr>
        			<td>Kota / Kabupaten</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $kota; ?></b></td>
        		</tr>  

        		<tr>
        			<td>Provinsi</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $provinsi; ?></b></td>
        		</tr> 

        		<tr>
        			<td>No. HP</td>
        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
        			<td>&nbsp;&nbsp;<b><?= $hp; ?></b></td>
        		</tr> 
        </table>
        </div>
      </div>
    </div>
  </div>
  <center>
  <?php
  if ($file == "shop")
  	$url = "shop.php?id=$id&act=process&tagihan=true&payment=true";
  elseif ($file == "market")
  	$url = "market.php?inv=$id&send=true";
  	?>
  		<a href="<?= $url; ?>">
  			<button class="btn btn-primary">
  			<b><img src="../icon/bayar.svg" style="width: 28px; height: 28px;">&nbsp;&nbsp;Proses Pesanan</b></button>
  		</a>
  </center><?php
	}

	function editbarang($nama, $stok, $harga, $deskripsi, $berat, $kategori)
	{
		?><form method="post" role="form" class="form-horizontal" style="width: 95%;" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Nama Barang</label>
		<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="nama" value="<?= $nama; ?>" required>
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Foto Barang</label>
		<div class="col-sm-10 col-md-8">
				<input type="file" name="foto" class="btn btn-link" required>
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Stok Barang</label>
		<div class="col-sm-10 col-md-8">
				<input type="number" class="form-control" min="0" value="<?= $stok; ?>" name="stok" required>
		</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Harga</label>
		<div class="col-sm-10 col-md-8">
				<input type="number" min="0" value="<?= $harga; ?>" class="form-control" name="harga" required>
		</div>
	</div>

	<div class="form-group">
		<label for="kontenberbayar" class="col-sm-2 control-label">Bekas atau Baru</label>
				<div class="col-sm-10 col-md-10">
					<label class="switch">
					  <input type="checkbox" name="kondisi" value="1">
					  <div class="slider round"></div>
					</label>
				</div>
	</div>

	<div class="form-group">
	<label for="nama" class="col-sm-2 control-label">Deskripsi Produk</label>
		<div class="col-sm-10 col-md-8">
				<textarea required class="col-md-10 col-sm-10 form-control" name="deskripsi" style="overflow-y: scroll; max-width: 100%; max-height: 400px; min-height: 400px;"><?= $deskripsi; ?></textarea>
		</div>
	</div>

	<div class="form-group">
	<label for="berat" class="col-sm-2 control-label">Berat (Gram)</label>
		<div class="col-sm-10 col-md-8">
				<input type="number" min="0" value="<?= $berat; ?>" class="form-control" name="berat" required>
		</div>
	</div>

	<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Kategori</label>
				<div class="col-sm-10 col-md-8">
					<select name="kategori" class="btn-link" required>
						<option value="">Pilih Kategori</option>
						<option value="Internet" <?php 
							if ($kategori == "Internet") 
							{ 
								echo "selected"; 
							} ?>>Internet
						</option>
						
						<option value="Komputer Umum"
						<?php 
							if ($kategori == "Komputer Umum") 
							{ 
								echo "selected"; 
							} ?>>Komputer Umum
						</option>
						
						<option value="Pemrograman" 
						<?php 
							if ($kategori == "Pemrograman") 
							{ 
								echo "selected"; 
							} ?>>Pemrograman
						</option>
					</select>
				</div>
		</div>

	<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="editbarang" class='btn btn-primary'><img src='../icon/pencil.svg' style='width: auto; height: 30px;'>&nbsp;Edit Barang</button>&nbsp;
			</div>
		</div><?php
	}

	function edittoko($nama, $alamat, $kota, $provinsi)
	{
	?><form method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?= htmlspecialchars(''); ?>">
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nama Toko</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="nama" value="<?= $nama; ?>" required>
			</div>
		</div>

		<div class="form-group">
			<label for=alamat" class="col-sm-2 control-label">Alamat Toko</label>
			<div class="col-sm-10 col-md-8">
				<input type="text" class="form-control" name="alamat" value="<?= $alamat; ?>" required>
			</div>
		</div>

		<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Kabupaten/Kota</label>
				<div class="col-sm-10 col-md-8">
					<input type="text" class="form-control" name="kota" value="<?= $kota; ?>" required>
				</div>
		</div>

		<div class="form-group">
			<label for="kategorikonten" class="col-sm-2 control-label">Provinsi</label>
				<div class="col-sm-10 col-md-8">
					<input type="text" class="form-control" name="provinsi" value="<?= $provinsi; ?>" required>
				</div>
		</div>		

		<div class="form-group">
			<label for="gambar" id="gambarlabel" class="col-sm-2 control-label">Gambar Toko</label>
			<div class="col-sm-10 col-md-10">
				<input type="file" name="foto" class="btn-link" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-md-10" style="float: right;">
				<button type="submit" name="edittoko" class='btn btn-success'><img src='../icon/send.svg' style='width: auto; height: 30px;'>&nbsp;Edit Toko</button>&nbsp;
			</div>
		</div>
	</form><?php
	}

function kurirtable()
{
	?><table class="table table-striped">
									<tr>
										<td class="col-md-1"><input required type="radio" name="jasaongkir" value="JNE"></td>
										<td class="col-md-1"><img src="../img/jne.png" style="width: 60px; margin-top: -15px;"></td>
										<td>JNE</td>
										<td class="col-md-2"><b>Rp 24.000</b></td>
									</tr>

									<tr>
										<td class="col-md-1"><input type="radio" name="jasaongkir" value="TIKI"></td>
										<td class="col-md-1"><img src="../img/tiki.jpg" style="width: 60px;"></td>
										<td>TIKI</td>
										<td class="col-md-2"><b>Rp. 20.000</b></td>
									</tr>

									<tr>
										<td class="col-md-1"><input type="radio" name="jasaongkir" value="Pos Indonesia"></td>
										<td class="col-md-1"><img src="../img/pos.png" style="width: 60px;"></td>
										<td>Pos Indonesia</td>
										<td class="col-md-2"><b>Rp. 17.500</b></td>
									</tr>								
								</table><?php
}

	function descpenjual($berat, $kategori, $kondisi, $deskripsi)
	{
		?><ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Detail Barang</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Informasi Barang</h3>
      <table>
      	<tr>
      		<td>Berat</td>
      		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      		<td>:</td>
      		<td>&nbsp;&nbsp;</td>      		
      		<td><b><?= $berat; ?></b> gram</td>
      	</tr>

      	<tr>
      		<td>Kategori Barang</td>
      		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>      		
      		<td>:</td>
      		<td>&nbsp;&nbsp;</td>
      		<td><b><?= $kategori; ?></b></td>
      	</tr>

      	<tr>
      		<td>Kondisi</td>
      		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>      		
      		<td>:</td>
      		<td>&nbsp;&nbsp;</td>
      		<td><b>
      			<?php
      			if ($kondisi == "1")
      			{
      				echo "<span class='label label-success'>Baru</span>";
      			}

      			else
      			{
      				echo "<span class='label label-default'>Bekas</span>";
      			}?>
      		</b></td>
      	</tr>

      	<tr>
      		<td>Deskripsi Barang</td>
      		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>      		
      		<td>:</td>
      		<td>&nbsp;&nbsp;</td>
      		<td><?= $deskripsi; ?></td>
      	</tr>
      </table>
    </div>
</div><?php		
	}

	function descpembeli($berat, $kategori, $kondisi, $deskripsi)
	{
		?>  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Detail Barang</a></li>
    <li><a data-toggle="tab" href="#menu1">Ulasan Barang</a></li>
    <li><a data-toggle="tab" href="#menu2">Biaya Pengiriman</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Informasi Barang</h3>
      <table>
      	<tr>
      		<td>Berat</td>
      		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      		<td>:</td>
      		<td>&nbsp;&nbsp;</td>      		
      		<td><b><?= $berat; ?></b> gram</td>
      	</tr>

      	<tr>
      		<td>Kategori Barang</td>
      		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>      		
      		<td>:</td>
      		<td>&nbsp;&nbsp;</td>
      		<td><b><?= $kategori; ?></b></td>
      	</tr>

      	<tr>
      		<td>Kondisi</td>
      		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>      		
      		<td>:</td>
      		<td>&nbsp;&nbsp;</td>
      		<td><b>
      			<?php
      			if ($kondisi == "1")
      			{
      				echo "<span class='label label-success'>Baru</span>";
      			}

      			else
      			{
      				echo "<span class='label label-default'>Bekas</span>";
      			}?>
      		</b></td>
      	</tr>

      	<tr>
      		<td>Deskripsi Barang</td>
      		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>      		
      		<td>:</td>
      		<td>&nbsp;&nbsp;</td>
      		<td><?= $deskripsi; ?></td>
      	</tr>
      </table>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Ulasan</h3>
		<p>Belum Anda Ulasan Tentang Produk Ini</p>
		<br>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Biaya Pengiriman</h3>
      <?php $this->kurirtable(); ?>
    </div>
  </div>
</div><?php
	}
}

?><script>
	      tinymce.init({
    	selector: '#tinymce',
    	plugins: ['advlist autolink lists link image print preview anchor', 'searchreplace visualblocks code fulscreen', 'insertdatetime media table contextmenu paste'],
    	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image print preview media | forecolor backcolor emoticons"
  });
</script>

<script>
	$('#isi').wysihtml5();

	$('#isi').wysihtml5({
    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": false, //Button which allows you to edit the generated HTML. Default false
    "link": true, //Button to insert a link. Default true
    "image": true, //Button to insert an image. Default true,
    "color": false //Button to change color of font  
});
</script>