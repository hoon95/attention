<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';
  //관리자 인지 검사
  if(!isset($_SESSION['AUID'])){  //admin id가 없다면 관리자가 아니란 얘기.
    echo "<script>
      alert('권한이 없습니다.');
      history.back();
    </script>";
  }


$mode = $_REQUEST['mode']?:'';
if (in_array($mode, array("add", "edit")))
{
  $mysqli -> autocommit(FALSE);  //커밋이 안되도록 지정, 일단 바로 저장하지 못하도록(트랜젝션 효과)
  try {  //트랜젝션

  //print_r($_POST);  //우리가 입력한 data들이 잘 넘어오는지 우선 확인하자.
  //print_r($_FILES);  //첨부파일(썸네일 등)의 경우, 이렇게 확인해야 한다.

    $name = $_POST['name'];  //제품명은 필수값이기에 그대로.
    $sub_name = $_POST['sub_name']?: '';
    $level = $_POST['level']?: 0;
    $teacher = $_POST['teacher']?: '';
    $sale_end_date = $_POST['sale_end_date']?: '0';
    $date_val = $_POST['date_val']?: '0';
    $promotion = $_POST['promotion']?: '';

    $isnew = $_POST['isnew']?:0;
    $isbest = $_POST['isbest']?:0;
    $isrecom = $_POST['isrecom']?:0;

    $cate1 = $_POST['cate1']?:'';
    $cate2 = $_POST['cate2']?:'';
    $cate3 = $_POST['cate3']?:'';
    $cate = $cate1.$cate2.$cate3;
    $student = addslashes(rawurldecode($_POST['student']));  //encodeURLComponent를 통해 변경된 코드를 → 원래 코드로 되돌려주는 함수로 다시 변경.
    $greeting = addslashes(rawurldecode($_POST['greeting']));
    $content = addslashes(rawurldecode($_POST['content']));

    $price = $_POST['price']?:'0';
    $price_val = $_POST['price_val']?:'0';
    $video = htmlspecialchars($_POST['video'], ENT_QUOTES)?:'';
    $curriculum = $_POST['curriculum']?:'';

    //phpmyadmin의 class테이블에서 file_table_id컬럼 추가로 생성한 후, 변수로 잡음.
    $file_table_id = $_POST['file_table_id']?: 0;
    $file_table_id = $_POST['file_table_id'];
    $file_table_id = rtrim($file_table_id, ',');  //최우측 콤마 제거

    if($_FILES['thumbnail']['name']){
      if($_FILES['thumbnail']['size'] > 10240000){
        echo "<script>
          alert('10MB 이하만 첨부할 수 있습니다.');
          history.back();
        </script>";
        exit;
      }

      if(strpos($_FILES['thumbnail']['type'], 'image') === false){
        echo "<script>
          alert('이미지만 첨부할 수 있습니다.');
          history.back();
        </script>";
        exit;
      }

      //파일 업로드 프로세스 그대로 복사 (from. class_save_image.php)
      $save_dir = $_SERVER['DOCUMENT_ROOT']."/attention/pdata/class/";
      $filename = $_FILES['thumbnail']['name'];  //insta.jpg
      $ext = pathinfo($filename, PATHINFO_EXTENSION);  //jpg
      $newfilename = date("YmdHis").substr(rand(), 0,6);  //202309131184018
      $thumbnail = $newfilename.".".$ext;  //202309131184018.jpg

      //이제 임시폴더에 있는 파일을 우리가 원하는 위치로 옮겨주기 ⇒ move_uploaded_file(원위치, 목표위치);
      //move_uploaded_file(temp/insta.jpg, /abcmall/pdata/20230913_1184018.jpg)
      if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $save_dir.$thumbnail)) {  //원하는 위치로 잘 옮겨졌다면
        $thumbnail = "/attention/pdata/class/".$thumbnail;
      } else {
        echo "<script>
          alert('이미지 등록 실패!');
          history.back();
        </script>";
      }

    }  //첨부파일이 있다면 할 일

    if ($mode == "add" || empty($mode))
    {
        //이제 테이블에다 data를 넣으면 되겠어요. (class라는 테이블에다 내용을 넣겠다.)
        //userid와 regdate만 살짝 수정.
        $sql = "INSERT INTO class (name, sub_name, isnew, isbest, isrecom, userid, regdate, level, cate, cate1, cate2, cate3,
            student, teacher, price, price_val, sale_end_date, date_val, thumbnail, greeting, promotion, content,
            video, file_table_id, curriculum)
            VALUES ('{$name}', '{$sub_name}', '{$isnew}', '{$isbest}', '{$isrecom}', '{$_SESSION['AUID']}', now(), '{$level}',
            '{$cate}', '{$cate1}', '{$cate2}', '{$cate3}', '{$student}', '{$teacher}', '{$price}', '{$price_val}',
            '{$sale_end_date}', '{$date_val}', '{$thumbnail}', '{$greeting}', '{$promotion}', '{$content}', '{$video}', '{$file_table_id}',
            '{$curriculum}')";
        $result = $mysqli -> query($sql);  //쿼리 실행
        //cf)쿼리가 실행된 다음에 insert_id가 나오므로 코드 순서 주의! (쿼리를 실행해서 data를 넣은 다음에야 고유번호가 나옴)

        //등록한 글(상품)의 고유번호를 알아야 하기에 그걸 pid라고 하겠다.
        //그럼 class 테이블에도 이 글(상품)이 들어갈 때, 자동으로 매겨지는 고유번호를 pid에 저장할 수 있다.
        //pid가 필요한 이유는? 그래야 나중에 그 번호를 class_image_table의 추가이미지들에 줄 수 있기 때문. (update)
        $pid = $mysqli -> insert_id;  //테이블에 저장되는 값의 고유번호

		


    }
    else if ($mode == "edit")
    {
        $pid = $_POST["pid"];
        $sql = "UPDATE class SET
                    name = '".$name."',
                    sub_name = '".$sub_name."',
                    isnew = '".$isnew."',
                    isbest = '".$isbest."',
                    isrecom = '".$isrecom."',
                    level = '".$level."',
                    cate = '".$cate."',
                    cate1 = '".$cate1."',
                    cate2 = '".$cate2."',
                    cate3 = '".$cate3."',
                    student = '".$student."',
                    teacher = '".$teacher."',
                    price = '".$price."',
                    price_val = '".$price_val."',
                    sale_end_date = '".$sale_end_date."',
                    date_val = '".$date_val."',
                    ".(!empty($thumbnail) ? "thumbnail = '".$thumbnail."'," : "")."
                    greeting = '".$greeting."',
                    promotion = '".$promotion."',
                    content = '".$content."',
                    video = '".$video."',
                    ".(!empty($file_table_id) ? "file_table_id = '".$file_table_id."'," : "")."
                    curriculum ='".$curriculum."'
                WHERE pid = '".$pid."'";
        $result = $mysqli -> query($sql);  //쿼리 실행



    }



      if($result){  //상품이 등록되면(result 값이 있다면 상품등록이 잘 됐다는 얘기.)
      if($file_table_id){
        $updatesql = "UPDATE class_image_table SET pid={$pid} WHERE imgid in ({$file_table_id})";
        $result = $mysqli -> query($updatesql);  //쿼리를 만들었으면 실행.
      }

	  if($_POST['lecture_video']) {
			$q = "delete from class_clips where pid = '".$pid."'";
			$mysqli -> query($q);
	  }

		foreach($_POST['lecture_video'] as $k => $v) {
			if($v) {
				$q = "insert into class_clips set pid = '".$pid."', video_url = '".$v."' , regdate = now()";
				$mysqli -> query($q);

			}
		}


		$mysqli -> commit();  //DB에 커밋한다. (트랜젝션)


			



      if ($mode == "add")
      {
          echo "<script>
          alert('상품 등록 완료!');
          location.href='/attention/admin/class/class_list.php';
          </script>";
      }
      else if ($mode == "edit")
      {
          echo "<script>
          alert('상품 수정 완료!');
          location.href='/attention/admin/class/class_up.php?pid=".$pid."';
          </script>";
      }
    }
  } catch (Exception $e) {
      $mysqli ->rollback();  //저장한 테이블이 있다면 롤백한다.
      echo "<script>
        alert('상품 등록 실패!');
        history.back();
      </script>";
      exit;
    }
}
else if ($mode == "del")
{

    $pid = empty($_GET["pid"]) ? alert("잘못된 접근입니다") : $_GET["pid"];
    $sql = "DELETE FROM class WHERE pid = '".$pid."'";
    $result = $mysqli -> query($sql);  //쿼리를 만들었으면 실행.
    if ($result === false)
    {
        alert("데이터 삭제에 발생했습니다.");
    }

	
	$q = "delete from class_clips where pid = '".$pid."'";
	$result = $mysqli -> query($q);
    if ($result === false)
    {
        alert("데이터 삭제에 발생했습니다.");
    }

    echo "<script>
      alert('정상적으로 삭제되었습니다!');
      location.href='/attention/admin/class/class_list.php';
    </script>";
    exit;

}
 ?>
