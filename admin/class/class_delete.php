<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
  $pid = $_GET['pid'];
  $sql = "DELETE FROM class WHERE pid='{$pid}'";

  if ($mysqli->query($sql)) {
      echo "<script>
      alert('삭제되었습니다.');
      location.href='/attention/admin/class/class_list.php';</script>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>
