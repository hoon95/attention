<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $pid = $_POST['pid'];
  $total = $_POST['total'];

  if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
  } else{
    $userid = '';
  }
  $sql = "INSERT INTO cart (
    pid, userid, regdate
  ) VALUES (
    '{$pid}','{$userid}', now()
  )";
  $result = $mysqli -> query($sql);
  if($result){
    $data = array('result' => 'ok');
  } else{
    $data = array('result' => 'fail');
  }
echo json_encode($data);

?>