<?php
  $summernote_min_css = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
  integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer">';
  $notice_css = '<link rel="stylesheet" href="/attention/admin/css/notice.css">';
  $title = '공지사항 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';

  $idx = $_GET['idx'];

  $sql = "SELECT * FROM notice WHERE idx='{$idx}'";
  $result = $mysqli -> query($sql);
  $rs = $result -> fetch_object();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"
integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="notice_modify common_pd">
  <h2 class="tt_01 text-center">게시물 수정</h2>
  <form action="notice_modify_ok.php?idx=<?= $rs->idx; ?>" method="post" enctype="multipart/form-data" class="write mt-5">
    <table>
      <tbody>
        <tr>
          <th scope="row" class="tt_03">
            <label for="title">제목</label>
          </th>
          <td>
            <input type="text" name="title" id="title" class="form-control" placeholder="제목을 입력하세요." 
            value="<?= $rs->title; ?>" required>
          </td>
        </tr>
        <tr class="space">
          <th scope="row" class="tt_03">내용</th>
          <td>
            <textarea id="notice_content" name="content" required><?= $rs->content; ?></textarea>
          </td>
        </tr>
        <tr class="space">
          <th scope="row" class="tt_03">첨부파일</th>
          <td>
            <input type="file" name="file" id="file" class="form-control" value="<?= $rs->file; ?>">
          </td>
        </tr>
      </tbody>
    </table>
    <div class="mt-4 text-end">
      <button type="submit" class="btn btn-primary mx-4">수정</button>
      <button type="button" class="btn btn-dark close_btn">닫기</button>
    </div>
  </form>
</div> <!-- /notice_write -->

<script>
  $('.board_menu').css({backgroundColor: "#252a38"});
  $('.board_menu').find('a').css({color: 'white'});
  $('#notice_content').summernote({
    height: 500
    // placeholder: '내용을 입력하세요.'
  });

  $('.close_btn').click(function(e){
    e.preventDefault();
    if (confirm('수정 취소하시겠습니까? :0')){
      history.back();
    }
  });

</script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>