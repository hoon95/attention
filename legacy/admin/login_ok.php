<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  $userid = $_POST['userid'];
  $userpw = $_POST['passwd'];
  $passwd = hash('sha512',$userpw); //암호를 sha512 알고리즘이용 암호화
  
  $query = "select * from admins where userid='{$userid}' and passwd='{$passwd}'"; 
  $result = $mysqli->query($query);
  $rs = $result->fetch_object();

  if($rs){
    $sql = "update admins set last_login=now() where idx = {$rs->idx}";
    $result = $mysqli->query($sql);
    $_SESSION['AUID'] = $rs->userid;
    $_SESSION['AUNAME'] = $rs->username;
    $_SESSION['AULEVEL'] = $rs->level;

    echo "<script>
      alert('관리자님 어서오세요 :)');
      location.href = '/attention/admin/dashboard/index.php';
    </script>";
  } else{
    echo "<script>
      alert('아이디 또는 비밀번호가 일치하지 않습니다.');
      history.back();
    </script>";
  }

  

?>