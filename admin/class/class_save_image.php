<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  // 관리자 검사
  if(!isset($_SESSION['AUID'])){
    $return_data = array("result"=>"member"); 
    echo json_encode($return_data);
    exit;
  }

  //파일 사이즈 검사
  if($_FILES['savefile']['size']> 10240000){
    $return_data = array("result"=>'size'); 
    echo json_encode($return_data);
    exit;
  }
  //이미지 여부 검사
  if(strpos($_FILES['savefile']['type'], 'image') === false){
    $return_data = array("result"=>'image'); 
    echo json_encode($return_data);
    exit;
  } 
  //파일 업로드
  $save_dir = $_SERVER['DOCUMENT_ROOT']."/attention/pdata/class/";
  $filename = $_FILES['savefile']['name']; 
  $ext = pathinfo($filename, PATHINFO_EXTENSION); 
  $newfilename = date("YmdHis").substr(rand(), 0,6); 
  $savefile = $newfilename.".".$ext;

  if(move_uploaded_file($_FILES['savefile']['tmp_name'], $save_dir.$savefile)){
    $sql = "INSERT INTO class_image_table (userid, filename) VALUES ('admin', '{$savefile}')";
    $result = $mysqli->query($sql);

    if($result){
        $imgid = $mysqli->insert_id;
        $return_url = array("result" => 'success', 'imgid' => $imgid, 'savefile' => $savefile);
        echo json_encode($return_url);
        exit;
    } else{
        $return_url = array("result" => 'error');
        echo json_encode($return_url);
        exit;
    }
  } else{
      $return_url = array("result" => 'error');
      echo json_encode($return_url);
      exit;
  }
?>