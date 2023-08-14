<?php
    session_start();
    require('../controller/accountcontrol.php');
    include('../../config.php');
    $unit = $_GET['unit'];
    $_SESSION['menu']='DASHBOARD';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo($_SESSION['menu'].' | '.$app_name);?></title>

        <!-- Bootstrap Core CSS -->
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- DataTables CSS -->
        <link href="../../assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../../assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
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
                            <h1 class="page-header"><?php echo($_SESSION['menu'].' '.strtoupper($unit)); ?><a href="index.php?unit=<?php echo($unit);?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"></i> Kembali ke menu sebelumnya</a> </h1>
                        </div>

                        <div class="col-lg-12">
                            <?php 
                                if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                            ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Berhasil!</strong> DOKUMEN <?php echo($unit); ?> baru berhasil di input
                                    </div>
                            <?php
                                }else if (!empty($_GET['message']) && $_GET['message'] == 'updated') {
                            ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Berhasil!</strong> DOKUMEN <?php echo($unit); ?> berhasil di Update
                                    </div>
                            <?php
                                }
                            ?>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading"> DETAIL DOKUMEN
                                        <?php
                                            $id = $_GET['id'];
                                            if($unit=='skdirektur'){
                                                $tampil = mysqli_query($connect,"SELECT * FROM skdirektur WHERE id='$id'");
                                            }else if($unit=='spo'){
                                                $tampil = mysqli_query($connect,"SELECT * FROM spo WHERE id='$id'");
                                            }else if($unit=='pedoman'){
                                                $tampil = mysqli_query($connect,"SELECT * FROM pedoman WHERE id='$id'");
                                            }if($unit=='panduan'){
                                                $tampil = mysqli_query($connect,"SELECT * FROM panduan WHERE id='$id'");
                                            }if($unit=='formulir'){
                                                $tampil = mysqli_query($connect,"SELECT * FROM formulir WHERE id='$id'");
                                            }
                                            $w = mysqli_fetch_array($tampil);
                                            // echo('DETAIL '.$w['judul']);
                                        ?>
                                    </div>
                                    <div class="panel-body">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h4 class="mb-1">JUDUL DOKUMEN</h4>
                                                <!-- <small>3 days ago</small> -->
                                                </div>
                                                <h5 class="mb-1"><?php echo($w['judul']); ?></h5>
                                                <!-- <small>And some small print.</small> -->
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h4 class="mb-1">DESKRIPSI DOKUMEN</h4>
                                                <!-- <small>3 days ago</small> -->
                                                </div>
                                                <h5 class="mb-1"><?php echo($w['deskripsi']); ?></h5>
                                                <!-- <small>And some small print.</small> -->
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h4 class="mb-1">TANGGAL UPLOAD</h4>
                                                <!-- <small class="text-muted">3 days ago</small> -->
                                                </div>
                                                <h5 class="mb-1"><?php echo($w['tgl_upload']); ?></h5>
                                                <!-- <small class="text-muted">And some muted small print.</small> -->
                                            </a>
                                        </div>
                                        <!-- <a href="index.php?unit=<?php echo($unit);?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"></i> Update SPO</a> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        FILE VIEWER
                                    </div>
                                    <div class="panel-body">
                                        <a disabled href="../controller/deletefilespo.php?unit=<?php echo($unit);?>&files=<?php echo($w['files']);?>&id=<?php echo($id);?>" onclick="return  confirm('Apakah anda yakin ingin menghapus file ini?')" class="btn btn-sm btn-default"><i class="fa fa-trash"></i> HAPUS DOKUMEN</a>
                                        <a disabled href="index.php?unit=<?php echo($unit);?>" class="btn btn-sm btn-primary pull-right"><i class="fa fa-upload"></i> Upload Dokumen Baru</a>
                                        <br>
                                        <br>
                                        <object
                                            type="application/pdf"
                                            data="<?php echo($w['files']); ?>"
                                            width="100%"
                                            height="650"
                                            >
                                        </object>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                        <!-- /.panel -->

                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- MODAL -->

        <?php
            include('../modal/tambahspo.php');
            // include('../modal/updatenotulensi.php');
        ?>

        <!-- MODAL END -->


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
                $('#dataTables-spo').DataTable({
                    responsive: true
                });
            });

            // Auto Dismis
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
                });
            }, 5000);
        </script>

    </body>

</html>