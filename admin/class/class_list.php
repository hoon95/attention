<?php
  $title = '강좌리스트 - Code Rabbit';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
  
  $query0 = "SELECT * FROM category WHERE step=1";
  $result0 = $mysqli -> query($query0);
  while($rs0 = $result0 -> fetch_object()){
    $cate1[] = $rs0;
  }


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
<link rel="stylesheet" href="/attention/admin/css/category.css">
<link rel="stylesheet" href="/attention/admin/css/class_list.css">
<style> #pcode3_1-button {font-weight: 400; color: var(--gray);} </style>
<p class="tt_01 class_ss_mt class_m_pd text-center">강좌리스트</p>

  <!-- 카테고리 관리 & 검색 form -->
  <form action="">
    <div class="d-flex justify-content-between class_sm_m">
      <a href="/attention/admin/category/category.php" class="btn btn-primary">카테고리 관리</a>
      <a href="class_up.php" class="btn btn-primary">강좌 등록</a> 
    </div>
    <div class="d-flex justify-content-between class_sm_m">
      <span>
        <span class="select cate_section">
          <select name="select" class="select_from cate_large" id="pcode2_1"> 
            <option selected disabled>대분류</option>
            <!-- <option value="1">대분류</option> -->
            <?php foreach($cate1 as $c){ ?>
              <option value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></option>
            <?php } ?>
          </select>
        </span>
        <span class="select class_ss_ml cate_section">
          <select name="select" class="select_from" id="pcode3">
            <option selected disabled>중분류</option>
            <!-- <option value="1">중분류</option> -->
          </select>
        </span>
        <span class="select class_ss_ml cate_section">
          <select name="select" class="select_from" id="pcode3_1">
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
      </span>
    </div>

  </form>
  <!-- /카테고리 관리 & 검색 form -->
  <!-- 강좌 리스트 -->

    <table class="table class_table">
      <tbody>
        <?php 
        if(isset($rc)){
        
          foreach($rc as $item){
        ?>
        <tr class="white_back d-flex">
          <td class="class_list_img d-flex align-items-center class_list_item" data-pid="<?= $item->pid ?>">
            <img src="<?= $item->thumbnail ?>" alt="thumbnail image">
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
              <!-- <a href="class_delete.php?pid=<?= $item->pid ?>" class="class_delete"><i class="bi-trash-fill icon_red"></i></a> -->
              <form method="post" action="class_delete.php">
    <input type="hidden" name="pid" value="<?php echo $item -> pid; ?>">
    <button type="submit" name="confirm_delete" onclick="return confirm('정말 삭제하시겠습니까?')">삭제</button>

              <!-- delete_btn는 기존 스타일 -->
            </div>
          </td>
        </tr>
        <?php
          }
            }else{
              ?>
              <tr>
                <td colspan="3">검색결과가 없습니다.</td>
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

      //카테고리 시작
      $(function(){
    $("select").selectmenu();
      $("select#pcode2_1").on("selectmenuchange", function(event, ui){
      $('#pcode2_1-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });
    $("select#pcode3").on("selectmenuchange", function(event, ui){
      $('#pcode3-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });
    $("select#pcode3_1").on("selectmenuchange", function(event, ui){
      $('#pcode3_1-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });
  
    $("#pcode2_1").on("selectmenuselect", function(event, ui) {
      let data = { 
        cate : $("#pcode2_1").val(),  //대분류의 값이 변경되면  
        step : 2,
        category : '중분류'  
      }

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "../category/printOption.php",
        dataType: 'html',
        success: function(result) {
        $("#pcode3").html(result);  //중분류 div에 html 추가
        $("#pcode3").selectmenu('refresh');
        }
      });
     });  

    $("#pcode3").on("selectmenuselect", function(event, ui) {
      let data = { 
        cate : $("#pcode3").val(),  //대분류의 값이 변경되면  
        step : 3,
        category : '소분류'  
      }

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "../category/printOption.php",
        dataType: 'html',
        success: function(result) {
        $("#pcode3_1").html(result);  //중분류 div에 html 추가
        $("#pcode3_1").selectmenu('refresh');
        }
      });
     });  
    })
     //카테고리 끝
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
      if(confirm('수정하시겠습니까?')){
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


  </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>