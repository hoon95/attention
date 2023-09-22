<?php
  $title = '강좌 등록 - Code Rabbit';
  $class_up_css = '<link rel="stylesheet" href="/attention/admin/class/class_up.css">';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

  $query = "SELECT * FROM category WHERE step=1";
  $result = $mysqli -> query($query);
  while($rs = $result -> fetch_object()){
    $cate1[] = $rs;
  }


$pid = empty($_GET["pid"]) ? "" : $_GET["pid"];
if (!empty($pid))
{
    $row = sql_fetch("SELECT * FROM `class` WHERE `pid` = ".$pid);

    $sql = "SELECT * FROM class_image_table WHERE pid={$pid} AND status = 1";
    $file_row = sql_fetch_array($sql);
}
else
{
    $row_arr = array("cate1", "cate2", "cate3", "name", "sub_name", "isnew", "isbest", "isrecom", "level", "student", "teacher", "price"
    , "price_val", "sale_end_date", "date_val", "greeting", "promotion", "content", "video", "curriculum");

    for ($i=0; $i < count((array)$row_arr); $i++)
    {
        $row[$row_arr[$i]] = "";
    }
}

$query = "select * from class_clips where pid = '".$pid."'";
$result = $mysqli -> query($query);
while ($rows = $result -> fetch_array(MYSQLI_ASSOC)) {
	$video_data[] = $rows;
}


?>

<div class="common_pd">
  <h2 class="tt_01 mb-5 text-center">강좌 <?php echo empty($pid) ? "등록" : "수정"?></h2>

  <form name="frm" action="class_ok.php" method="POST" id="product_form" enctype="multipart/form-data">
    <input type="hidden" name="mode" id="mode" value="<?php echo empty($pid) ? "add" : "edit" ?>">
    <input type="hidden" name="pid" id="pid" value="<?php echo $pid ?>">
    <input type="hidden" name="file_table_id" id="file_table_id" value="">
    <input type="hidden" name="student" id="student" value="">
    <input type="hidden" name="greeting" id="greeting" value="">
    <input type="hidden" name="content" id="content" value="">

    <table class="table">
      <tbody>
        <tr>
          <th scope="row">카테고리</th>
          <td>
            <div class="row">
              <div class="col-md-4">
                <select class="form-select" aria-label="Default select example" id="cate1" name="cate1">
                  <option selected disabled>대분류</option>
                  <!-- <option value="1">One</option> -->
<?php
foreach($cate1 as $c)
{
?>
                  <option value="<?php echo $c -> cid ?>"<?php echo $row["cate1"] == $c->cid ? " selected" : ""?>><?php echo $c -> name ?></option>
<?php
}
?>
                </select>
              </div>

              <div class="col-md-4">
                <select class="form-select" aria-label="Default select example" id="cate2" name="cate2" data-cate="<?php echo $row["cate2"]?>">
                  <option selected disabled>중분류</option>
                </select>
              </div>

              <div class="col-md-4">
                <select class="form-select" aria-label="Default select example" id="cate3" name="cate3" data-cate="<?php echo $row["cate3"]?>">
                  <option selected disabled>소분류</option>
                </select>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="name">상품명</label></th>
          <td><input type="text" name="name" id="name" class="form-control" value="<?php echo $row["name"]?>"></td>
        </tr>

        <tr>
          <th scope="row"><label for="sub_name">부제</label></th>
          <td><input type="text" name="sub_name" id="sub_name" class="form-control" value="<?php echo $row["sub_name"]?>"></td>
        </tr>

        <tr>
          <th scope="row"><label for="">전시옵션</label></th>
          <td>
            <input class="form-check-input" type="checkbox" value="1" id="isnew" name="isnew"<?php echo $row["isnew"] == "1" ? " checked" : ""?>>
            <label class="form-check-label" for="isnew">신규</label>
            <input class="form-check-input" type="checkbox" value="1" id="isbest" name="isbest"<?php echo $row["isbest"] == "1" ? " checked" : ""?>>
            <label class="form-check-label" for="isbest">베스트</label>
            <input class="form-check-input" type="checkbox" value="1" id="isrecom" name="isrecom"<?php echo $row["isrecom"] == "1" ? " checked" : ""?>>
            <label class="form-check-label" for="isrecom">추천</label>
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="level">난이도</label></th>
          <td>
            <select class="form-select" name="level" id="level" aria-label="Default select example">
              <option value="1"<?php echo $row["level"] == "1" ? " selected" : ""?>>초급</option>
              <option value="2"<?php echo $row["level"] == "2" ? " selected" : ""?>>중급</option>
              <option value="3"<?php echo $row["level"] == "3" ? " selected" : ""?>>고급</option>
            </select>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="student">추천 수강대상</label></th>
          <td><div id="student_detail"><?php echo $row["student"]?></div></td>
        </tr>

        <tr>
          <th scope="row"><label for="teacher">강사명</label></th>
          <td><input type="text" name="teacher" id="teacher" class="form-control" value="<?php echo $row["teacher"]?>"></td>
        </tr>
        <tr>
          <th scope="row"><label for="price">금액 타입</label></th>
          <td>
            <select class="form-select" name="price" id="price" aria-label="Default select example">
              <option value="0"<?php echo $row["price"] == "0" ? " selected" : ""?>>무료</option>
              <option value="1"<?php echo $row["price"] == "1" ? " selected" : ""?>>유료</option>
            </select>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="price_val">금액</label></th>
          <td><input type="number" name="price_val" id="price_val" class="form-control" value="<?php echo $row["price_val"]?>"></td>
        </tr>

        <tr>
          <th scope="row"><label for="sale_end_date">수강기간 타입</label></th>
          <td>
            <select class="form-select" name="sale_end_date" id="sale_end_date" aria-label="Default select example">
              <option value="0"<?php echo $row["sale_end_date"] == "0" ? " selected" : ""?>>무제한</option>
              <option value="1"<?php echo $row["sale_end_date"] == "1" ? " selected" : ""?>>제한</option>
            </select>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="date_val">수강기간</label></th>
          <td><input type="number" name="date_val" id="date_val" class="form-control" value="<?php echo $row["date_val"]?>"></td>
        </tr>

        <tr>
          <th scope="row"><label for="thumbnail">썸네일</label></th>
          <td><input type="file" name="thumbnail" id="thumbnail" class="form-control"></td>
        </tr>

        <tr>
          <th scope="row"><label for="greeting">인사말</label></th>
          <td><div id="greeting_detail"><?php echo $row["greeting"]?></div></td>
        </tr>

        <tr>
          <th scope="row"><label for="promotion">PR문구</label></th>
          <td><input type="text" name="promotion" id="promotion" class="form-control" value="<?php echo $row["promotion"]?>"></td>
        </tr>

        <tr>
          <th scope="row"><label for="content">상세설명</label></th>
          <td><div id="product_detail"><?php echo $row["content"]?></div></td>
        </tr>

        <tr>
          <th scope="row" class="product_main_video"><label for="video">대표영상</label></th>
          <td><textarea name="video" class="main_video_input"><?php echo $row["video"]?></textarea></td>
        </tr>

        <!-- [230920 17시]커리큘럼 내 lecture영상들 활성화를 위한 코드 추가 (시작) -->
        <tr>
          <th scope="row">강의영상</th>
          <td class="lecture_video_area">
            <div class="lecture_video_wrap">
				<div>
				  <div class="lecture_link_insert">
					<input type="text" class="form-control lecture_video_input" placeholder="강의영상 주소를 입력하세요." name="lecture_video[]" value="<?php echo $video_data[0]['video_url']?>">
				  </div>
				  <button type="button" id="lecture_video_add"><i class="bi bi-plus-circle icon_gray"></i></button>
				</div>

				<?php 
				if(isset($video_data[1])) { 
				
				for($ii=1;$ii<(count($video_data));$ii++) { 
				?>
				<div class="lecture_link_insert d-flex align-items-center" style="position:relative">
					<input type="text" class="form-control lecture_video_input" placeholder="강의영상 주소를 입력하세요." name="lecture_video[]" value="<?php echo $video_data[$ii]['video_url']?>">
				   <button type="button" class="lecture_video_minus"><i class="bi bi-dash-circle icon_gray"></i></button>
				 </div>
				<?php }

				}?>
			</div>
          </td>
        </tr>
        <!-- [230920 17시]커리큘럼 내 lecture영상들 활성화를 위한 코드 추가 (끝) -->

        <tr>
          <th scopt="row">추가 이미지</th>
          <td>
            <div id="drop" class="box">
              <span>여기로 drag & drop</span>
              <div id="thumbnails" class="d-flex justify-content-start">
              </div>
            </div>
          </td>
        </tr>
<?php
if (count((array)$file_row["imgid"]))
{
?>
        <tr>
            <th scopt="row">첨부된 추가 이미지</th>
            <td>
<?php
    for ($i=0; $i < count((array)$file_row["imgid"]); $i++)
    {
    ?>
                <div id="f_<?php echo $file_row["imgid"][$i]?>"><img src="/attention/pdata/class/<?php echo $file_row["filename"][$i]?>" style="width:100px;height:100px;"><span style="color:red" class="del_img"  data-imgid="<?php echo $file_row["imgid"][$i]?>">[삭제]</span></div>
    <?php
    }
?>
            </td>
        </tr>
<?php
}
?>
        <tr>
            <th scope="row" class="product_curriculum"><label for="curriculum">커리큘럼</label></th>
          <td>
              <textarea name="curriculum" style="width:100%;height:200px;"><?php echo $row["curriculum"]?></textarea>
              <br>※ 챕터1 | 챕터1-1, 챕터1-2, 챕터1-3 단위로 입력하세요.
          </td>
        </tr>

      </tbody>
    </table>
    <button class="btn btn-primary">상품 <?php echo empty($pid) ? "등록" : "수정"?></button>
  </form>
</div>

<script>
if ($('#cate1').val())
{
    makeOption($('#cate1'), 2, '중분류', $('#cate2'), "read");
}

if ($('#cate2').val())
{
    makeOption($('#cate2'), 3, '소분류', $('#cate3'), "read");
}
  /* 카테고리 시작 */
  $('#cate1').on('change', function(){
    makeOption($(this), 2, '중분류', $('#cate2'));
  });

  $('#cate2').on('change', function(){
    makeOption($(this), 3, '소분류', $('#cate3'));
  });

  $('#pcode2_1').on('change', function(){
    makeOption($(this), 2, '중분류', $('#pcode3'));
  });

  function makeOption(evt, step, category, target, mode) {
    let cate = evt.val();
    if (!mode)
    {
        mode = "";
    }
    var active_cate = "";
    if (mode == "read")
    {
        if ($("#cate"+step).attr("data-cate"))
        {
            active_cate = $("#cate"+step).attr("data-cate");
        }
    }
    let data = {
      cate : cate,
      step : step,
      category : category,
      active_cate : active_cate
    }

    $.ajax({
      async: false,
      type: 'post',
      data: data,
      url: "/attention/admin/category/printOption.php",
      dataType: 'html',
      success: function(result) {
      target.html(result);
      target.selectmenu('refresh');
      }
    });
  }  /* 카테고리 끝 */

  /* drag & drop 시작 */
  var uploadFiles = [];
  var $drop = $("#drop");
  $drop.on("dragenter", function(e){  //드래그 요소가 들어왔을때
    $(this).addClass('drag-enter');
  }).on("dragleave", function(e){  //드래그 요소가 나갔을때
    $(this).removeClass('drag-enter');
  }).on("dragover", function(e){
    e.stopPropagation();
    e.preventDefault();
  }).on('drop', function(e){  //드래그 한 항목을 떨어뜨렸을때
    e.preventDefault();
    //console.log(e);

    $(this).removeClass('drag-enter');
    var files = e.originalEvent.dataTransfer.files;  //드래그&드랍 항목
    //console.log(files);
    for (var i = 0; i < files.length; i++){
      var file = files[i];
      attachFile(file);
    }
  });  /* drag & drop 끝 */

  /* editor 시작 */
  $('#student_detail').summernote({height: 100});
  $('#teacher_detail').summernote({height: 100});
  $('#greeting_detail').summernote({height: 100});
  $('#product_detail').summernote({height: 100});

  $('#product_form').submit(function(){  //전송 이벤트가 일어나면,

    //1)editor에 넣은 내용을 → 추천수강대상의 value 값으로 넣어준다.
    let markup1Str = $('#student_detail').summernote('code');
    let student = encodeURIComponent(markup1Str);
    $('#student').val(student);

    //3)editor에 넣은 내용을 → 인사말의 value 값으로 넣어준다.
    let markup3Str = $('#greeting_detail').summernote('code');
    let greeting = encodeURIComponent(markup3Str);
    $('#greeting').val(greeting);

    //4)editor에 넣은 내용을 → 상세설명의 value 값으로 넣어준다.
    let markup4Str = $('#product_detail').summernote('code');
    let content = encodeURIComponent(markup4Str);
    $('#content').val(content);

  });  /* editor 끝 */

  function attachFile(file){  //이제 attachFile함수가 할 일.
    //console.log(file);  //하나의 파일도 확인해 보고(attachFile에 들어온 file이 어떤식으로 돼있는지/들어와있는지)
    let formData = new FormData();  //FormData()함수의 실행결과를 formData 객체에 담음.
    formData.append('savefile', file);  // == <input type="file" name="savefile" value="파일명">
    console.log(formData); //formData도 확인. formData라는 객체 안에는 도대체 data가 어떤 식으로 있을까? 넘기기 전에 확인.

    //넘어온 data를 가지고, db에 차곡차곡 저장할걸 만들어보자.
    $.ajax({
      url: 'class_save_image.php',  // ← 얘한테 일을 시킬거임.
      data: formData,  //얘(위의 url)한테 넘길 data는 data라는 property에다가 formData에 있는걸 넘길거야.
      cache: false,  //data를 넘길때 다 있어야 하는 속성들 ▼
      contentType: false,
      processData: false,
      dataType: 'json',  //product_save_image.php가 우리한테 넘겨줄 data의 타입.
      type: 'POST',  //ajax로 php(url)에 data를 전송할 때 전송할 타입(방식).
      error: function(error){  //에러가 나면, 에러가 뭔지 확인하기 위함.
        console.log('error:', error);
      },
      success: function(return_data){  //성공하면 할 일

        console.log(return_data);

        if(return_data.result == 'member'){
          alert('로그인을 하십시오.');
          return;
        } else if(return_data.result == 'image'){
          alert('이미지 파일만 첨부할 수 있습니다.');
          return;
        } else if(return_data.result == 'size'){
          alert('10메가 이하만 첨부할 수 있습니다.');
          return;
        } else if(return_data.result == 'error'){
          alert('관리자에게 문의하세요.');
          return;
        } else {  //첨부이미지 테이블에 파일(들)을 저장 성공하면 할 일.
          //클릭할 때마다, #imageArea(div)에 가로 우측으로 생기도록 (즉, 기존의 파일 뒤에다가 tag를 만들어서 넣겠다)
          let imgid = $('#file_table_id').val() + return_data.imgid + ',';
          $('#file_table_id').val(imgid);

          let html = `
            <div class="thumb" id="f_${return_data.imgid}" data-imgid="${return_data.imgid}">
              <img src="/attention/pdata/class/${return_data.savefile}" alt="">
              <button type="button" class="btn btn-warning">삭제</button>
            </div>
          `;
          $('#thumbnails').append(html);
        }
      }  //success
    });  //ajax

  }  //function attachFile(file)

  //삭제버튼
  $('#thumbnails').on('click', 'button', function(){
    let imgid = $(this).parent().attr('data-imgid');
    file_delete(imgid);  //file_delete함수에 저 숫자를(imgid) 넘겨줄거에요.
  });

  $(".del_img").click(function () {
     var img_id = $(this).attr("data-imgid");
     file_delete(img_id);
  });

  //file_delete함수가 할 일
  function file_delete(imgid){
    if(!confirm('정말 삭제할까요?')){  //일단 confirm함수로 묻고가자. 삭제할까요의 반대 = 취소를 누른 것!
      return false;  //그러면 뒤에있는거 아무것도 실행안하고 끝남.(즉 빈거를 돌려줌.)
    }

    //yes라고 한다면
    let data = {imgid : imgid}
    $.ajax({
      async: false, //비동기(다 지운 다음에 다른 일을 해!)
      type: 'post',
      url: '/attention/admin/class/image_delete.php',
      data: data,
      dataType: 'json',
      error: function(error){
        console.log('error:', error);
      },
      success: function(return_data){
        if(return_data.result == 'member'){
          alert('로그인 먼저 하세요.');
          return;
        } else if(return_data.result == 'my'){
          alert('본인이 작성한 제품의 이미지만 삭제할 수 있습니다.');
          return;
        } else if(return_data.result == 'no'){
          alert('삭제 실패');
          return;
        } else {  //위 3개에 다 해당되지 않는다면, 그 요소를 안 보이게 할거에요.
          $('#f_' + imgid).hide();
        }
      }
    })
  }

  //옵션(강의추가) 버튼
  $('#optionAddBtn').click(function(){
    let optionHtml = $('#optionTr').html();  //tr태그 안에 td들을 가져온 것임.
    optionHtml = `<tr class="row">${optionHtml}</tr>`;
    $('#optionBody').append(optionHtml);
  });

  //[230920 17시]커리큘럼 내 lecture영상들 활성화를 위한 코드 추가 (시작)
  $('#lecture_video_add').click(function(){
   // let lecture_video_html = $('.lecture_link_insert').html();
	
	let lecture_video_html = '<input type="text" class="form-control lecture_video_input" placeholder="강의영상 주소를 입력하세요." name="lecture_video[]" value="">';

    lecture_video_html = `<div class="lecture_link_insert d-flex align-items-center" style="position:relative">${lecture_video_html} <button type="button" class="lecture_video_minus"><i class="bi bi-dash-circle icon_gray"></i></button></div> `;

    $('.lecture_video_wrap').append(lecture_video_html);
  })

$(document).on("click" ,".lecture_video_minus", function() {
	$(this).parent().remove();
});
  //[230920 17시]커리큘럼 내 lecture영상들 활성화를 위한 코드 추가 (끝)
</script>

<?php
   require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>
