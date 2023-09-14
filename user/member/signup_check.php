<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

$userid = $_POST['userid'];
$useremail = $_POST['useremail'];

$sql = "SELECT count(*) AS cnt FROM members WHERE userid='{$userid}' OR useremail = '{$useremail}'";
$result = $mysqli -> query($sql);
$rc = $result->fetch_object();
$data = array('cnt' => $rc->cnt);
echo json_encode($data);

?>