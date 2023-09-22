<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';
  

  $userid = $_POST['userid'];
  $score = $_POST['score']; //스코어가 쿠폰 아이디

  //지급 할 쿠폰을 유저가 가지고 있는지 조회
  $sqluc = "SELECT * FROM user_coupon where couponid=$score and userid='$userid'";
  // var_dump($sqluc);

  $result3 = $mysqli -> query($sqluc);

  $rs = $result3->fetch_object();

    //지급 할 쿠폰의 사용기한 조회, insert내용 변수에 담기
  $sql = "SELECT * FROM coupons WHERE cid= $score";
  $result = $mysqli-> query($sql);
  $cp = $result->fetch_object();
  
  // $month = ($cp ->  regdate)*30;

  // if($month == 0) {
  //   $duedate = 0; 
  // } else{
  //   $duedate = date("Y-m-d", strtotime(+$month));//쿠폰
  // }
  date_default_timezone_set("Asia/Seoul");
  $regdate = date("Y-m-d");
  $use_max_date = date("Y-m-d", strtotime($regdate . " +{$cp->regdate} months"));


  //유저가 해당 쿠폰을 가지고있지 않으면
  if(!isset($rs)){


    $sql2 = "INSERT into user_coupon 
    (couponid, userid, regdate, use_max_date) values 
    ({$$cp -> cid},'{$userid}', {$regdate} , {$use_max_date})";
    $result2 = $mysqli -> query($sql2);
    $return_data = array("result"=>"ok"); //return_data result에 ok
    echo json_encode($return_data);
    exit;

    //유저가 해당 쿠폰을 이미 소지하고 있으면
    } else{
      $return_data = array("result"=>"fail");//return_data result에 fail
      echo json_encode($return_data);
      exit;
    }





  


?>


