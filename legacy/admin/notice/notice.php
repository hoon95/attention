<?php
  $notice_css = '<link rel="stylesheet" href="/attention/admin/css/notice.css">';
  $title = '공지사항 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
  
  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = $_GET['pageCount'] ?? 10;
  $table = "notice";
  $title = "title";
  $content = "content";

  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/pagenation.php';
?>



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
      <form action="notice.php" id="search_form">
        <div class="seach mx-4">
          <input type="text" name="search" id="search" class="form-control" placeholder="제목 및 내용 입력">
          <button type="submit"><i class="bi bi-search icon_gray"></i></button>
        </div>
      </form>
      <a class="btn btn-primary" href="/attention/admin/notice/notice_write.php">글 작성</a>
    </div>
  </div>

  <form action="notice.php">
    <table class="table mt-4">
      <thead>
        <tr class="board_hd text1 text-center">
          <th scope="col" class="col-1">No&#46;</th>
          <th scope="col" class="col-6">제목</th>
          <th scope="col">작성일</th>
          <th scope="col">조회수</th>
          <th scope="col">수정 &#47; 삭제</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($rsc)){
            foreach($rsc as $item){            
        ?>
        <!-- 게시물 출력 -->
        <tr class="board_bd" data-id="<?= $item -> idx; ?>">
          <td class="text-center"><?= $item -> idx; ?></td>
          <td>
            <a href="notice_view.php?idx=<?= $item->idx; ?>" class="a_link">
              <?= $item->title; ?>
              <?php if ($item->file): ?> <!-- 첨부파일이 있는 경우 title에 아이콘 표시 -->
                <i class="bi bi-link-45deg"></i>
              <?php endif; ?>
            </a>
          </td>
          <td class="text-center"><?= $item -> regdate; ?></td>
          <td class="text-center"><?= $item -> hit; ?></td>
          <td class="text-center">
            <a href="notice_modify.php?idx=<?= $item -> idx; ?>">
              <i class="bi bi-pencil-square icon_mint"></i>
            </a>
            <button type="button" class="del_btn">
              <i class="bi bi-trash-fill icon_red"></i>
            </button>
          </td>
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

</div><!-- /notice -->

<script>
  $('.board_menu').css({backgroundColor: "#252a38"});
  $('.board_menu').find('a').css({color: 'white'});
  $( function() {
    $( "#select" ).selectmenu();
  } );

  $('.del_btn').click(function(){
    let notice_idx = $(this).closest('tr').attr('data-id');
    
    if (confirm('정말 삭제하시겠습니까? :0')) {
      // 확인
      let data = {
        idx : notice_idx
      }
      $.ajax({
        async:false,
        type:'post',
        url:'notice_delete.php',
        data: data,
        dataType:'json',
        error:function(error){
          console.log(error);
        },
        success:function(data){
          if(data.result == 'ok'){
            alert('삭제되었습니다 :)');
            location.reload();
          } else{
            alert('삭제 실패.. :(');
          }  
        }
      });
    } else{
      alert('삭제 취소했습니다 :)');
    }
  });
</script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>