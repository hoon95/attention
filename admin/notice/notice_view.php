<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

  $idx = $_GET['idx'];

  $sql = "SELECT * FROM notice WHERE idx='{$idx}'";
  $result = $mysqli -> query($sql);
  $rs = $result -> fetch_object();
?>

<!-- include summernote css/js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/attention/admin/css/notice.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"
integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="notice_write common_pd">
  <h2 class="tt_01 text-center">게시물 상세보기</h2>

  <table class="mt-5">
    <tbody>
      <tr>
        <th scope="row" class="tt_03">
          <label for="title">제목</label>
        </th>
        <td>
          <?= $rs->title; ?>
        </td>
      </tr>
      <tr class="space">
        <th scope="row" class="tt_03">내용</th>
        <td>
          <?= $rs->content; ?>
        </td>
      </tr>
      <tr class="space">
        <th scope="row" class="tt_03">첨부파일</th>
        <td>
          <?= $rs->file; ?>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="mt-5 text-end">
    <a href="/attention/admin/notice/notice_modify.php?idx=<?= $rs -> idx; ?>" class="btn btn-primary mx-4">글 수정</a>
    <a href="/attention/admin/notice/notice.php" class="btn btn-dark">닫기</a>
  </div>

</div> <!-- /notice_write -->

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>