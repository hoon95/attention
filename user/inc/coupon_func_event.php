<?php

function user_coupon($mysqli, $userid, $coupnum, $reason){

  //회원테이블에 회원정보가 저장되면 쿠폰 발행
  $csql = "SELECT * from coupons where cid={$coupnum}";
  $cresult = $mysqli -> query($csql) or die($mysqli->error);
  $crs = $cresult->fetch_object();

  $month = $crs ->  due * 30;


  if ($month == 0) {
    $duedate = "무기한";
  } else {
    $duedate = date("Y-m-d 23:59:59", strtotime("+{$month} days")); // 수정된 부분
  }





  $ucsql = "INSERT INTO user_coupons 
    (couponid, userid, regdate, use_max_date ,reason)
    VALUES( {$coupnum}, '{$userid}', now(), '{$duedate}', '{$reason}')
  ";
  $ucresult = $mysqli -> query($ucsql) or die($mysql->error);

}


?>
