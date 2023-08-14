<?php
    session_start();
    include('../../config.php');
    require('../controller/accountcontrol.php');
    $_SESSION['menu']='AZALEA';
    // Penentuan Kamar
    $q = mysqli_query($connect,"SELECT * FROM  mst_ruangan WHERE namaruangan='".$_SESSION['menu']."'");
    $data = mysqli_fetch_array($q);
    $ruangan = $data['ruangan_id'];
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
                            <div class="col-lg-9">
                                <?php
                                    $query="SELECT * FROM mst_bed WHERE ruangan = '$ruangan'";
                                    //menjalankan query      
                                    if (mysqli_query($connect,$query)) {      
                                        $result=mysqli_query($connect,$query);     
                                    } else die ("Error menjalankan query");
                                    //mengecek record kosong     
                                    if (mysqli_num_rows($result) > 0) {
                                        $no='1';
                                        //menampilkan hasil query      
                                        while($row = mysqli_fetch_array($result)) {
                                ?>
                                        <div class="bedstat <?php
                                            if($row['bedstatus']==0){
                                                echo('readytouse');
                                            }else if($row['bedstatus']==1){
                                                echo('rencanapulang');
                                            }else if($row['bedstatus']==2){
                                                echo('readytoclean');
                                            }else if($row['bedstatus']==3){
                                                echo('renovasi');
                                            }else if($row['bedstatus']==6){
                                                echo('booking');
                                            }else if($row['bedstatus']==7){
                                                echo('male');
                                            }else if($row['bedstatus']==8){
                                                echo('female');
                                            } ?>">
                                            <div class="bedstat-header">
                                                <div class="bedtitle">
                                                    <b><?php
                                                    // Menampilkan nama bed
                                                    echo($row['namabed'].' | '.$row['kelas']);
                                                    ?></b>
                                                </div>
                                                <div class="bedstatus">
                                                    <b><?php
                                                    // Menampilkan status bed
                                                    if($row['bedstatus']==0){
                                                        echo('Ready To Use');
                                                    }else if($row['bedstatus']==1){
                                                        echo('Rencana Pulang');
                                                    }else if($row['bedstatus']==2){
                                                        echo('Ready To Clean');
                                                    }else if($row['bedstatus']==3){
                                                        echo('Renovasi');
                                                    }else if($row['bedstatus']==6){
                                                        echo('Booking');
                                                    }else if($row['bedstatus']==5){
                                                        echo('Terisi');
                                                    }else if($row['bedstatus']==7){
                                                        echo('Terisi');
                                                    }else if($row['bedstatus']==8){
                                                        echo('Terisi');
                                            }
                                                ?></b>
                                                </div>
                                            </div>
                                            <div class="konten">
                                                <?php
                                                    // BED harus dalam kondisi kosong tidak ada pasien.
                                                    // 0 untuk Ready to Use
                                                    // 2 untuk Ready to Clean
                                                    // 3 untuk Ready to Renovasi
                                                    // 6 untuk Ready to Booking
                                                    if(($row['bedstatus']==0) || ($row['bedstatus']==2) || ($row['bedstatus']==3) || (($row['bedstatus']==6)&&($row['trx_id']==null))){
                                                        ?>
                                                        <div class="konten-pasien">
                                                            <div class="konten-namapasien">
                                                                <b>-</b>
                                                            </div>
                                                            <div class="konten-idpasien">
                                                                <b>-</b>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <b>-<br>-<br>-</b>
                                                        </div>
                                                        <div class="konten-pasien">
                                                            <div class="konten-namapasien">
                                                                <b>-</b>
                                                            </div>
                                                            <div class="konten-idpasien">
                                                                <b>-</b>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <b>-</b>
                                                        </div>
                                                        <div class="diagnosa">
                                                            <b>-</b>
                                                        </div>
                                            <?php
                                                }else{
                                                    // BED harus dalam kondisi terisi pasien.
                                                    // selain dari 0, 2, 3
                                                    // 6 booking bisa terisi maupun kosong
                                                        $q = mysqli_query($connect,"SELECT trx_id, pasien_id, tgl_input, namapasien, jeniskelamin, diagnosa, tgllahir, DPJP1, DPJP2, DPJP3, asalpoli, jaminan FROM trx_pasien WHERE trx_id=".$row['trx_id']);
                                                        $data = mysqli_fetch_array($q);
                                                ?>
                                                        <div class="konten-pasien">
                                                            <div class="konten-namapasien">
                                                                <b>
                                                                    <?php echo($data['namapasien']) ?>
                                                                    
                                                                </b>
                                                            </div>
                                                            <div class="konten-idpasien">
                                                                <b>
                                                                    <?php 
                                                                        echo($data['pasien_id']);
                                                                    ?>
                                                                </b>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <?php
                                                                $qdpjp = mysqli_query($connect,'SELECT * FROM mst_dokter WHERE dokter_id='.$data['DPJP1']);
                                                                $qdata = mysqli_fetch_array($qdpjp);
                                                                echo($qdata['nama']."<br>");
                                                                if($data['DPJP2']!=0){
                                                                    $qdpjp = mysqli_query($connect,'SELECT * FROM mst_dokter WHERE dokter_id='.$data['DPJP2']);
                                                                    $qdata = mysqli_fetch_array($qdpjp);
                                                                    echo($qdata['nama'].'<br>');
                                                                }else{ echo('-<br>');}
                                                                if($data['DPJP3']!=0){
                                                                    $qdpjp = mysqli_query($connect,'SELECT * FROM mst_dokter WHERE dokter_id='.$data['DPJP3']);
                                                                    $qdata = mysqli_fetch_array($qdpjp);
                                                                    echo($qdata['nama'].'<br>');
                                                                }else{ echo('-');}
                                                            ?>
                                                        </div>
                                                        <div class="konten-pasien">
                                                            <div class="konten-namapasien">
                                                                <b>
                                                                    <?php   
                                                                        if($data['asalpoli']=='0'){
                                                                            echo('<b>IGD</b><br>');
                                                                        }else if($data['asalpoli']=='1'){
                                                                            echo('<b>Poliklinik</b><br>');
                                                                        }
                                                                    ?>
                                                                </b>
                                                            </div>
                                                            <div class="konten-jaminan">
                                                                <?php
                                                                    $qjaminan = mysqli_query($connect,'SELECT * FROM mst_jaminan WHERE jaminan_id='.$data['jaminan']);
                                                                    $qdata = mysqli_fetch_array($qjaminan);
                                                                    echo($qdata['namajaminan']);
                                                                    ?>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <b>
                                                                <?php echo($data['tgl_input']) ?>
                                                            </b>
                                                        </div>
                                                        <div class="diagnosa">
                                                            <?php
                                                                echo($data['diagnosa']);
                                                            //     $qdiagnosa = mysqli_query($connect,'SELECT * FROM mst_diagnosa WHERE diagnosa_id='.$data['diagnosa']);
                                                            //     $qdata = mysqli_fetch_array($qdiagnosa);
                                                            //     echo('<i>'.$qdata['namadiagnosa'].'</i>');
                                                            // ?>
                                                        </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <!-- <div class="d-grid gap-1">
                                                <button class="btn btn-primary" type="button">Button</button>
                                            </div> -->
                                            <?php
                                                if(($_SESSION['level']==='0') OR ($_SESSION['level']==='1')){
                                                    if(empty($data['trx_id'])){
                                            ?>
                                                    <div class="footer-konten">
                                                        <a class="tombolupdate" href="detail.php?id=<?php echo($row['id']) ?>"><b>UPDATE DATA BED</b></a>
                                                    </div>
                                            <?php
                                                    }else{
                                            ?>
                                                    <div class="footer-konten">
                                                        <a class="tombolupdate" href="detail.php?id=<?php echo($row['id']) ?>&trx_id=<?php echo($data['trx_id'])?>"><b>UPDATE DATA BED</b></a>
                                                    </div>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Bed Kosong -->
                                        <div class="panel male">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-bed fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php
                                                                $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_bed WHERE bedstatus=0 AND ruangan=".$ruangan);
                                                                $data = mysqli_fetch_array($q);
                                                                echo($data['total']);
                                                                ?>
                                                        </div>
                                                        <div>Bed Kosong</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- PASIEN KESELURUHAN -->
                                        <div class="panel sidebar-wildan">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-user fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php
                                                                $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_bed WHERE trx_id IS NOT NULL AND ruangan=".$ruangan);
                                                                $data = mysqli_fetch_array($q);
                                                                echo($data['total']);
                                                            ?>
                                                        </div>
                                                        <div>Keseluruhan Pasien</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Pasien Laki-laki -->
                                        <div class="panel booking">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-user fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php
                                                                $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_bed WHERE bedstatus=6 AND ruangan=".$ruangan);
                                                                $data = mysqli_fetch_array($q);
                                                                echo($data['total']);
                                                            ?>
                                                        </div>
                                                        <div>Booking</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Pasien Rencana Pulang -->
                                        <div class="panel rencanapulang">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-user fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php
                                                                $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_bed WHERE bedstatus=1 AND ruangan=".$ruangan);
                                                                $data = mysqli_fetch_array($q);
                                                                echo($data['total']);
                                                            ?>
                                                        </div>
                                                        <div>Rencana Pulang</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-list fa-fw"></i> <b>TABEL WAITING LIST</b>
                                            </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-waitinglist">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>NO RM</th>
                                                        <th>NAMA</th>
                                                        <th>BED</th>
                                                        <th>#</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>NO RM</th>
                                                        <th>NAMA</th>
                                                        <th>BED</th>
                                                        <th>#</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                        //membuat query membaca record dari tabel User      
                                                        $query="SELECT trx_waitinglist.trx_id, trx_pasien.pasien_id, trx_pasien.namapasien, trx_waitinglist.namabed
                                                                FROM trx_waitinglist
                                                                INNER JOIN trx_pasien ON trx_pasien.trx_id = trx_waitinglist.trx_id
                                                                WHERE trx_waitinglist.status=1 AND trx_waitinglist.ruangan='".$_SESSION['menu']."' 
                                                                ORDER BY trx_pasien.namapasien DESC";
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
                                                                // echo "	<td width='20%'>".$row["unit"]."</td>";
                                                                echo "	<td>".$row["trx_id"]."</td>";
                                                                echo "	<td>".$row["pasien_id"]."</td>";      
                                                                echo "	<td>".$row["namapasien"]."</td>";
                                                                echo "	<td>".$row["namabed"]."</td>";
                                                    ?>              
                                                                <!-- <td width='28%' align='center'>
                                                                    <object
                                                                        type="application/pdf"
                                                                        data="<?php echo($row['files']); ?>"
                                                                        width="500"
                                                                        height="600"
                                                                        >
                                                                    </object>
                                                                </td> -->
                                                    <?php
                                                                echo "<td  width='89px'  align='center'> <a href='../controller/approvepasien.php?trx_id=".$row["trx_id"]."' class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='left' title='Approve pasien ".$row["namapasien"]." pindah ke bed ".$row["namabed"]."?'><i class='glyphicon glyphicon-ok'></i> </a> ";
                                                                echo "<a href='../controller/cancelpasien.php?trx_id=".$row["trx_id"]."' class='btn btn-sm btn-warning' data-toggle='tooltip' data-placement='left' title='Cancel pasien ".$row["namapasien"]." pindah ke bed ".$row["namabed"]."?'><i class='glyphicon glyphicon-remove'></i></a></td>";
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
        <!-- sticky NAVBAR -->
        <!-- <script>
            window.onscroll = function() {myFunction()};
            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;
            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        </script> -->
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