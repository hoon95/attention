<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

	$where = '';
	if(isset($_SESSION['UID'])){
			$where = "B.userid = '{$_SESSION['UID']}'";
	}

  $couponid = $_SESSION['UID'];

  $sql2 = "SELECT cp.*, usercp.* FROM user_coupons usercp 
  JOIN coupons cp ON cp.cid = usercp.couponid  
  WHERE usercp.userid='{$couponid}'and usercp.use_max_date > Now()
  ORDER BY usercp.userid DESC";

  $result2 = $mysqli -> query($sql2);
  while($rs2 = $result2 -> fetch_object()){
      $rsc2[]=$rs2;
  }

  $sql = "SELECT regdate FROM user_coupons WHERE 1=1"; 

  $result = $mysqli -> query($sql);
  while($rs = $result -> fetch_object()){
      $rsc[]=$rs;
  }
?>
<link rel="stylesheet" href="/attention/user/css/coupon.css">
<main class="container_cr">
    <section class="sub_mg_t coup_top">
      <h2 class="tt_01 mg_bot">쿠폰 혜택</h2>
      <div class="row coupon_top">
          <div class="col text-center">사용 가능한 쿠폰 <span class="text1">1</span>장</div>
          <div class="col text-center">이번 달 소멸예정 쿠폰 <span class="text1">1</span>장</div>
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
          if (isset($rsc2)) {
            foreach ($rsc2 as $item) {
          ?>
          <div class="col white_back d-flex align-items-center gap" data-id="$item->cid">
            <div class="coup_thumbnail">
              <img src="<?= $item->coupon_image ?>" alt="<?= $item->coupon_name ?>">
            </div>
            <div class="coup_text">
              <h3 class="tt_02"><?= $item->coupon_price ?><span class="text3">할인</span></h3>
              <p class="text3"><?= $item->coupon_name ?></p>
              <p class="text4">
                <?php
                if ($item->regdate == 0) {
                    echo '<span class="orange">무기한</span>';
                } else {
                    echo "<span>" . date('Y-m-d', strtotime($item->regdate)) . "</span>";
                    echo "<span>" . date('Y-m-d', strtotime($item->use_max_date)) . "</span>";
                }
                ?>
              </p>
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
            <?php
            if (isset($rsc)) {
              foreach ($rsc as $rr) {
                  echo "<p class='text4'>";
                  // 여기서 $rsc 배열의 값을 출력하거나 처리할 수 있습니다.
                  echo "</p>";
              }
            }
        ?>
        </div>
    </form>
</main>

<?php

  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
	 
?>

<!-- 
   <div class="col white_back d-flex align-items-center gap" data-id="$item->cid">
          <div class="coup_thumbnail">
            <img src="<?= $item->coupon_image ?>" alt="<?= $item->coupon_name ?>">
          </div>
          <div class="coup_text">
            <h3 class="tt_02"><?= $item->coupon_price ?><span class="text3">할인</span></h3>
            <p class="text3"><?= $item->coupon_name ?></p>
            <?php
              // if(isset($rsc)){
              //   foreach($rsc as $rr){
            ?>
            <p class="text4">
              <?php
                // if($item->regdate == 0) {
                //   echo '<span class="orange">무기한</span>';
                // }
                // else {
                //   echo"<span>" . date('Y-m-d', strtotime($rr->regdate)) . "</span>";
                //   echo"<span>" . date('Y-m-d', strtotime($item->use_max_date)) . "</span>";
                // }
              ?>
            </p>
            <?php
            //   } 
            // } 
       
            ?>
          </div>
        </div> 
          <?php
          //   } 
          // } else {  
            
          ?>  
          <div>
            <span>사용하실 수 있는 쿠폰이 없습니다.</span>
          </div>
          <?php
            //}  
          ?>   
 -->