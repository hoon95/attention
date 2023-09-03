<?php
session_start();

if(isset($_SESSION['AUID'] )) {
  unset($_SESSION['AUID']);
  unset($_SESSION['AUNAME']);
}

header("Location:/attention/admin/login.php");
die();

?>