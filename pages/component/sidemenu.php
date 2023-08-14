<div class="navbar-default sidebar">
  <div class="sidebar-nav">
    <ul class="nav" id="side-menu">
      <li class="sidebar-search"></li>
      <li>
        <a href="../dashboard/"><i class="fa fa-dashboard fa-fw"></i> DASHBOARD</a>
      </li>
      <?php
        if(($_SESSION['unit']==4)||($_SESSION['unit']==0)){
      ?>
          <li>
            <a href="../azalea/"><i class="fa fa-bed fa-fw"></i> AZALEA</a>
          </li>
      <?php 
        }
        if(($_SESSION['unit']==1)||($_SESSION['unit']==0)){
      ?>
          <li>
            <a href="../akasia/"><i class="fa fa-bed fa-fw"></i> AKASIA</a>
          </li>
      <?php 
        }
        if(($_SESSION['unit']==2)||($_SESSION['unit']==0)){
      ?>
          <li>
            <a href="../asoka/"><i class="fa fa-bed fa-fw"></i> ASOKA</a>
          </li>
      <?php 
        }
        if(($_SESSION['unit']==3)||($_SESSION['unit']==0)){
      ?>
          <li>
            <a href="../anthurium/"><i class="fa fa-bed fa-fw"></i> ANTHURIUM</a>
          </li>
      <?php 
        }
        if(($_SESSION['unit']==6)||($_SESSION['unit']==0)){
      ?>
          <li>
            <a href="../intensifanak/"><i class="fa fa-bed fa-fw"></i> INTENSIF ANAK</a>
          </li>
      <?php
        }
        if(($_SESSION['unit']==5)||($_SESSION['unit']==0)){
      ?>
          <li>
            <a href="../intensifdewasa/"><i class="fa fa-bed fa-fw"></i> INTENSIF DEWASA</a>
          </li>
      <?php
        }
      ?>
    </ul>
  </div>
  <!-- jangan dihapus dong.. hargai pembuatnya.. anda tinggal pake aja, Gratis ko mau main hapus aja. kecuali anda beli. -->
  <div class="navbar-brand">
      <div class="small"><small>Developed by:</small></div>
      <small> <a href="https://www.instagram.com/w.auliaabdillah" target="_blank"><i class="fa fa-instagram" aria-hidden="true"> </i> @w.auliaabdillah</a></small>
  </div>
</div>