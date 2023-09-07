<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

$pcode = isset($_POST['pcode']) ? intval($_POST['pcode']) : 0;
$check_value = isset($_POST['check_value']) ? intval($_POST['check_value']) : 0;

if($pcode <= 0 || ($check_value !== 0 && $check_value !== 1)){
  die('유효하지 않은 데이터입니다.');
}

$query = "UPDATE class SET status = ? WHERE pid = ?";
$result = $mysqli->prepare($query);

if($result === false){
    die('SQL 쿼리 준비 실패: ' . $mysqli->error);
}

$result->bind_param('ii', $check_value, $pcode);

if ($result->execute()){
} else{
}

$result->close();
$mysqli->close();
