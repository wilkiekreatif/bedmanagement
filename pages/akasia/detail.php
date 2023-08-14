<?php
    session_start();
    require('../controller/accountcontrol.php');
    // $ruangan = 1;
    if(isset($_GET['trx_id'])){
        $trx_id      = $_GET['trx_id'];
    }
    $ruangan = $_SESSION['menu'];
    include('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo($_SESSION['menu'].' | '.$app_name.' '.$version);?></title>

        <!-- Bootstrap Core CSS -->
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- BED MANAGEMENT CSS COLOR -->
        <link href="../../assets/wildanauliana/color.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../../assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../../assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body id="page-top">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <?php
                    include('../component/header.php');
                ?>
                <!-- /.navbar-header -->
                <?php
                    include('../component/topmenu.php');
                ?>

                <!-- /.navbar-top-links -->

                <?php
                    include('../component/sidemenu.php');
                ?>
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><b>UPDATE BED <?php
                                                                        $id = $_GET['id'];
                                                                        $q = mysqli_query($connect,"SELECT * FROM mst_bed WHERE id=".$id);
                                                                        $data = mysqli_fetch_array($q);
                                                                        echo($data['namabed']);
                                                                    ?></b></h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="row">
                                    <?php
                                        // JIKA BED KOSONG
                                        if(($data['trx_id'] == NULL)) {
                                            if($data['bedstatus']== 0){
                                    ?>
                                                        <a class="btn btn-danger btn-sm btn-block" href="../controller/renovasi.php?id=<?php echo($id)?>" role="button"><i class="fa fa-bed"> </i> RENOVASI</a>
                                                        <a class="btn btn-warning btn-sm btn-block" href="../controller/booking.php?id=<?php echo($id)?>" role="button">BOOKING</a>
                                                        <?php
                                            }else if($data['bedstatus']==3){
                                                ?>
                                                <a class="btn btn-primary btn-sm btn-block" href="../controller/readytouse.php?id=<?php echo($id)?>&statusasal=renovasi" role="button"><i class="fa fa-bed"> </i> SELESAI RENOVASI</a>
                                                <?php                
                                            }else if($data['bedstatus'] == 2){
                                                ?>
                                                <a class="btn btn-warning btn-sm btn-block" href="../controller/readytouse.php?id=<?php echo($id)?>&statusasal=cleaning" role="button"><i class="fa fa-bed"> </i> SELESAI CLEANING</a>
                                                <?php
                                            }else if($data['bedstatus'] == 6){
                                                ?>
                                                <a class="btn btn-warning btn-sm btn-block" href="../controller/readytouse.php?id=<?php echo($id)?>" role="button"><i class="fa fa-bed"> </i> BATAL BOOKING</a>
                                    <?php
                                            }
                                        // JIKA BED TERISI
                                        }else if(($data['bedstatus'] == 7)||($data['bedstatus'] == 8)){
                                    ?>
                                            <a class="btn btn-primary btn-sm btn-block" href="../controller/rencanapulang.php?id=<?php echo($id)?>&trx_id=<?php echo($trx_id)?>" role="button"><i class="fa fa-bed"> </i> RENCANA PULANG</a>
                                            <a class="btn btn-default btn-sm btn-block" href="pindahpasien.php?id=<?php echo($id) ?>&trx_id=<?php echo($trx_id)?>" role="button"><i class="fa fa-bed"> </i> PINDAHKAN PASIEN</a>
                                            <a class="btn btn-warning btn-sm btn-block" href="../controller/booking.php?id=<?php echo($id)?>" role="button"><i class="fa fa-bed"> </i> BOOKING</a>
                                    <?php
                                        // JIKA BED STATUS RENCANA PULANG
                                        }else if($data['bedstatus'] == 1){
                                    ?>
                                            <a class="btn btn-warning btn-sm btn-block" href="../controller/backtoterisi.php?id=<?php echo($id)?>&trx_id=<?php echo($trx_id)?>" role="button"><i class="fa fa-bed"> </i> BATAL RENCANA PULANG</a>
                                            <a class="btn btn-primary btn-sm btn-block" href="../controller/pulangkanpasien.php?id=<?php echo($id)?>&trx_id=<?php echo($trx_id)?>" onclick="return  confirm('Pasien tidak bisa dikembalikan jika telah dipulangkan. Apakah anda yakin akan memulangkan pasien tersebut? ')" role="button"><i class="fa fa-bed"> </i> PULANGKAN PASIEN</a>
                                    <?php
                                        // JIKA BED STATUS BOOKING
                                        }else if($data['bedstatus'] == 6){
                                    ?>
                                            <a class="btn btn-warning btn-sm btn-block" href="../controller/backtoterisi.php?id=<?php echo($id)?>&trx_id=<?php echo($trx_id)?>" role="button"><i class="fa fa-bed"> </i> BATAL BOOKING</a>
                                            <a class="btn rencanapulang btn-sm btn-block" href="../controller/rencanapulang.php?id=<?php echo($id)?>" role="button"><i class="fa fa-bed"> </i> RENCANA PULANG</a>
                                            <?php
                                        }
                                        if(($_SESSION['level']==='0') OR ($_SESSION['level']==='1')){
                                    ?>
                                        <a href="../<?php echo(strtolower($_SESSION['menu'])) ?>" class="btn btn-success btn-sm btn-block" data-toggle="modal"><i class="fa fa-arrow-left"> </i> KEMBALI</a> </h1>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <!-- KOLOM FORM DIBAWAH JUDUL -->
                                <?php
                                    if($data['trx_id'] == null){
                                        include('../component/forminputpasien.php');
                                    }else{
                                        include('../component/formeditpasien.php');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../assets/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../assets/dist/js/sb-admin-2.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../../assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="../../assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    </body>

</html>