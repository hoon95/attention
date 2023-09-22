<?php

	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  $cid = $_GET['cid'];

  $coupon_name = $_POST['coupon_name'];
//   $coupon_image = $_POST["coupon_image"];
  $coupon_price = $_POST["coupon_price"];
  $due = $_POST["due"];


  //기존 이미지가 있는지 쿼리 조회
  $csql = "SELECT * from coupons where cid={$cid}" ;
  $cresult = $mysqli->query($csql);
  $rs = $cresult -> fetch_object();

  if($_FILES['coupon_image']['name']){

    if(isset($rs -> coupon_image )) {  //기존이미지 있다면 //cid에서 img내용이 있는지
      //기존이미지없애라
      $coupon_image = $_SERVER['DOCUMENT_ROOT'].$rs -> coupon_image ;
      unlink( $coupon_image); //이미지 저장 즉, 누적된거 지워져라(새로운거 등록이 되면 그전에 남아있던거 지우는 부분)
    }

    //파일 사이즈 검사
    if($_FILES['coupon_image']['size']> 10240000){
      echo "<script>
        alert('10MB 이하만 첨부할 수 있습니다.');    
        history.back();      
      </script>";
      exit;
    }

    if($_FILES['coupon_image']['size']> 10240000){
      echo "<script>
        alert('10MB 이하만 첨부할 수 있습니다.');    
        history.back();      
      </script>";
      exit;
    }

    //이미지 여부 검사
    if(strpos($_FILES['coupon_image']['type'], 'image') === false){
      echo "<script>
        alert('이미지만 첨부할 수 있습니다.');    
        history.back();            
      </script>";
      exit;
    }

    //파일 업로드
    $save_dir = $_SERVER['DOCUMENT_ROOT']."/attention/pdata/coupon/";
    $filename = $_FILES['coupon_image']['name']; //insta.jpg
    $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
    $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015
    $coupon_image = $newfilename.".".$ext; //20238171184015.jpg


    if(move_uploaded_file($_FILES['coupon_image']['tmp_name'], $save_dir.$coupon_image)){  
      $coupon_image = "/attention/pdata/coupon/".$coupon_image;
    } else{
      echo "<script>
        alert('등록 실패.. :(');    
        history.back();            
      </script>";
    }

    
  $mysqli->autocommit(FALSE);//일단 바로 저장하지 못하도록
  try{

    $sql = "UPDATE coupons set coupon_name='${coupon_name}', coupon_image= '${coupon_image}' , coupon_price= '${coupon_price}' , due= '${due}' where cid='{$cid}'";

    $result =  $mysqli->query($sql);
  

    $mysqli->commit();//디비에 커밋한다.


  
    if($result){
      echo "<script>
      alert('수정 완료되었습니다 :)');
      location.href='coupon_list.php';
      </script>";
    } 
    
  } catch (Exception $e) {
    $mysqli->rollback();//저장한 테이블이 있다면 롤백한다.
      echo "<script>
      alert('수정 실패.. :(');
      // history.back();
      </script>";
  }  

  } 
  //첨부파일 있다면 할일

  else {
    
    $mysqli->autocommit(FALSE);//일단 바로 저장하지 못하도록
    try{

      $sql = "UPDATE coupons set coupon_name='${coupon_name}' , coupon_price= '${coupon_price}' , due= '${due}' where cid='{$cid}'";

      $result =  $mysqli->query($sql);
    

      $mysqli->commit();//디비에 커밋한다.


    
      if($result){
        echo "<script>
        alert('수정 완료되었습니다 :)');
        location.href='coupon_list.php';
        </script>";
      } 
      
    } catch (Exception $e) {
      $mysqli->rollback();//저장한 테이블이 있다면 롤백한다.
        echo "<script>
        alert('수정 실패.. :(');
        // history.back();
        </script>";
    }  

  } //첨부파일 없다면 할일(그래서 이미지 값부분을 지워야함)
    
 
?>