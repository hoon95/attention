<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/coupon_func_event.php';

    $userid = $_POST['userid']; //유저아이디
    $cid = $_POST['cid']; //쿠폰아이디

    // $sql2 = "SELECT * FROM user_coupons WHERE 1=1";
    // $result2 = $mysqli -> query($sql2);
    // $rc2 = $result2->fetch_object();

    // var_dump($rc2);
    //var_dump($sql2);
    // $userid = $_POST['userid'];
    // $useremail = $_POST['useremail'];

    // $sql = "INSERT INTO user_coupon
    // (couponid, userid, regdate, use_max_date)
    // VALUES('{$cid}','{$userid}','{$regdate}', '{$use_max_date}' )";
    // $result = $mysqli -> query($sql) or die($mysql->error);
    $sql = "SELECT * FROM user_coupons WHERE userid='{$userid}' and couponid = '{$cid}'";
    $result = $mysqli -> query($sql);
    $rc = $result->fetch_object();


    if(!isset($rc)){
        user_coupon($mysqli, $userid, $cid,'쿠폰이벤트');
        $return_data = array("result"=> '1');
        echo json_encode($return_data);
        exit;
      } else{
        $return_data = array("result"=> '0');
        echo json_encode($return_data);
        exit;
      }

//   userid : userid,
//   cid: 2
//   $userid = $_POST['userid']; //유저아이디
//   $cid = $_POST['cid']; //쿠폰아이디
  

//   //지급 할 쿠폰을 유저가 가지고 있는지 조회
//   $sqluc = "SELECT * FROM user_coupon where  couponid=$cid and userid='$userid'";
//   var_dump($sqluc);
// //   $result3 = $mysqli -> query($sqluc);
// //   while($rs = $result3->fetch_object()){
// //     $rscuc[]=$rs;
// //   }

//   //지급 할 쿠폰의 사용기한 조회, insert내용 변수에 담기
//   $sql = "SELECT * FROM coupons WHERE 1=1";
//   $result = $mysqli-> query($sql);
//   $cp = $result->fetch_object();
  
//   date_default_timezone_set("Asia/Seoul");
//   $regdate = date("Y-m-d H:i:s");
//   $use_max_date = date("Y-m-d H:i:s", strtotime($regdate . " +{$cp->due} months"));


//   date_default_timezone_set("Asia/Seoul");
// //   $regdate = date("Y-m-d H:i:s");
//   $due = date("Y-m-d H:i:s", strtotime($due . " +{$cp->due} months"));
//   $due  = $cp ->  due;
//   $month =   $due *30;

// if($month == 0) {
//     $duedate = 0; 
//   } else{
//     $duedate = date("Y-m-d", strtotime(+$month));//쿠폰
//   }

//   $due = date("Y-m-d H:i:s");
//   $use_max_date = date("Y-m-d H:i:s", strtotime($regdate . " +{$cp->cp_date} months"));
//   $month = ($cp ->  due)*30;

//   date_default_timezone_set("Asia/Seoul");
//   $regdate = date("Y-m-d");
// //   $use_max_date = date("Y-m-d", strtotime($regdate . " +{$cp->cp_date} months"));
//   $use_max_date = date("Y-m-d", strtotime(+$month));
// //if문

//   if($month == 0) {
//     $duedate = 0; 
//   } else{
//     $duedate = date("Y-m-d", strtotime(+$month));//쿠폰
//   }



//   if(!isset($rscuc)) {
      
//   $ucsql = "INSERT INTO user_coupons 
//    (cid, userid, use_max_date, regdate)
//   VALUES({$crs -> cid}, '{$uid}', {$num}, '{$duedate}',now(),'{$reason}')
// ";
// $ucresult = $mysqli -> query($ucsql) or die($mysql->error);

// echo "<script>
//   alert('가입 완료! ".$cname."이 발행되었습니다.');
//   location.href= '/attention/user/login.php';
// </script>";
// }
  //유저가 해당 쿠폰을 가지고있지 않으면
//   if(!isset($sqluc)){

//     //user_coupon 테이블에 insert
//     $sql2 = "INSERT into user_coupon 
//     (couponid, userid, regdate, use_max_date) values 
//     ({$cp -> cid},'{$userid}' ,'{$regdate}' ,'{$use_max_date}')";
//     $result2 = $mysqli -> query($sql2);
//     $return_data = array("result"=>"ok"); //return_data result에 ok
//     echo json_encode($return_data);
//     exit;

//   //유저가 해당 쿠폰을 이미 소지하고 있으면
//   } else{
//     $return_data = array("result"=>"fail");//return_data result에 fail
//     echo json_encode($return_data);
//     exit;
//   }


?>