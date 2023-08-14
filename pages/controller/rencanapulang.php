<?php
  include('../../config.php');
  session_start();
  $id     = $_GET['id'];
  $trx_id = $_GET['trx_id'];
  $menu = str_replace(' ','',strtolower($_SESSION['menu']));

  $query = mysqli_query($connect,"UPDATE mst_bed SET bedstatus=1 WHERE trx_id='$trx_id'");
  if ($query) {
    $query = mysqli_query($connect,"INSERT INTO trx_rencanapulang VALUES (default,
                                                                          '$trx_id',
                                                                          '$id',
                                                                          now(),
                                                                          NULL,
                                                                          1)");
    if ($query) {
        // echo('sukses');
      header('location:../'.$menu.'/index.php?message=rencanapulang');
    }
  }
?>