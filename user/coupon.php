<?php

	$where = '';
	if(isset($_SESSION['UID'])){
			$where = "B.userid = '{$_SESSION['UID']}'";
	}

  $sql2 = "SELECT A.coupon_name, B.ucid, A.coupon_price, A.coupon_image FROM coupons A JOIN user_coupons B ON A.cid = B.couponid  WHERE B.userid = '{$_SESSION['UID']}' AND B.use_max_date > now() AND A.status = 1 AND B.status = 1";
  $result2 = $mysqli -> query($sql2);
  while($rs2 = $result2 -> fetch_object()){
      $rsc2[]=$rs2;
  }
	 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>코드래빗</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/coupon.css">
</head>
<body>
  <header>
    <!-- 로그인 전 -->
    <!-- <nav class="d-flex justify-content-between align-items-center container_cr">
        <h1><img src="img/main/coderabbit_logo.svg" alt="코드래빗 로고"></h1>
        <ul class="d-flex justify-content-between menu-list">
          <li><a href="" class="tt_03">ABOUT</a></li>
          <li><a href="" class="tt_03">강의</a></li>
          <li><a href="" class="tt_03">공지사항</a></li>
        </ul>
      <div class="d-flex justify-content-between login-btn">
        <a href="" class="btn btn-outline-primary">로그인</a>
        <a href="#" class="btn btn-dark-blue icon_red_baisc">회원가입</a>
      </div>
    </nav> -->
    <!-- /로그인 전 -->

    <!-- 로그인 후 -->
    <nav class="d-flex justify-content-between container_cr">
       <h1><a href="index.html"><img src="img/main/coderabbit_logo.svg" alt="코드래빗 로고"></a></h1>
        <ul class="d-flex align-items-center menu-list">
          <li><a href="" class="tt_03">ABOUT</a></li>
          <li><a href="" class="tt_03">강의</a></li>
          <li><a href="" class="tt_03">공지사항</a></li>
        </ul>
      <div class="d-flex justify-content-between login-ok-btn gap">
        <a href="" class="d-flex align-items-center"><i class="bi bi-cart3"></i></a>
        <div class="d-flex align-items-center main_admin position-relative">
          <a href="#"><i class="bi material-symbols-outlined">face</i></a>
          <div class="login_mypage position-relative">
            <div class="login_content d-flex flex-column justify-content-between">
              <div class="login_box d-flex flex-column align-items-center">
                <div class="login_top d-flex flex-column align-items-center">
                  <h2>유저 네임</h2>
                  <div class="thumbnail d-flex align-items-center">
                    <img src="img/main/piskel_rabbit.png" alt="프로필">
                  </div>
                </div>
                <div class="login_icon_box d-flex align-items-center justify-content-between">
                  <a href=""><i class="bi bi-ticket-perforated"><span>쿠폰</span></i></a>
                  <a href=""><i class="bi bi-mortarboard"><span>내 강의실</span></i></a>
                </div>
              </div>
              <div class="login_bot"><a href="" class="text-start">로그아웃</a></div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- /로그인 후 -->
  </header>
  <main class="container_cr">
    <section class="sub_mg_t coup_top">
      <h2 class="tt_01 mg_bot">쿠폰 혜택</h2>
      <div class="row coupon_top">
        <div class="col text-center">사용 가능한 쿠폰 <span class="text1">1</span>장</div>
        <div class="col  text-center">이번 달 소멸예정 쿠폰 <span class="text1">1</span>장</div>
        <div class="coup_line"></div>
      </div>
    </section>
    <section class="sub_mg_t coup_content">
      <div class="d-flex justify-content-between align-items-center">
       <h3 class="text1"> 할인쿠폰 전체</h3>
       <div class="coup_right d-flex align-items-center">
        <select name="select" id="select">
          <option>유효기간 순</option>
          <option>발급일 순</option>
          <option>가나다라 순</option>
        </select>
       </div>
      </div>
    </section>
    <form action="" method="" class="mg_top sub_mg_b">
      <div class="row row-cols-3 coup_list gap">
			<?php
          if(isset($rsc2)){
              foreach($rsc2 as $item){
          ?>
        <div class="col white_back d-flex align-items-center position-relative" data-id="<?= $item->cid ?>">
          <div class="coup_box container_cr d-flex justify-content-between align-items-center">
            <div class="coup_thumbnail">
              <img src="img/coup/coup_js.png" alt="">
            </div>
            <div class="coup_text">
              <h3 class="tt_02">10,000원<span class="text3">할인</span></h3>
              <p class="text3">코드래빗 신규 가입 감사쿠폰</p>
              <p class="text4">2023.09.11~2023.09.17<span class="coup_day">D-7</span></p>
            </div>
          </div>  
        </div>
      </div>
			<?php
        } //foreach
      } else {    
      ?>  
      <div>
        <span>사용하실 수 있는 쿠폰이 없습니다.</span>
			</div>
      <?php
        }  
      ?>  
    </form>
	</main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="js/coup.js"></script>
  <script>
    $( function() {
      $( "#select" ).selectmenu();
    } );
  </script>
</body>
</html>