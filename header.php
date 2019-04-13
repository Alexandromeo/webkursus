<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="lib/lib.css">
<link rel="stylesheet" href="lib/bootstrap/bootstrap.css">
  <script src="lib/bootstrap/jquery.min.js"></script>
  <script src="lib/bootstrap/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta description="Kursus Pemrograman No.1 di Indonesia" keyword="belajar pemrograman, kursus pemrograman, pemrograman website, belajar membuat website, kursus online pemrograman, programmer, php, mysql, mysqli, html, css, javascript, bahasa pemrograman">

<?php
	  require "config.php"; 
	  include "lib/lib.php";
	  error_reporting(0);

  $page = $_REQUEST['page'];
  $active = 'class="active"'; 

?>
<nav class="navbar navbar-inverse" style="background-color: #469aff; border-top-color: #e4e4e4; border-left-color: white; border-right-color: white; border-radius: 0; color: white;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php?page=home"><img style="width: 22px; height: 22px; border-radius: 50%;" src="img/kususon.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" id="data">
        <li <?php if ($page == "home") {echo $active;} ?>><a style="color: white;" href="index.php?page=home"><b>Beranda</b></a></li>
        <li <?php if ($page == "confirm") {echo $active;} ?>><a style="color: white;" href="confirm.php?page=confirm"><b>Konfirmasi Pembayaran</b></a></li>
        <li <?php if ($page == "join") {echo $active;} ?>><a style="color: white;" href="join.php?page=join&utm=menu"><b>Paket Member</b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php?account=free" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="register.php?account=free" style="color: white;"> Register</a></li>
      </ul>
    </div>
  </div>
</nav>