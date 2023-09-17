<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

$username = $_POST['username'];
$useremail = $_POST['useremail'];

$sql = "SELECT userid FROM members WHERE username = '{$username}' and useremail = '{$useremail}'";
$result = $mysqli -> query($sql);
$id_result = $result -> fetch_object();

if($id_result && $id_result -> userid){
  $userid = $id_result -> userid;
  echo "<script>
  alert('회원님의 아이디는 $userid 입니다.');
  location.href = '/attention/user/login.php'
  </script>";
}else{
  echo "<script>
  alert('이름 또는 이메일을 다시 확인해주세요');
  history.back();
  </script>";
}

?>