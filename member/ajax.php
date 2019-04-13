<?php

include "../lib/lib.php";

$oop = new oop("ajax.php");
session_start();
$konek = mysqli_connect("localhost","root","","kususon");

$act = isset($_POST['act']) ? $_POST['act'] : "";

		if ($act == "showcomment")
		{	
			$id = $_POST['id'];
			$showcomment = mysqli_query($konek, "select *from komentar, konten where komentar.idkonten = konten.id and konten.id = '".$id."' order by komentar.id desc");

			while ($comm = mysqli_fetch_array($showcomment))
			{
				echo "<div style='width: 90%;'><b><a href='$comm[website]' rel='nofollow'>";
					echo $comm['nama'];
				echo "</a></b><br>";

				echo "<b><h6>";
					echo $comm['tanggal'];
				echo "</h6></b>";

					echo $comm['komentar'];
				echo "<br><br><hr noshade style='width: 40%; height: 3px; background-color: #3498ff;'></div>";
			}
		}

		elseif ($act == "addcomment")
		{
			$id = $_POST['id'];
			$nama = $oop->amandata($_POST['nama']);
			$email = $oop->amandata($_POST['email']);
			$website = $oop->amandata($_POST['website']);
			$komentar = $oop->amandata($_POST['komentar']);
			$tanggal = date("d M Y");
			$insertcomment = mysqli_query($konek, "insert into komentar (nama, email, website, komentar, tanggal, idkonten) values('$nama','$email','$website','$komentar','$tanggal', '$id')");
		}
?>