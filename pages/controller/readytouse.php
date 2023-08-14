<?php
  include('../../config.php');
  session_start();
  $id           = $_GET['id'];
  $statusasal   = $_GET['statusasal'];
  $menu = str_replace(' ','',strtolower($_SESSION['menu']));

  $query = mysqli_query($connect,"UPDATE mst_bed SET trx_id=NULL, bedstatus=0 WHERE id='$id'");
  if ($query) {
    // $q    = mysqli_query($connect,"SELECT * FROM mst_bed WHERE id='$id'");
    // $data = mysqli_fetch_array($q);
    // // echo($data['bedstatus']);

    // aktif jika status bed ready to clean
    if($statusasal=='cleaning'){
      $query = mysqli_query($connect,"UPDATE trx_cleaning SET status=0 WHERE bed_id='$id' AND status=1");
      if ($query) {
        header('location:../'.$menu.'/index.php?message=readytouse');
      }
    
      // aktif jika status bed renovasi
    }else{
    // else if($statusasal=='renovasi'){
      // $query = mysqli_query($connect,"UPDATE trx_renovasi SET status=0 WHERE bed_id='$id' AND status=1");
      // if ($query) {
        header('location:../'.$menu.'/index.php?message=readytouse');
      // }
    }
  }
?>