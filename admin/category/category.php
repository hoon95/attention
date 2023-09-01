<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

  $query = "SELECT * FROM category WHERE step=1";
  $result = $mysqli -> query($query);
  while($rs = $result -> fetch_object()){
    $cate1[] = $rs;
  }

?>

<link rel="stylesheet" href="/attention/admin/css/category.css">

<div class="container">
  <div class="common_pd">
    <h2 class="tt_01 text-center">카테고리 관리</h2>

    <div>  <!-- 카테고리 Select & Filter 영역(시작) -->
      <form action="" class="d-flex justify-content-center">
        <div class="row cate_main"> 
          <!-- 대분류 - 중분류 Section(시작)-->
          <div class="col mt-5 cate_section">  
            <select class="cate_large" name="" id="cate1">
              <option selected disabled>대분류</option>
              <!-- <option value="1">대분류1</option> -->
              <?php foreach($cate1 as $c){ ?>
              <option value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></option>
              <?php } ?>
            </select>
            <!-- 대분류 선택시 보여지는 중분류 영역 -->
            <div class="cate_field mt-4 white_back radius_medium">
              <h3 class="tt_03 pb-4">중분류</h3>
              
              <div class="cate_filter">
                <dl class="d-flex justify-content-between align-items-center pb-3">
                  <dt class="text1">중분류1</dt>
                  
                  <div id="cate2">
                    <dd></dd>
                  </div>

                  <div class="cate_icon d-flex">
                    <dd><button type="button" value="중분류1 수정" class="p-0 cate_modify"><i class="bi bi-pencil-square icon_mint"></i></button></dd>
                    <dd><button type="button" value="중분류1 삭제" class="p-0"><i class="bi bi-trash-fill icon_red"></i></i></button></dd>
                  </div>
                </dl>  
                <dl class="d-flex justify-content-between align-items-center pb-3">
                  <dt class="text1">중분류2</dt>
                  <div class="cate_icon d-flex">
                    <dd><button type="button" value="중분류2 수정" class="p-0 cate_modify"><i class="bi bi-pencil-square icon_mint"></i></button></dd>
                    <dd><button type="button" value="중분류2 삭제" class="p-0"><i class="bi bi-trash-fill icon_red"></i></i></button></dd>
                  </div>
                </dl>
                <dl class="d-flex justify-content-between align-items-center pb-3">   
                  <dt class="text1">중분류3</dt>
                  <div class="cate_icon d-flex">
                    <dd><button type="button" value="중분류3 수정" class="p-0 cate_modify"><i class="bi bi-pencil-square icon_mint"></i></button></dd>
                    <dd><button type="button" value="중분류3 삭제" class="p-0"><i class="bi bi-trash-fill icon_red"></i></i></button></dd>
                  </div>
                </dl>
              </div>
              
            </div>
          </div>  <!-- 대분류 - 중분류 Section(끝)-->

          <!-- 중분류 - 소분류 Section(시작)-->
          <div class="col mt-5 cate_section">  
            <select class="" name="" id="cate2t">
              <option selected disabled>중분류</option>
              <!-- <option value="1">중분류1</option> -->
            </select>
            <!-- 중분류 선택시 보여지는 소분류 영역 -->
            <div class="cate_field mt-4 white_back radius_medium">
              <h3 class="tt_03 pb-4">소분류</h3>
              <div class="cate_filter">
                <dl class="d-flex justify-content-between align-items-center pb-3">
                  <dt class="text1">소분류1</dt>
                  <div class="cate_icon d-flex">
                    <dd><button type="button" value="소분류1 수정" class="p-0 cate_modify"><i class="bi bi-pencil-square icon_mint"></i></button></dd>
                    <dd><button type="button" value="소분류1 삭제" class="p-0"><i class="bi bi-trash-fill icon_red"></i></i></button></dd>
                  </div>
                </dl>
                <dl class="d-flex justify-content-between align-items-center pb-3">  
                  <dt class="text1">소분류2</dt>
                  <div class="cate_icon d-flex">
                    <dd><button type="button" value="소분류2 수정" class="p-0 cate_modify"><i class="bi bi-pencil-square icon_mint"></i></button></dd>
                    <dd><button type="button" value="소분류2 삭제" class="p-0"><i class="bi bi-trash-fill icon_red"></i></i></button></dd>
                  </div>
                </dl>
                <dl class="d-flex justify-content-between align-items-center pb-3">  
                  <dt class="text1">소분류3</dt>
                  <div class="cate_icon d-flex">
                    <dd><button type="button" value="소분류3 수정" class="p-0 cate_modify"><i class="bi bi-pencil-square icon_mint"></i></button></dd>
                    <dd><button type="button" value="소분류3 삭제" class="p-0"><i class="bi bi-trash-fill icon_red"></i></i></button></dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>  <!-- 중분류 - 소분류 Section(끝)-->

        </div>  <!-- class="row"(끝) -->
      </form>
    </div>  <!-- 카테고리 Select & Filter 영역(끝) -->

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

<!-- 대분류등록 Modal 기능(시작) -->
<div class="modal fade" id="cate1Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="submit" class="btn btn-primary cate_modal_reg" data-step="1">등록</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>  
</div>  <!-- 대분류등록 Modal 기능(끝) -->

<!-- 중분류등록 Modal 기능(시작) -->
<div class="cate_css_modal" id="cate2Modal" >
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
        <select class="" name="" id="pcode2">
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
      <button type="submit" class="btn btn-primary cate_modal_reg" data-step="2">등록</button>
      <button type="button" class="btn btn-dark cate_modal_close">닫기</button>
    </div>
  </div>
</div>
<!-- 중분류등록 Modal 기능(끝) -->

<!-- 소분류등록 Modal 기능(시작) -->
<div class="cate_css_modal" id="cate3Modal" >
  <div class="cate_modal_main">
    <h5 class="modal_title tt_03">소분류 등록</h5>
    <div class="modal_body">
      <!--
      <div class="row cate_modal_select">  
        <select class="" name="" id="pcode2_1">
          <option selected disabled>대분류 먼저 선택하세요.</option>
          
          <?php
            foreach($cate1 as $c){
          ?>
          <option value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></option>
          <?php } ?>
        </select>
      </div>
      -->
      <div class="col mt-5 cate_section">  
        <select class="cate_large" name="" id="pcode2_1">
          <option selected disabled>대분류 먼저 선택하세요.</option>
          <!-- <option value="1">대분류1</option> -->
          <?php foreach($cate1 as $c){ ?>
          <option value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="row cate_modal_select">
        <select class="" name="" id="pcode3">
          <option selected disabled>중분류 먼저 선택하세요.</option>
          <!--
          <option value="1">중분류1</option>
          <option value="2">중분류2</option>
          <option value="3">중분류3</option> -->
        </select>
      </div>
      <input type="hidden" class="form-control" name="code3" id="code3">
      <div class="row cate_modal_input">
        <input type="text" class="form-control" name="name3" id="name3" placeholder="소분류명 입력">
      </div>
    </div>
    <div class="modal_footer">
      <button type="submit" class="btn btn-primary cate_modal_reg" data-step="3">등록</button>
      <button type="button" class="btn btn-dark cate_modal_close">닫기</button>
    </div>
  </div>
</div>
<!-- 소분류등록 Modal 기능(끝) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></scr>

<script>
  $('#cate1').on('change', function(){  
    makeOption($(this), 2, '중분류', $('#cate2'));  
  });  

  function makeOption(evt, step, category, target){
    let cate = evt.val();  
    console.log(cate);

    let data = { 
      cate : cate,  
      step : step,
      category : category  
    }

    $.ajax({
      async : false,  
      type: 'post',  
      data: data,  
      url: "printOption.php",  
      dataType: 'html',  
      success: function(result){
        console.log(result);  
        target.html(result);  
      }
    });  //ajax
  }
</script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>

<script>
  $(function(){
    $("select").selectmenu();
  });
</script>

<script src="category.js"></script>  



