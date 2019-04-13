<?php

require "../config.php";
session_start();
error_reporting(0);

if ($_SESSION['passwordpaid'])
{
	$offline = mysqli_query($konek, "update memberbayar set online = '0' where email = '".$_SESSION['email']."'");
}

else
{
	$offline = mysqli_query($konek, "update membergratis set online = '0' where email = '".$_SESSION['email']."'");
}

session_destroy();
echo "<meta content='0; url=../index.php' http-equiv='refresh'>";
?>