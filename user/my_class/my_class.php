<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/user_check.php';
  
  
  $sql = "SELECT A.pid, A.name, A.cate, A.thumbnail, A.sale_end_date, A.date_val, A.price_val FROM class A JOIN sales B ON A.pid = B.pid WHERE userid='{$_SESSION['UID']}'";
  $result = $mysqli -> query($sql);
  while($rs = $result->fetch_object()){
    $rsc[]=$rs;
  }
?>
  <link rel="stylesheet" href="/attention/user/css/my_class.css">

  <main class="container_cr">
    <section class="sub_mg_t">
      <h2 class="tt_01">내 강의실</h2>
      <p class="text2 gray mt-2 mb-4">현재 수강 중인 강의 목록</p>
      <ul class="my_list d-flex flex-wrap align-content-between gap-4">
        <!-- 강의 출력 -->
        <?php 
        if(isset($rsc)){
          foreach($rsc as $r){
        ?>
        <li class="radius_medium box_shadow p-3 position-relative">
          <a href="/attention/user/product/product_view?pid=<?= $r->pid ?>">
            <p class="card_tt mb-3"><?= $r->name ?></p>
            <div class="d-flex">
              <img src="<?= $r->thumbnail ?>" alt="썸네일 이미지" class="col-5 radius_medium">
              <div class="ps-4 col">
                <p class="text5 dark_gray py-3">코드캠프</p>
                <p class="text5 dark_gray">기한 : 
                  <?php if($r->sale_end_date == '0'){echo '무기한';}else{echo $r->date_val; ?>개월<?php }; ?>
                </p>
              </div>
            </div>
          </a>
        </li>
        <?php }}else{?>
          <p>현재 수강 중인 강의가 없습니다</p>
        <?php } ?>
        <!-- /강의 출력 -->
      </ul>
    </section>
    
    <section class="mt-5 sub_mg_b">
      <h3 class="tt_02">이런 강의는 어떠세요?</h3>
      <p class="text2 gray mt-2">샘플 강의를 들어보세요!</p>
      <ul class="my_list d-flex flex-wrap justify-content-between mt-4 gap-4">
        <?php foreach($rsc as $r){ ?>
        <li class="radius_medium box_shadow p-3 position-relative">
          <a href="">
            <p class="card_tt mb-3"><?=  $r->name ?></p>
            <div class="d-flex">
              <img src="<?= $r->thumbnail ?>" alt="썸네일 이미지" class="col-5 radius_medium">
              <div class="ps-4 col">
                <p class="text5 dark_gray py-3">코드캠프</p>
                <p class="text5 dark_gray">기한 : 
                  <?php if($r->sale_end_date == '0'){echo '무기한';}else{echo $r->date_val; ?>개월<?php }; ?>
                </p>
              </div>
            </div>
          </a>
        </li>
        <?php } ?>
      </ul>
    </section>
  </main>


<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>