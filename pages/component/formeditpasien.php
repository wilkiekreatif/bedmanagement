<?php
    $q = mysqli_query($connect,"SELECT * FROM trx_pasien WHERE trx_id=".$trx_id);
    $data1 = mysqli_fetch_array($q);
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <i class="fa fa-user fa-fw"></i> INPUT DATA PASIEN
  </div>
  <!-- /.panel-heading -->
  <div class="panel-body">
    <form action="../controller/editpasien.php?bed=<?php echo($data['namabed']); ?>" method="post">
      <div class="col-lg-4">
        <div class="form-group has-feedback">
            <label for="ruangan">RUANGAN</label>
            <input disabled type="text" name="ruangan" class="form-control" value="<?php echo($_SESSION['menu']); ?>" maxlength="15">
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
        </div>
        <div class="form-group has-feedback">
            <label for="nobed">NO BED</label>
            <input disabled type="text" name="nobed" class="form-control" value="<?php echo($data['namabed']); ?>" maxlength="15">
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
        </div>
        <div class="form-group has-feedback">
            <label for="norm">NO RM <a style="color:red">*</a></label>
            <input required type="text" name="norm" class="form-control" value="<?php echo($data1['pasien_id']); ?>" placeholder="NO REKAM MEDIK PASIEN..." maxlength="15">
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
        </div>
        <div class="form-group has-feedback">
            <label for="nama">NAMA PASIEN <a style="color:red">*</a></label>
            <input required type="text" name="nama" class="form-control" value="<?php echo($data1['namapasien']); ?>" placeholder="NAMA PASIEN..." maxlength="30">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group has-feedback">
          <label for="jk">JENIS KELAMIN <a style="color:red">*</a></label>
          <select class="form-control" name="jk" id="jk">
            <option selected>-</option>
            <?php
            $tampil = mysqli_query($connect,"SELECT jeniskelamin FROM trx_pasien WHERE trx_id='$trx_id'");
            while ($q = mysqli_fetch_array($tampil)) {
                if($q['jeniskelamin']==0){
                    echo "<option selected value='0'>Laki-laki</option>";
                    echo "<option value='1'>Perempuan</option>";
                  }else{
                    echo "<option value='0'>Laki-laki</option>";
                    echo "<option selected value='1'>Perempuan</option>";
                }
            }?>
          </select>
        </div>
        <div class="form-group has-feedback">
            <label for="tgllahir">TANGGAL LAHIR <a style="color:red">*</a></label>
            <input required type="date" name="tgllahir" class="form-control" value="<?php echo($data1['tgllahir']); ?>" placeholder="..." maxlength="10">
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
        </div>
        <div class="form-group has-feedback">
            <label for="nama">DIAGNOSA AWAL <a style="color:red">*</a></label>
            <input required type="text" name="nama" class="form-control" value="<?php echo($data1['diagnosa']); ?>" placeholder="DIAGNOSA AWAL..." maxlength="30">
        </div>
        <div class="form-group has-feedback">
            <label for="dpjp1">DPJP 1 <a style="color:red">*</a></label>
            <select class="form-control" name="dpjp1" id="dpjp1">
              <option selected>-</option>
              <?php
              $tampil = mysqli_query($connect,"SELECT dokter_id, nama FROM mst_dokter ORDER BY nama ASC");
              while ($q = mysqli_fetch_array($tampil)) {
                  if($data1['dpjp1']==$q['dokter_id']){
                          echo "<option selected value='$q[dokter_id]'>$q[nama]</option>";
                      }else{
                          echo "<option value='$q[dokter_id]'>$q[nama]</option>";
                      }
              }?>
            </select>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group has-feedback">
            <label for="dpjp2">DPJP 2</label>
            <select class="form-control" name="dpjp2" id="dpjp2">
              <option selected>-</option>
              <?php
              $tampil = mysqli_query($connect,"SELECT dokter_id, nama FROM mst_dokter ORDER BY nama ASC");
              while ($q = mysqli_fetch_array($tampil)) {
                  if($data1['dpjp2']==$q['dokter_id']){
                          echo "<option selected value='$q[dokter_id]'>$q[nama]</option>";
                      }else{
                          echo "<option value='$q[dokter_id]'>$q[nama]</option>";
                      }
              }?>
            </select>
        </div>
        <div class="form-group has-feedback">
            <label for="dpjp3">DPJP 3</label>
                <select class="form-control" name="dpjp3" id="dpjp3">
                  <option selected>-</option>
                  <?php
                  $tampil = mysqli_query($connect,"SELECT dokter_id, nama FROM mst_dokter ORDER BY nama ASC");
                  while ($q = mysqli_fetch_array($tampil)) {
                      if($data1['dpjp3']==$q['dokter_id']){
                              echo "<option selected value='$q[dokter_id]'>$q[nama]</option>";
                          }else{
                              echo "<option value='$q[dokter_id]'>$q[nama]</option>";
                          }
                  }?>
                </select>
        </div>
        <div class="form-group has-feedback">
            <label for="penjamin">PENJAMIN <a style="color:red">*</a></label>
                <select class="form-control" name="penjamin" id="penjamin">
                    <option selected>-</option>
                    <?php
                    $tampil = mysqli_query($connect,"SELECT jaminan_id, namajaminan FROM mst_jaminan ORDER BY namajaminan ASC");
                    while ($q = mysqli_fetch_array($tampil)) {
                        if($data1['jaminan']==$q['jaminan_id']){
                                echo "<option selected value='$q[jaminan_id]'>$q[namajaminan]</option>";
                            }else{
                                echo "<option value='$q[jaminan_id]'>$q[namajaminan]</option>";
                            }
                    }?>
                </select>
        </div>
        <div class="form-group has-feedback">
            <label for="asalpoli">ASAL POLI <a style="color:red">*</a></label>
              <select class="form-control" name="asalpoli" id="asalpoli">
                <?php
                    if($data1['asalpoli']==0){
                        echo "<option selected value='0'>IGD</option>";
                        echo "<option value='1'>POLIKLINIK</option>";
                    }else{
                        echo "<option value='0'>IGD</option>";
                        echo "<option selected value='1'>POLIKLINIK</option>";
                    }
                ?>
              </select>
        </div>
        <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-primary">UPDATE DATA PASIEN <b>BED <?php echo($data['namabed']);?></b></button>
        <button type="reset" class="btn btn-warning">RESET</button>
      </div>
    </form>  
  </div>
  <!-- /.panel-body -->
</div>