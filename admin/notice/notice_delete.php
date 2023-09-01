<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  /*
  //관리자 검사
  if(!isset($_SESSION['AUID'])){
    $return_data = array("result"=>"member"); 
    echo json_encode($return_data);
    exit;
  }
  */

  $idx = $_POST['idx'];
 
  $sql = "DELETE FROM notice WHERE idx={$idx}";

  $result = $mysqli -> query($sql);
  if($result){
    $data = array('result' => 'ok');
  } else{
    $data = array('result' => 'fail');
  }

  echo json_encode($data);

?>