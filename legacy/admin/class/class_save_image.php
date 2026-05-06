<?php
  session_start();

  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';

  //관리자 인지 검사 (관리자 여부를 확인)
  if(!isset($_SESSION['AUID'])){  //admin id가 없다면 관리자가 아니란 얘기.
    $return_data = array("result" => "member");
    echo json_encode($return_data);
    exit();
  }

  //경고를 하나더 만들자. 파일 사이즈 검사.
  //여기(class_save_image.php)로 넘어온 data는 초글로벌변수 $_FILES에서 확인할 수 있다.
  if($_FILES['savefile']['size'] > 10240000){  //추가이미지 파일의 size(용량)가 10MB보다 크다면

    //$return_data = array("result" => $_FILES['savefile']['size']);
    $return_data = array("result" => "size");
    echo json_encode($return_data);
    exit();
  }

  //첨부한 파일이 이미지인지 아닌지 이미지 여부 검사.
  if(strpos($_FILES['savefile']['type'], 'image') === false){
    $return_data = array("result" => "image");
    echo json_encode($return_data);
    exit();
  }

  //위에 조건들을 다 통과하면, 이미지 파일을 여기에다 저장하라고 할거다. ⇒ pdata 폴더 생성.
  //파일 업로드 프로세스
  $save_dir = $_SERVER['DOCUMENT_ROOT']."/attention/pdata/class/";  //업로드 될 폴더를 지정(pdata)
  $filename = $_FILES['savefile']['name'];  //그리고 파일 이름을 알아야 하기에, 파일 이름을 가져온다. ex)insta.jpg
  $ext = pathinfo($filename, PATHINFO_EXTENSION);  //첨부파일의 extension(확장자) 확인헤서 추출 ⇒ pathinfo(파일명, PATHINFO_EXTENSION);
  $newfilename = date("YmdHis").substr(rand(), 0,6);  //난수를 이용해서 암호화된 새로운 파일명을 만든다. ex)20230913_1184018
    /* substr = subtract(추출) + string(문자열)
       substr(원본, 0,6) : 원본에서(1184018234789) 0번째부터 6번째까지만 추출한다는 뜻. */
  $savefile = $newfilename.".".$ext;  //ex)20230913_1184018.jpg

  //이제 임시폴더에 있는 파일을 우리가 원하는 위치로 옮겨주기 ⇒ move_uploaded_file(원위치, 목표위치);
  //move_uploaded_file(temp/insta.jpg, /abcmall/pdata/20230913_1184018.jpg)
  if(move_uploaded_file($_FILES['savefile']['tmp_name'], $save_dir.$savefile)) {  //원하는 위치로 잘 옮겨졌다면

    //해당 테이블에 집에 넣자.
    $sql = "INSERT INTO class_image_table (userid, filename) VALUES ('{$_SESSION['AUID']}', '{$savefile}')";

    //쿼리 만들었으면 쿼리 실행.
    $result = $mysqli -> query($sql);

    /* DB에 글이 들어갈때 자동으로 imgid 값이 매겨지는 것과는 별개로, 글 등록시 내부적으로 그 글의 id를 확인할 수 있는 방법이 있다.
       어떤 테이블에 값을 넣든간에 insert_id 라고 하면, 그 글의 고유 ID번호(순번)를 반환받을 수 있다. */
    //$mysqli라는 객체 안에 insert_id라는 프로퍼티가 있다는 얘기.
    $imgid = $mysqli -> insert_id;  //테이블에 저장되는 값의 고유 번호


    $return_data = array("result" => 'success', 'imgid' => $imgid, 'savefile' => $savefile);
    echo json_encode($return_data);
    exit();

  } else {  //원하는 위치로 옮기는데 실패했다면
    $return_data = array("result" => "error");
    echo json_encode($return_data);
    exit();
  }

?>
