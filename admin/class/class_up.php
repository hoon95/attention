<?php
$title = '강좌 등록 - Code Rabbit';
$class_up_css = '<link rel="stylesheet" href="/attention/admin/css/class_up.css">';
$class_cate_css = '<link rel="stylesheet" href="/attention/admin/css/class_cate.css">';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

$query0 = "SELECT * FROM category WHERE step=1";
$result0 = $mysqli -> query($query0);
while($rs0 = $result0 -> fetch_object()){
  $cate1[] = $rs0;
}
?>


<div class="common_pd">
          <p class="tt_01 class_m_pd text-center">강좌 등록</p>
          <form action="class_ok.php" method="POST" id="class_form" enctype="multipart/form-data">
            <input type="hidden" name="file_table_id" id="file_table_id" value="">  
            <input type="hidden" name="content" id="content" value="">
            <table class="table">
              <tbody>
                <tr class="class_ss_mb">
                  <th class="tt_03">카테고리</th>
                  <td>
                  <span class="select cate_section">
                    <select name="cate1" class="select_from cate_large" id="pcode2_1" > 
                      <option selected disabled value="">대분류</option>
                      <?php foreach($cate1 as $c){ ?>
                        <option value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></option>
                      <?php } ?>
                    </select>
                  </span>
                  <span class="select class_ss_ml cate_section">
                    <select name="cate2" class="select_from" id="pcode3">
                      <option selected disabled>중분류</option>
                    </select>
                  </span>
                  <span class="select class_ss_ml cate_section">
                    <select name="cate3" class="select_from" id="pcode3_1">
                      <option selected disabled>소분류</option>
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
                      <input type="radio" class="btn-check " name="level" id="level_Beginner" value="1" >
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Beginner">초급</label>
                      <input type="radio" class="btn-check" name="level" id="level_Intermediate" value="2" checked>
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Intermediate">중급</label>
                      <input type="radio" class="btn-check" name="level" id="level_Advanced" value="3">
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Advanced">상급</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">가격</th>
                  <td>
                    <div class="btn-group class_price">
                      <input type="radio" class="btn-check" name="price" id="price_free" value="0">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="price_free">무료</label>
                      <input type="radio" class="btn-check" name="price" id="price_pay" value="1" checked>
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="price_pay">유료</label>
                    </div>
                    <input type="number" class="form-control class_form_wd class_sm_ml price_form" placeholder="금액" min="30000" max="1200000" value="30000" step="10000" id="price_val" name="price_val">
                    <label class="form-check-label" for="price_val">원</label>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">수강기한</th>
                  <td class="class_label_h">
                    <div class="btn-group class_date">
                      <input type="radio" class="btn-check" name="sale_end_date" id="unlimited" value="0">
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="unlimited">무제한</label>
                      <input type="radio" class="btn-check" name="sale_end_date" id="limited" value="1" checked>
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="limited">제한</label>
                    </div>
                    <input type="number" class="form-control class_form_wd class_sm_ml date_form" min="1" max="72" value="1" name="date_val" id="date_val">
                    <label class="form-check-label" for="date_val">개월</label>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">강좌영상</th>
                  <td class="class_video">
                    <div class="video_wrap">
                      <div class="video_address">
                        <input type="text" class="form-control class_lform_wd video white_back" placeholder="동영상 주소를 입력하세요" name="video[]" required>
                      </div>
                      <button type="button" id="video_add"><i class="bi bi-plus-circle icon_gray"></i></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">공개 여부</th>
                  <td>
                    <div class="btn-group">
                      <input type="radio" class="btn-check" name="status" id="open" value="1" checked>
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="open">공개</label>
                      <input type="radio" class="btn-check" name="status" id="Private" value="0">
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
                  <input type="file" class="form-control" name="thumbnail" id="thumbnail" required>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03" scope="row">추가이미지</th>
                  <td>
                    <div class="drop form-control d-flex justify-content-center align-items-center gray" id="drag_drop">
                      <span class="text3"><i class="bi bi-upload icon_gray"></i>이곳에 파일을 첨부하세요</span>
                      <div id="add_images" class="d-flex justify-content-start flex-wrap">
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr class="class_hr">
            <div class="d-flex justify-content-end class_s_mt">
              <button type="submit" class="btn btn-primary">등록</button>
              <button type="button" class="class_close btn btn-dark class_sm_ml">닫기</button>
            </div>            
          </form>
    </div>
    <script>
      $('#class_form').submit(function () {
        let content_str = $('#class_intro').summernote('code');
        let content = encodeURIComponent(content_str);
        $('#content').val(content);
      });

      //카테고리 시작
      $(function(){
      $("select").selectmenu();
        $("select#pcode2_1").on("selectmenuchange", function(event, ui){
        $('#pcode2_1-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
      });
      $("select#pcode3").on("selectmenuchange", function(event, ui){
        $('#pcode3-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
      });
      $("select#pcode3_1").on("selectmenuchange", function(event, ui){
        $('#pcode3_1-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
      });
      $("#pcode2_1").on("selectmenuselect", function(event, ui) {
        let data = { 
          cate : $("#pcode2_1").val(),
          step : 2,
          category : '중분류'  
        }

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "../category/printOption.php",
        dataType: 'html',
        success: function(result) {
        $("#pcode3").html(result); 
        $("#pcode3").selectmenu('refresh');
        }
      });
     });  

    $("#pcode3").on("selectmenuselect", function(event, ui) {
      let data = { 
        cate : $("#pcode3").val(),   
        step : 3,
        category : '소분류'  
      }

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "../category/printOption.php",
        dataType: 'html',
        success: function(result) {
        $("#pcode3_1").html(result); 
        $("#pcode3_1").selectmenu('refresh');
        }
        });
      });  
      })

      $('#class_form').submit(function () {

      let markupStr = $('#class_intro').summernote('code');
      let content = encodeURIComponent(markupStr);
      $('#content').val(content);

      if(!$('#pcode2_1').val()){
        alert('대분류를 선택해주세요');
        return false;
      }
      if ($('#class_intro').summernote('isEmpty')) {
        alert('상품 설명을 입력하세요');
        return false;
      }
      });
      //카테고리 끝

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
        }).on('drop', function(e) {
          e.preventDefault();
          
          $(this).removeClass('drag-enter');
          let files = e.originalEvent.dataTransfer.files;
          for(let i = 0;i <files.length;i++) { 
            let file = files[i];
            attachFile(file);
          }  
        });

        function attachFile(file) {
          let formData = new FormData(); 
            formData.append('savefile', file)
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
          if (!confirm('정말 삭제하시겠습니까? :0')) {
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
                alert('삭제 실패.. :(');
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
          if(confirm('등록 취소하시겠습니까? :0')){
              history.back();
          }
        //강좌 취소 이벤트 끝
        });

        //video url html 추가 시작
        $('#video_add').click(function(){
          let video_html = $('.video_address').html();
          video_html = `<div class="video_address d-flex align-items-center">${video_html}</div>`;
            $('.video_wrap').append(video_html);
          })
        //video url html 추가 끝
    </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>