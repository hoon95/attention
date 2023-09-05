<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

?>
<link rel="stylesheet" href="/attention/admin/css/class_up.css">
<div class="common_pd">
          <p class="tt_01 class_ss_mt class_m_pd text-center">강좌 등록</p>
          <form action="class_ok.php" method="POST" id="class_form" enctype="multipart/form-data">
            <input type="hidden" name="file_table_id" id="file_table_id" value="">  
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
                    <input type="text" class="form-control class_form_wd" placeholder="강좌명" name="name" required>
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
                      <input type="radio" class="btn-check " name="level" id="level_Beginner" autocomplete="off" value="1" >
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
                      <input type="radio" class="btn-check" name="price" id="price_free" autocomplete="off" value="0">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="price_free">무료</label>
                      <input type="radio" class="btn-check" name="price" id="price_pay" autocomplete="off" value="1">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="price_pay" checked>유료</label>
                    </div>
                    <input type="number" class="form-control class_form_wd class_sm_ml price_form" placeholder="금액" min="30000" max="1200000" value="30000" step="10000" id="price_val" name="price_val">
                    <label class="form-check-label" for="flexSwitchCheckDefault">원</label>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">수강기한</th>
                  <td class="class_label_h">
                    <div class="btn-group class_date">
                      <input type="radio" class="btn-check" name="sale_end_date" id="unlimited" autocomplete="off" value="0">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="unlimited">무제한</label>
                      <input type="radio" class="btn-check" name="sale_end_date" id="limited" autocomplete="off" value="1">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="limited">제한</label>
                    </div>
                    <input type="number" class="form-control class_form_wd class_sm_ml date_form" min="1" max="72" value="1" name="date_val">
                    <label class="form-check-label" for="flexSwitchCheckDefault">개월</label>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">강좌영상</th>
                  <td class="class_video">
                    <div class="video_wrap">
                      <div class="video_address">
                        <input type="text" class="form-control class_lform_wd video" placeholder="동영상 주소를 입력하세요" name="video[]">
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
                  <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                  </td>
                </tr>
                <tr>
                  <th class="tt_03" scope="row">추가이미지</th>
                  <td>
                    <div class="drop form-control d-flex justify-content-center align-items-center gray" id="drag_drop">
                      <span class="text3"><i class="bi bi-upload icon_gray"></i>이곳에 파일을 첨부하세요</span>
                      <div id="add_images" class="d-flex justify-content-start">
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr class="class_hr">
            <div class="d-flex justify-content-end class_s_mt">
              <button class="btn btn-primary">등록</button>
              <button class="class_close btn btn-dark class_sm_ml">닫기</button>
            </div>            
          </form>
    </div>
    <script>
      $('#class_form').submit(function () {// form에서 전송 이벤트가 일어나면 할일 ok  //버튼클릭으로 이벤트잡는거 x 
        let content_str = $('#class_intro').summernote('code');
        let content = encodeURIComponent(content_str);
        $('#content').val(content);


      });// form에서 전송 이벤트가 일어나면 할일 끝
      $( function() {
        $( ".select_from" ).selectmenu();
      } );

      // 추가 이미지 삭제 아이콘 클릭 시 해당 이미지만 삭제 기능 시작
      $('#add_images').on('click', 'a', function (e) {
        e.preventDefault()
        let imgid = $(this).parent().attr('data-imgid');
        file_delete(imgid);
      });
      // 추가 이미지 삭제 아이콘 클릭 시 해당 이미지만 삭제 기능 끝

      // summernote 시작
        $('#class_intro').summernote({
          height: 400,
          placeholder: '강좌를 소개해주세요',
          resize: false,
          lang: "ko-KR",
          disableResizeEditor: true,
          callbacks: {//여기 부분이 이미지를 첨부하는 부분
              onImageUpload: function (files) {
                  RealTimeImageUpdate(files, this);
              }
          }
        });
        // summernote 끝
        // 유료 무료, 제한, 무제한 버튼 클릭 시 비활성화 나타냄 시작
        $('.class_price input').change(function(){
          let price_val = $(this).val();
          if(price_val == '0'){
            $('.price_form').prop("disabled", false).focus();
            $('.price_form').prop("disabled", true);
          } if(price_val == '1'){
            $('.price_form').prop("disabled", true);
            $('.price_form').prop("disabled", false).focus();
          }
        })

        $('.class_date input').change(function(){
          let date_val = $(this).val();
          if(date_val == '0'){
            $('.date_form').prop("disabled", false).focus();
            $('.date_form').prop("disabled", true);
          } if(date_val == '1'){
            $('.date_form').prop("disabled", true);
            $('.date_form').prop("disabled", false).focus();
          }
        })
        // 유료 무료, 제한, 무제한 버튼 클릭 시 비활성화 나타냄 끝

        //drag drop, 이미지 추가 시작
        let uploadFiles = [];
        let $drop = $("#drag_drop");
        $drop.on("dragenter", function() {  //드래그 요소가 들어왔을떄
          $(this).addClass('drag-enter');
        }).on("dragleave", function() {  //드래그 요소가 나갔을때
          $(this).removeClass('drag-enter');
        }).on("dragover", function(e) {
          e.preventDefault();
          e.stopPropagation();
        }).on('drop', function(e) {  //드래그한 항목을 떨어뜨렸을때
          e.preventDefault();
          console.log(e);
          
          $(this).removeClass('drag-enter');
          let files = e.originalEvent.dataTransfer.files;
          console.log(files);
          for(let i = 0;i <files.length;i++) {  //originalEvent은 배열이라 foreach,   ,filter안돼서 for로 뽑아야 됌 이렇게 뽑아 야 됨 
            let file = files[i];
            attachFile(file);
          }  
        });

        //추가이미지를 넣으면 class_save_image.php에 savefile를 첨부했어하고 넣고,
        //쿼리에도 넣는걸 해주는 함수
        function attachFile(file) {
          let formData = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
            formData.append('savefile', file) //<input type="file" name="savefile" value="파일명">
            console.log(formData);
            $.ajax({
              url: 'class_save_image.php',
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              dataType: 'json',
              type: 'POST',
              error: function (error) {
                console.log('error:', error)
              },
              success: function (return_data) {
                console.log(return_data);

                if (return_data.result == 'member') {
                  alert('로그인을 하십시오.');
                  return;
                } else 
                if (return_data.result == 'image') {
                  alert('이미지파일만 첨부할 수 있습니다.');
                  return;
                } else if (return_data.result == 'size') {
                  alert('10메가 이하만 첨부할 수 있습니다.');
                  return;
                } else if (return_data.result == 'error') {
                  alert('관리자에게 문의하세요');
                  return;
                } else {
                  
                  //첨부이미지 테이블에 저장하면 할일
                  let imgid = $('#file_table_id').val() + return_data.imgid + ',';
                  console.log($('#file_table_id').val())
                  $('#file_table_id').val(imgid);
                  let html = `
                      <div class="thumb" id="f_${return_data.imgid}" data-imgid="${return_data.imgid}">
                        <img src="/attention/pdata/class/${return_data.savefile}" alt="">
                        <a href="#"><i class="bi bi-trash-fill icon_red"></i></a>
                    </div>
                  `;
                  $('#add_images').append(html);
                }
              }
            });
        }      

        //file_delete func 시작
        function file_delete(imgid) {
          if (!confirm('정말삭제할까요?')) {
            return false;
          }
          let data = {
            imgid: imgid
          }
          $.ajax({
            async: false,
            type: 'post',
            url: 'image_delete.php',
            data: data,
            dataType: 'json',
            error: function (error) {
              console.log('error:', error)
            },
            success: function (return_data) {
              if (return_data.result == 'member') {
                alert('로그인 먼저하세요');
                return;
              } else if (return_data.result == 'my') {
                alert('본인이 작성한 제품의 이미지만 삭제할 수 있습니다.');
                return;
              } else if (return_data.result == 'no') {
                alert('삭제 실패');
                return;
              } else {
                $('#f_' + imgid).hide();
              }
            }

          })
        } //file_delete func 끝
        //drag drop, 이미지 추가 끝

        //강좌 취소 이벤트 시작
        $('.class_close').click(function(e){
          e.preventDefault();
          if(confirm('강좌 등록을 취소하시겠습니까?')){
              history.back();
          }
        //강좌 취소 이벤트 끝
      });

        //video url html 추가 시작
        $('#video_add').click(function(){
          let urls = '';
          let video_html = $('.video_address').html();
          video_html = `<div class="video_address d-flex align-items-center">${video_html}</div>`;
          // 추가된 video 주소를 urls 변수에 추가 (쉼표로 구분)
          if (urls.length > 0) {
            urls += ',';
          }
            urls += $('.video_address input').val();
            console.log(urls)
            $('.video_wrap').append(video_html);
            attachURL(urls)
          })

          function attachURL(urls) {
            let formURL = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
            formURL.append('video_urls', urls) //<input type="file" name="savefile" value="파일명">
              // console.log(formURL);
              $.ajax({
                url: 'class_clips.php',
                data: formURL,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                type: 'POST',
                error: function (error) {
                  // console.log('error:', error)
                },
                success: function (return_url) {
                  // console.log(return_url);

                  if (return_url.result == 'member') {
                    alert('로그인을 하십시오.');
                    return;
                  } else if (return_url.result == 'error') {
                    alert('관리자에게 문의하세요');
                    return;
                  } else {
                    
                  //첨부url 테이블에 저장하면 할일
                  let ccid = $('.video').val() + return_url.ccid + ',';
                  $('.video').val(ccid);                  
                  }}
              });
        }
      //video url 출력 끝
    </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>