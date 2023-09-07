<?php
$title = '강좌 수정 - Code Rabbit';
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
                      </select>
                    </span>
                    <span class="select class_ss_ml">
                      <select name="select" class="select_from">
                        <option selected disabled>중분류</option>
                      </select>
                    </span>
                    <span class="select class_ss_ml">
                      <select name="select" class="select_from">
                        <option selected disabled>소분류</option>
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
                <tr>
                  <th class="tt_03">강좌영상</th>
                  <td class="class_video">
                    <div class="video_wrap">
                      <div class="video_address">
                        <input type="text" class="form-control class_lform_wd" value="<?= $sqlobj->video ?>" name="video">
                      </div>
                      <button type="button" id="video_add"><i class="bi bi-plus-circle icon_gray"></i></button>
                    </div>
                  </td>
                </tr>
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
              <button class="btn btn-primary class_sm_ml">수정</button>
              <a href="/attention/admin/class/class_list.php" class="btn btn-dark class_sm_ml">취소</a>
            </div>            
          </form>
    </div>
    <script>
      $('#class_form').submit(function(){ 
        let content_str = $('#class_intro').summernote('code');
        let content = encodeURIComponent(content_str);
          $('#content').val(content);
        });
        $( function() {
          $( ".select_from" ).selectmenu();
        } );

      $('#add_images').on('click', 'a', function (e) {
        e.preventDefault()
        let imgid = $(this).parent().attr('data-imgid');
        file_delete(imgid);
      });

      $('#class_intro').summernote({
        height: 400,
        placeholder: '강좌를 소개해주세요',
        resize: false,
        lang: "ko-KR",
        disableResizeEditor: true,
        callbacks: {  //여기 부분이 이미지를 첨부하는 부분
            onImageUpload: function (files) {
                RealTimeImageUpdate(files, this);
            }}
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

        let uploadFiles = [];
        let $drop = $("#drag_drop");
        $drop.on("dragenter", function() { 
          $(this).addClass('drag-enter');
        }).on("dragleave", function() {  
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
            let size = uploadFiles.push(file);  
            attachFile(file);
          }  
        });
 
        $(".images_submit").click(function(){
          let formData = new FormData();
          $.each(uploadFiles, function(i, file){
            if(file.upload != 'disable') 
              formData.append('upload-file', file, file.name);
          });
          $.ajax({
            url: '/api/etc/file/upload',
            data : formData, 
            type : 'post',
            contentType : false,
            processData: false,
            success : function(ret) {
              console.log("사진 넣기 완료");
            }
          });
        });
        $("#add_images").on("click", ".close", function(e) {
          let $target = $(e.target);
          let idx = $target.attr("data-idx");
          uploadFiles[idx].upload = 'disable'; 
          $target.parent().remove(); 
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

      function file_delete(imgid){
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
        error: function (error){
          console.log('error:', error)
        },
        success: function (return_data){
          if (return_data.result == 'member') {
            alert('로그인 먼저하세요');
            return;
          } else if (return_data.result == 'my') {
            alert('본인이 작성한 제품의 이미지만 삭제할 수 있습니다.');
            return;
          } else if (return_data.result == 'no') {
            alert('파일 첨부 실패.. :(');
            return;
          } else {
            $('#f_' + imgid).hide();
          }
        }
      })
    } //file_delete func

    $('.class_close').click(function(e){
        e.preventDefault();
          history.back();
      });
    </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>