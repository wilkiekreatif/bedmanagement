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
                            <h1 class="page-header"><b>PINDAH PASIEN BED <?php
                                                                            $id = $_GET['id'];
                                                                            $q = mysqli_query($connect,"SELECT * FROM mst_bed WHERE id=".$id);
                                                                            $data = mysqli_fetch_array($q);
                                                                            echo($data['namabed']);
                                                                        ?></b></h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-list fa-fw"></i> <b>DATA PASIEN</b>
                                            </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <form action="../controller/tambahwaitinglist.php?id=<?php echo($id.'&trx_id='.$trx_id)?>" method="post">
                                            <!-- KOLOM FORM DIBAWAH JUDUL -->
                                            <?php
                                                $trx_id = $_GET['trx_id'];
                    
                                                $q = mysqli_query($connect,"SELECT * FROM trx_pasien WHERE trx_id=".$trx_id);
                                                                            $data = mysqli_fetch_array($q);
                                                                            // echo($data['namapasien']);
                                            ?>
                                            <div class="form-group has-feedback">
                                                <label for="norm">NO REKAM MEDIS</label>
                                                <input disabled type="text" name="norm" class="form-control" value="<?php echo($data['pasien_id']); ?>" placeholder="NO RM PASIEN..." maxlength="30">
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="nama">NAMA PASIEN</label>
                                                <input disabled type="text" name="nama" class="form-control" value="<?php echo($data['namapasien']); ?>" placeholder="NAMA PASIEN..." maxlength="30">
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-list fa-fw"></i> <b>BED TUJUAN</b>
                                            </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                                <div class="form-group has-feedback">
                                                    <label for="bedtujuan">BED TUJUAN <a style="color:red">*</a></label>
                                                    <select class="form-control" name="bedtujuan" id="bedtujuan">
                                                        <option selected>-</option>
                                                        <?php
                                                        $tampil = mysqli_query($connect,"SELECT * FROM mst_bed WHERE trx_id is null AND bedstatus=0 ORDER BY namabed ASC");
                                                        while ($q = mysqli_fetch_array($tampil)) {
                                                            echo "<option value='$q[id]'>$q[namabed] | <b>$q[kelas]</b></option>";
                                                        }?>
                                                    </select>
                                                </div>
                                                <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-primary">SIMPAN PERMINTAAN PINDAH PASIEN</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="row">
                                    <?php
                                        if(($_SESSION['level']==='0') OR ($_SESSION['level']==='1')){
                                    ?>
                                        <a href="../<?php echo(strtolower($_SESSION['menu'])) ?>" class="btn btn-success btn-sm btn-block" data-toggle="modal"><i class="fa fa-arrow-left"> </i> KEMBALI</a> </h1>
                                    <?php
                                        }
                                    ?>
                                </div>
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