<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  $cid = $_POST['cid'];
  $cate_name = $_POST['cate_name'];
  $step = $_POST['step'];

  //중복검사
  $query = "SELECT * FROM category WHERE step=".$step." AND name='".$cate_name."'";
  $result = $mysqli -> query($query);
  $data = $result -> fetch_object();
  if(isset($data)){
    echo 'duplicate';
    exit;
  }
  
  $query = "UPDATE category SET name='$cate_name' WHERE cid ='$cid'";
  $result = $mysqli -> query($query);
	$mysqli->close();
 
  if($result){  
    echo "1";
  } else {
    echo "error";  
  }
?>
