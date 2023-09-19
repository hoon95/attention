<?php
  $title = '공지사항 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = $_GET['pageCount'] ?? 10;
  $table = "notice";
  $title = "title";
  $content = "content";

  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/pagenation.php';

?>
<link rel="stylesheet" href="/attention/user/css/notice.css">

<main>
  <div class="banner d-flex align-items-center justify-content-center">
    <p class="white tt_01">코드래빗이 전해드리는 소식을 확인해보세요</p>
  </div>
  <section class="container sub_mg_t sub_mg_b">
    <h2 class="tt_01 ms-4">공지사항</h2>
    <form action="notice.php" id="search_form" class="text-end">
      <div class="search col-3">
        <input type="text" name="search" id="search" class="form-control" placeholder="제목 및 내용 입력">
        <button type="submit"><i class="bi bi-search icon_mint"></i></button>
      </div>
    </form>

    <form action="notice.php">
      <!-- <table class="table mt-4"> -->
      <table class="mt-4">
        <thead>
          <tr class="board_hd text1 text-center fw-bold mint_bg_back d-flex align-items-center">
            <th scope="col" class="col-1">No&#46;</th>
            <th scope="col" class="col-7">제목</th>
            <th scope="col" class="col-2">작성일</th>
            <th scope="col" class="col-2">조회수</th>
          </tr>
        </thead>
        <tbody>
          <!-- 게시물 출력 -->
          <?php
            if(isset($rsc)){
              foreach($rsc as $item){            
          ?>
          <tr class="board_bd d-flex align-items-center" data-id="<?= $item -> idx; ?>">
            <td class="text-center col-1"><?= $item -> idx; ?></td>
            <td class="col-7 icon_mint">
              <!-- <a href="notice_view.php?idx=<?= $item->idx; ?>" class="a_link"> -->
              <a href="#">
                <?= $item->title; ?>
                <?php if ($item->file): ?> <!-- 첨부파일이 있는 경우 title에 아이콘 표시 -->
                  <i class="bi bi-link-45deg"></i>
                <?php endif; ?>
              </a>
            </td>
            <td class="text-center col-2"><?= $item -> regdate; ?></td>
            <td class="text-center col-2"><?= $item -> hit; ?></td>
          </tr>
          <?php
            } //foreach
          } else {    
          ?>  
          <tr>
            <td colspan="12" class="text-center board_bd">조회 결과가 없습니다.</td>
          </tr>
          <?php
            }  
          ?>  
          <!-- /게시물 출력 --> 
        </tbody>
      </table>

      <nav aria-label="페이지네이션" class="space">
        <ul class="pagination justify-content-center align-items-center">
          <?php
            if($pageNumber>1){                   
              // echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?pageNumber=1&search={$search}\"><i class=\"bi bi-chevron-double-left icon_gray\"></i></a></li>";
              echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?pageNumber=1&search={$search}\"><i class=\"material-symbols-outlined icon_mint\">first_page</i></a></li>";
                if($block_num > 1){
                  $prev = ($block_num - 2) * $block_ct + 1;
                  // echo "<li class=\"page-item\"><a href='?pageNumber={$prev}&search={$search}' class=\"page-link\"><i class=\"bi bi-chevron-left icon_gray\"></i></a></li>";
                  echo "<li class=\"page-item\"><a href='?pageNumber={$prev}&search={$search}' class=\"page-link\"><i class=\"material-symbols-outlined icon_mint\">chevron_left</i></a></li>";
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
                // echo "<li class=\"page-item\"><a href=\"?pageNumber={$next}&search={$search}\" class=\"page-link\"><i class=\"bi bi-chevron-right icon_gray\"></i></a></li>";
                echo "<li class=\"page-item\"><a href=\"?pageNumber={$next}&search={$search}\" class=\"page-link\"><i class=\"material-symbols-outlined icon_mint\">chevron_right</i></a></li>";
              }
              // echo "<li class=\"page-item\"><a href=\"?pageNumber={$total_page}&search={$search}\" class=\"page-link\"><i class=\"bi bi-chevron-double-right icon_gray\"></i></a></li>";
              echo "<li class=\"page-item\"><a href=\"?pageNumber={$total_page}&search={$search}\" class=\"page-link\"><i class=\"material-symbols-outlined icon_mint\">last_page</i></a></li>";
            }
          ?>  
        </ul>
      </nav>
    </form>
  </section>
</main>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';

?>