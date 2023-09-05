<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

  $pid = $_GET['pid'];
  
  $sql = "SELECT * FROM class WHERE pid='{$pid}'";
  $result = $mysqli -> query($sql);
  while($rs = $result -> fetch_object()){
    $rc[] = $rs;
  }
?>
<link rel="stylesheet" href="/attention/admin/css/class_up.css">
<div class="common_pd">
          <p class="tt_01 class_ss_mt class_m_pd text-center">강좌 수정</p>
          <form action="class_modify_ok.php?pid=<?= $pid ?>" method="POST" id="class_form" enctype="multipart/form-data">
            <input type="hidden" name="file_table_id" id="file_table_id" value="">  
            <input type="hidden" name="content" id="content" value="">
            <table class="table">
              <tbody>
              <?php 
                foreach($rc as $sqlobj){
              ?>
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
                    <input type="text" class="form-control class_form_wd" value="<?= $sqlobj->name ?>" name="name">
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
                      <input type="radio" class="btn-check level" name="level" id="level_Beginner" autocomplete="off" value="1" <?php if($sqlobj->level==1) {echo "checked"; } ?>>
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Beginner">초급</label>
                      <input type="radio" class="btn-check level" name="level" id="level_Intermediate" autocomplete="off" value="2" <?php if($sqlobj->level==2) {echo "checked"; } ?>>
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Intermediate">중급</label>
                      <input type="radio" class="btn-check level" name="level" id="level_Advanced" autocomplete="off" value="3" <?php if($sqlobj->level==3) {echo "checked"; } ?>>
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="level_Advanced">상급</label>
                    </div>
                    <input type="hidden" name="level" value="" id="level">
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">가격</th>
                  <td>
                    <div class="btn-group class_price">
                      <input type="radio" class="btn-check" name="price" id="price_free" autocomplete="off" value="0" <?php if($sqlobj->price==0) {echo "checked"; } ?>>
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="price_free">무료</label>
                      <input type="radio" class="btn-check" name="price" id="price_pay" autocomplete="off" value="1" <?php if($sqlobj->price==1) {echo "checked"; } ?>>
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="price_pay" checked>유료</label>
                    </div>
                    <input type="number" class="form-control class_form_wd class_sm_ml price_form" min="30000" max="1200000" value="<?= $sqlobj->price_val ?>" step="10000" id="price_val" name="price_val">
                    <label class="form-check-label" for="flexSwitchCheckDefault">원</label>
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">수강기한</th>
                  <td class="class_label_h">
                    <div class="btn-group class_date">
                      <input type="radio" class="btn-check" name="sale_end_date" id="unlimited" autocomplete="off" value="0" <?php if($sqlobj->sale_end_date==0) {echo "checked"; } ?>>
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="unlimited">무제한</label>
                      <input type="radio" class="btn-check" name="sale_end_date" id="limited" autocomplete="off" value="1" <?php if($sqlobj->sale_end_date==1) {echo "checked"; } ?>>
                      <label class="btn btn-primary class_btn_bd_color text3 dark_gray" for="limited">제한</label>
                    </div>
                    <input type="number" class="form-control class_form_wd class_sm_ml date_form" min="1" max="72" value="<?= $sqlobj->date_val ?>" name="date_val">
                    <label class="form-check-label" for="flexSwitchCheckDefault">개월</label>
                  </td>
                </tr>
                <!-- <tr>
                  <th class="tt_03">강좌영상</th>
                  <td class="class_video">
                    <div class="video_wrap">
                      <div class="video_address">
                        <input type="text" class="form-control class_lform_wd" value="<?= $sqlobj->video ?>" name="video">
                      </div>
                      <button type="button" id="video_add"><i class="bi bi-plus-circle icon_gray"></i></button>
                    </div>
                  </td>
                </tr> -->
                <tr>
                  <th class="tt_03">공개 여부</th>
                  <td>
                    <div class="btn-group class_status">
                      <input type="radio" class="btn-check" name="status" id="open" autocomplete="off" value="1" <?php if($sqlobj->status==1) {echo "checked"; } ?>>
                      <label class="btn btn-primary class_btn_bd_color text3  dark_gray" for="open">공개</label>
                      <input type="radio" class="btn-check" name="status" id="Private" autocomplete="off" value="0" <?php if($sqlobj->status==0) {echo "checked"; } ?>>
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
                    <div id="class_intro"><?php echo $sqlobj->content ?></div> 
                    <!-- /summernote -->
                    
                  </td>
                </tr>
                <tr>
                  <th class="tt_03">썸네일</th>
                  <td>
                    <div class="class_sm_pd"><?php echo $sqlobj->thumbnail ?></div>
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
                <?php
                    }
                ?>
              </tbody>
            </table>
            <hr class="class_hr">
            <div class="d-flex justify-content-end class_s_mt">
              <a href="class_modify_ok.php?pid=<?= $sqlobj->pid ?>" class="btn btn-primary">수정</a>
              <button class="class_close btn btn-dark class_sm_ml">닫기</button>
            </div>            
          </form>
    </div>
    <script>
$('#class_form').submit(function () {// form에서 전송 이벤트가 일어나면 할일 ok  //버튼클릭으로 이벤트잡는거 x 
        let content_str = $('#class_intro').summernote('code');
        let content = encodeURIComponent(content_str);
        $('#content').val(content);

      });// /form에서 전송 이벤트가 일어나면 할일
      $( function() {
        $( ".select_from" ).selectmenu();
      } );

      
      $('#add_images').on('click', 'a', function (e) {
        e.preventDefault()
        let imgid = $(this).parent().attr('data-imgid');
        file_delete(imgid);
      });
    //     $('#class_intro').summernote({
    //   height: 400,
    //   placeholder: '강좌를 소개해주세요',
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
  height: 400,
  placeholder: '강좌를 소개해주세요',
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

        

        // $('#video_add').click(function(){
        //   let video_html = $('.video_address').html();
        //   video_html = `<div class="video_address d-flex align-items-center">${video_html}</div>`;
          
        //   $('.video_wrap').append(video_html);
        // })

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
          let files = e.originalEvent.dataTransfer.files;//originalEvent으로 file항목을 읽고 그 중 dataTransfer(??)에서 files를 가져온다
          console.log(files);
          for(let i = 0;i <files.length;i++) {  //originalEvent은 배열이라 foreach,   ,filter안돼서 for로 뽑아야 됌 이렇게 뽑아 야 됨 
            let file = files[i];
            let size = uploadFiles.push(file);  //업로드 목록에 for i로 하나씩 추가  //file 개수 console에선 1, 2로 나옴 
            attachFile(file);
          }  
        });
 
        $(".images_submit").click(function(){//전송되게 그것도 drop시 자동
          let formData = new FormData();//전송되게 FormData를 사용
          $.each(uploadFiles, function(i, file) {
            if(file.upload != 'disable')  //삭제하지 않은 disable없는 이미지만 업로드 항목으로 추가
              formData.append('upload-file', file, file.name); //이걸로 전송되는게 아니라 아래 ajax에 줌
          });
          $.ajax({
            url: '/api/etc/file/upload',
            data : formData, //이 파일을 ajax에 줄꺼니까 
            type : 'post',
            contentType : false,
            processData: false,
            success : function(ret) {
              alert("사진 넣기 완료");
            }
          });
        });
        $("#add_images").on("click", ".close", function(e) {//닫기 버튼 클릭하면 disable라는 속성을 넣어주자 
          let $target = $(e.target);
          let idx = $target.attr("data-idx");
          uploadFiles[idx].upload = 'disable';  //삭제된 항목은 업로드하지 않기 위해 플래그 생성
          $target.parent().remove();  //프리뷰 삭제
        });



        //추가이미지를 넣으면 class_save_image.php에 savefile를 첨부했어하고 넣고,
        //쿼리에도 넣는걸 해주는 함수
      function attachFile(file) {
        console.log(file);
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

            // if (return_data.result == 'member') {
            //   alert('로그인을 하십시오.');
            //   return;
            // } else 
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
  } //file_delete func
    </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>