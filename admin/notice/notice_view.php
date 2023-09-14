<?php
  $summernote_min_css = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax`/libs/summernote/0.8.20/summernote-bs5.min.css"
  integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />';
  $notice_css = '<link rel="stylesheet" href="/attention/admin/css/notice.css">';
  $title = '공지사항 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';

  $idx = $_GET['idx'];

  $sql = "SELECT hit FROM notice WHERE idx='{$idx}'";
  $result = $mysqli -> query($sql);
  $rs = $result -> fetch_assoc();
  $newhit = $rs['hit'] + 1;
  
  $sql2 = "UPDATE notice SET hit = '{$newhit}' WHERE idx='{$idx}'";
  $result2 = $mysqli -> query($sql2);         
  
  $sql3 = "SELECT * FROM notice WHERE idx='{$idx}'";
  $result3 = $mysqli -> query($sql3); 
  $rs2 = $result3 -> fetch_object();
?>

<!-- include summernote css/js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"
integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="notice_view common_pd">
  <h2 class="tt_01 text-center">공지사항</h2>
  <div class="d-flex justify-content-end mt-5">
    <div class="d-flex align-items-center">
      <p class="text1 me-2">작성일</p>
      <span class="me-5"><?= $rs2->regdate; ?></span>
    </div>
    <div class="d-flex align-items-center">
      <p class="text1 me-2">조회수</p>
      <span class="me-5"><?= $rs2->hit; ?></span>
    </div>
  </div>
  <table>
    <tbody>
      <tr class="space">
        <th scope="row" class="text1">
          제목
        </th>
        <td>
          <div class="board_bd">
            <?= $rs2->title; ?>
          </div>
        </td>
      </tr>
      <tr class="space view_bd">
        <th scope="row" class="text1">내용</th>
        <td>
          <div class="board_bd">
            <?= $rs2->content; ?>
          </div>
        </td>
      </tr>
      <tr class="space">
        <th scope="row" class="text1">첨부파일</th>
        <td class="board_bd">
          <div class="box">
            <?php
              // 파일 경로 가져오기
              $filePath =$rs2->file;

              if (strlen($filePath) > 0) {
                $fileName = basename($filePath); // 파일명만 추출
                $fileExt = pathinfo($filePath, PATHINFO_EXTENSION); // 파일 확장자 가져오기

                // in_array: 값이 배열 안에 존재하는지 확인
                if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'])) {
                  echo '<img src="'.$filePath.'" alt="">'; // 이미지 파일인 경우
                  echo '<a href="'.$filePath.'" download class="d-flex align-items-center mt-2">'.$fileName.'<i class="bi bi-download ms-2"></i></a>';
                } else {
                  // 이미지 파일이 아닌 경우 파일을 다운로드할 수 있는 링크 생성
                  echo '<a href="'.$filePath.'" download>'.$fileName.'<i class="bi bi-download ms-2"></i></a>';
                }
              }
            ?>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="mt-4 text-end">
    <a href="/attention/admin/notice/notice_modify.php?idx=<?= $rs2 -> idx; ?>" class="btn btn-primary mx-4">글 수정</a>
    <button type="button" class="btn btn-dark close_btn">닫기</button>
  </div>
</div> <!-- /notice_write -->

<script>
  $('.board_menu').css({backgroundColor: "#252a38"});
  $('.board_menu').find('a').css({color: 'white'});
  $('.close_btn').click(function(){
    history.back();
  });
</script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>