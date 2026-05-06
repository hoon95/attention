<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $cartid = $_POST['cartid'];
  
  $sql = "DELETE FROM cart WHERE cartid='{$cartid}'";
  $result = $mysqli -> query($sql);

  if($result){
    $data = array('result' => 'ok');
  } else{
    $data = array('result' => 'fail');
  }
  
  echo json_encode($data);
?>