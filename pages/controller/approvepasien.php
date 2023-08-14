<?php
  include('../../config.php');
  session_start();
  $trx_id = $_GET['trx_id'];
  $menu = str_replace(' ','',strtolower($_SESSION['menu']));

  $sql		  = mysqli_query($connect, "SELECT mst_bed.id AS bedidasal, trx_waitinglist.bed_id AS bedidtujuan, trx_pasien.jeniskelamin
                                      FROM ((mst_bed 
                                      INNER JOIN trx_waitinglist ON trx_waitinglist.trx_id = mst_bed.trx_id)
                                      INNER JOIN trx_pasien ON trx_pasien.trx_id = mst_bed.trx_id)
                                      WHERE trx_waitinglist.status=1");
	$data		  = mysqli_fetch_array($sql);

  if($data['jeniskelamin']==0){
    $jk = 7;
  }else if($data['jeniskelamin']==1){
    $jk = 8;
  }

  $query = mysqli_query($connect,"UPDATE mst_bed SET trx_id=null, bedstatus=2 WHERE id=".$data['bedidasal']);
  if ($query) {
    $query = mysqli_query($connect,"UPDATE mst_bed SET trx_id='$trx_id', bedstatus='$jk' WHERE id=".$data['bedidtujuan']);
    if ($query) {
      $query = mysqli_query($connect,"UPDATE trx_waitinglist SET status=0 WHERE trx_id='$trx_id'");
      if ($query) {
        header('location:../'.$menu.'/index.php?message=pasienberhasildipindahkan');
      }else{
        header('location:../'.$menu.'/index.php?message=gagalmenonaktifkanwaitinglist');
      }
    }else{
        header('location:../'.$menu.'/index.php?message=gagalmengisibedbaru');
    }
  }else{
        header('location:../'.$menu.'/index.php?message=gagalkosongkanbedsebelumnya');
    }
?>