<?php
  include('../../config.php');
  session_start();
  $trx_id = $_GET['trx_id'];
  $menu = str_replace(' ','',strtolower($_SESSION['menu']));

  $query = mysqli_query($connect,"UPDATE trx_waitinglist SET status=2 WHERE trx_id='$trx_id'");
  if ($query) {
      header('location:../'.$menu.'/index.php?message=pasiencanceled');
    }
?>