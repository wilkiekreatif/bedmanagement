<?php
    session_start();
    include('../../config.php');
    require('../controller/accountcontrol.php');
    $_SESSION['menu']='KALM LUR CAN BERES';
    // Penentuan Kamar
    // $q = mysqli_query($connect,"SELECT * FROM  mst_ruangan WHERE namaruangan='".$_SESSION['menu']."'");
    // $data = mysqli_fetch_array($q);
    // $ruangan = $data['ruangan_id'];
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
        <!-- DataTables CSS -->
        <link href="../../assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="../../assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../../assets/dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="../../assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="../../assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                            <h1 class="page-header">
                                <b>
                                    <?php   
                                        echo($_SESSION['menu'].' | '.$app_name.' '.$version);
                                        if(($_SESSION['level']==='0') OR ($_SESSION['level']==='1')){
                                    ?>
                                            <!-- <a href="#tambah_formulir" class="btn btn-sm btn-success pull-right" data-toggle="modal"><i class="fa fa-bed"> </i> ISI BED KOSONG</a> </h1> -->
                                    <?php
                                        }
                                    ?>
                                </b>
                            </h1>
                        </div>
                        <div class="row">
                            
                        </div>
                            
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php
            include('../component/backtotop.php');
        ?>
        <script>
            $(document).ready(function() {
                $('#dataTables-waitinglist').DataTable({
                    responsive: true
                });
            });
        </script>
        <!-- jQuery -->
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../assets/vendor/metisMenu/metisMenu.min.js"></script>
        <script src="../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../../assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../../assets/dist/js/sb-admin-2.js"></script>
        <!-- DataTables JavaScript -->
        <script src="../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../../assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="../../assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
    </body>
</html>