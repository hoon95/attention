<?php
  $title = '쿠폰함 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';
  
	$where = '';
	if(isset($_SESSION['UID'])){
			$where = "B.userid = '{$_SESSION['UID']}'";
	}

  $couponid = $_SESSION['UID'];
  	/* 페이지 내 검색 및 활성화 */
	$userid = $_GET['userid']?? '';
  $select = $_GET['select'] ?? '';
	$due = $_GET['due'] ?? '';

  $sort = $_GET['sort']?? 'regdate';

  $sql2 = "SELECT cp.*, usercp.* FROM user_coupons usercp 
  JOIN coupons cp ON cp.cid = usercp.couponid  
  WHERE usercp.userid='{$couponid}' and usercp.use_max_date > Now() and usercp.status=1
  ORDER BY {$sort} desc";
  // var_dump($sql2);

  $result2 = $mysqli -> query($sql2);
  while($rs2 = $result2 -> fetch_object()){
      $rsc2[]=$rs2;
  }

  	


  $expirecps = [];
  $expirecpsdate = strtotime('+10 days');
  if(isset($rsc2)){
    foreach ($rsc2 as $cpdate) {
      $useMaxDatecp = strtotime($cpdate->use_max_date);
      if ($useMaxDatecp <= $expirecpsdate) {
        $expirecps[] = $cpdate;
      }
    }
  }

  // 만료쿠폰 수
  $expirecouponcount = count($expirecps);

  // var_dump($rsc);
   /* 사용가능한 쿠폰, 소멸예정 */
?>


<link rel="stylesheet" href="/attention/user/css/coupon.css">
<main class="container_cr">
    <section class="sub_mg_t coup_top">
      <h2 class="tt_01 mg_bot">쿠폰 혜택</h2>
      <div class="row coupon_top">
          <div class="col text-center">사용 가능한 쿠폰 
            <span class="text1 orange">
              <?php 
              if(isset($rsc2)){
                echo count($rsc2);
              }else{
                echo 0;
              }
              ?>
            </span>장</div>
          <div class="col text-center">이번 달 소멸예정 쿠폰 
            <span class="text1 mint">
              <?= $expirecouponcount ?>
            </span>장
          </div>
          <div class="coup_line"></div>
      </div>
    </section>
    <section class="sub_mg_t coup_content">
      <div class="d-flex justify-content-between align-items-center">
        <a href="coupon.php"><h3 class="text1"> 할인쿠폰 전체</h3></a>
        <div class="coup_right d-flex align-items-center">
            <form action="#" id="sort">
              <select name="sort" id="select">
                <option value="use_max_date"  <?php if($sort== 'use_max_date') {echo "selected"; } ?> >유효기간 순</option>
                <option value="regdate"  <?php if($sort== 'regdate') {echo "selected"; } ?>>발급일 순</option>
              </select>
            </form>
        </div>
      </div>
    </section>
    <form action="#" class="mg_top sub_mg_b">
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
                if ($item->due == 0) {
                    echo '<span class="orange">무기한</span>';
                } else {
                    $month = $item->due * 30;

                    if ($month == 0) {
                        $duedate = 0;
                    } else {
                        $duedate = date("Y-m-d", strtotime("+{$month} days")); // 수정된 부분
                    }

                    echo "<span>" . date('Y-m-d', strtotime($item->regdate)) . "</span>";
                    echo "<span>~</span>";
                    echo "<span>" . $duedate . "</span>"; // 수정된 부분
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
        
        </div>
    </form>
</main>
<script>
  $( function() {
    $( "#select" ).selectmenu({
        change: function( event, data ) {
      let selected_value = data.item.value;//item으로 받음
  
      location.href=`/attention/user/coupon.php?sort=${selected_value}`;

      // console.log(selected_value);
    }
  });
});


</script>
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php'; 
?>

