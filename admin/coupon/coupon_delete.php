<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  $cid = $_GET['cid'];

  $sql ="DELETE from coupons where cid ='{$cid}'";
  

  if ($mysqli->query($sql) === TRUE) {
    echo "<script>
      var confirmation = confirm('정말 삭제할 것입니까?');
      if (confirmation) {
        alert('삭제되었습니다.');
        location.href='coupon_list.php';
      } 
    </script>";
} else{
  "<script>
    alert('삭제가 취소되었습니다.');
      history.back();  
  </script>";
}

?>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>