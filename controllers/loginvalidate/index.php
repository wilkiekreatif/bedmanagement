<?php
	include('../../config.php');
// 	include('../../assets/vendor/wilkiecreative/config.php');

	session_start();

	//tangkap data dari form login
	$user = $_POST['username'];
	$pass = $_POST['password'];

	//untuk mencegah sql injection
	//kita gunakan mysql_real_escape_string
	//$username = mysqli_real_escape_string($user);
	//$password = mysqli_real_escape_string($pass);

	//cek data yang dikirim, apakah kosong atau tidak
	if (empty($user) && empty($pass)) {
		//kalau username dan password kosong
		header('location:index.php?error=1');
		//break;
	} else if (empty($user)) {
		//kalau username saja yang kosong
		header('location:index.php?error=2');
		//break;
	} else if (empty($pass)) {
		//kalau password saja yang kosong
		header('location:index.php?error=3');
		//break;
	}
	$q = mysqli_query($connect, "SELECT * FROM mst_user WHERE username='$user' AND password ='".md5($pass)."'");
	$data = mysqli_fetch_array($q);

	if (mysqli_num_rows($q) == 1) {
// 		$suser 	= $data['username'];
// 		$snama 	= $data['nama'];
// 		$level 	= $data['level'];
// 		$unit		= $data['unit'];
		//kalau username dan password sudah terdaftar di database
		//buat session dengan nama username dengan isi nama user yang login
		$_SESSION['username'] = $data['username'];
		$_SESSION['nama'] 		= $data['nama'];
		$_SESSION['level'] 		= $data['level'];
		$_SESSION['unit']			= $data['unit'];
		//redirect ke halaman index
		header('location:../../pages/');
	} else {
		//kalau username ataupun password tidak terdaftar di database
		header('location:../../index.php?error=4');
	}
?>