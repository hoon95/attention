<?php
  ob_start();   
  //$product_dview_css = '<link rel="stylesheet" href="/attention/user/css/product_detail_view.css">';
  //$title = '강의 상세보기 - Code Rabbit';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';
  $pid = empty($_GET["pid"]) ? alert("잘못된 접근입니다.") : $_GET["pid"];
  $product_row = sql_fetch("SELECT *, (SELECT `name` FROM `category` WHERE `cid` = `class`.`cate1` LIMIT 1) AS cate1_name  FROM `class` WHERE pid = ".$pid);

  $file_row = sql_fetch_array("SELECT * FROM class_image_table WHERE pid=".$pid." AND status = 1");

  
  
  /* 최근 본 강의 (쿠키) */
  $sql = "SELECT * FROM class WHERE pid={$pid}";
  $result = $mysqli->query($sql);
  $rs = $result->fetch_object();

  //쿠키 확인
  if (!isset($_COOKIE['recent_view_pd'])){ //쿠키가 없다면 빈 배열 생성
    $pvc = array();
  } else {
    $pvc = json_decode($_COOKIE['recent_view_pd'], true); //쿠키가 있으면 json값을 배열로 변경, 저장
  }

  $compareVal = $rs->pid; //현재 상품 정보와 비교할 값 (이미 본 건지)
  $found = false; //봤던 상품인지 여부 비교할 변수

  //배열 내의 각 항목과 비교
  foreach ($pvc as $pc){
    if ($pc['pid'] == $compareVal) {
      $found = true;
      break;
    }
  }

  //현재 상품 정보를 쿠키에 저장
  if (!$found){
    if (count($pvc) >= 3){ //이미 3개의 쿠키가 있다면 
      array_shift($pvc); //배열의 첫번째 값을 지운다.
    }
    $pvc[] = array( //배열에 현재상품정보 추가
      'pid' => $rs -> pid,
      'thumbnail' => $rs -> thumbnail,
      'name' => $rs -> name,
      'teacher' => $rs -> teacher,
      'level' => $rs -> level,
      'price_val' => $rs -> price_val
    );
    //배열을 다시 json으로 인코딩, 쿠키 저장, 24시간 유지
    setcookie('recent_view_pd', json_encode($pvc), time() + 86400);
  }
?>

<link rel="stylesheet" href="/attention/user/css/class_detail_view.css">

  <div class="product_detail_header">
    <div class="d-flex container product_detail_title align-items-center">
      <h2 class="product_name white"><?php echo $product_row["name"]?></h2>
      <span class="product_title_dash white">&#8211;</span>
      <h3 class="product_sub_name white"><?php echo $product_row["sub_name"]?></h3>
    </div>
  </div>

  <div class="product_detail_navtabs">
    <ul class="nav nav-underline container">
      <li class="nav-item">
        <a class="nav-link text5" aria-current="page" href="#">강의소개</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text5" href="#">체험하기</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text5" href="#">강사소개</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text5" href="#">교육과정</a>
      </li>
    </ul>
  </div>

  <div class="container product_detail_main">
    <section class="dark_gray">
      <div class="product_detail_section_title"><h4>강의 소개</h4></div>
      <div class="product_greeting">
        <p class="product_greeting_point text2"><?php echo $product_row["greeting"]?></p>
        <div class="product_greeing_explain text3">
          <p>처음으로 프로그래밍을 시작하는 분들을 위한 웹 개발 입문 강의입니다.</p>
          <p>HTML, CSS를 배우고 스타벅스 랜딩 페이지를 만들어봄으로써 웹페이지 제작에 꼭 필요한 기본적인 내용들을 학습합니다.</p>
        </div>
      </div>

      <div class="product_detail_table">
        <table>
          <tbody>
            <tr>
              <th>난이도</th>
              <td><?php echo $level_arr[$product_row["level"]]?></td>
            </tr>
            <tr>
              <th>카테고리</th>
              <td><?php echo $product_row["cate1_name"]?></td>
            </tr>
            <tr>
              <th>수강대상</th>
              <td>
                <?php echo $product_row["student"]?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section>
      <div class="product_promotion_area mint_back white"><h4><?php echo $product_row["promotion"]?></h4></div>
    </section>

    <section class="product_content_section">
      <div class="product_content_wrap">
        <?php echo $product_row["content"]?>
        <!-- <div class="product_content_point text2"><h4>알파벳을 배우듯 웹 개발을 공부하세요.</h4></div>
        <div class="product_content_explain dark_gray">
          <div class="product_content_paragraph">
            <p>우리의 어린 시절을 한 번 떠올려 봅시다. 살면서 가장 먼저 배운게 무엇이었나요? 바로 말하는 방법, 즉 ’언어’죠.
              컴퓨터도 마찬가지 입니다. 내가 원하는 대로 컴퓨터를 작동시키려면 컴퓨터와 소통하기 위한 언어를 배워야 하죠.</p>
          </div>
          <div class="product_content_paragraph">
            <p>그렇다면 수많은 컴퓨터 언어 중에 어떤 걸 배워야 할까요?</p>
            <p>처음으로 IT 기술을 접하는 분들이라면, 웹 개발에 필요한 언어로 시작하는 걸 추천합니다.</p>
            <p>매일같이 마주하고 이용하는 웹은 앞으로도 중요하게 여겨질 기술이니까요. </p>
          </div>
        </div> -->
      </div>
    </section>

    <section>
      <div class="product_addimg_area">
        <figure>
        <?php
        if (count((array)$file_row["imgid"])){
          for ($i=0; $i < count((array)$file_row["imgid"]); $i++){
        ?>
          <div class="product_addimg">
            <img src="/attention/pdata/class/<?php echo $file_row["filename"][$i]?>" alt="">
          </div>
        <?php
          }
        }
        ?>
          <div class="product_addimg_explain text2">
            <p>특히 HTML, CSS, JavaScript는</p>
            <p>웹 개발을 시작한다면 반드시 알아야 할 언어입니다.</p>
          </div>
        </figure>
      </div>
    </section>
    <?php
      if (!empty($product_row["video"])){
    ?>
    <section class="product_video_area">
      <div class="product_video_section_title dark_gray"><h4>체험 하기</h4></div>
      <div class="product_video">
        <iframe width="560" height="315" src="<?php echo $product_row["video"]?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
    </section>
    <?php
    }
    ?>

    <?php
      if (!empty($product_row["curriculum"])){
        $curriculum_arr = explode("\n", trim($product_row["curriculum"]));
    ?>
    <section>
      <div class="product_course_section_title dark_gray"><h4>교육 과정</h4></div>
      <div class="product_course">
      <div class="accordion">
    <?php
      for ($i=0; $i < count((array)$curriculum_arr); $i++){
        $curriculum_info = explode("|", trim($curriculum_arr[$i]));
        $curriculum_detail = explode(",", trim($curriculum_info[1]));
    ?>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $i?>"
          aria-expanded="false" aria-controls="panelsStayOpen-collapse<?php echo $i?>">
            <span class="mint">0<?php echo ($i+1)?></span>
            <span class="dark_gray"><?php echo $curriculum_info[0]?></span>
          </button>
        </h2>
      <div id="panelsStayOpen-collapse<?php echo $i?>" class="accordion-collapse collapse" style="">
    <?php
      for ($j=0; $j < count((array)$curriculum_detail); $j++){
    ?>
      <div class="accordion-body">
        <ul class="row">
          <li class="col gray"><i class="bi bi-play-circle"></i></li>
          <li class="col"><?php echo $curriculum_detail[$j]?></li>
          <li class="col"><?php echo $j+1?> / <?php echo count((array)$curriculum_detail)?></li>
        </ul>
      </div>
    <?php
      }
    ?>
        </div>
      </div>
    <?php
      }
    ?>
        </div>
      </div>
    </section>
    <?php
    }
    ?>
  </div>

  <aside class="product_aside_fixed white_back">
    <div class="product_detail_aside">
      <div class="product_thumbnail_area">
        <div class="product_thumbnail">
          <img src="<?php echo $product_row["thumbnail"]?>" alt="">
        </div>
      </div>
      <div>
        <div class="d-flex align-items-center product_sale_info">
          <?php
            if ($product_row["price"] == "1"){
          ?>
          <span class="tt_03">&#8361;</span>
          <?php
            }
          ?>
          <p class="tt_03 product_sale_price"><?php echo $product_row["price"] == "0" ? "무료" : number_format($product_row["price_val"])?></p>
        </div>
      </div>
      <hr class="product_aside_hline light_gray">
      <table class="product_level_period">
        <tbody class="text5">
          <tr class="product_level"><th class="gray">난이도</th><td class="dark_gray"><?php echo $level_arr[$product_row["level"]]?></td></tr>
          <tr class="product_period"><th class="gray">수강기간</th><td class="dark_gray"><?php echo $product_row["sale_end_date"] == "0" ? "평생 무제한" : ($product_row["date_val"]."개월")?></td></tr>
        </tbody>
      </table>
      <div class="text4 product_share"><button type="button" class="product_share_btn dark_gray blue_Gray_back"><i class="bi bi-share-fill"></i>공유</button></div>
      <div class="text4 product_tobasket"><button type="button" id="cart-btn" data-pid="<?php echo $pid?>" class="product_tobasket_btn white mint_back" >장바구니로 가기</button></div>
    </div>
  </aside>

<script>
  $("#cart-btn").click(function () {
    var pid = $(this).attr("data-pid");
    $.ajax({
      type: "post",
      url: "/attention/user/cart/cart_ok.php",
      data:{
        pid: pid
      },
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.result == "success"){
          if (confirm("장바구니에 담았습니다. \n장바구니로 이동하시겠습니까?")){
            location.href = "/attention/user/cart/cart.php";
          }
        } else if (obj.result == "exist"){
          if (confirm("이미 담겨있는 상품입니다. \n장바구니로 이동하시겠습니까?")){
            location.href = "/attention/user/cart/cart.php";
          }
        } else if (obj.result == "fail"){
          alert(obj.msg);
        } else{
          alert(data);
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert(errorThrown);
      }
    });
    // $_SESSION['UID']
  });
</script>

<?php
  ob_end_flush();
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>
