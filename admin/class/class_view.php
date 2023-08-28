<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
?>

<div class="common_pd">
  <div>

</div>
  <h1 class="h1 mt-5 class_m_pd text-center">강좌상세보기</h1>

  <!-- 카테고리 관리 & 검색 form -->
  <table class="table">
      <tbody>
        <tr>
          <td class="class_img">이미지</td>
          <td class="class_title">
            <div class="text1 class_bold class_sm_pd">강좌명</div>
            <div class="text1 class_bold class_sm_pd">난의도</div>
            <div class="text1 class_bold class_sm_pd">공개 여부</div>
            <div class="text1 class_bold">수강기한</div>
          </td>
          <td>
            <div class="text1 class_sm_pd">더미 텍스트</div>
            <div class="text1 class_sm_pd">더미 텍스트</div>
            <div class="text1 class_sm_pd">더미 텍스트</div>
            <div class="text1">더미 텍스트</div>
          </td>
        </tr>
      </tbody>
    </table>
    <hr class="class_hr">
    <table class="table">
      <tbody>
        <tr>
          <td class="class_title">
            <div class="text1 class_bold class_sm_pd">카테고리</div>
            <div class="text1 class_bold class_sm_pd">강좌영상</div>
            <div class="text1 class_bold">강좌소개</div>
          </td>
          <td>

          <div class="text1 class_sm_pd">더미 텍스트</div>
            <div class="text1 class_sm_pd">더미 텍스트</div>
            <div class="text1">더미 텍스트</div>
          </td>
        </tr>
      </tbody>
    </table>

    <hr class="class_hr">  <div class="d-flex justify-content-end">
      <button class="btn btn-dark sm-ml">닫기</button>
    </div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>