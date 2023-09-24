<?php
//$product_dview_css = '<link rel="stylesheet" href="/attention/user/css/product_detail_view.css">';
$title = '강의 상세보기 - Code Rabbit';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';
$pid = empty($_GET["pid"]) ? alert("잘못된 접근입니다.") : $_GET["pid"];

$class_row = sql_fetch_array("
    SELECT 
        class.*,
        (SELECT `name` FROM `category` WHERE `cid` = `class`.`cate1` LIMIT 1) AS cate1_name,
        class_clips.video_url
    FROM `class`
    JOIN `class_clips` ON class.pid = class_clips.pid
    WHERE class.pid = ".$pid
);

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

  //현재 상품 정보를 쿠키에 저장s
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
    setcookie('recent_view_pd', json_encode($pvc), time() + 86400, '/');
    // setcookie('recent_view_pd', json_encode($pvc), time() + 86400);
  }
?>

<link rel="stylesheet" href="/attention/user/css/class_detail_view.css">

  <div class="product_detail_header">
    <div class="d-flex container product_detail_title align-items-center">
      <h2 class="product_name white"><?php echo $class_row["name"][0]?></h2>
      <span class="product_title_dash white">&#8211;</span>
      <h3 class="product_sub_name white"><?php echo $class_row["sub_name"][0]?></h3>
    </div>
  </div>

  <div class="product_detail_navtabs">
    <ul class="nav nav-underline container">
      <li class="nav-item">
        <a href="#강의소개" class="nav-link text5" aria-current="page" href="#">강의소개</a>
      </li>
      <li class="nav-item">
        <a href="#체험하기" class="nav-link text5" href="#">체험하기</a>
      </li>
      <li class="nav-item">
        <a href="#교육과정" class="nav-link text5" href="#">교육과정</a>
      </li>
    </ul>
  </div>

  <div class="container product_detail_main">
    <section class="dark_gray">
      <div class="product_detail_section_title" id="강의소개"><h4>강의 소개</h4></div>
      <div class="product_greeting">
        <p class="product_greeting_point text2"><?php echo $class_row["greeting"][0]?></p>
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
              <td><?php echo $level_arr[$class_row["level"][0]]?></td>
            </tr>
            <tr>
              <th>카테고리</th>
              <td><?php echo $class_row["cate1_name"][0]?></td>
            </tr>
            <tr>
              <th>수강대상</th>
              <td>
                <?php echo $class_row["student"][0]?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section>
      <div class="product_promotion_area mint_back white"><h4><?php echo $class_row["promotion"][0]?></h4></div>
    </section>

    <section class="product_content_section">
      <div class="product_content_wrap">
          <?php echo $class_row["content"][0]?>
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
        </figure>
      </div>
    </section>
<?php
if (!empty($class_row["video"][0]))
{
?>
    <section class="product_video_area" id="체험하기">
      <div class="product_video_section_title dark_gray"><h4>체험 하기</h4></div>
      <div class="product_video">
        <iframe width="560" height="315" src="<?php echo $class_row["video"][0]?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
    </section>
    <?php
    }
    ?>

<?php
if (!empty($class_row["curriculum"][0]))
{
  $curriculum_arr = explode("\n", trim($class_row["curriculum"][0]));
?>
    <section id="교육과정">
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
                <span class="mint me-3">0<?php echo ($i+1)?></span>
                <span class="dark_gray class_course_title"><?php echo $curriculum_info[0]?></span>
              </button>
            </h2>
            <div id="panelsStayOpen-collapse<?php echo $i?>" class="accordion-collapse collapse" style="">
<?php
        for ($j=0; $j < count((array)$curriculum_detail); $j++){
?>
              <div class="accordion-body">
                <ul class="row d-flex align-items-center justify-content-between class_lecture_list">
                  <li class="col gray"><button class="class_youtube_btn" data-link="<?= $class_row['video_url'][$j] ?>"><i class="bi bi-play-circle play_hidden"></i></button></li>
                  <li class="col-7"><?php echo $curriculum_detail[$j]?></li>
                  <li class="col-4"><?php echo $j+1?> / <?php echo count((array)$curriculum_detail)?></li>
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
          <img src="<?php echo $class_row["thumbnail"][0]?>" alt="">
        </div>
      </div>
      <div>
        <div class="d-flex align-items-center product_sale_info">
<?php
if ($class_row["price"][0] == "1")
{
?>
        <span class="tt_03">&#8361;</span>
<?php
}
?>
          <p class="tt_03 product_sale_price"><?php echo $class_row["price"][0] == "0" ? "무료" : number_format($class_row["price_val"][0])?></p>
        </div>
      </div>
      <hr class="product_aside_hline light_gray">
      <table class="product_level_period">
        <tbody class="text5">
          <tr class="product_level"><th class="gray">난이도</th><td class="dark_gray"><?php echo $level_arr[$class_row["level"][0]]?></td></tr>
          <tr class="product_period"><th class="gray">수강기간</th><td class="dark_gray"><?php echo $class_row["sale_end_date"][0] == "0" ? "평생 무제한" : ($class_row["date_val"][0]."개월")?></td></tr>
        </tbody>
      </table>
      <div class="text4 product_share"><button type="button" class="product_share_btn dark_gray blue_Gray_back"><i class="bi bi-share-fill"></i>공유</button></div>
      <div class="text4 product_tobasket"><button type="button" id="cart-btn" data-pid="<?php echo $pid?>" class="product_tobasket_btn white mint_back" >장바구니에 담기</button></div>
    </div>
  </aside>

  <script>
  $("#cart-btn").click(function () {
      var pid = $(this).attr("data-pid");
      $.ajax({
          type: "post",
          url: "cart_ok.php",
          data:
          {
              pid: pid
          },
          success: function(data)
          {
              var obj = JSON.parse(data);
              if (obj.result == "success")
              {
                  if (confirm("장바구니에 담았습니다. \n장바구니로 이동하시겠습니까?"))
                  {
                      location.href = "../cart/cart.php";
                  }
              }
              else if (obj.result == "exist")
              {
                  if (confirm("이미 담겨있는 상품입니다. \n장바구니로 이동하시겠습니까?"))
                  {
                      location.href = "../cart/cart.php";
                  }
              }
              else if (obj.result == "fail")
              {
                  alert(obj.msg);
              }
              else
              {
                  alert(data);
              }
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      });
  });
  // 재생 버튼 클릭 시 새 창으로 비디오 생성
  $('.class_youtube_btn').click(function(){
    if($('.class_youtube_btn').find('i').hasClass('play_hidden') == false){
      let youtube_link = $(this).attr('data-link');
      let playHistory = {
        link: youtube_link,
        timestamp: new Date().toISOString()
      };
      localStorage.setItem('playHistory', JSON.stringify(playHistory));
      
      window.open(youtube_link, '_blank');
      location.reload();
    }else{
      alert('강의 구매 후 시청 가능합니다.')
    }
  })

  let recent_video_data = localStorage.getItem('playHistory');
  if(recent_video_data){
    let recent_video = JSON.parse(recent_video_data).link; // 문자열에서 객체로 변환 후 link 속성 가져오기

    // 이어보기 버튼 추가
    $('.product_course').append('<button id="continue" class="class_youtube_btn d-flex justify-content-start align-items-center g-3"><i class="bi bi-play-circle play_hidden"></i></button>');

    // 이어보기 버튼 클릭 시 최근 비디오 재생
    $('#continue').click(function(){
      if($(this).find('i').hasClass('play_hidden') == false){
        window.open(recent_video, '_blank');
      }else{
        alert('강의 구매 후 시청 가능합니다')
      }
    });
  }

  // 이어보기 제목(가장 최근에 본 강의) 출력
  let video_url = localStorage.getItem('playHistory');
  let video_id = video_url.split('/embed/')[1].split('?')[0];  // URL에서 비디오 ID 추출
  let apiKey = "AIzaSyCSUUhBllrzg0OL4FHyl5L04JBtrx1pQic";  // API 키(Google Cloud Console)

  fetch(`https://www.googleapis.com/youtube/v3/videos?id=${video_id}&key=${apiKey}&part=snippet`)
    .then(response => response.json())
    .then(data => {
        if(data.items && data.items.length > 0){
            let title = data.items[0].snippet.title;
            if($('#continue').find('i').hasClass('play_hidden') == false){
              $('#continue').find('i').text('이어보기 : '+title);
            }
        }else{
            console.log("영상 불러오기 실패");
        }
    })
    .catch(error => {
        console.log("Error fetching video info:", error);
    });

  </script>

<?php
  // 구매한 사람만 재생버튼 생성
  if(isset($_SESSION['UID'])){
    $sql = "SELECT COUNT(sid) AS cnt FROM sales WHERE userid = '{$_SESSION['UID']}' AND pid = {$pid}";
    $result = $mysqli -> query($sql);

    if($result){
    while($rs = $result -> fetch_object()){
      $rsc[]=$rs;
      }
      foreach($rsc as $item){
        if($item->cnt !="0"){
          echo "<script>
          $('.bi-play-circle').removeClass('play_hidden')
          </script>";
        }
      }
    }
  }
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>