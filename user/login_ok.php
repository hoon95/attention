<?php
  session_start(); 
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $userid = $_POST['userid'];
  $userpw = $_POST['passwd'];
  $passwd = hash('sha512',$userpw);
  
  $query = "select * from members where userid='{$userid}' and userpw='{$passwd}'"; 
  $result = $mysqli->query($query);
  $rs = $result->fetch_object();

  if($rs){

    $_SESSION['UID'] = $rs->userid;
    $_SESSION['UNAME'] = $rs->username;

    $sql = "UPDATE cart SET userid='{$userid}'WHERE ssid='".session_id()."'";
    $result = $mysqli->query($sql);
    echo $sql;

    echo "<script>
      alert('$rs->username 님 반갑습니다');
      location.href = '/attention/user/index.php';
    </script>";
  } else{
    echo "<script>
      alert('아이디, 비번을 다시 확인하세요');
      history.back();
    </script>";
  }

  

?>