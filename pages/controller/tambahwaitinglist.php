<?php
  include('../../config.php');
  session_start();
  $menu     = str_replace(' ','',strtolower($_SESSION['menu']));
  $id       = $_GET['id']; //bed asal
  
  $sql		  = mysqli_query($connect, "SELECT mst_bed.namabed, mst_ruangan.namaruangan, mst_bed.ruangan FROM mst_bed
                                      INNER JOIN mst_ruangan ON mst_bed.ruangan = mst_ruangan.ruangan_id
                                      WHERE mst_bed.id = '$id'");
	$data		  = mysqli_fetch_array($sql);
  
  $trx_id   = $_GET['trx_id'];
  $bed_id   = $_POST['bedtujuan']; //bed tujuan
  $namabed  = $data['namabed'];
  
  
  $sql		  = mysqli_query($connect, "SELECT mst_bed.namabed, mst_ruangan.namaruangan FROM mst_bed
                                      INNER JOIN mst_ruangan ON mst_bed.ruangan = mst_ruangan.ruangan_id
                                      WHERE id = '$bed_id'");
	$data		  = mysqli_fetch_array($sql);
  
  $bedtujuan= $data['namabed'];
  $ruangan  = $data['namaruangan'];


  // echo($id.' '.$trx_id.' '.$bed_id.' '.$namabed.' '.$bedtujuan.' '.$ruangan);



  $query    = mysqli_query($connect,"INSERT INTO trx_waitinglist VALUES ( default,
                                                                      '$trx_id',
                                                                      '$bed_id',
                                                                      '$bedtujuan',
                                                                      '$ruangan',
                                                                      1)");
  if($query){
    header('location:../'.$menu.'/index.php?message=suksestambahwaitinglist');
  }
?>