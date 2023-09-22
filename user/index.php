<?php
  ob_start(); 
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';
  
  /* 강의 테이블 전체 최신순 불러오기 */
  $sql = "SELECT * FROM class ORDER BY pid DESC";
  $result = $mysqli -> query($sql);

  $count = 0; // 현재 추가한 데이터 개수를 추적하는 변수

  while ($rs = $result->fetch_object()) {
    $rsc[] = $rs; // 전체 배열

    if ($count < 8) { // 최근 등록 8개 배열
      $recentAdds[] = $rs;
      $count++;
    }
  }

  /* 테이블 전체 값 가져오기 */
  $cnt_mem = "SELECT COUNT(*) AS count FROM members";
  $re_mem = $mysqli -> query($cnt_mem);
  $rs_mem = $re_mem -> fetch_object();

  $cnt_sale = "SELECT COUNT(*) AS count FROM sales";
  $re_sale = $mysqli -> query($cnt_sale);
  $rs_sale = $re_sale -> fetch_object();

  /* 공지사항 sql */
  $sqlNotice = "SELECT * FROM notice ORDER BY idx DESC LIMIT 0, 6";

  $resultNotice = $mysqli -> query($sqlNotice);
  $rsNotice = $resultNotice -> fetch_object();

  while($rsNotice = $resultNotice -> fetch_object()){
    $rscNotice[] = $rsNotice;
  }
  // var_dump($rscNotice);
  
  // var_dump($recentAdds);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<link rel="stylesheet" href="/attention/user/css/main.css">

<section class="banner">
  <h2 class="d-none">배너 슬라이드</h2>
  <div class="swiper banner-slide">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide slide1">
        <div class="container_cr">
          <h3 class="tt_00 mg_bot">디자인 트렌드 끝판왕,<br>Figma와 Blender 타파하기</h3>
          <p class="text1">다양한 직군과 효율적으로 협업하고<br>무료로 3D 모델링까지 배워요!</p>
        </div>
      </div>
      <div class="swiper-slide slide2">
        <div class="container_cr">
          <h3 class="tt_00 mg_bot">디자인 트렌드 끝판왕,<br>Figma와 Blender 타파하기</h3>
          <p class="text1">다양한 직군과 효율적으로 협업하고<br>무료로 3D 모델링까지 배워요!</p>
        </div>
      </div>
      <div class="swiper-slide slide3">
        <div class="container_cr">
          <h3 class="tt_00 mg_bot">디자인 트렌드 끝판왕,<br>Figma와 Blender 타파하기</h3>
          <p class="text1">다양한 직군과 효율적으로 협업하고<br>무료로 3D 모델링까지 배워요!</p>
        </div>
      </div>
    </div>
    <div class="main-pager d-flex align-items-center">
      <div class="swiper-pagination"></div>
      <div class="main-prev"><i class="text3 bi-chevron-left icon_gray"></i></div>
      <div class="main-slide-btn">
        <div class="main-stop icon_gray"><i class="text3 bi-pause-fill"></i></div>
        <div class="main-play icon_gray"><i class="text3 bi-play-fill"></i></div>
      </div>
      <div class="main-next"><i class="text3 bi-chevron-right icon_gray"></i></div>
    </div>
  </div>
</section>
<main>
  <section class="cate_list d-flex flex-column justify-content-center text-center container_cr">
    <h2 class="tt_03"><strong class="mint">코드래빗</strong>의 다양한 코딩 분야</h2>
    <ul class="d-flex justify-content-between text3">
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=11&s_cate2=17&s_cate3=118&page=1&s_name="><h3 class="mb-2"># html5</h3><img src="img/main/html5.svg" alt="css"></a></li>
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=11&s_cate2=18&s_cate3=21&page=1&s_name="><h3 class="mb-2"># css</h3><img src="img/main/css.svg" alt="css"></a></li>
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=10&s_cate2=12&s_cate3=14&page=1&s_name="><h3 class="mb-2"># javascript</h3><img src="img/main/javascript.svg" alt="javascript"></a></li>
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=10&s_cate2=12&s_cate3=16&page=1&s_name="><h3 class="mb-2"># typescript</h3><img src="img/main/typescript.svg" alt="typescript"></a></li>
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=10&s_cate2=12&s_cate3=42&page=1&s_name="><h3 class="mb-2"># react</h3><img src="img/main/react.svg" alt="react"></a></li>
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=10&s_cate2=12&s_cate3=48&page=1&s_name="><h3 class="mb-2"># flutter</h3><img src="img/main/flutter.svg" alt="flutter"></a></li>
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=10&s_cate2=23&s_cate3=47&page=1&s_name="><h3 class="mb-2"># node.js</h3><img src="img/main/node-js.svg" alt="node.js"></a></li>
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=35&s_cate2=44&s_cate3=74&page=1&s_name="><h3 class="mb-2"># python</h3><img src="img/main/python.svg" alt="python"></a></li>
      <li><a href="/attention/user/class/class_whole_list.php?s_cate1=10&s_cate2=12&s_cate3=43&page=1&s_name="><h3 class="mb-2"># vue-js</h3><img src="img/main/vue-dot-js.svg" alt="vue-js"></a></li>
    </ul>
  </section>

  <section class="new container_cr mt-5">
    <h2 class="tt_01 mg_bot">신규 클래스</h2>
    <div class="swiper new-slide over_pd">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php
          if(isset($recentAdds)){
            foreach($recentAdds as $item){            
        ?>
        <div class="swiper-slide cart_add">
          <a href="/attention/user/class/class_detail_view.php?pid=<?= $item->pid; ?>" class="d-block">
            <img src="<?= $item->thumbnail; ?>" alt="썸네일 이미지">
            <div class="text_box">
              <h3 class="card_tt mb-3"><?= $item->name; ?></h3>
              <p class="text5 name dark_gray"><?= $item->teacher; ?></p>
              <p class="text5 dark_gray"><?= ($item->level == 1) ? '초급' : (($item->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                <span class="orange">₩<span class="price"><?= ($item->price_val == 0) ? '무료' : number_format($item->price_val); ?></span></span>
              </p>
            </div>
          </a>
          <button type="button" name="add_cart" class="cart_btn ctBtn" value="<?= $item->pid; ?>"><i class="bi bi-cart3 icon_mint"></i></button>
        </div>
        <?php
            }
          }
        ?>
      </div>
    </div>
    <i class="chevron bi-chevron-left icon_gray"></i>
    <i class="chevron bi-chevron-right icon_gray"></i>
  </section>

  <section class="best main_mg_t">
    <div class="container_cr">
      <div class="d-flex align-items-end justify-content-between pt-5">
        <h2 class="tt_00">코드래빗의 BEST 강의를 만나보세요!</h2>
        <a href="/attention/user/class/class_whole_list.php" class="text1 card_tt icon_mint">전체보기 +</a>
      </div>
      <p class="tt_03 pb-4">강의 볼 때마다 실력이 껑충!</p>
      <ul class="best_list d-flex gap-4">
        <?php 
        foreach ($rsc as $item) {
          if($item -> pid == 25){
        ?>
        <li class="cart_add col radius_medium box_shadow">
          <a href="/attention/user/class/class_detail_view.php?pid=<?= $item->pid; ?>" class="d-block">
            <img src="<?= $item->thumbnail; ?>" alt="썸네일 이미지">
            <div class="best_box">
              <p class="card_tt mb-4"><?= $item->name; ?></p>
              <p class="text5 dark_gray mb-2"><?= $item->teacher; ?></p>
              <p class="text5 dark_gray"><?= ($item->level == 1) ? '초급' : (($item->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                <span class="orange">₩<span class="price"><?= ($item->price_val == 0) ? '무료' : number_format($item->price_val); ?></span></span>
              </p>
            </div>
          </a>
          <button type="button" name="add_cart" class="cart_btn ctBtn" value="<?= $item->pid; ?>"><i class="bi bi-cart3 icon_mint"></i></button>
        </li>
        <?php
            }
          }
        ?>
        <?php 
        foreach ($rsc as $item) {
          if($item -> pid == 28){
        ?>
        <li class="cart_add col radius_medium box_shadow">
          <a href="/attention/user/class/class_detail_view.php?pid=<?= $item->pid; ?>" class="d-block">
            <img src="<?= $item->thumbnail; ?>" alt="썸네일 이미지">
            <div class="best_box">
              <p class="card_tt mb-4"><?= $item->name; ?></p>
              <p class="text5 dark_gray mb-2"><?= $item->teacher; ?></p>
              <p class="text5 dark_gray"><?= ($item->level == 1) ? '초급' : (($item->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                <span class="orange">₩<span class="price"><?= ($item->price_val == 0) ? '무료' : number_format($item->price_val); ?></span></span>
              </p>
            </div>
          </a>
          <button type="button" name="add_cart" class="cart_btn ctBtn" value="<?= $item->pid; ?>"><i class="bi bi-cart3 icon_mint"></i></button>
        </li>
        <?php
            }
          }
        ?>
        <?php 
        foreach ($rsc as $item) {
          if($item -> pid == 29){
        ?>
        <li class="cart_add col radius_medium box_shadow">
          <a href="/attention/user/class/class_detail_view.php?pid=<?= $item->pid; ?>" class="d-block">
            <img src="<?= $item->thumbnail; ?>" alt="썸네일 이미지">
            <div class="best_box">
              <p class="card_tt mb-4"><?= $item->name; ?></p>
              <p class="text5 dark_gray mb-2"><?= $item->teacher; ?></p>
              <p class="text5 dark_gray"><?= ($item->level == 1) ? '초급' : (($item->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                <span class="orange">₩<span class="price"><?= ($item->price_val == 0) ? '무료' : number_format($item->price_val); ?></span></span>
              </p>
            </div>
          </a>
          <button type="button" name="add_cart" class="cart_btn ctBtn" value="<?= $item->pid; ?>"><i class="bi bi-cart3 icon_mint"></i></button>
        </li>
        <?php
            }
          }
        ?>
        <?php 
        foreach ($rsc as $item) {
          if($item -> pid == 30){
        ?>
        <li class="cart_add col radius_medium box_shadow">
          <a href="/attention/user/class/class_detail_view.php?pid=<?= $item->pid; ?>" class="d-block">
            <img src="<?= $item->thumbnail; ?>" alt="썸네일 이미지">
            <div class="best_box">
              <p class="card_tt mb-4"><?= $item->name; ?></p>
              <p class="text5 dark_gray mb-2"><?= $item->teacher; ?></p>
              <p class="text5 dark_gray"><?= ($item->level == 1) ? '초급' : (($item->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                <span class="orange">₩<span class="price"><?= ($item->price_val == 0) ? '무료' : number_format($item->price_val); ?></span></span>
              </p>
            </div>
          </a>
          <button type="button" name="add_cart" class="cart_btn ctBtn" value="<?= $item->pid; ?>"><i class="bi bi-cart3 icon_mint"></i></button>
        </li>
        <?php
            }
          }
        ?>
      
      </ul>

      <div class="total d-flex radius_medium">
        <div class="col text-center">
          <img src="img/main/total_member.png" alt="회원 아이콘 이미지">
          <p class="text1 card_tt mt-2"><spann class="count" data-num="<?= $rs_mem -> count; ?>"></spann> +</p>
          <p class="mt-2">회원수</p>
        </div>
        <span></span>
        <div class="col text-center">
          <img src="img/main/total_education.png" alt="교육신청 아이콘 이미지">
          <p class="text1 card_tt mt-2"><spann class="count" data-num="<?= $rs_sale -> count; ?>"></spann> +</p>
          <p class="mt-2">교육신청</p>
        </div>
        <span></span>
        <div class="col text-center">
          <img src="img/main/total_partner.png" alt="협력사 아이콘 이미지">
          <p class="text1 card_tt mt-2">293 +</p>
          <p class="mt-2">협력사</p>
        </div>
      </div>
    </div>
  </section>

  <section class="event container_cr main_mg_t white radius_medium">
    <h2 class="tt_00">코드래빗 모바일 어플 출시</h2>
    <p class="text1 mt-3 mb-3">지금 바로 다운 받고, <br>다양한 혜택과 함께 언제 어디서든 가능한 학습!!</p>
    <div class="app_box d-flex justify-content-evenly">
      <div>
        <div class="d-flex gap-4 mt-5">
          <img src="img/main/icon_playstore.png" alt="playstore 아이콘">
          <img src="img/main/icon_qr_android.svg" alt="qr코드 아이콘">
        </div>
        <p class="mt-3 text-center">Android</p>
      </div>
      <div>
        <div class="d-flex gap-4 mt-5">
          <img src="img/main/icon_appstore.png" alt="appstore 아이콘">
          <img src="img/main/icon_qr_ios.svg" alt="qr코드 아이콘">
        </div>
        <p class="mt-3 text-center">ios</p>
      </div>
    </div>
  </section>
    
  <section class="pick container_cr main_mg_t d-flex gap-4">
    <div class="pick_box col-5 radius_medium">
      <h2 class="tt_00">코드래빗 PICK!!</h2>
      <p class="text1 card_tt mt-2">선택이 어렵다면,<br>
        코드래빗이 추천하는 강의를 선택해보세요 &#58;&#41;</p>
    </div>
    <ul class="col">
      <li>
        <p class="tt_03 ms-3">Pick! 내가 이 구역 코딩 초보</p>
        <?php 
        foreach ($rsc as $item) {
          if($item -> pid == 28){
        ?>
        <div class="cart_add pick_card radius_medium box_shadow p-3 d-flex justify-content-between align-items-end">
          <a href="/attention/user/class/class_detail_view.php?pid=<?= $item->pid; ?>" class="d-flex col-11">
            <img src="<?= $item->thumbnail; ?>" alt="썸네일 이미지" class="col-4">
            <div class="ms-4 mt-3">
              <p class="card_tt mb-4"><?= $item->name; ?></p>
              <p class="text5 dark_gray mb-3"><?= $item->teacher; ?></p>
              <p class="text5 dark_gray"><?= ($item->level == 1) ? '초급' : (($item->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                <span class="orange">₩<span class="price"><?= ($item->price_val == 0) ? '무료' : number_format($item->price_val); ?></span></span>
              </p>
            </div>
          </a>
          <button type="button" name="add_cart" class="cart_btn col-1 p-2" value="<?= $item->pid; ?>"><i class="bi bi-cart3 icon_mint"></i></button>
        </div>
        <?php
            }
          }
        ?>
      </li>
      <li>
        <p class="tt_03 mt-3 ms-3">Pick! 그래도 할 줄은 안다</p>
        <?php 
        foreach ($rsc as $item) {
          if($item -> pid == 25){
        ?>
          <div class="cart_add pick_card radius_medium box_shadow p-3 d-flex justify-content-between align-items-end">
            <a href="/attention/user/class/class_detail_view.php?pid=<?= $item->pid; ?>" class="d-flex col-11">
              <img src="<?= $item->thumbnail; ?>" alt="썸네일 이미지" class="col-4">
              <div class="ms-4 mt-3">
                <p class="card_tt mb-4"><?= $item->name; ?></p>
                <p class="text5 dark_gray mb-3"><?= $item->teacher; ?></p>
                <p class="text5 dark_gray"><?= ($item->level == 1) ? '초급' : (($item->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                  <span class="orange">₩<span class="price"><?= ($item->price_val == 0) ? '무료' : number_format($item->price_val); ?></span></span>
                </p>
              </div>
            </a>
            <button type="button" class="cart_btn col-1 p-2" value="<?= $item->pid; ?>"><i class="bi bi-cart3 icon_mint"></i></button>
          </div>
        <?php
            }
          }
        ?>
      </li>
      <li>
        <p class="tt_03 mt-3 ms-3">Pick! 제법 하는데?</p>
        <?php 
        foreach ($rsc as $item) {
          if($item -> pid == 26){
        ?>
        <div class="cart_add pick_card radius_medium box_shadow p-3 d-flex justify-content-between align-items-end">
          <a href="/attention/user/class/class_detail_view.php?pid=<?= $item->pid; ?>" class="d-flex col-11">
            <img src="<?= $item->thumbnail; ?>" alt="썸네일 이미지" class="col-4">
            <div class="ms-4 mt-3">
              <p class="card_tt mb-4"><?= $item->name; ?></p>
              <p class="text5 dark_gray mb-3"><?= $item->teacher; ?></p>
              <p class="text5 dark_gray"><?= ($item->level == 1) ? '초급' : (($item->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                <span class="orange">₩<span class="price"><?= ($item->price_val == 0) ? '무료' : number_format($item->price_val); ?></span></span>
              </p>
            </div>
          </a>
          <button type="button" class="cart_btn col-1 p-2" value="<?= $item->pid; ?>"><i class="bi bi-cart3 icon_mint"></i></button>
        </div>
        <?php
            }
          }
        ?>
      </li>
      
    </ul>
  </section>

  <section class="container_cr main_mg_t coup_event_sec">
      <a href="/attention/user/event_vs2.0.php" class="btn btn-primary">쿠폰 이벤트 참여하기</a>
  </section>

  <section class="notice main_mg_t blue_Gray_back">
    <div class="container_cr d-flex align-items-center">
      <h3 class="text2 col-1">공지사항</h3>

      <div class="swiper notice_silde col-10">
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?php
            if(isset($rscNotice)){
              foreach($rscNotice as $no){            
          ?>
          <div class="swiper-slide d-flex align-items-center">
            <!-- <p class="col-10 ps-4 icon_mint"><a href="/attention/user/notice_view.php?idx=<?= $no->idx; ?>" class="d-block"><?= $no->title; ?></a></p> -->
            <p class="col-10 ps-4 icon_mint"><a href="/attention/user/community/notice.php" class="d-block"><?= $no->title; ?></a></p>
            <p class="col-2 text-center"><?= $no -> regdate; ?></p>
          </div>
          <?php
            } //foreach
          } 
          ?>
        </div>
      </div>
      <a href="/attention/user/community/notice.php" class="col-1 text-end icon_mint">전체보기 +</a>
    </div>
  </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="/attention/user/js/main.js"></script>
<?php
  ob_end_flush();
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>