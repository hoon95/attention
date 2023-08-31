<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

$name = $_POST['name'] ?? '';
$level = $_POST['level'] ?? '';
$price = $_POST['price'] ?? 0;
$sale_end_date = $_POST['sale_end_date'] ?? '';
$video = $_POST['video'] ?? '';
$status = $_POST['status'] ?? '';
// 썸머노트
$thumbnail = $_POST['thumbnail'] ?? '';
$video = $_POST['video'] ?? '';
// 추가 이미지 

$sql = "insert into class () values()";
?>
<link rel="stylesheet" href="/attention/admin/css/class_up.css">
<div class="common_pd">
          <p class="tt_01 class_ss_mt class_m_pd text-center">강좌 등록</p>
        
          <form action="" method="POST">
            <table class="table">
              <tbody>
                <tr class="class_ss_mb">
                  <th class="tt_03">카테고리</th>
                  <td>
                    <span class="select">
                      <select name="select" class="select_from">
                        <option selected disabled>대분류</option>
                        <!-- <option value="1">대분류</option> -->
                      </select>
                    </span>
                    <span class="select class_ss_ml">
                      <select name="select" class="select_from">
                        <option selected disabled>중분류</option>
                        <!-- <option value="1">중분류</option> -->
                      </select>
                    </span>
                    <span class="select class_ss_ml">
                      <select name="select" class="select_from">
                        <option selected disabled>소분류</option>
                        <!-- <option value="1">소분류</option> -->
                      </select>
                    </span>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">강좌명</th>
                  <td>
                    <input type="text" class="form-control class_form_wd" placeholder="강좌명" name="name">
                  </td>
                </tr>
                </tbody>
            </table>
            <hr class="class_hr">
            <table class="table class_s_mt">
              <tbody>
                <tr>
                  <th class="tt_03">강좌난이도</th>
                  <td>
                    <div class="btn-group">
                      <input type="radio" class="btn-check " name="level" id="level_Beginner" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level1">초급</label>
                      <input type="radio" class="btn-check" name="level" id="level_Intermediate" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level2">중급</label>
                      <input type="radio" class="btn-check" name="level" id="level_Advanced" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level3">상급</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">가격</th>
                  <td>
                    <div class="btn-group">
                      <input type="radio" class="btn-check" name="price" id="price_free" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="price_free">무료</label>
                      <input type="radio" class="btn-check" name="price" id="price_pay" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="price_pay">유료</label>
                    </div>
                    <input type="number" class="form-control class_sform_wd class_sm_ml" placeholder="금액" min="1000" max="1200000" value="1000" step="1000" name="price">
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">수강기한</th>
                  <td class="class_label_h">
                    <div class="btn-group">
                      <input type="radio" class="btn-check" name="sale_end_date" id="unlimited" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="unlimited">무제한</label>
                      <input type="radio" class="btn-check" name="sale_end_date" id="limited" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="limited">제한</label>
                    </div>
                    <input type="number" class="form-control class_sform_wd class_sm_ml" min="1" max="72" value="1" name="sale_end_date">
                    <label class="form-check-label" for="flexSwitchCheckDefault">개월</label>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">강좌영상</th>
                  <td class="class_video d-flex align-items-center">
                    <input type="text" class="form-control class_lform_wd" placeholder="동영상 주소를 입력하세요" name="video">
                    <button><i class="bi bi-plus-circle icon_gray"></i></button>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">공개 여부</th>
                  <td>
                    <div class="btn-group">
                      <input type="radio" class="btn-check" name="status" id="open" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="open">공개</label>
                      <input type="radio" class="btn-check" name="status" id="Private" autocomplete="off">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="Private">비공개</label>
                    </div>
                    </td>
                </tr>
                </tbody>
            </table>
                <hr class="class_hr">
                <table class="table class_s_mt">
              <tbody>
                <tr>
                  <th class="tt_03">강좌소개</th>
                  <td>
                    <!-- summernote -->
                    <div id="class_intro"></div>  
                    <!-- /summernote -->
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">썸네일</th>
                  <td>
                  <input type="file" class="form-control" name="thumbnail">
                  </td>
                </tr>
                <tr>
                  <th class="tt_03" scope="row">추가이미지</th>
                  <td>
                    <div class="class_add_img form-control d-flex justify-content-center align-items-center gray">
                      <span class="text3"><i class="bi bi-upload icon_gray"></i>이곳에 파일을 첨부하세요</span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr class="class_hr">
            <div class="d-flex justify-content-end class_s_mt">
              <button class="btn btn-primary">등록</button>
              <button class="btn btn-dark class_sm_ml">닫기</button>
            </div>            
          </form>
    </div>
    <script>
      // let markupStr = $('#class_intro').summernote('code');
      // let content = encodeURIComponent(markupStr);
      // // $('#content').val(content);

      $( function() {
        $( ".select_from" ).selectmenu();
      } );
      $('#class_intro').summernote({
          height: 400,
        });
    </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>