<?php
    session_start();
    require('../controller/accountcontrol.php');
    $_SESSION['menu']='DASHBOARD';
    include('../../config.php');
    $bulanini = date("F Y");
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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

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
                            <h1 class="page-header"><?php echo($_SESSION['menu'].' | '.$app_name.' '.$version); ?></h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <?php
                                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_bed WHERE trx_id IS NOT NULL");
                                                        $data = mysqli_fetch_array($q);
                                                        echo($data['total']);
                                                    ?>
                                                </div>
                                                <div>Jumlah Pasien</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#jmlpasien">
                                        <div class="panel-footer">
                                            <span class="pull-left">Lihat Detail</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel rencanapulang">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <?php
                                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_bed WHERE bedstatus=1");
                                                        $data = mysqli_fetch_array($q);
                                                        echo($data['total']);
                                                    ?>
                                                </div>
                                                <div>Rencana Pulang</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#rencanapulang">
                                        <div class="panel-footer">
                                            <span class="pull-left">Lihat Detail</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel booking">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <?php
                                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_bed WHERE bedstatus=6");
                                                        $data = mysqli_fetch_array($q);
                                                        echo($data['total']);
                                                    ?>
                                                </div>
                                                <div>Booking</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#booking">
                                        <div class="panel-footer">
                                            <span class="pull-left">Lihat Detail</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel waitinglist">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <?php
                                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM trx_waitinglist WHERE status=1");
                                                        $data = mysqli_fetch_array($q);
                                                        echo($data['total']);
                                                    ?>
                                                </div>
                                                <div>Waiting List</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#waitinglist">
                                        <div class="panel-footer">
                                            <span class="pull-left">Lihat Detail</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    </div>
                    
                    <div class="row">
                        <!-- /.col-lg-12 -->
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="tooltip" data-placement="top" title="Waktu dihitung dari pemulangan/pemindahan pasien sampai dengan selesai cleaning">
                                    <i class="fa fa-file-text"></i></i> CLEANING TIME REPORT | <?php echo($bulanini) ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <b>Average Time  :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT SEC_TO_TIME(AVG(selisih)) AS rataratawaktu
                                                                                 FROM respontimecleaning_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br>");
                                    ?>
                                    <b>Shortest Time :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT MIN(selisih) AS rataratawaktu
                                                                                 FROM respontimecleaning_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br>");
                                    ?>
                                    <b>Longest Time  :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT MAX(selisih) AS rataratawaktu
                                                                                 FROM respontimecleaning_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br><hr>");
                                    ?>
                                    <!-- TABEL CLEANING TIME REPORT -->
                                    <table id="cleaningtime" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NAMA BED</th>
                                                <th>WAKTU CLEANING</th>
                                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //membuat query membaca record dari tabel User      
                                                $query="SELECT  * FROM respontimecleaning_v";
                                                //menjalankan query
                                                if (mysqli_query($connect,$query)) {
                                                    $result=mysqli_query($connect,$query);
                                                } else die ("Error menjalankan query");
                                                    //mengecek record kosong
                                                    if (mysqli_num_rows($result) > 0) {
                                                        $no='1';
                                                        //menampilkan hasil query      
                                                        while($row = mysqli_fetch_array($result)) {      
                                                            echo "<tr>";
                                                            echo "	<td><i>".$row["namaruangan"]."</i> <b>".$row["namabed"]."</b></td>";
                                                            echo "	<td><b>Waktu Cleaning: </b>".$row["selisih"]."";
                                                            echo "	<br><b>Jam Mulai: </b>".$row["tgl_input"]."";
                                                            echo "	<br><b>Jam Selesai: </b>".$row["tgl_update"]."</td>";
                                                            echo "</tr>";
                                                            $no++;
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="tooltip" data-placement="top" title="Waktu dihitung dari status pasien Rencana pulang sampai pasien dipulangkan. pembatalan rencana pulang tidak termasuk ke data tersebut.">
                                    <i class="fa fa-user fa-fw"></i>PATIENT DISCHARGE | <?php echo($bulanini) ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <b>Average Time :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT SEC_TO_TIME(AVG(selisih)) AS rataratawaktu
                                                                                 FROM respontimepasienpulang_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br>");
                                    ?>
                                    <b>Shortest Time :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT MIN(selisih) AS rataratawaktu
                                                                                 FROM respontimepasienpulang_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br>");
                                    ?>
                                    <b>Longest Time :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT MAX(selisih) AS rataratawaktu
                                                                                 FROM respontimepasienpulang_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br><hr>");
                                    ?>
                                    <!-- TABEL CLEANING TIME REPORT -->
                                    <table id="rencanapulang" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>DATA PASIEN</th>
                                                <th>PEMULANGAN PASIEN</th>
                                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //membuat query membaca record dari tabel User      
                                                $query="SELECT  * FROM respontimepasienpulang_v";
                                                //menjalankan query      
                                                if (mysqli_query($connect,$query)) {      
                                                    $result=mysqli_query($connect,$query);     
                                                } else die ("Error menjalankan query");
                                                //mengecek record kosong     
                                                if (mysqli_num_rows($result) > 0) {
                                                    $no='1';
                                                    //menampilkan hasil query
                                                    while($row = mysqli_fetch_array($result)) {
                                                        echo "<tr>";
                                                        echo "	<td><b>".$row["namapasien"]." - "
                                                                        .$row["pasien_id"]." </b><hr> <i>"
                                                                        .$row["namaruangan"]."</i> <b>".$row["namabed"]."</b></td>";      
                                                        echo "	<td> <b>Waktu Pemulangan: </b> ".$row["selisih"]."<br>";
                                                        echo "	     <b>Jam Mulai: </b>".$row["tgl_input"]."<br> ";
                                                        echo "	     <b>Pasien Pulang: </b>".$row["tgl_update"]."</td>";
                                                        echo "</tr>";   
                                                        $no++;
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="tooltip" data-placement="top" title="Waktu dihitung dari status pasien Rencana pulang sampai pasien dipulangkan. pembatalan rencana pulang tidak termasuk ke data tersebut.">
                                    <i class="fa fa-user fa-fw"></i>BED RENOVATION TIME | <?php echo($bulanini) ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <b>Average Time :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT AVG(selisih) AS rataratawaktu
                                                                                 FROM respontimerenovasi_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br>");
                                    ?>
                                    <b>Shortest Time :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT MIN(selisih) AS rataratawaktu
                                                                                 FROM respontimerenovasi_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br>");
                                    ?>
                                    <b>Longest Time :</b> <?php
                                        $queryaverage   = mysqli_query($connect,"SELECT MAX(selisih) AS rataratawaktu
                                                                                 FROM respontimerenovasi_v");
                                        $data           = mysqli_fetch_array($queryaverage);
                                        echo($data['rataratawaktu']."<br><hr>");
                                    ?>
                                    <!-- TABEL CLEANING TIME REPORT -->
                                    <table id="renovasibed" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NAMA BED</th>
                                                <th>WAKTU PENGERJAAN</th>
                                                <th>WAKTU MULAI</th>
                                                <th>WAKTU SELESAI</th>
                                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //membuat query membaca record dari tabel User      
                                                $query="SELECT  * FROM respontimerenovasi_v";
                                                //menjalankan query      
                                                if (mysqli_query($connect,$query)) {      
                                                    $result=mysqli_query($connect,$query);     
                                                } else die ("Error menjalankan query");
                                                    //mengecek record kosong     
                                                    if (mysqli_num_rows($result) > 0) {
                                                        $no='1';
                                                        //menampilkan hasil query
                                                        while($row = mysqli_fetch_array($result)) {
                                                            echo "<tr>";
                                                            echo "	<td>".$row["bed_id"]."</td>";      
                                                            echo "	<td>".$row["selisih"]."</td>";
                                                            echo "	<td>".$row["tgl_input"]."</td>";
                                                            echo "	<td>".$row["tgl_update"]."</td>";
                                                            echo "</tr>";   
                                                            $no++;
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-user fa-fw"></i> PASIEN RENCANA PULANG
                                </div>
                                <div class="panel-body">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-user fa-fw"></i> PASIEN WAITING LIST
                                </div>
                                <div class="panel-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php
            include('../component/backtotop.php');
            // include('../modal/tambahunitbaru.php');
        ?>

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

        <script>
            $(document).ready(function() {
                $('#cleaningtime').DataTable();
            });
            $(document).ready(function() {
                $('#rencanapulang').DataTable();
            });
            $(document).ready(function() {
                $('#renovasibed').DataTable();
            });
            $('#cleaningtime').DataTable({
                paging: true,       // Aktifkan penomoran halaman
                searching: true     // Aktifkan fitur pencarian
            });
            $('#rencanapulang').DataTable({
                paging: true,       // Aktifkan penomoran halaman
                searching: true     // Aktifkan fitur pencarian
            });
            $('#renovasibed').DataTable({
                paging: true,       // Aktifkan penomoran halaman
                searching: true     // Aktifkan fitur pencarian
            });
        </script>

    </body>

</html>