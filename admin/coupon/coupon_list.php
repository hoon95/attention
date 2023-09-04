<?php
  $title = '쿠폰목록';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
//   include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/admin_check.php'; 로그인 부분

	/* 페이지 내 검색 */
	$cid = $_GET['cid']?? '';
  $search_keyword = $_GET['search_keyword'] ?? '';
	$status = $_GET['status'] ?? '';


	$search_where = '';

  if($search_keyword){
    $search_where .= " and coupon_name like '%{$search_keyword}%'";
  }
  if($status){
		// if($status == 'all') {
		// 	$search_where .= "";
		// }
    $search_where .= " and status = '{$status}'";
  }




 




  $sql = "SELECT * from coupons where 1=1" ; // and 컬러명=값 and 컬러명=값 and 컬러명=값 
  $sql .= $search_where;

  $result = $mysqli -> query($sql);
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }
//
  
?>
<link rel="stylesheet" href="/attention/admin/coupon/css/coup.css">
<link rel="stylesheet" href="/attention/admin/coupon/css/coup_ok.css">
<h2 class="h1">쿠폰 관리</h2>
	<div class="d-flex align-items-center justify-content-between common_select_box">
		<!-- 쿠폰 활성화 카테고리 선택 - 기서은 -->
		<div class="common_select coupon_select">
			<div class="d-flex align-items-center justify-content-between">

				<select name="status" id="status"  aria-label="대기설정 변경">
					<option selected disabled>쿠폰 활성화 선택</option>
					<option value="">전체 쿠폰</option>
					<option value="활성화" >활성된 쿠폰</option>
					<option value="비활성화" >비활성된 쿠폰</option>
				</select>
			</div>
		</div>
		<!-- /쿠폰 활성화 카테고리 선택 - 기서은 -->

		<!-- 쿠폰 검색창, 버튼등록 - 기서은 -->
		<div class="d-flex align-items-center justify-content-between coup_searchbox">
			<form action="" id="search_form">
				<div class="seach">
					<input type="text" name="search_keyword" id="search_keyword" class="form-control" placeholder="쿠폰명을 검색해주세요">
					<button type="submit"><i class="bi bi-search icon_gray"></i></button>
				</div>	
			</form>
			<a href="coupon_up.php" class="btn btn-primary">쿠폰등록</a>
		</div>
		<!-- 쿠폰 검색창, 버튼등록 - 기서은 -->

	</div>
	<!-- 쿠폰 리스트 form - 기서은 -->
	<div class="row row-cols-2">
		<?php
			if(isset($rsc)){
				foreach($rsc as $item){            
		?>
		<div class="col white_back">
			<div class="coup_box d-flex justify-content-between">
				<div class="coup_thumbnail">
					<img src="<?= $item->coupon_image ?>" alt="">
				</div>
				<div class="coup_content">
					<div class="d-flex justify-content-between">
						<div class="coup_text">
							<h3 class="text2"><?= $item -> coupon_name ?></h3>
							<p class="text3">할인액: <?= $item -> coupon_price ?>원</p>
							<p class="text4 <?php if ($item->regdate == '무제한') echo 'coup_board'; ?>">
								<?php 
										if ($item->regdate == '무제한') {
											echo "무기한"; 
										} else {
											echo "기한: " . $item->regdate . "개월";
										}
								?> 
						</p>
						</div>
						<div class="coup_icon d-flex flex-column align-items-end justify-content-lg-end">
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" role="switch" value="<?= $item->status ?>" name="<?= $item->cid ?>" id="<?= $item->cid ?>" <?php if ($item->status == "활성화") echo "checked"; ?>>							
							</div>
							<div class="coup_common_icon d-flex">
								<a href = "coupon_modify.php?cid=<?= $item-> cid ?>" class="bi bi-pencil-square icon_mint"></a>
							
								<a href = "coupon_delete.php?cid=<?= $item-> cid ?>" class="bi bi-trash-fill icon_red"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
        } //foreach
      } else {    
      ?>  
      <div>
        <span>조회 결과가 없습니다.</span>
			</div>
      <?php
        }  
      ?>  
	</div>

<script>

	$("#status").selectmenu({
  change: function( event, data ) {
		let selected_value = data.item.value;
		location.href=`/attention/admin/coupon/coupon_list.php?status=${selected_value}`;
	}
});

	// 무기한, 제한 설정
	$(".infinite_date").on("click", function () {
			$("#regdate_box").prop("disabled", true);
	});

	$(".day_date").on("click", function () {
			$("#regdate_box").prop("disabled", false);
	});
	// /무기한, 제한 설정

</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>