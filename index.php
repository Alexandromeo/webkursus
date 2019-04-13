<?php require "header.php";?>

<!DOCTYPE html>
<html>
<head>
<title>Kususon - Kursus Pemrograman Online no. 1 di Indonesia</title>
</head>
<?php 
if ($_GET['p'] == "404")
{
	require "error404.php";
}

else
{
	home();
}?>
</html>
<?php footer(); ?>