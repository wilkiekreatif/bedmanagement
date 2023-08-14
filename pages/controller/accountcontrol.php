<?php
  if (empty($_SESSION['username'])) {
	    header('location:../../');
        return false;
	}
?> 