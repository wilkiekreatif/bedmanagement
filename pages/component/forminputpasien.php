<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> INPUT DATA PASIEN
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form action="../controller/tambahpasienbaru.php?bed=<?php echo($data['namabed']); ?>" method="post">
        <div class="col-lg-4">
            <div class="form-group has-feedback">
                <label for="ruangan">RUANGAN</label>
                <input disabled type="text" name="ruangan" class="form-control" value="<?php echo($_SESSION['menu']); ?>" maxlength="15">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="nobed">NO BED</label>
                <input disabled type="text" name="nobed" class="form-control" value="<?php echo($data['namabed']); ?>" maxlength="15">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="norm">NO RM <a style="color:red">*</a></label>
                <input <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }else{
                                echo('required');
                            }
                        ?> type="text" name="norm" class="form-control" placeholder="NO REKAM MEDIK PASIEN..." maxlength="15">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="nama">NAMA PASIEN <a style="color:red">*</a></label>
                <input <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }else{
                                echo('required');
                            }
                        ?> type="text" name="nama" class="form-control" placeholder="NAMA PASIEN..." maxlength="30">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group has-feedback">
                <label for="jk">JENIS KELAMIN <a style="color:red">*</a></label>
                <select <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }else{
                                echo('required');
                            }
                        ?> class="form-control" name="jk" id="jk">
                    <option value="" selected>--Pilih Bagian--</option>
                    <option value="0">Laki-laki</option>
                    <option value="1">Perempuan</option>
                </select>
            </div>
            <div class="form-group has-feedback">
                <label for="tgllahir">TANGGAL LAHIR <a style="color:red">*</a></label>
                <input <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }else{
                                echo('required');
                            }
                        ?> type="datetime-local" name="tgllahir" class="form-control" placeholder="..." maxlength="10">
                <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
            </div>

            <!-- DIAGNOSA FREE TEXT -->
            <div class="form-group has-feedback">
                <label for="diagnosa">DIAGNOSA <a style="color:red">*</a></label>
                <input <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }else{
                                echo('required');
                            }
                        ?> type="text" name="diagnosa" class="form-control" placeholder="DIAGNOSA..." maxlength="100">
                <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
            </div>

            <!-- OPSI MENGGUNAKAN LIST -->
            <!-- <div class="form-group has-feedback">
                <label for="diagnosa">DIAGNOSA AWAL <a style="color:red">*</a></label>
                    <select required class="form-control" name="diagnosa" id="diagnosa">
                        <option value="" selected>--Pilih Bagian--</option>
                        <?php
                            // $tampil = mysqli_query($connect,"SELECT * FROM mst_diagnosa ORDER BY namadiagnosa");
                            // while ($w = mysqli_fetch_array($tampil)) {
                            //     echo "<option value=$w[diagnosa_id]>$w[namadiagnosa]</option>";
                            // }
                        ?>
                    </select>
            </div> -->
            <div class="form-group has-feedback">
                <label for="dpjp1">DPJP 1 <a style="color:red">*</a></label>
                    <select <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }else{
                                echo('required');
                            }
                        ?> class="form-control" name="dpjp1" id="dpjp1">
                        <option value="" selected>--Pilih Bagian--</option>
                        <?php
                            $tampil = mysqli_query($connect,"SELECT * FROM mst_dokter ORDER BY nama");
                            while ($w = mysqli_fetch_array($tampil)) {
                                echo "<option value=$w[dokter_id]>$w[nama]</option>";
                            }
                        ?>
                    </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group has-feedback">
                <label for="dpjp2">DPJP 2</label>
                    <select <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }
                        ?> class="form-control" name="dpjp2" id="dpjp2">
                        <option value="" selected>--Pilih Bagian--</option>
                        <?php
                            $tampil = mysqli_query($connect,"SELECT * FROM mst_dokter ORDER BY nama");
                            while ($w = mysqli_fetch_array($tampil)) {
                                echo "<option value=$w[dokter_id]>$w[nama]</option>";
                            }
                        ?>
                    </select>
            </div>
            <div class="form-group has-feedback">
                <label for="dpjp3">DPJP 3</label>
                    <select <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }
                        ?> class="form-control" name="dpjp3" id="dpjp3">
                        <option value="" selected>--Pilih Bagian--</option>
                        <?php
                            $tampil = mysqli_query($connect,"SELECT * FROM mst_dokter ORDER BY nama");
                            while ($w = mysqli_fetch_array($tampil)) {
                                echo "<option value=$w[dokter_id]>$w[nama]</option>";
                            }
                        ?>
                    </select>
            </div>
            <div class="form-group has-feedback">
                <label for="penjamin">PENJAMIN <a style="color:red">*</a></label>
                    <select <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }else{
                                echo('required');
                            }
                        ?> class="form-control" name="penjamin" id="penjamin">
                        <option value="" selected>--Pilih Bagian--</option>
                        <?php
                            $tampil = mysqli_query($connect,"SELECT * FROM mst_jaminan ORDER BY namajaminan");
                            while ($w = mysqli_fetch_array($tampil)) {
                                echo "<option value=$w[jaminan_id]>$w[namajaminan]</option>";
                            }
                        ?>
                    </select>
            </div>
            <div class="form-group has-feedback">
                <label for="asalpoli">ASAL POLI <a style="color:red">*</a></label>
                    <select <?php 
                            if($data['bedstatus']==2){
                                echo('disabled');
                            }else if($data['bedstatus']==3){
                                echo('disabled');
                            }else{
                                echo('required');
                            }
                        ?> class="form-control" name="asalpoli" id="asalpoli">
                        <option value="" selected>--Pilih Bagian--</option>
                        <option value="0">IGD</option>
                        <option value="1">POLIKLINIK</option>
                        
                    </select>
            </div>
            <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-primary">SIMPAN DATA PASIEN KE <b>BED <?php echo($data['namabed']);?></b></button>
            <button type="reset" class="btn btn-warning">RESET</button>
        </div>
        </form>  
    </div>
    <!-- /.panel-body -->
</div>