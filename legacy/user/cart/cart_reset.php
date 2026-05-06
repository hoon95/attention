<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $userid = $_POST['userid'];
  
  $sql = "DELETE FROM cart WHERE userid='{$userid}'";
  $result = $mysqli -> query($sql);

  if($result){
    $data = array('result' => 'ok');
  } else{
    $data = array('result' => 'fail');
  }
  
  echo json_encode($data);
?>