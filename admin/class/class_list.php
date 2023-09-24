<?php
  $title = '강좌 목록 - Code Rabbit';
  $class_list_css = '<link rel="stylesheet" href="/attention/admin/css/class_list.css">';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

  $query = "SELECT * FROM category WHERE step=1";
  $result = $mysqli -> query($query);

  while($rs = $result -> fetch_object()){
    $cate1[] = $rs;
  }

  $pageNumber = $_GET['pageNumber'] ?? 1;  //?? ⇒ php 버전7부터 쓸 수 있는 중복연산자 라는 문법.
  $pageCount = $_GET['pageNumber'] ?? 50;
  //$pageNumber가 1일때 0~10이 나와야하고, 2일때는 10~20이 나와야 한다.
  $startLimit = ($pageNumber-1) * $pageCount;  //시작번호를 만듦.
  $endLimit = $startLimit + $pageCount;
  $firstPageNumber = $_GET['firstPageNumber'] ?? 0;  //맨좌측 화살표 누르면, 맨 처음으로 가게끔.

  $cates1 = $_GET['cate1'] ?? '';
  $cate2 = $_GET['cate2'] ?? '';
  $cate3 = $_GET['cate3'] ?? '';
  $isnew = $_GET['isnew'] ?? '';
  $isbest = $_GET['isbest'] ?? '';
  $isrecom = $_GET['isrecom'] ?? '';
  $search_keyword = $_GET['search_keyword'] ?? '';

  $search_where = '';

  $cates = $cates1.$cate2.$cate3;

  if($cates){
    $search_where .= " and cate like '{$cates}%'";
  }

  if($isnew){ $search_where .= " and isnew = 1"; }
  if($isbest){ $search_where .= " and isbest = 1"; }
  if($isrecom){ $search_where .= " and isrecom = 1"; }

  if($search_keyword){  //상품명과 내용에 키워드가 포함된 상품 조회
    $search_where .= " and (name like '%{$search_keyword}%' or content like '%{$search_keyword}%')";
  }

  //var_dump($query);

  //1=1 : 이 안에 모든 내용을 불러오라는 조건 (어떤 컬럼하고 일치하는 값을 가져오는게 아니라, 무조건 다 가져와!)
  $sql = "SELECT * FROM class WHERE 1=1";  //이게 기본적으로 있고 + AND 컬럼명=값 AND 컬럼명=값 AND 컬럼명=값.

  $sql .= $search_where;  // === $sql = $sql.$search_where; (AND ismain=1)
  $order = " order by pid desc";  //이어지게 붙이려면 반드시 앞에 한칸 띄워야! 최근순 정렬(내림차순, 가장 마지막에 작성한게 위에 나오도록)
  $limit = " limit $startLimit, $endLimit";  //limit 시작번호, 끝번호

  //우리가 최종적으로 작성할 쿼리문 ex: SELECT * FROM 테이블 WHERE step=1 AND ismain=1 ORDER BY regdate limit 10, 20;
  $query = $sql.$order.$limit;  //쿼리 문장 조합

  //var_dump($query);

  $result = $mysqli -> query($query);

  while($rs = $result -> fetch_object()){
    $rsc[] = $rs; 
  }

  //print_r($rsc);  //data가 어떻게 들어가 있을까 확인.
  //var_dump($rsc);  //data의 원형도 확인.
?>


<div class="container">
  <h2 class="tt_01 text-center">강좌 목록</h2>

  <form action="" class="mt-5" id="search_form">
    <div class="d-flex justify-content-between">
      <div class="me-3"><a href="/attention/admin/category/category.php" class="btn btn-primary class_tocate_btn">카테고리 관리</a></div>
  
      <div class="d-flex justify-content-between me-4 class_cate_filter"> 
        <div class="me-3">  
          <select class="form-select text-center" aria-label="Default select example" id="cate1" name="cate1">
            <option selected disabled>대분류</option>
            <?php
              foreach($cate1 as $c){
            ?>
            <option value="<?php echo $c -> cid ?>"<?php echo $cates1 == $c->cid ? " selected" : ""?>><?php echo $c -> name ?></option>
            <?php } ?>
          </select>
        </div>
  
        <div class="me-3">  
          <select class="form-select text-center" aria-label="Default select example" id="cate2" name="cate2" data-cate="<?php echo $cate2?>">
            <option selected disabled>중분류</option>
          </select>
        </div>
  
        <div>  
          <select class="form-select text-center" aria-label="Default select example" id="cate3" name="cate3"data-cate="<?php echo $cate3?>">
            <option selected disabled>소분류</option>
          </select>
        </div>
      </div>
  
      <div class="input-group d-flex align-items-center">
        <span>
          <input class="form-check-input" type="checkbox" value="1" name="isnew" id="isnew"<?php echo $isnew == 1 ? " checked" : ""?>>
          <label class="form-check-label me-3" for="isnew">신제품</label>
        </span>
  
        <span>
          <input class="form-check-input" type="checkbox" value="1" name="isbest" id="isbest"<?php echo $isbest == 1 ? " checked" : ""?>>
          <label class="form-check-label me-3" for="isbest">베스트</label>
        </span>
  
        <span>
          <input class="form-check-input" type="checkbox" value="1" name="isrecom" id="isrecom"<?php echo $isrecom == 1 ? " checked" : ""?>>
          <label class="form-check-label" for="isrecom">추천</label>
        </span>
      </div>
    </div>

    <div class="d-flex align-items-center justify-content-between mt-3">
      <div><a href="class_up.php" class="btn btn-primary class_add_btn">강좌 등록</a></div>        

      <div class="class_search_reset d-flex">
        <div class="seach d-flex justify-content-between class_search_input">
          <input type="text" class="form-control" name="search_keyword" id="search_keyword" value="<?php echo $search_keyword?>" placeholder="제목 및 내용을 검색하세요.">
          <button class="class_search_btn"><i class="bi bi-search icon_gray"></i></button>
        </div>
        <a href="/attention/admin/class/class_list.php" style="margin-left:15px;" class="btn btn-primary class_reset_btn ms-3">초기화</a>
      </div>
    </div>
  </form>

  <form action="clist_update.php">

    <div class="mt-4 product_list">
      <div>

        <?php
          if(isset($rsc)){
            foreach($rsc as $item){
        ?>

        <div class="d-flex mb-2 justify-content-between white_back class_admin_item">
          <div class="d-flex align-items-center class_main_info">
            <div class="me-3">
              <input type="hidden" name="pid[]" value="<?php echo $item -> pid ?>">
              <a href="class_view.php?pid=<?php echo $item -> pid ?>">
                <img src="<?php echo $item -> thumbnail ?>" alt="" class="class_admin_thumb">
              </a>
            </div>
            <div class="d-flex flex-column">
              <div class="d-flex align-items-center mb-3 class_name_level">
                <div class="me-2 class_admin_name"><?php echo $item -> name ?></div>
                <div class="class_admin_level orange radius_medium"><?php echo $level_arr[$item -> level] ?></div>
              </div>
              <div class="d-flex">
                <div class="me-3"><?php echo $item -> price == "0" ? "무료" : ("유료 (".number_format($item -> price_val).")")?></div>
                <span class="me-3"> / </span>
                <div><?php echo $item -> sale_end_date == "0" ? "무제한" : ("".number_format($item -> date_val)."개월")?></div>
              </div>
            </div>
          </div>
  
          <div class="me-3 d-flex align-items-center admin_display_option">
            <span>
              <input class="form-check-input" type="checkbox" value="<?php echo $item -> isnew ?>" <?php if($item -> isnew){echo "checked";} ?> name="isnew[<?php echo $item -> pid ?>]" id="isnew[<?php echo $item -> pid ?>]">
              <label class="form-check-label me-3">신제품</label>
            </span>
  
            <span>
              <input class="form-check-input" type="checkbox" value="<?php echo $item -> isbest ?>" <?php if($item -> isbest){echo "checked";} ?> name="isbest[<?php echo $item -> pid ?>]" id="isbest[<?php echo $item -> pid ?>]">         
              <label class="form-check-label me-3">베스트</label>
            </span>
  
            <span>
              <input class="form-check-input" type="checkbox" value="<?php echo $item -> isrecom ?>" <?php if($item -> isrecom){echo "checked";} ?> name="isrecom[<?php echo $item -> pid ?>]" id="isrecom[<?php echo $item -> pid ?>]">
              <label class="form-check-label">추천</label>
            </span>
          </div>
  
          <div class="ms-3 me-3 class_status_option">
            <select name="stat[<?php echo $item -> pid ?>]" id="stat[<?php echo $item -> pid ?>]" class="form-select" aria-label="노출여부 설정">
              <option value="0" <?php if($item -> status == 0){echo "selected";} ?> >판매중지</option>
              <!-- <option value="0" <?php if($item -> status == 0){echo "selected";} ?> >판매대기</option> -->
              <option value="1" <?php if($item -> status == 1){echo "selected";} ?> >판매중</option>
            </select>
          </div>
  
          <div class="d-flex ms-3 align-items-center class_modi_del">
            <div class="me-2"><a href="class_view.php?pid=<?php echo $item -> pid ?>"><i class="bi bi-pencil-square icon_mint"></i></a></div>
            <div><a href="class_view.php?pid=<?php echo $item -> pid ?>"><i class="bi bi-trash-fill icon_red"></i></a></div>
          </div>
        </div>

        <?php
            }
          } else {
        ?>

        <hr>
        <p class="mt-4"> 검색 결과가 없습니다. </p>
        
        <?php
          }
        ?>
      </div>
    </div>


  </form>

  <hr>
  <div class="class_allmodi_btn"><a href="#" class="btn btn-primary">일괄 수정</a></div>

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

    if (!mode)
    {
        mode = "";
    }
    let cate = evt.val();

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
</script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>