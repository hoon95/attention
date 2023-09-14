<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $userid = $_POST['userid'];
  $username = $_POST['username'];
  $useremail = $_POST['useremail'];

  $sql = "SELECT mid, userid FROM members WHERE username = '{$username}' and useremail = '{$useremail}' and userid = '{$userid}'";
  $result = $mysqli -> query($sql);
  $pw_result = $result -> fetch_object();
  
  if($pw_result){
    $mid = $pw_result -> mid;
    echo "<script>
    location.href = '/attention/user/member/change_pw.php?mid={$mid}';
    </script>";
  }else{
    echo "<script>
    alert('입력 정보가 일치하지 않습니다');
    history.back();
    </script>";
  }
?>