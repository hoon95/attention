<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
  
  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = $_GET['pageCount'] ?? 5;
  $table = "class";
  $title = "name";
  $content = "content";

  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/pagenation.php';  

  //검색 시작
  $search_form = $_GET['search'] ?? '';
  $search_where = '';
  if($search){
    $search_where .= " and (name like '%{$search}%' or content like '%{$search}%')";
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
          <input type="text" name="search" id="search" class="form-control">
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
        <tr class="white_back d-flex">
          <td class="class_list_img d-flex align-items-center class_list_item" data-pid="<?= $item->pid ?>">
            <img src="../../pdata/class<?= $item->thumbnail ?>" alt="thumbnail image">
          </td>
          <td class="d-flex flex-column justify-content-between class_sm_mtb flex-grow-1 class_list_item" data-pid="<?= $item->pid ?>">
            <div>
              <span class="text2"><?= $item->name ?></span><span class="class_level_tag orange"><?php if($item->level==1){echo "초급";} if($item->level==2){echo "중급";} if($item->level==3){echo "상급";} ?></span>
            </div>
            <div class="class_p_val"><?php if($item->price==1){echo "{$item->price_val}원";} ?><?php if($item->price==0){echo "무료";} ?></div>
            <div>
              <span class="text4 fw-bold">수강기한</span><span class="class_date_tag orange"><?php if($item->sale_end_date==1){echo "{$item->sale_end_date}개월";} if($item->sale_end_date==0){echo "무제한";} ?></span>
            </div>
          </td>
          <td class="class_button">
            <div class="form-check form-switch d-flex justify-content-end">
              <input class="form-check-input status" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="<?= $item->status ?>"
              <?php if($item->status){ echo "checked"; } ?> name="status[<?php echo $item->pid ?>]" id="status[<?php echo $item->pid ?>]" data-pid="<?= $item->pid ?>">
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
    <nav aria-label="페이지네이션" class="space">
      <ul class="pagination justify-content-center align-items-center">
        <?php
          if($pageNumber>1){                   
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?pageNumber=1&search={$search}\"><i class=\"bi bi-chevron-double-left icon_gray\"></i></a></li>";
              if($block_num > 1){
                  $prev = ($block_num - 2) * $block_ct + 1;
                  echo "<li class=\"page-item\"><a href='?pageNumber={$prev}&search={$search}' class=\"page-link\"><i class=\"bi bi-chevron-left icon_gray\"></i></a></li>";
              }
          }
          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?pageNumber={$i}\" class=\"page-link\">{$i}</a></li>";
            }else{
                echo "<li class=\"page-item\"><a href=\"?pageNumber={$i}&search={$search}\" class=\"page-link\">{$i}</a></li>";
            }
          }
          if($pageNumber<$total_page){
            if($total_block > $block_num){
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"?pageNumber={$next}&search={$search}\" class=\"page-link\"><i class=\"bi bi-chevron-right icon_gray\"></i></a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"?pageNumber={$total_page}&search={$search}\" class=\"page-link\"><i class=\"bi bi-chevron-double-right icon_gray\"></i></a></li>";
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
      let pid = $(this).data('pid');
      window.location.href = 'class_view.php?pid=' + pid;
    });
    
    //   if(check_value.prop('checked')){//체크해서 활성되면
    //     check_value.val('1');data-pid
    //   } else{
    //     check_value.val('0');
    //   }
    
    
    $('input[type="checkbox"]').change(function(){
      if(confirm('상태를 변경하시겠습니까?')){
        let check_value = $(this).prop('checked') ? 1 : 0;
        let pcode = $(this).data('pid');

      $.ajax({
            url: 'clist_update.php',
            type : 'POST',
            data: {pcode:pcode, check_value:check_value},
            success : function(response){
              alert(response);
            },
            error: function(xhr, status, error){
              console.log(xhr.responseText);
              alert('서버 요청 실패!');
      }});
        } else{
              $(this).prop('checked', !$(this).prop('checked'));
              }
    });

    $('.delete_btn').click(function(e){
      e.preventDefault();
      if(confirm('정말 삭제하시겠습니까?')){
        window.location = 'class_delete.php?pid=<?php echo $item->pid ?>';
      }else{
        alert('삭제되었습니다.');
      }
    })
  </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>