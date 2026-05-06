<?php
session_start();

echo "<script>alert('로그아웃 되었습니다 :(');
window.location.href='/attention/admin/login.php';
</script>";

if(isset($_SESSION['AUID'] )) {
  unset($_SESSION['AUID']);
  unset($_SESSION['AUNAME']);
}

die();

?>