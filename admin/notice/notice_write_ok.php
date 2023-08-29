<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  // $name = $_POST['name'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = date('Y-m-d');
  $file = 


  /*
  include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";

  $username = $_POST['name'];
  $userpw = password_hash($_POST['pw'],PASSWORD_DEFAULT);
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = date('Y-m-d');
  if(isset($_POST['lock_post'])){
      $lock_post = 1;
  }else{
      $lock_post = 0;
  }
  //print_r($_FILES['b_file']);
  $org_name = $_FILES['b_file']['name'];
  //$file_name = iconv('EUC-KR', 'UTF-8', $org_name);
  $tmpfile_path = $_FILES['b_file']['tmp_name'];
  $upload_path = "../../upload/".$org_name;
  $file_type =$_FILES['b_file']['type'];

  if(strpos($file_type,'image') >= 0) {$is_img = 1;} else{ $is_img = 0;}

  move_uploaded_file($tmpfile_path, $upload_path);

  $sql = "INSERT INTO board (name,pw,title,content,date,lock_post,file,is_img) 
  VALUES ('{$username}','{$userpw}','{$title}', '{$content}','{$date}','{$lock_post}','{$org_name}','{$is_img}')";

  if($conn->query($sql) === true){
      echo "<script>
          alert('글쓰기가 완료되었습니다.');
          location.href = '../../index.php';</script>";
  }else{
      echo "<script>
          alert('글쓰기 실패');
          location.href = '../../index.php';</script>";
  }

  $conn->close();
  */


?>