<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

$pcode = $_POST['pcode'];
$check_value = $_POST['check_value'] ?? 0;;

$query = "update class set status={$check_value} where pid=".$pcode;
$rs= $mysqli->query($query) or die($mysqli->error); 

if($rs){
  echo "<script>
    alert('수정 완료되었습니다.');
    history.back();
  </script>";
 } else{
  echo "<script>
    alert('수정 실패!');
    history.back();
  </script>";
 }
?>