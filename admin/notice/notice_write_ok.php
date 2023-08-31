<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
  // var_dump($_POST);

  // //관리자 검사
  // if(!isset($_SESSION['AUID'])){
  //   echo "<script>
  //   alert('권한이 없습니다');
  //   history.back();
  //   </script>";
  // }


  
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = date('Y-m-d');

  /* bbs테이블 파일 코드 */

  // print_r($_FILES['file']);
  $org_name = $_FILES['file']['name'];
  $tmpfile_path = $_FILES['file']['tmp_name'];
  $upload_path = "/attention/pdata/notice".$org_name;
  $file_type =$_FILES['file']['type'];

  if(strpos($file_type,'image') >= 0) {$is_img = 1;} else{ $is_img = 0;}

  // move_uploaded_file($tmpfile_path);
  move_uploaded_file($tmpfile_path, $upload_path);

  $sql = "INSERT INTO notice (title, content, date, file) 
  VALUES ('{$title}','{$content}','{$date}','{$org_name}')";
  // var_dump($sql);

  if($mysqli->query($sql) === true){
    echo "<script>
      alert('게시물 작성이 완료 되었습니다.');
      location.href='/attention/admin/notice/notice.php';</script>";
  } else{
    echo "<script>
      alert('게시물 작성 실패');
      history.back();</script>";
  }

  $mysqli->close();
  


  /* abcmall 파일 코드 */
  /*
  if($_FILES['file']['name']){
    //파일 사이즈 검사
    if($_FILES['file']['size']> 10240000){
      echo "<script>
        alert('10MB 이하만 첨부할 수 있습니다.');
        history.back();
      </script>";
      exit;
    }
    //파일 업로드
    $save_dir = $_SERVER['DOCUMENT_ROOT']."/attention/pdata/notice/";
    $filename = $_FILES['file']['name']; //insta.jpg
    $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
    $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015
    $thumbnail = $newfilename.".".$ext; //20238171184015.jpg


    if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $save_dir.$thumbnail)){  
      $thumbnail = "/attention/pdata/notice/".$thumbnail;
    } else{
      echo "<script>
        alert('이미지등록 실패!');    
        history.back();            
      </script>";
    }


  } //첨부파일 있다면 할일
  */


  /* 핵심정리 파일 코드 */
  /*
  if ( $_POST[ "action" ] == "Upload" ) {
    $uploaded_file_name_tmp = $_FILES[ 'file' ][ 'tmp_name' ];
    $uploaded_file_name = $_FILES[ 'file' ][ 'name' ];
    $upload_folder = "uploads/";
    move_uploaded_file( $uploaded_file_name_tmp, $upload_folder . $uploaded_file_name );
    echo "<p>" . $uploaded_file_name . "을(를) 업로드하였습니다.</p>";
  }
  */


  /* 검색 파일 코드 */
  /*
  $file_name = $_FILES['file']['name'];
  $tmp_file = $_FILES['file']['tmp_name'];

  $file_path = '/attention/pdata/notice/'.$file_name;

  move_uploaded_file($tmp_file, $file_path);
  // $r = move_uploaded_file($tmp_file, $file_path);
  */

 
  



?>