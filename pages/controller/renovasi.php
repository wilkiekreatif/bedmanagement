<?php
  include('../../config.php');
  session_start();
  $id   = $_GET['id'];
  $menu = str_replace(' ','',strtolower($_SESSION['menu']));

  $query = mysqli_query($connect,"UPDATE mst_bed SET trx_id=NULL, bedstatus=3 WHERE id='$id'");
  if ($query) {
		header('location:../'.$menu.'/index.php?message=renovasi');
  }
?>