<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';
  
	$where = '';
	if(isset($_SESSION['UID'])){
			$where = "B.userid = '{$_SESSION['UID']}'";
	}

  $couponid = $_SESSION['UID'];

  $sql2 = "SELECT cp.*, usercp.* FROM user_coupons usercp 
  JOIN coupons cp ON cp.cid = usercp.couponid  
  WHERE usercp.userid='{$couponid}' and usercp.use_max_date > Now()
  ORDER BY usercp.userid DESC";
  // var_dump($sql2);

  $result2 = $mysqli -> query($sql2);
  while($rs2 = $result2 -> fetch_object()){
      $rsc2[]=$rs2;
  }

  	
	/* 페이지 내 검색 및 활성화 */
	$userid = $_GET['userid']?? '';
  $select = $_GET['select'] ?? '';
	$due = $_GET['due'] ?? '';

  $expirecps = [];
  $expirecpsdate = strtotime('+10 days');
  foreach ($rsc2 as $cpdate) {
    $useMaxDatecp = strtotime($cpdate->use_max_date);
    if ($useMaxDatecp <= $expirecpsdate) {
      $expirecps[] = $cpdate;
    }
  }

  // 만료쿠폰 수
  $expirecouponcount = count($expirecps);

?>


<link rel="stylesheet" href="/attention/user/css/coupon.css">
<main class="container_cr">
    <section class="sub_mg_t coup_top">
      <h2 class="tt_01 mg_bot">쿠폰 혜택</h2>
      <div class="row coupon_top">
          <?php
            if (isset($rsc2)) {
          ?>
          <div class="col text-center">사용 가능한 쿠폰 <span class="text1 orange"><?= count($rsc2) ?? 0 ?></span>장</div>
          <?php
            }
          ?>
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
        <h3 class="text1"> 할인쿠폰 전체</h3>
        <div class="coup_right d-flex align-items-center">
          <select name="select" id="select">
            <option value="-1" <?php if( $regdate=='-1') {echo "selected"; } ?>>유효기간 순</option>
            <option value="1" <?php if( $use_max_date=='1') {echo "selected"; } ?>>발급일 순</option>
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
    $( "#select" ).selectmenu();
  } );
</script>
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php'; 
?>

