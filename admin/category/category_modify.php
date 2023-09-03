
<?php
  include_once '../inc/dbcon.php';

  $cid = $_POST['cid'];
  $cate_name = $_POST['cate_name'];
	$step = $_POST['step'];
  $value = $_POST['value'];
  
  $query = "UPDATE category SET name =".$cate_name." WHERE cid='".$cid."'";
  $result = $mysqli -> query($query);
  $data = $result -> fetch_object();
  
  if(isset($data)){  
    echo "1"; 
  } else {
    echo "error";  
  }

	$mysqli->close();

  //수정 기능 아직 미완성
?> 
