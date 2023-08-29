<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
?>

<div class="common_pd">
  <div>
    <h1 class="h1 mt-5 class_m_pd text-center">강좌 등록</h1>
  
    <form action="" method="POST">
      <table class="table">
        <tbody>
          <tr>
            <th class="h3">카테고리</th>
            <td><!-- 카테고리 --></td>
          </tr>
          <tr>
            <th class="h3">강좌명</th>
            <td>
              <input type="text" class="form-control class_form_wd" placeholder="강좌명">
            </td>
          </tr>
          </tbody>
      </table>
          <hr class="class_hr">
          <table class="table">
        <tbody>
          <tr>
            <th class="h3">강좌난이도</th>
            <td>
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn class_btn_bd_color gray">초급</button>
                <button type="button" class="btn class_btn_bd_color gray">중급</button>
                <button type="button" class="btn class_btn_bd_color gray">상급</button>
              </div>
            </td>
          </tr>
          <tr>
            <th class="h3">가격</th>
            <td>
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn class_btn_bd_color gray">무료</button>
                <button type="button" class="btn class_btn_bd_color gray">유료</button>
              </div>
              <input type="number" class="form-control class_price_wd class_sm_ml" placeholder="금액">
            </td>
          </tr>
          <tr>
            <th class="h3">수강기간</th>
            <td class="class_label_h">
              <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button type="button" class="btn class_btn_bd_color gray">무제한</button>
                <button type="button" class="btn class_btn_bd_color gray">제한</button>
              </div>
              <input type="number" class="form-control class_form_wd class_sm_ml">
              <label class="form-check-label" for="flexSwitchCheckDefault">개월</label>
            </td>
          </tr>
          <tr>
            <th class="h3">강좌영상</th>
            <td class="class_video d-flex align-items-center">
              <input type="text" class="form-control class_form_wd" placeholder="동영상 주소를 입력하세요">
              <button><i class="bi bi-plus-circle icon_gray"></i></button>
            </td>
          </tr>
          <tr>
            <th class="h3">공개 여부</th>
            <td>
              <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button type="button" class="btn class_btn_bd_color gray">공개</button>
                <button type="button" class="btn class_btn_bd_color gray">비공개</button>
              </div>
              </td>
          </tr>
          </tbody>
      </table>
          <hr class="class_hr">
          <table class="table">
        <tbody>
          <tr>
            <th class="h3">강좌소개</th>
            <td>
              <!-- summernote -->
              <div id="class_intro"></div>  
              <!-- /summernote -->
            </td>
          </tr>
          <tr>
            <th class="h3">썸네일</th>
            <td>
            <input type="file" class="form-control">
            </td>
          </tr>
          <tr>
            <th class="h3" scope="row">추가이미지</th>
            <td>
              <div class="class_add_img form-control d-flex justify-content-center align-items-center gray">
                <span class="text1">이곳에 파일을 첨부하세요</span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <hr class="class_hr">
      <div class="d-flex justify-content-end">
        <button class="btn btn-primary">등록</button>
        <button class="btn btn-dark class_sm_ml">닫기</button>
      </div>
    </form>
</div>
  <script>
    $('#class_intro').summernote({
        height: 400,
      });
  </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>