<?php
  include('index.php');
    if($destroydate==date('Y-m-d')){
      header('location:../../httperror/');
      exit();
    }
?>