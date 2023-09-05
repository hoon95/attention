<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

// $cates1 = $_GET['cate1'] ?? '';
// $cate2 = $_GET['cate2'] ?? '';
// $cate3 = $_GET['cate3'] ?? '';
$status = $_GET['status'] ?? '';

// 이미지 등록 시작
//이미지를 업로드할 디렉토리 경로
$uploadDir = '../../pdata/class/';

//업로드할 파일의 최대 크기 (바이트)
$maxFileSize = 10 * 1024 * 1024; //10MB

//허용되는 파일 확장자
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

//에러 메시지 배열 초기화
$errors = [];

if ($_SERVER['REQUEST_METHOD']  === 'POST') {
  //파일이 제대로 전송되었는지 확인
  if (isset($_FILES['thumbnail']) || $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
    //파일 정보 가져오기
    $fileName = $_FILES['thumbnail']['name'];
    $fileSize = $_FILES['thumbnail']['size'];
    $fileTmpName = $_FILES['thumbnail']['tmp_name'];
    $fileType = $_FILES['thumbnail']['type'];

    //파일 확장자 확인
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
      $errors[] = "허용되지 않는 파일 확장자입니다.";
    }

    //파일 크기 확인 
    if ($fileSize > $maxFileSize) {
      $errors[] = "파일 크기가 허용 범위를 초과했습니다.";
    }

    // 에러가 없다면 파일 저장
    if (empty($errors)) {
      $newFileName = uniqid() . '.' . $fileExtension;  //고유 파일명 생성 
      $uploadPath = $uploadDir . $newFileName;
      if (move_uploaded_file($fileTmpName, $uploadPath)) {
        echo "파일이 성공이 업로드되었습니다.";
      } else {
        $errors[] = "파일을 업로드 하는 중에 오류가 발생했습니다";
      }
    }
  } else {
    $errors[] = "파일 업로드 중 오류가 발생했습니다.";
  }
}

// 에러 메시지 출력
if (!empty($errors)) {
  foreach ($errors as $error) {
    echo $error . "<br>";
  }
}
// 이미지 등록 끝

  //pagenation 시작
  $pagenationTarget = 'class';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/pagenation.php';  
  //pagenation 끝

  //검색 시작
  $search_form = $_GET['search_form'] ?? '';
  $search_where = '';
  if($search_form){
    $search_where .= " and (name like '%{$search_form}%' or content like '%{$search_form}%')";
    //제목과 내용에 키워드가 포함된 상품 조회
  }
  //검색 끝

$sql = "SELECT * from class where 1=1";//1=1까지 쓰는 이유는 where절 사용 위해
$sql .= $search_where;
  $order = " order by pid desc";//최근순 정렬
  $limit = " limit $statLimit, $endLimit";

  $query = $sql.$order.$limit; //쿼리 문장 조합

$result = $mysqli -> query($query);
  
  while($rs = $result -> fetch_object()){
    $rc[] = $rs;
  }  
  ?>
<link rel="stylesheet" href="/attention/admin/css/class_list.css">
<p class="tt_01 class_ss_mt class_m_pd text-center">강좌리스트</p>

  <!-- 카테고리 관리 & 검색 form -->
  <form action="">
    <div class="d-flex justify-content-between class_sm_m">
      <span class="btn btn-primary">카테고리 관리</span>
      <a href="class_up.php" class="btn btn-primary">강좌 등록</a> 
    </div>
    <div class="d-flex justify-content-between class_sm_m">
      <span>
        <span class="select">
          <select name="select" class="select_from"> 
            <option selected disabled>대분류</option>
            <!-- <option value="1">대분류</option> -->
          </select>
        </span>
        <span class="select class_ss_ml">
          <select name="select" class="select_from">
            <option selected disabled>중분류</option>
            <!-- <option value="1">중분류</option> -->
          </select>
        </span>
        <span class="select class_ss_ml">
          <select name="select" class="select_from">
            <option selected disabled>소분류</option>
            <!-- <option value="1">소분류</option> -->
          </select>
        </span>
      </span>
      <span>
        <span class="seach">
          <input type="text" name="search_form" id="search_form" class="form-control">
          <button type="button"><i class="bi bi-search icon_gray"></i></button>
        </span>
        <button class="btn btn-primary class_ssm_ml">검색</button>
      </span>
    </div>

  </form>
  <!-- /카테고리 관리 & 검색 form -->
  <!-- 강좌 리스트 -->
  <form action="" method="GET">
    <table class="table class_table">
      <tbody>
        <?php 
          foreach($rc as $item){
        ?>
        <tr class="white_back d-flex class_list_item">
          <td class="class_list_img d-flex align-items-center">
            <img src="../../pdata/class<?= $item->thumbnail ?>" alt="thumbnail image">
          </td>
          <td class="d-flex flex-column justify-content-between class_sm_mtb flex-grow-1">
            <div>
              <span class="text2"><?= $item->name ?></span><span class="class_level_tag orange"><?php if($item->level==1){echo "초급";} if($item->level==2){echo "중급";} if($item->level==3){echo "상급";} ?></span>
            </div>
            <div class="class_p_val"><?= $item->price ?>원</div>
            <div>
              <span class="text4 fw-bold">수강기한</span><span class="class_date_tag orange"><?= $item->sale_end_date ?>개월</span>
            </div>
          </td>
          <td class="class_button">
            <div class="form-check form-switch d-flex justify-content-end">
              <input class="form-check-input status" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="<?= $item->status ?>"
              <?php if($item->status){ echo "checked"; } ?> name="status[<?php echo $item->pid ?>]" id="status[<?php echo $item->pid ?>]">
            </div>
            <div>
              <a href="class_modify.php?pid=<?= $item->pid ?>"><i class="bi bi-pencil-square icon_mint"></i></a>
              <a href="class_delete.php?pid=<?= $item->pid ?>" class="class_delete delete_btn"><i class="bi-trash-fill icon_red"></i></a>
            </div>
          </td>
        </tr>
        <?php
            }
        ?>
      </tbody>
    </table>
    <!-- /강좌 리스트 -->
    <!-- pagenation -->
    <nav aria-label="pagenation">
      <ul class="pagination justify-content-center align-items-center">
      <?php
          if($pageNumber>1){                   
              echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?pageNumber=1\"><i class=\"bi bi-chevron-left icon_gray\"></i></a></li>";
              if($block_num > 1){
                  $prev = ($block_num - 2) * $block_ct + 1;
                  echo "<li class=\"page-item\"><a href='?pageNumber=$prev' class=\"page-link\"><i class=\"bi bi-chevron-left icon_gray\"></i></a></li>";
              }
          }
          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }else{
                echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }
          }
          if($pageNumber<$total_page){
            if($total_block > $block_num){
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\"><i class=\"bi bi-chevron-right icon_gray\"></i></a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$total_page\" class=\"page-link\"><i class=\"bi bi-chevron-right icon_gray\"></i></a></li>";
          }
        ?>   
      </ul>
    </nav>        
    <!-- /pagenation -->
  </form>
  <script>
      $( function() {
      $( ".select_from" ).selectmenu();
    } );

    $('.class_list_item').click(function(e){
      e.preventDefault();
      window.location.href = 'class_view.php?pid=<?php echo $item->pid ?>';
    });

    $('input[type="checkbox"]').click(function(){
      let check_value = $(this);
      let pcode = <?= $item->pid ?>;
      if(check_value.prop('checked')){//체크해서 활성되면
        check_value.val('1');
      } else{
        check_value.val('0');
      }
      let data = {
      check_value:check_value,
      pcode:pcode
    }

      $.ajax({
            url: '/admin/class/class_view.php',
            data : data,  
            type : 'REQUEST',
            contentType : false,
            processData: false,
            success : function(ret) {
              console.log(ret);
            }
          });
    });

    $('.delete_btn').click(function(e){
      e.preventDefault();
      if(confirm('삭제하시겠습니까?')){
        window.location = 'class_delete.php?pid=<?php echo $item->pid ?>';
      }else{
        alert('삭제 취소되었습니다');
      }
    })
  </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>