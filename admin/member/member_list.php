<?php
  $member_css = '<link rel="stylesheet" href="/attention/admin/css/member.css">';
  $title = '회원 관리 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';

  /* 페이지네이션 */
  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = $_GET['pageCount'] ?? 10;
  $statLimit = ($pageNumber-1)*$pageCount; // (1-1)*10 = 0, (2-1)*10 = 10
  $endLimit = $pageCount;
  $firstPageNumber = $_GET['firstPageNumber'] ?? 0 ;

  /* 페이지 내 검색 */
  $title = $_GET['userid'] ?? '';
  $content = $_GET['username'] ?? '';
  $search = $_GET['search'] ?? '';
  $search_where = '';
  $search_keyword = $title.$content;

  if($search_keyword){
    $search_where .= " and cate like '{$search_keyword}%'";
  }
  if($search){
    $search_where .= " and (username like '%{$search}%' or userid like '%{$search}%')";
  }
  /* /페이지 내 검색 */

  //전체 게시물 수 구하기  
  $pagesql = "SELECT COUNT(*) AS cnt FROM members WHERE 1=1".$search_where;
  $page_result = $mysqli->query($pagesql);
  $page_row = $page_result->fetch_object();
  $row_num = $page_row->cnt; //전체 게시물 수

  $block_ct = 5; // 1,2,3,4,5  / 5,6,7,8,9 
  $block_num = ceil($pageNumber/$block_ct);//pageNumber 1,  9/5 1.2 2
  $block_start = (($block_num -1)*$block_ct) + 1;//page6 start 6
  $block_end = $block_start + $block_ct -1; //start 1, end 5

  $total_page = ceil($row_num/$pageCount); //총 게시물수, 52/5
  if($block_end > $total_page) $block_end = $total_page;
  $total_block = ceil($total_page/$block_ct);//총32, 2
  /* /페이지네이션 */

  $sql = "SELECT * FROM members WHERE 1=1";

  $sql .= $search_where;
  $order = " order by regdate desc";
  $limit = " limit $statLimit, $endLimit";

  $query = $sql.$order.$limit;
  
  $result = $mysqli -> query($query); 
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }
?>


<div class="member">
  <h2 class="tt_01 text-center">회원 목록</h2>
    <div class="d-flex justify-content-end">
        <form action="member_list.php" id="search_form">
          <div class="seach mx-4 d-flex">
            <input type="text" name="search" id="search" class="form-control" placeholder="이름 및 아이디 입력">
            <button type="submit"><i class="bi bi-search icon_gray"></i></button>
          </div>
        </form>
    </div>

    <form action="member_list.php">
      <table class="table mt-4">
        <thead>
          <tr class="board_hd text1 text-center">
            <th scope="col" class="col-2">이름</th>
            <th scope="col" class="col-2">ID</th>
            <th scope="col" class="col-5">EMAIL</th>
            <th scope="col" class="col-2">가입 날짜</th>
            <th scope="col" class="col-1">상태</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(isset($rsc)){
              foreach($rsc as $item){
          ?>
          <!-- 게시물 출력 -->
          <tr class="board_bd">
            <td class="text-center"><?= $item -> username; ?></td>
            <td class="text-center"><?= $item -> userid; ?></td>
            <td class="text-center"><?= $item -> useremail; ?></td>
            <td class="text-center"><?= $item -> regdate; ?></td>
            <td class="text-center"><?= $item -> status; ?></td>
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

<script>
  $('.member_menu').css({backgroundColor: "#252a38"});
  $('.member_menu').find('a').css({color: 'white'});
</script>


<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>