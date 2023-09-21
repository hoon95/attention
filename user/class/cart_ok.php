<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/attention/user/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';

if (!isset($_SESSION["UID"]))
{
  $data = json_encode(array(
      "result"=>"fail",
      "msg"=>"로그인 정보가 없습니다."
  ), JSON_UNESCAPED_UNICODE);
  die($data);
}

if (!isset($_POST["pid"]))
{
    $data = json_encode(array(
        "result"=>"fail",
        "msg"=>"상품 정보가 없습니다."
    ), JSON_UNESCAPED_UNICODE);
    die($data);
}

$sql = "SELECT * FROM cart WHERE pid = '".$_POST["pid"]."' AND userid = '".$_SESSION["UID"]."'";
$result = $mysqli -> query($sql);
$exist_row = $result -> fetch_object();
if (!empty($exist_row->cartid))
{
    $data = json_encode(array(
        "result"=>"exist",
        "msg"=>"이미 담겨있는 상품입니다"
    ), JSON_UNESCAPED_UNICODE);
    die($data);
}

$sql = "
    INSERT INTO cart (`pid` ,`userid` ,`regdate`)
    VALUES('".$_POST["pid"]."','".$_SESSION["UID"]."', NOW())
";
$result = $mysqli->query($sql);
if ($result === false)
{
    $data = json_encode(array(
        "result"=>"fail",
        "msg"=>"상품 정보가 없습니다."
    ), JSON_UNESCAPED_UNICODE);
}
else
{
    $data = json_encode(array(
        "result"=>"success"
    ), JSON_UNESCAPED_UNICODE);
}

die($data);

?>
