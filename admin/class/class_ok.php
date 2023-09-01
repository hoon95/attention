<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
// $cates1 = $_GET['cate1'] ?? '';
// $cate2 = $_GET['cate2'] ?? '';
// $cate3 = $_GET['cate3'] ?? '';

$name = $_POST['name'] ?? '';
$level = $_POST['level'];
$price = $_POST['price'] ?? '';
$sale_end_date = $_POST['sale_end_date'];
$video = $_POST['video'];
$status = $_POST['status'] ?? 0;
$thumbnail = ''; // 썸네일 변수 초기화
$status = $_POST['status']; // 현재 날짜 및 시간으로 설정

$content =  rawurldecode($_POST['content']);
// 추가 이미지도 해야 함 

if($_FILES['thumbnail']['name']){
  if(strpos($_FILES['thumbnail']['type'], 'image') === false){
    echo "<script>
          alert('이미지만 첨부할 수 있습니다.');    
          history.back();            
        </script>";
        exit;
  }
  if($_FILES['thumbnail']['size'] > 10240000){
    echo "<script>
      alert('10MB 이하만 첨부할 수 있습니다.');
      history.back();
    </script>";
  }
}
      $save_dir = $_SERVER['DOCUMENT_ROOT']."/attention/pdata/";
      $filename = $_FILES['thumbnail']['name']; //insta.jpg
      $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
      $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015
      $thumbnail = $newfilename.".".$ext; //20238171184015.jpg


      if(move_uploaded_file(isset($_FILES['thumbnail']['tmp_name']), $save_dir.$thumbnail)){  
        $thumbnail = "/attention/pdata/".$thumbnail;
      } else{
        echo "<script>
          alert('이미지등록 실패!');    
          history.back();            
        </script>";
      }

$sql = "INSERT INTO class (name, content, thumbnail, price, level, video, sale_end_date, reg_date, status) 
 VALUES ('{$name}', '{$content}', '{$thumbnail}', '{$price}', {$level}, '{$video}', '{$sale_end_date}', now(), {$status})";
//  var_dump($sql)
$result = $mysqli -> query($sql);

if($result){
    echo "<script>
          alert('강좌가 등록되었습니다.');
          location.href ='attention/admin/class/class.php';
          </script>";
}{
  echo "<script>
          alert('강좌가 등록되지 않았습니다.');
          history.back();
          </script>";
}

?>