<?php
    include('../../config.php');
    session_start();
    $id     = $_GET['id'];
    $trx_id     = $_GET['trx_id'];
    $menu = str_replace(' ','',strtolower($_SESSION['menu']));
    if(isset($_GET['status'])){
        $statusasal = $_GET['status'];
    }
    // echo($rm);

    $query  = mysqli_query($connect,"SELECT jeniskelamin FROM trx_pasien WHERE trx_id='".$trx_id."'");
    $data   = mysqli_fetch_array($query);

    if($data['jeniskelamin']=='0'){
        $jk = '7';
    }else if($data['jeniskelamin']=='1'){
        $jk = '8';
    }

    $query  = mysqli_query($connect,"UPDATE mst_bed SET bedstatus='$jk' WHERE id='$id'");
    if ($query) {
        if($statusasal=='batalrencanapulang'){
            $query  = mysqli_query($connect,"UPDATE trx_rencanapulang SET status=2 WHERE trx_id='$trx_id'");
            if ($query) {
                header('location:../'.$menu.'/index.php?message=backtoterisi');
            }
        }else{
            header('location:../'.$menu.'/index.php?message=backtoterisi');
        }
    }
?>