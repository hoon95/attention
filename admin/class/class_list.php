<?php

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
    $rsc[] = $rs;  //rsc: rs의 content라는 의미.
  }

  //print_r($rsc);  //data가 어떻게 들어가 있을까 확인.
//  var_dump($rsc);  //data의 원형도 확인.
?>


<div class="container">
  <h2 class="h3 mt-5">상품 목록</h2>

  <!-- category.php에서 복붙 -->
  <form action="" class="mt-5" id="search_form">
    <div class="row">

      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate1" name="cate1">
          <option selected disabled>대분류</option>
     <!-- <option value="1">One</option> -->
          <?php
            foreach($cate1 as $c){
          ?>
          <option value="<?php echo $c -> cid ?>"<?php echo $cates1 == $c->cid ? " selected" : ""?>><?php echo $c -> name ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate2" name="cate2" data-cate="<?php echo $cate2?>">
          <option selected disabled>중분류</option>

        </select>
      </div>

      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate3" name="cate3"data-cate="<?php echo $cate3?>">
          <option selected disabled>소분류</option>

        </select>
      </div>

    </div>

    <!-- bootstrap > checks & radios 양식 코드 복붙 -->
    <div class="input-group d-flex g-5 align-items-center mt-4">
      <span>
        <input class="form-check-input" type="checkbox" value="1" name="isnew" id="isnew"<?php echo $isnew == 1 ? " checked" : ""?>>
        <label class="form-check-label me-2" for="isnew">신제품</label>
      </span>

      <span>
        <input class="form-check-input" type="checkbox" value="1" name="isbest" id="isbest"<?php echo $isbest == 1 ? " checked" : ""?>>
        <label class="form-check-label me-2" for="isbest">베스트</label>
      </span>

      <span>
        <input class="form-check-input" type="checkbox" value="1" name="isrecom" id="isrecom"<?php echo $isrecom == 1 ? " checked" : ""?>>
        <label class="form-check-label" for="isrecom">추천</label>
      </span>

      <input type="text" class="form-control ms-3" name="search_keyword" id="search_keyword" value="<?php echo $search_keyword?>" placeholder="제목 및 내용을 검색하세요.">
      <button class="btn btn-primary">검색</button>
      <a href="/attention/admin/class/class_list.php" style="margin-left:15px;" class="btn btn-primary">초기화</a>
    </div>
  </form>

  <!-- bootstrap > content > tables 기본양식 코드 복붙 -->
  <form action="plist_update.php">
    <table class="table mt-4 product_list">
      <thead>
        <tr>
          <th scope="col">썸네일</th>
          <th scope="col">상품명</th>
          <th scope="col">가격</th>
          <th scope="col">난이도</th>
          <th scope="col">신제품</th>
          <th scope="col">베스트</th>
          <th scope="col">추천</th>
          <th scope="col">상태</th>
          <th scope="col">상세보기</th>
        </tr>
      </thead>
      <tbody>

        <?php
          if(isset($rsc)){
            foreach($rsc as $item){
        ?>
        <tr>
          <td>
            <input type="hidden" name="pid[]" value="<?php echo $item -> pid ?>">
            <img src="<?php echo $item -> thumbnail ?>" style="width:100px;height:100px;" alt="">
          </td>
          <td><?php echo $item -> name ?></td>
          <td><?php echo $item -> price == "0" ? "무료" : ("유료 (".number_format($item -> price_val).")")?></td>
          <td><?php echo $level_arr[$item -> level] ?></td>
          <td>
            <input class="form-check-input" type="checkbox" value="<?php echo $item -> isnew ?>" <?php if($item -> isnew){echo "checked";} ?> name="isnew[<?php echo $item -> pid ?>]" id="isnew[<?php echo $item -> pid ?>]">
          </td>
          <td>
            <input class="form-check-input" type="checkbox" value="<?php echo $item -> isbest ?>" <?php if($item -> isbest){echo "checked";} ?> name="isbest[<?php echo $item -> pid ?>]" id="isbest[<?php echo $item -> pid ?>]">
          </td>
          <td>
            <input class="form-check-input" type="checkbox" value="<?php echo $item -> isrecom ?>" <?php if($item -> isrecom){echo "checked";} ?> name="isrecom[<?php echo $item -> pid ?>]" id="isrecom[<?php echo $item -> pid ?>]">
          </td>
          <td>
       <!-- <input class="form-check-input" type="checkbox" value="<?php echo $item -> status ?>" <?php if($item -> status){echo "checked";} ?> name="status[<?php echo $item -> pid ?>]" id="status[<?php echo $item -> pid ?>]"> -->
            <select name="stat[<?php echo $item -> pid ?>]" id="stat[<?php echo $item -> pid ?>]" class="form-select" aria-label="노출여부 설정">
              <option value="-1" <?php if($item -> status == -1){echo "selected";} ?> >판매중지</option>
              <option value="0" <?php if($item -> status == 0){echo "selected";} ?> >판매대기</option>
              <option value="1" <?php if($item -> status == 1){echo "selected";} ?> >판매중</option>
            </select>
          </td>
          <td>
            <a href="class_view.php?pid=<?php echo $item -> pid ?>" class="btn btn-primary">보기</a>
          </td>
        </tr>
        <?php
            }
          } else {
        ?>

        <tr>
          <td colspan="10"> 검색 결과가 없습니다. </td>
        </tr>

        <?php
          }
        ?>
      </tbody>
    </table>

  </form>

  <hr>
  <a href="class_up.php" class="btn btn-primary">제품 등록</a>

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
