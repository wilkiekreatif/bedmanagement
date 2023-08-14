<?php
  include('../../config.php');
  session_start();

  $sql		  = mysqli_query($connect,"SELECT COUNT(*) AS TOTAL FROM trx_pasien");
	$data		  = mysqli_fetch_array($sql);
	$total	  = $data['TOTAL'];
  $total++;
  $id       = date('dmY') . sprintf("%03s", $total);

  $ruangan  = str_replace(' ','',strtolower($_SESSION['menu']));
  $bed      = $_GET['bed'];
  // echo($bed);
  $norm     = $_POST['norm'];
  $nama     = $_POST['nama'];
  $jk       = $_POST['jk'];
  if($jk==0){
    $bedstatus=7;
  }else{
    $bedstatus=8;
  }

  $ttl      = $_POST['tgllahir'];
  $diagnosa = $_POST['diagnosa'];
  $dpjp1    = $_POST['dpjp1'];
  
  if(!empty($_POST['dpjp2'])){
    $dpjp2    = $_POST['dpjp2'];
  }
  if(!empty($_POST['dpjp3'])){
    $dpjp3    = $_POST['dpjp3'];
  }
  $penjamin = $_POST['penjamin'];
  $asalpoli = $_POST['asalpoli'];

  $query = mysqli_query($connect,"INSERT INTO trx_pasien VALUES ( '$id',
																																	'$norm',
                                                                  '$nama',
                                                                  '$jk',
                                                                  '$ttl',
                                                                  '$asalpoli',
                                                                  '$diagnosa',
                                                                  '$dpjp1',
                                                                  '$dpjp2',
                                                                  '$dpjp3',
                                                                  '$penjamin',
                                                                  Null,
                                                                  '0',
                                                                  now())");
	if ($query) {
		$log = mysqli_query($connect,"UPDATE mst_bed SET trx_id='$id', bedstatus='$bedstatus' WHERE namabed='$bed'");
		header('location:../'.$ruangan.'/index.php?message=done');
	}

?>