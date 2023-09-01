<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

?>
<link rel="stylesheet" href="/attention/admin/css/class_up.css">
<div class="common_pd">
          <p class="tt_01 class_ss_mt class_m_pd text-center">강좌 등록</p>
        
          <form action="class_ok.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="content" id="content" value="">
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
                      <input type="radio" class="btn-check " name="level" id="level_Beginner" autocomplete="off" value="1">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Beginner">초급</label>
                      <input type="radio" class="btn-check" name="level" id="level_Intermediate" autocomplete="off" value="2">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Intermediate">중급</label>
                      <input type="radio" class="btn-check" name="level" id="level_Advanced" autocomplete="off" value="3">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Advanced">상급</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">가격</th>
                  <td>
                    <div class="btn-group class_price">
                      <input type="radio" class="btn-check" name="price" id="price_free" autocomplete="off" value="무료">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="price_free">무료</label>
                      <input type="radio" class="btn-check" name="price" id="price_pay" autocomplete="off" value="유료">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="price_pay" checked>유료</label>
                    </div>
                    <input type="number" class="form-control class_form_wd class_sm_ml price_form" placeholder="금액" min="30000" max="1200000" value="30000" step="10000" id="price" name="price">
                    <label class="form-check-label" for="flexSwitchCheckDefault">원</label>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">수강기한</th>
                  <td class="class_label_h">
                    <div class="btn-group class_date">
                      <input type="radio" class="btn-check" name="sale_end_date" id="unlimited" autocomplete="off" value="무제한">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="unlimited">무제한</label>
                      <input type="radio" class="btn-check" name="sale_end_date" id="limited" autocomplete="off" value="제한">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="limited">제한</label>
                    </div>
                    <input type="number" class="form-control class_form_wd class_sm_ml date_form" min="1" max="72" value="1" name="sale_end_date">
                    <label class="form-check-label" for="flexSwitchCheckDefault">개월</label>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">강좌영상</th>
                  <td class="class_video">
                    <div class="video_wrap">
                      <div class="video_address">
                        <input type="text" class="form-control class_lform_wd" placeholder="동영상 주소를 입력하세요" name="video">
                      </div>
                      <button type="button" id="video_add"><i class="bi bi-plus-circle icon_gray"></i></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">공개 여부</th>
                  <td>
                    <div class="btn-group">
                      <input type="radio" class="btn-check" name="status" id="open" autocomplete="off" value="1">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="open">공개</label>
                      <input type="radio" class="btn-check" name="status" id="Private" autocomplete="off" value="0">
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
                  <input type="file" class="form-control" name="thumbnail" id="thumbnail" >
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
      let content_str = $('#class_intro').summernote('code');
    let content = encodeURIComponent(content_str);
    $('#content').val(content);
      
      $( function() {
        $( ".select_from" ).selectmenu();
      } );

     
    //     $('#class_intro').summernote({
    //   height: 400,
    //   placeholder: '내용을 입력해주세요.',
    //   resize: false,
    //   lang: "ko-KR",
    //   disableResizeEditor: true,
    //   callbacks: {
    //   onImageUpload: function (files) {
    //       RealTimeImageUpdate(files, this);
    //   }
    //   }
    // });

    $('#class_intro').summernote({
  /* 폰트선택 툴바 사용하려면 주석해제 */
  // fontNames: ['Roboto Light', 'Roboto Regular', 'Roboto Bold', 'Apple SD Gothic Neo'],
  // fontNamesIgnoreCheck: ['Apple SD Gothic Neo'],
  placeholder: '공지사항 내용을 입력해 주세요',
  height: 400,
  resize: false,
  lang: "ko-KR",
  disableResizeEditor: true,
  callbacks: {  //여기 부분이 이미지를 첨부하는 부분
      onImageUpload: function (files) {
          RealTimeImageUpdate(files, this);
      }
  }
});

        $('.class_price input').change(function(){
          let price_val = $(this).val();
          if(price_val == '무료'){
            $('.price_form').prop("disabled", false).focus();
            $('.price_form').prop("disabled", true);
          } if(price_val == '유료'){
            $('.price_form').prop("disabled", true);
            $('.price_form').prop("disabled", false).focus();
          }
        })

        $('.class_date input').change(function(){
          let date_val = $(this).val();
          if(date_val == '무제한'){
            $('.date_form').prop("disabled", false).focus();
            $('.date_form').prop("disabled", true);
          } if(date_val == '제한'){
            $('.date_form').prop("disabled", true);
            $('.date_form').prop("disabled", false).focus();
          }
        })

        $('#video_add').click(function(){
          let video_html = $('.video_address').html();
          video_html = `<div class="video_address d-flex align-items-center">${video_html}</div>`;
          
          $('.video_wrap').append(video_html);
        })

    
        
    </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>