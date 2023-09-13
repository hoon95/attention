<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $pid = $_POST['pid'];
  $opts = $_POST['opts'];
  $cnt = $_POST['cnt'];
  $total = $_POST['total'];

  if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
    $ssid = '';
  } else{
    $ssid = session_id();
    $userid = '';
  }
  $sql = "INSERT INTO cart (
    pid, userid, ssid, options, cnt, regdate, total
  ) VALUES (
    '{$pid}','{$userid}','{$ssid}','{$opts}',{$cnt},now(), {$total}
  )";
  $result = $mysqli -> query($sql);
  if($result){
    $data = array('result' => 'ok');
  } else{
    $data = array('result' => 'fail');
  }
echo json_encode($data);



?>