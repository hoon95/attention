<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $userid = $_POST['userid'];
  $mid = $_POST['mid'];
  
  $csql = "DELETE FROM cart WHERE userid='{$userid}'";
  $cresult = $mysqli -> query($csql);
  
  $ucsql = "UPDATE user_coupons SET status=0 WHERE ucid={$ucid}";
  $ucresult = $mysqli -> query($ucsql);
  
  if($cresult && $ucresult){
    $data = array('result' => 'ok');
  }else{
    $data = array('result' => 'fail');
  }

echo json_encode($data);



?>