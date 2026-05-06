<?php
  session_start(); 
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $userid = $_POST['userid'];
  $userpw = $_POST['userpw'];
  $passwd = hash('sha512',$userpw);
  
  $query = "SELECT * FROM members WHERE userid='{$userid}' AND userpw='{$passwd}'";
  $result = $mysqli->query($query);
  $rs = $result->fetch_object();

  if($rs){

    $_SESSION['UID'] = $rs->userid;
    $_SESSION['UNAME'] = $rs->username;

    echo "<script>
      alert('$rs->username 님 반갑습니다');
      location.href = '/attention/user/index.php';
    </script>";
  } else{
    echo "<script>
      alert('아이디 또는 비밀번호가 일치하지 않습니다');
      history.back();
    </script>";
  }
?>