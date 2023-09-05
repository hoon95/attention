<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

$pcode = $_REQUEST['pcode'];
$check_value = $_REQUEST['check_value'] ?? 0;;

$query = "update class set status={$check_value} where pid=".$pcode;
$rs= $mysqli->query($query) or die($mysqli->error); 

if($rs){
  echo "<script>
    alert('공개 타입이 수정 되었습니다.');
    history.back();
  </script>";
 } else{
  echo "<script>
    alert('공개 타입 수정 실패 하였습니다.');
    history.back();
  </script>";
 }
?>