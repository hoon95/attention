<?php
function user_coupon($mysqli, $uid, $num, $reason){

  //회원테이블에 회원정보가 저장되면 쿠폰 발행
  $csql = "SELECT * from coupons where cid={$num}";
  $cresult = $mysqli -> query($csql) or die($mysqli->error);
  $crs = $cresult->fetch_object();

  $cname = $crs -> coupon_name;
  $cprice = $crs -> coupon_price;
  $duedate = date("Y-m-d 23:59:59", strtotime("+30 days"));

  $ucsql = "INSERT INTO user_coupons 
    (couponid,userid,status,use_max_date,regdate,reason)
    VALUES({$crs -> cid}, '{$uid}', {$num}, '{$duedate}',now(),'{$reason}')
  ";
  $ucresult = $mysqli -> query($ucsql) or die($mysql->error);

  echo "<script>
    alert('가입 완료! ".$cname."이 발행되었습니다.');
    location.href= '/attention/user/login.php';
  </script>";

}

?>