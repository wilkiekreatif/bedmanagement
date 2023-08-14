<?php
	//Config Database
	$host   = 'localhost';
	$user   = 'root';
	$pass   = '';
	$dbname = 'bedmanagement';
	
	//mengubung ke host
	$connect = mysqli_connect($host, $user, $pass, $dbname);

	//Deskripsi Apps
	$app_name = 'RSIH BED MANAGEMENT';
	$version	= '1.1';
	$company  = 'RS INTAN HUSADA';
?>