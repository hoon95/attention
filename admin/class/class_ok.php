<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
// $cates1 = $_GET['cate1'] ?? '';
// $cate2 = $_GET['cate2'] ?? '';
// $cate3 = $_GET['cate3'] ?? '';

// 관리자 검사
if(!isset($_SESSION['AUID'])){
  echo "<script>
  alert('권한이 없습니다');
  history.back();
  </script>";
}


$name = $_POST['name'] ?? '';
$level = $_POST['level'] ?? '';
$price = $_POST['price'] ?? '';
$price_val = $_POST['price_val'] ?? '';
$sale_end_date = $_POST['sale_end_date'] ?? '';
$date_val = $_POST['date_val'] ?? '';



$thumbnail = ''; // 썸네일 변수 초기화
$status = $_POST['status'] ?? 0;
$filename = '';

$content =  rawurldecode($_POST['content']);

if(isset($_POST['file_table_id'])){
  $file_table_id = $_POST['file_table_id']??'';

  $file_table_id = rtrim($file_table_id, ',');//최우측 콤마 제거
 var_dump($file_table_id);

}
if(isset($_FILES['thumbnail']['name'])){
  if(isset($_FILES['thumbnail']['size']) > 10240000){
    echo "<script>
      alert('10MB 이하만 첨부할 수 있습니다.');
      history.back();
    </script>";
  }
  if(strpos($_FILES['thumbnail']['type'], 'image') === false){
    echo "<script>
          alert('이미지만 첨부할 수 있습니다.');    
          history.back();            
        </script>";
        exit;
  }
  
    $save_dir = $_SERVER['DOCUMENT_ROOT']."/attention/pdata/class/";
      $filename = $_FILES['thumbnail']['name']; //insta.jpg
      $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
      $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015
      $thumbnail = $newfilename.".".$ext; //20238171184015.jpg
      if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $save_dir.$thumbnail)){  
        $thumbnail = "/".$thumbnail;
      } else{
        echo "<script>
          alert('파일 첨부 실패!');    
          history.back();            
        </script>";
      }

  
}
      
      

$sql = "INSERT INTO class (name, content, thumbnail, price, price_val, level, sale_end_date, date_val, regdate, status, file_table_id) 
 VALUES ('{$name}', '{$content}', '{$thumbnail}', '{$price}', '{$price_val}', {$level}, '{$sale_end_date}', '{$date_val}', now(), {$status}, '{$file_table_id}')";
//  var_dump($sql);
$result = $mysqli -> query($sql);
$pid = $mysqli -> insert_id; //테이블에 저장되는 값의 고유 번호





if($result){ //상품이 등록되면
  if(isset($_POST['file_table_id'])){//추가 이미지가 있으면 class_image_table pid 업데이트
    $updatesql = "UPDATE class_image_table SET pid={$pid} WHERE imgid IN ({$file_table_id})";
    $result2 = $mysqli -> query($updatesql);
  }
  echo "<script>
          alert('작성 완료되었습니다.');
          location.href ='/attention/admin/class/class_list.php';
          </script>";
 } else {

echo "<script>
          alert('작성 실패!');
          history.back();
          </script>";
         
 }


?>