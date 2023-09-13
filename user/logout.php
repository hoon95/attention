<?php
session_start();

if(isset($_SESSION['UID'] )) {
  unset($_SESSION['UID']); // 세션 변수 삭제   
  unset($_SESSION['UNAME']); // 세션 변수 삭제   
}

header("Location:/attention/user/login.php");
die();

?>