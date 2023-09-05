<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

	$value = $_POST['value'];
	$step = $_POST['step'];
	//$pcode = $_POST['pcode'];
  if(isset($_POST['pcode'])) $pcode = $_POST['pcode'];

  //중복검사
  $query = "SELECT * FROM category WHERE step=".$step." AND name='".$value."'";
  $result = $mysqli -> query($query);
  $data = $result -> fetch_object();
  if(isset($data)){  
    echo 'error';
    exit;
  }

  if ($step == '1'){
    $query = "INSERT INTO category (step, name) VALUES ('$step', '$value')";  //대분류 
  } else{
    $query = "INSERT INTO category (step, name, pcode) VALUES ('$step', '$value', '$pcode')";  //중,소분류
  }

	$result = $mysqli->query($query);

	if ($result) {
		echo "1";
	} else {
		echo "error";
	}

	$mysqli->close();
?>
