<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  $cid = $_GET['cid'];

  $sql ="DELETE from coupons where cid ='{$cid}'";
  

  if ($mysqli->query($sql) === TRUE) {
    echo "<script>
      var confirmation = confirm('정말 삭제하시겠습니까? :0');
      if (confirmation) {
        alert('삭제되었습니다 :).');
        location.href='coupon_list.php';
      }else{
        alert('삭제 취소했습니다 :)');
        location.href='coupon_list.php';
      }
    </script>";
} else{
  "<script>
    alert('삭제 취소했습니다 :)');
      history.back();  
  </script>";
}

?>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>