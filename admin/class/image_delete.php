<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/attention/admin/inc/dbcon.php';

//관리자 검사
if(!isset($_SESSION['AUID'])){
  $return_data = array("result" => "member");
  echo json_encode($return_data);
  exit;
}

$imgid = $_POST['imgid'];
$sql = "SELECT * FROM class_image_table where imgid={$imgid}";
$result = $mysqli->query($sql);
$rs =  $result->fetch_object();
if($rs->userid != $_SESSION['AUID']){
  $return_data = array("result" => "my");
  echo json_encode($return_data);
  exit;
}

$sql = "UPDATE class_image_table set status=0 where imgid={$imgid}";
$result = $mysqli->query($sql);

if($result){
  $delete_file = $_SERVER['DOCUMENT_ROOT'] . '/attention/pdata/class/' . $rs->filename;
  unlink($delete_file);
  $return_data = array("result" => "yes");
  echo json_encode($return_data);
} else{
  $return_data = array("result" => "no");
  echo json_encode($return_data);
}
