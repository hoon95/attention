<?php
  $sales_css = '<link rel="stylesheet" href="/attention/admin/css/sales.css">';
  $title = '매출 관리 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';

  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = $_GET['pageCount'] ?? 10;
  $table = "sales";
  $title = "name";
  $content = "userid";

  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/pagenation.php';

?>



<div class="sales">
  <h2 class="tt_01 text-center">매출 관리</h2>
    <div class="d-flex justify-content-end">
        <form action="sales_list.php">
          <div class="seach mx-4 d-flex">
            <input type="text" name="search" id="search" class="form-control" placeholder="강좌명 및 아이디 입력">
            <button type="submit"><i class="bi bi-search icon_gray"></i></button>
          </div>
        </form>
    </div>

    <form action="sales_list.php">
      <table class="table mt-4">
        <thead>
          <tr class="board_hd text1 text-center">
            <th scope="col" class="col-3">강좌명</th>
            <th scope="col" class="col-3">ID</th>
            <th scope="col" class="col-3">금액</th>
            <th scope="col" class="col-3">신청 날짜</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(isset($rsc)){
              foreach($rsc as $item){            
          ?>
          <!-- 게시물 출력 -->
          <tr class="board_bd">
            <td class="text-center"><?= $item -> name; ?></td>
            <td class="text-center"><?= $item -> userid; ?></td>
            <td class="text-center number"><?= $item -> price; ?></td>
            <td class="text-center"><?= $item -> regdate; ?></td>
          </tr>
          <?php
            }
          } else {    
          ?>  
          <tr>
            <td colspan="12" class="text-center board_bd">조회 결과가 없습니다.</td>
          </tr>
          <?php
            }  
          ?>
        </tbody>
      </table>
  
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
    </form>
</div>

<script src="/attention/admin/js/jquery.number.min.js"></script>
<script>
  $('.number').number(true);
  $('.sales_menu').css({backgroundColor: "#252a38"});
  $('.sales_menu').find('a').css({color: 'white'});
</script>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>