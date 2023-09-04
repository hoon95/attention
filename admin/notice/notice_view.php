<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/admin_check.php';

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

<div class="notice_view common_pd">
  <h2 class="tt_01 text-center">게시물 상세보기</h2>

  <table class="mt-5">
    <tbody>
      <tr>
        <th scope="row" class="tt_03">
          제목
        </th>
        <td>
          <div class="board_bd">
            <?= $rs->title; ?>
          </div>
        </td>
      </tr>
      <tr class="space view_bd">
        <th scope="row" class="tt_03">내용</th>
        <td>
          <div class="board_bd">
            <?= $rs->content; ?>
          </div>
        </td>
      </tr>
      <tr class="space">
        <th scope="row" class="tt_03">첨부파일</th>
        <td class="board_bd">
          <div class="box">
            <?php
              $fileExt = pathinfo($rs->file, PATHINFO_EXTENSION); //파일 확장자 가져오기

              //in_array: 값이 배열 안에 존재하는지 확인
              if (in_array($fileExt, ['jpg','jpeg','png','gif','svg','webp'])) {
                echo '<img src="'.$rs->file.'" alt="">'; //이미지 파일인 경우
              } else {
                echo $rs->file; //이미지 파일이 아닌 경우
              }
            ?>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="mt-4 text-end">
    <a href="/attention/admin/notice/notice_modify.php?idx=<?= $rs -> idx; ?>" class="btn btn-primary mx-4">글 수정</a>
    <button type="button" class="btn btn-dark close_btn">닫기</button>
  </div>

</div> <!-- /notice_write -->

<script>
  $('.close_btn').click(function(){
    history.back();
  });
</script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>