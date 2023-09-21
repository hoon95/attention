<?php
session_start();

if(isset($_SESSION['UID'])){
  unset($_SESSION['UID']);
  unset($_SESSION['UNAME']);
}
header("Location:/attention/user/login.php");
die();
?>