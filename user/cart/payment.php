<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $userid = $_POST['userid'];
  $ucid = $_POST['ucid'];

  // 매출 테이블에 장바구니 정보 업데이트(pid, userid)
  $ssql = "SELECT pid FROM cart WHERE userid='{$userid}'";
  $ssresult = $mysqli -> query($ssql);

  while($ss_object = $ssresult->fetch_object()){
    $ss[] = $ss_object;
  }
  foreach($ss as $s){
    $msql = "INSERT INTO sales (userid, regdate) VALUES ('{$userid}', NOW())";
    $upsql = "UPDATE sales SET pid={$s->pid} WHERE userid='{$userid}' AND pid IS NULL";
    $upsql2 = "SELECT name, price_val FROM class WHERE pid={$s->pid}";
    
    $mresult = $mysqli -> query($msql);
    $upresult = $mysqli -> query($upsql);
    $upresult2 = $mysqli -> query($upsql2);
    while($up_object = $upresult2->fetch_object()){
      $up[] = $up_object;
    }
    foreach($up as $u){
      $upsql3 = "UPDATE sales SET name='{$u->name}', price={$u->price_val} WHERE pid={$s->pid}";
      $upresult3 = $mysqli -> query($upsql3);
    }
  }

  // 구매하기 클릭 시 장바구니 항목 비우기
  $csql = "DELETE FROM cart WHERE userid='{$userid}'";
  $cresult = $mysqli -> query($csql);

  // 쿠폰 사용 시 user_coupons 테이블에 상태 비활성화(다음에 사용 불가)
  $ucsql = "UPDATE user_coupons SET status=0 WHERE ucid={$ucid}";
  $ucresult = $mysqli -> query($ucsql);

  if($cresult && $ucresult){
    $data = array('result' => 'ok');
  }else{
    $data = array('result' => 'fail');
  }

  echo json_encode($data);



?>