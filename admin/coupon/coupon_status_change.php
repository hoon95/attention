<?php
	// include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  $cid = $_POST['cid'] ;
  $status = $_POST['status'] ;

  $sql = "UPDATE coupons set status= '{$status}' where cid={$cid}";

  // var_dump($sql);
  $result = $mysqli->query($sql);

  if(isset($result)){
    $return_data = array("result"=> '1');
    echo json_encode($return_data);
    exit;
  } else{
    $return_data = array("result"=> '0');
    echo json_encode($return_data);
    exit;
  }
?> 
<?php
  // include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>