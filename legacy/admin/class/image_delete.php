<?php
  session_start();

  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';

  //관리자 인지 검사
  if(!isset($_SESSION['AUID'])){
    $return_data = array("result" => "member");
    echo json_encode($return_data);
    exit();
  }

  $imgid = $_POST['imgid'];
  //class_image_table에서 imgid의 값이 $imgid인 걸 삭제하는 쿼리.
  //$sql = "DELETE FROM class_image_table WHERE imgid={$imgid}";

  //삭제btn을 누르면 table에서 바로 지워버리는게 아니라 → 화면에 노출될지 안될지로 설정하자
  //(컬럼명 status의 값을 1에서 → 0으로 바꾸면 됨)
  $sql = "SELECT * FROM class_image_table WHERE imgid={$imgid}";  //일단 찾자(조회)
  $result = $mysqli -> query($sql);  //쿼리 실행
  $rs = $result -> fetch_object();

  if($rs -> userid != $_SESSION['AUID']){  //이미지를 추가(등록)한 사람만 지울수 있도록(노출 안되게 할 수 있도록) 하자.
    $return_data = array("result" => "my");
    echo json_encode($return_data);
    exit();
  }

  //else일 때 할 일임.
  $sql = "UPDATE class_image_table SET status=0 WHERE imgid={$imgid}";  
  $result = $mysqli -> query($sql);

  //그런데 DB에서는 data를 지우지 않고 → 단순히 status 값만 1에서 0으로 바꿨지만,
  //서버 안에 있는 pdata폴더 안의 이미지 파일들은 실제로 지워져야 한다 ⇒ 지우는 함수 unlink(대상);
  //대상에는 경로와 파일명이 정확하게 들어와야 한다.
  if($result){
    $delete_file = $_SERVER['DOCUMENT_ROOT'].'/attention/pdata/class/'.$rs->filename;
    unlink($delete_file);

    $return_data = array("result" => "yes");  //지운 다음에는 지웠다고 일을 시킨 녀석에게 되돌려줘야 겠죠.(삭제 yes)
    echo json_encode($return_data);
  } else {  //$result 값이 없다면 못 지웠다는 얘기.
    $return_data = array("result" => "no");
    echo json_encode($return_data);
  }


  ?>
