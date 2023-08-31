<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

  /* 페이지네이션 */
  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = $_GET['pageCount'] ?? 10;
  $statLimit = ($pageNumber-1)*$pageCount; // (1-1)*10 = 0, (2-1)*10 = 10
  $endLimit = $pageCount;
  $firstPageNumber = $_GET['firstPageNumber'] ?? 0 ;

  //전체 게시물 수 구하기  
  $pagesql = "SELECT COUNT(*) as cnt from notice";
  $page_result = $mysqli->query($pagesql);
  $page_row = $page_result->fetch_object();
  $row_num = $page_row->cnt; //전체 게시물 수
  //echo $row_num;

  $block_ct = 5; // 1,2,3,4,5  / 5,6,7,8,9 
  $block_num = ceil($pageNumber/$block_ct);//pageNumber 1,  9/5 1.2 2
  $block_start = (($block_num -1)*$block_ct) + 1;//page6 start 6
  $block_end = $block_start + $block_ct -1; //start 1, end 5

  $total_page = ceil($row_num/$pageCount); //총 게시물수, 52/5
  if($block_end > $total_page) $block_end = $total_page;
  $total_block = ceil($total_page/$block_ct);//총32, 2
  /* /페이지네이션 */

  /* 페이지 내 검색 */
  $title = $_GET['title'] ?? '';
  $content = $_GET['content'] ?? '';
  $seach = $_GET['seach'] ?? '';
  $search_where = '';
  $search_keyword = $title.$content;

  if($search_keyword){
    $search_where .= " and cate like '{$search_keyword}%'";
  }
  if($seach){
    $search_where .= " and (title like '%{$seach}%' or content like '%{$seach}%')";
    //제목과 내용에 키워드가 포함된 상품 조회
  }
  /* /페이지 내 검색 */

  $sql = "SELECT * from notice where 1=1" ; // and 컬러명=값 and 컬러명=값 and 컬러명=값 

  $sql .= $search_where;
  $order = " order by idx desc";//최근순 정렬
  $limit = " limit $statLimit, $endLimit";

  $query = $sql.$order.$limit; //쿼리 문장 조합
  // var_dump($query);
  
  $result = $mysqli -> query($query); 
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }
?>

<link rel="stylesheet" href="/attention/admin/css/notice.css">

<div class="notice">
  <h2 class="tt_01 text-center">게시판</h2>

  <div class="d-flex mt-5 align-items-center justify-content-between">
    <div class="select">
      <select name="select" id="select">
        <option value="1" disabled>자유게시판</option>
        <option value="2" selected>공지사항</option>
        <option value="3" disabled>FAQ</option>
        <option value="4" disabled>Q&amp;A</option>
      </select>
    </div>

    <div class="d-flex">   
      <form action="" id="search_form">
        <div class="seach mx-4">
          <input type="text" name="seach" id="seach" class="form-control" placeholder="제목 및 내용 입력">
          <button type="submit"><i class="bi bi-search icon_gray"></i></button>
        </div>
      </form>    
      <a class="btn btn-primary" href="/attention/admin/notice/notice_write.php">글 작성</a>
    </div>
  </div>

  <form action="">
    <table class="table mt-4">
      <thead>
        <tr class="board_hd text1 text-center">
          <th scope="col" class="col-1">No&#46;</th>
          <th scope="col" class="col-7">제목</th>
          <th scope="col">작성일</th>
          <th scope="col">수정 &#47; 삭제</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($rsc)){
            foreach($rsc as $item){            
        ?>
        <!-- 게시물 생성 -->
        <tr class="board_bd">
          <td class="text-center"><?= $item -> idx; ?></td>
          <td><a href="" class="a_link"><?= $item -> title; ?></a></td>
          <td class="text-center"><?= $item -> date; ?></td>
          <td class="text-center">
            <a href="/attention/admin/notice/notice.modify.php"><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button" class="del_btn"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <?php
          } //foreach
        } else {    
        ?>  
        <tr>
          <td>조회 결과가 없습니다.</td>
        </tr>
        <?php
          }  
        ?>  
        <!-- /게시물 생성 -->
      </tbody>
    </table>

    <nav aria-label="페이지네이션" class="space">
      <ul class="pagination justify-content-center align-items-center">
        <?php
          if($pageNumber>1){                   
              echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?pageNumber=1\"><i class=\"bi bi-chevron-double-left icon_gray\"></i></a></li>";
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
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$total_page\" class=\"page-link\"><i class=\"bi bi-chevron-double-right icon_gray\"></i></a></li>";
          }
        ?>  
      </ul>
    </nav>

  </form>
</div><!-- /notice -->



<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>