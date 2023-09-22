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


//function user_coupon($mysqli, $uid, $num ,$reason){ //만기일(발행날부터 만기)

  // //회원테이블에 회원정보가 저장되면 쿠폰 발행
  // $csql = "SELECT * from coupons where cid={$num}";
  // $cresult = $mysqli -> query($csql) or die($mysqli->error);
  // $crs = $cresult->fetch_object();

  // $cname = $crs -> coupon_name;
  // $cprice = $crs -> coupon_price;
  // $month = ($crs ->  regdate)*30;

  //if문
  // if($month == 0) {
  //   $duedate = 0; 
  // } else{
  //   $duedate = date("Y-m-d", strtotime(+$month));//쿠폰
  // }
// var_dump($month);
  // $duedate = date("Y-m-d 23:59:59", strtotime(+$month));//쿠폰
  // $duedate = date("Y-m-d 23:59:59", strtotime("+30 days"));//regdate //여기는 값마니하고 페이지에서 나오게 //회원가입

//   $ucsql = "INSERT INTO user_coupons 
//     (couponid,userid,status,use_max_date,regdate,reason)
//     VALUES({$crs -> cid}, '{$uid}', {$num}, '{$duedate}',now(),'{$reason}')
//   ";
//   $ucresult = $mysqli -> query($ucsql) or die($mysql->error);

//   echo "<script>
//     alert('가입 완료! ".$cname."이 발행되었습니다.');
//     location.href= '/attention/user/login.php';
//   </script>";

// }

?>
