<?php
  include('../../config.php');
  session_start();
  $id       = $_GET['id'];
  $trx_id   = $_GET['trx_id'];
  $menu = str_replace(' ','',strtolower($_SESSION['menu']));

  $query = mysqli_query($connect,"UPDATE mst_bed SET  trx_id= null, bedstatus=2 WHERE id='$id'");
  if ($query) {
	$query = mysqli_query($connect,"UPDATE trx_pasien SET status=1 WHERE trx_id='$trx_id'");
    if ($query) {
      $q    = mysqli_query($connect,"SELECT * FROM mst_bed WHERE id='$id'");
      $data = mysqli_fetch_array($q);
      // echo($data['total']);

      // aktif jika status bed rencanapulang
      if($data['bedstatus']==2){
        $query = mysqli_query($connect,"UPDATE trx_rencanapulang SET status=0 WHERE trx_id='$trx_id' AND status=1");
        if ($query) {
          $query = mysqli_query($connect,"INSERT INTO trx_cleaning VALUES (default,
                                                                          '$id',
                                                                          now(),
                                                                          NULL,
                                                                          1)");
          if ($query) {
            header('location:../'.$menu.'/index.php?message=readytoclean');
          }
        }
      }
    }
  }
?>