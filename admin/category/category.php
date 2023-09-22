<?php
  $category_css = '<link rel="stylesheet" href="/attention/admin/css/category.css">';
  $title = '카테고리 관리 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/category/category_func.php';

/*
  $query = "SELECT * FROM category WHERE step=1";
  $result = $mysqli -> query($query);
  while($rs = $result -> fetch_object()){
    $cate1[] = $rs;
  }
*/
?>

<div class="container">
  <div>
    <h2 class="tt_01 text-center">카테고리 관리</h2>

    <!-- 카테고리 Select & Filter 영역(시작) -->
    <div>  
      <form class="d-flex justify-content-center">
        <div class="row cate_main"> 
          <!-- 대분류 출력 -->
          <div class="col mt-5 cate_section">
            <div class="select_none"></div>
            <div class="cate_field mt-4 white_back radius_medium">
              <h3 class="tt_03 pb-4">대분류</h3>
              <div class="cate_filter d-flex flex-column" id="cate1_div" >
                <?php foreach($cate1 as $c){ ?>
                  <div class="d-flex justify-content-between align-items-center pb-3">
                    <div class="text1" data-value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></div>
                    <div class="cate_icon d-flex">
                      <button type="button" value="<?php echo $c -> cid ?>" data-step="<?php echo $c -> step ?>" data-text="<?php echo $c -> name ?>" class="p-0 cate_modify"><i class="bi bi-pencil-square icon_mint"></i></button>
                      <button type="button" value="<?php echo $c -> cid ?>" data-step="<?php echo $c -> step ?>" data-text="<?php echo $c -> name ?>" class="p-0 cate_delete"><i class="bi bi-trash-fill icon_red"></i></button>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- 대분류 선택 ▶ 중분류 출력(시작) -->
          <div class="col mt-5 cate_section">  
            <select class="cate_large" id="cate1">
              <option selected disabled>대분류</option>
              <!-- <option value="1">대분류1</option> -->
              <?php foreach($cate1 as $c){ ?>
                <option value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></option>
              <?php } ?>
            </select>
            <!-- 대분류 선택시 출력되는 중분류 영역 -->
            <div class="cate_field mt-4 white_back radius_medium">
              <h3 class="tt_03 pb-4">중분류</h3>
              <div class="cate_filter" id="cate2_div">
              </div> 
            </div>
          </div>  
          <!-- 대분류 선택 ▶ 중분류 출력(끝) -->

          <!-- 중분류 선택 ▶ 소분류 출력(시작) -->
          <div class="col mt-5 cate_section">  
            <select id="cate2">
              <option selected disabled>중분류</option>
              <!-- <option value="1">중분류1</option> -->
            </select>
            <!-- 중분류 선택시 출력되는 소분류 영역 -->
            <div class="cate_field mt-4 white_back radius_medium">
              <h3 class="tt_03 pb-4">소분류</h3>
              <div class="cate_filter" id="cate3_div">
              </div>
            </div>
          </div>  
          <!-- 중분류 선택 ▶ 소분류 출력(끝) -->
        </div>  <!-- class="row"(끝) -->
      </form>
    </div>  <!-- 카테고리 Select & Filter 영역(끝) -->

    <div style="display: none;">
      <select id="cate3">
        <option selected disabled>소분류</option>
      </select>
	  </div>

    <!-- 카테고리 등록 버튼 -->
    <div class="btns d-flex justify-content-center">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cate1Modal">대분류 등록</button>
      <button type="button" class="btn btn-primary mx-4 cate_make_btn" id="cate2Modal">중분류 등록</button>
      <button type="button" class="btn btn-primary cate_make_btn" id="cat32Modal">소분류 등록</button>
    </div>

    <!-- 카테고리 관리 페이지 Close 버튼 -->
    <div class="cate_close text-end">
      <button type="button" class="btn btn-dark">닫기</button>
    </div>

  </div>  <!-- class="common_pd"(끝) -->
</div>  <!-- class="container"(끝) --> 

<!-- 수정 Modal 기능 -->
<div class="modal fade" id="cateModifyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title tt_03" id="cate_name_text">분류 수정</h5>
      </div>
      <div class="modal-body">
        <div class="row cate_modal_input">
          <input type="text" class="form-control" name="cate_name" id="cate_name" placeholder="분류명 입력">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="cate_update_btn" class="btn btn-primary cate_modal_reg" data-step="1">수정</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>  
</div>

<!-- 대분류등록 Modal 기능(시작) -->
<div class="modal fade" id="cate1Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title tt_03">대분류 등록</h5>
      </div>
      <div class="modal-body">
        <div class="row cate_modal_input">
          <input type="text" class="form-control" name="name1" id="name1" placeholder="대분류명 입력">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="cate1_insert_btn" class="btn btn-primary cate_modal_reg" data-step="1">등록</button>
        <button type="button" class="btn btn-dark cate_modal_close" data-bs-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>  
</div>  <!-- 대분류등록 Modal 기능(끝) -->

<!-- 중분류등록 Modal 기능(시작) -->
<div class="cate_css_modal">
  <div class="cate_modal_main">
    <h5 class="modal_title tt_03">중분류 등록</h5>
    <div class="modal_body">
      <?php
        $query = "SELECT * FROM category WHERE step=1";
        $result = $mysqli -> query($query);
        while($rs = $result -> fetch_object()){
          $cate2[] = $rs;
        }
      ?>
      <div class="row cate_modal_select">  
        <select id="pcode2">
          <option selected disabled>대분류 먼저 선택하세요.</option>
          <!-- <option value="1">대분류1</option> -->
          <?php
            foreach($cate2 as $p){
          ?>
          <option value="<?php echo $p -> cid ?>"><?php echo $p -> name ?></option>
          <?php } ?>
        </select>
      </div>
      <input type="hidden" name="code2" id="code2" value="">
      <div class="row cate_modal_input">  
        <input type="text" class="form-control" name="name2" id="name2" placeholder="중분류명 입력">
      </div>
    </div>
    <div class="modal_footer">
      <button type="submit" id="cate2_insert_btn" class="btn btn-primary cate_modal_reg" data-step="2">등록</button>
      <button type="button" class="btn btn-dark cate_modal_close">닫기</button>
    </div>
  </div>
</div>  <!-- 중분류등록 Modal 기능(끝) -->

<!-- 소분류등록 Modal 기능(시작) -->
<div class="cate_css_modal" id="cate3Modal" >
  <div class="cate_modal_main">
    <h5 class="modal_title tt_03">소분류 등록</h5>
    <div class="modal_body">
      <div class="col mt-5 cate_section">  
        <select class="cate_large" id="pcode2_1">
          <option selected disabled>대분류 먼저 선택하세요.</option>
          <!-- <option value="1">대분류1</option> -->
          <?php foreach($cate1 as $c){ ?>
            <option value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="row cate_modal_select">
        <select id="pcode3">
          <option selected disabled>중분류 먼저 선택하세요.</option>
          <!-- <option value="1">중분류1</option> -->
        </select>
      </div>

      <input type="hidden" class="form-control" name="code3" id="code3">
      <div class="row cate_modal_input">
        <input type="text" class="form-control" name="name3" id="name3" placeholder="소분류명 입력">
      </div>
    </div>  

    <div class="modal_footer">
      <button type="submit" id="cate3_insert_btn" class="btn btn-primary cate_modal_reg" data-step="3">등록</button>
      <button type="button" class="btn btn-dark cate_modal_close">닫기</button>
    </div>
  </div>
</div>  <!-- 소분류등록 Modal 기능(끝) -->

<script>
  $('.class_menu').css({backgroundColor: "#252a38"});
  $('.class_menu').find('a').css({color: 'white'});
  $(".cate_close button").click(function(e){
    e.preventDefault();
    location.href = '/attention/admin/class/class_list.php';
  });

  $(function(){
    $("select").selectmenu();
  
  //대분류 출력  
    $("#cate1").on("selectcreate", function(event, ui) {
      makeOption($(this), 1, '대분류', $('#cate1'), $('#cate1_div'));  
    }); 

  //대분류 선택 ▶ 중분류 출력 (jQueryUI Method)
    $("#cate1").on("selectmenuselect", function(event, ui) {
      makeOption($(this), 2, '중분류', $('#cate2'), $('#cate2_div'));  
    });  

  //중분류 선택 ▶ 소분류 출력 (jQueryUI Method)
    $("#cate2").on("selectmenuselect", function(event, ui) {
      makeOption($(this), 3, '소분류', $('#cate3'), $('#cate3_div'));  
    });  

  //카테고리 Select & Filter 영역 (jQueryUI Method - Event Listener)
    $("#pcode2_1").on("selectmenuselect", function(event, ui) {
      let data = { 
        cate : $("#pcode2_1").val(),  //대분류의 값이 변경되면  
        step : 2,
        category : '중분류'  
      }

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "printOption.php",
        dataType: 'html',
        success: function(result) {
        $("#pcode3").html(result);  //중분류 div에 html 추가
        $("#pcode3").selectmenu('refresh');
        }
      });
    });  

  //대분류 등록
    $("#cate1_insert_btn").on("click", function(event, ui) {
      let value = $("#name1").val();

      if(value == ''){
        alert("대분류를 입력하세요");
        return false;
      }

      if(value == '-1'){
        alert("분류명이 이미 사용중 입니다.");
      }

      let data = { 
        value : value,  
        step : 1,
      }

      insertOption(data);
    }); 
  
  //중분류 등록
    $("#cate2_insert_btn").on("click", function(event, ui) {
      
    let value = $("#name2").val();
    let pcode = $("#pcode2").val();

    if(value == ''){
      alert("중분류를 입력하세요");
      return false;
    }

    if(pcode == null){
      alert("대분류를 선택하세요");
      return false;
    }

    let data = { 
      value : value,  
      pcode : pcode,
      step : 2,
    }
    insertOption(data);
  }); 

  //소분류 등록
    $("#cate3_insert_btn").on("click", function(event, ui) {
      
      let value = $("#name3").val();
      let pcode = $("#pcode3").val();

      if(value == ''){
        alert("소분류를 입력하세요");
        return false;
      }

      if(pcode == null){
        alert("중분류를 선택하세요");
        return false;
      }

      let data = { 
        value : value,  
        pcode : pcode,
        step : 3,
      }
      insertOption(data);
    }); 

  //카테고리 등록 모달 내, select의 option값 선택시 text style 변경(디자인 통일)
    $("select#pcode2").on("selectmenuchange", function(event, ui){
      $('#pcode2-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });
    $("select#pcode2_1").on("selectmenuchange", function(event, ui){
      $('#pcode2_1-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });
    $("select#pcode3").on("selectmenuchange", function(event, ui){
      $('#pcode3-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });

  //카테고리 수정
    $(document).on("click", ".cate_modify", function() {
      var value = $(this).val();
      var step = $(this).attr("data-step");
      var step_names = ["", "대분류", "중분류", "소분류"];
      var step_name = step_names[step];

      $("#cate_name_text").html(step_name + " 수정");
      $("#cate_name").attr("placeholder", step_name + "명 입력");

      $("#cateModifyModal").modal("show");
      $("#cate_update_btn").attr("value", value);
      $("#cate_update_btn").attr("data-step", step);
      $("#cate_update_btn").attr("step_name", step_name);
    });

  //카테고리 수정
    $("#cate_update_btn").on("click", function(event, ui) {
      var cid = $(this).val();
      var step = $(this).attr("data-step");
      var step_names = ["", "대분류", "중분류", "소분류"];
      var step_name = step_names[step];
      var cate_name = $("#cate_name").val();

      if(cate_name == ''){
        alert("분류명을 입력해주세요");
        return false;
      }

      let data = { 
        step : step,
        cid : cid,
        cate_name : cate_name
      }

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "category_modify.php",
        success: function(result) {
          if(result == '1'){
            alert("수정 완료되었습니다 :)");
            var new_step = parseInt(step)-1;
            makeOption($("#cate"+new_step), step, step_name, $('#cate'+ step), $('#cate'+step+'_div'));
            location.reload();
          $("#cateModifyModal").modal("hide");
          } else if(result == 'duplicate'){
            alert("분류명이 이미 사용중 입니다.");
          } else{
            alert("수정 실패.. :(");
          }
        }
      });
    });  //ajax

    // 카테고리 삭제
    $(document).on("click", ".cate_delete", function() {
      var value = $(this).val();
      var step = $(this).attr("data-step");
      var text = $(this).attr("data-text");
      var step_names = ["", "대분류", "중분류", "소분류"];
      var step_name = step_names[step];
      var result = confirm(step_name + " " + text + "를(을) 정말 삭제하시겠습니까? :0");

      let data = { 
        value : value
      }

      if (result === true) {
        $.ajax({
          async: false,
          type: 'post',
          data: data,
          url: "category_delete.php",
          success: function(result) {
            if(result == '1') {
              alert("삭제되었습니다 :)");
              var new_step = parseInt(step)-1;
              makeOption($("#cate"+new_step), step, step_name, $('#cate'+ step), $('#cate'+step+'_div'));
              location.reload();
            } else {
              alert("삭제 실패.. :(");
            }
          }
        });  //ajax
      }  //if
    });

  });

  let cateModalCloseBtn = $('.cate_modal_close');

  function insertOption(data){
    $.ajax({
      async: false,
      type: 'post',
      data: data,
      url: "save_category.php",
      success: function(result) {
        console.log(result);

        if(result == '1'){
          alert("등록 완료되었습니다 :)");
          location.reload();
        } else if(result == 'error'){
          alert("분류명이 이미 사용중 입니다.");
          cateModalCloseBtn.trigger('click');
        } else{
          alert("등록 실패.. :(");
        }
      }
    });
  }

  function makeOption(evt, step, category, target, target2) {
    let cate = evt.val();  

    let data = { 
      cate : cate,  
      step : step,
      category : category  
    }

    $.ajax({
      async: false,
      type: 'post',
      data: data,
      url: "printOption.php",
      dataType: 'html',
      success: function(result) {
      target.html(result);  //중분류 div에 html 추가
      target.selectmenu('refresh');
      addOptionsToDiv(target, target2, "option:not(:disabled)", step);
      }
    });
  }

  //함수 정의(카테고리 Select & Filter 영역)
  function addOptionsToDiv(target, target2, optionSelector, step) {
    //선택된 중분류 옵션 中 disabled가 아닌 옵션만 가져오기
    let newOptionHTML = '';
    target.find(optionSelector).each(function() {
    var selectedOptionValue = $(this).val();  
    var selectedOptionText = $(this).text();  

    //새로운 중분류 옵션들 추가 시, html코드
    newOptionHTML += `
      <dl class="d-flex justify-content-between align-items-center pb-3">
      <dt class="text1">${selectedOptionText}</dt>
      <div class="cate_icon d-flex">
        <button type="button" value="${selectedOptionValue}" data-step="${step}" data-text="${selectedOptionText}" class="p-0 cate_modify"><i class="bi bi-pencil-square icon_mint"></i></button>
        <button type="button" value="${selectedOptionValue}" data-step="${step}" data-text="${selectedOptionText}" class="p-0 cate_delete"><i class="bi bi-trash-fill icon_red"></i></button>
      </div>
      </dl>
    `;
    });

    target2.html(newOptionHTML);  //출력 영역에 추가
  }

</>

<script src="/attention/admin/js/category.js"></script>   
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>




