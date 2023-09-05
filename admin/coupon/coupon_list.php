<?php
  $title = '쿠폰 목록';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
	


	// $pageNumber = $_GET['pageNumber'] ?? 1;
  // $pageCount = $_GET['pageCount'] ?? 10;
	// // $status = $_GET['status'];
  // $table = "coupons";
  // $title = "coupon_name";
  // $content = 'status';
	
	// include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/pagenation.php';

	
	/* 페이지 내 검색 및 활성화 */
	$cid = $_GET['cid']?? '';
  $search = $_GET['search'] ?? '';
	$status = $_GET['status'] ?? '';
	
	/* 페이지네이션 */
  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = $_GET['pageCount'] ?? 10;
  $statLimit = ($pageNumber-1)*$pageCount; // (1-1)*10 = 0, (2-1)*10 = 10
  $endLimit = $pageCount;
  $firstPageNumber = $_GET['firstPageNumber'] ?? 0 ;

  //전체 게시물 수 구하기  
  $pagesql = "SELECT COUNT(*) AS cnt FROM coupons";
  $page_result = $mysqli->query($pagesql);
  $page_row = $page_result->fetch_object();
  $row_num = $page_row->cnt; //전체 게시물 수
  //echo $row_num;

  $block_ct = 5; // 1,2,3,4,5  / 5,6,7,8,9 
  $block_num = ceil($pageNumber/$block_ct);//pageNumber 1,  9/5 1.2 2
  $block_start = (($block_num -1)*$block_ct) + 1;//page6 start 6
  $block_end = $block_start + $block_ct -1; //start 1, end 5

  $total_page = ceil($row_num/$pageCount); //총 게시물수, 52/5
  if($block_end > $total_page) $block_end = $total_page;
  $total_block = ceil($total_page/$block_ct);//총32, 2
  /* /페이지네이션 */




	$search_where = '';

  if($search){
    $search_where .= " and coupon_name like '%{$search}%'";
  }
  if($status){
		// if($status == 'all') {
		// 	$search_where .= "";
		// }
    $search_where .= " and status = '{$status}'";
  }
	/* /페이지내 검색 및 활성화 */

  $sql = "SELECT * from coupons where 1=1 " ; // and 컬러명=값 and 컬러명=값 and 컬러명=값 

  $sql .= $search_where;
  $order = " order by regdate desc";//최근순 정렬
  $limit = " limit $statLimit, $endLimit";

  $query = $sql.$order.$limit; //쿼리 문장 조합

  $result = $mysqli -> query($query);
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }


?>
<link rel="stylesheet" href="/attention/admin/css/coup.css">
<link rel="stylesheet" href="/attention/admin/css/coup_ok.css">
<h2 class="h1">쿠폰 관리</h2>
	<div class="d-flex align-items-center justify-content-between common_select_box">
		<!-- 쿠폰 활성화 카테고리 선택 - 기서은 -->
		<div class="common_select coupon_select">
			<div class="d-flex align-items-center justify-content-between">

				<select name="status" id="status"  aria-label="대기설정 변경">
					<option selected disabled>쿠폰 활성화 선택</option>
					<option value="" <?php if(  $status=='') {echo "selected"; } ?> >전체 쿠폰</option>
					<option value="활성화"  <?php if(  $status=='활성화') {echo "selected"; } ?> >활성된 쿠폰</option>
					<option value="비활성화" <?php if(  $status=='비활성화') {echo "selected"; } ?> >비활성된 쿠폰</option>
				</select>
			</div>
		</div>
		<!-- /쿠폰 활성화 카테고리 선택 - 기서은 -->

		<!-- 쿠폰 검색창, 버튼등록 - 기서은 -->
		<div class="d-flex align-items-center justify-content-between coup_searchbox">
			<form action="" id="search_form">
				<div class="seach">
					<input type="text" name="search" id="search" class="form-control" placeholder="쿠폰명을 검색해주세요">
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
		<div class="col white_back col_coup_cid"  data-cid="<?= $item -> cid ?>">
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
							<div class="form-check form-switch coup_status_toggle">
								<input class="form-check-input" type="checkbox" role="switch" value="<?= $item->status ?>" <?php if ($item->status == "활성화") {echo "checked";} else{echo '';} ?>>							
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
		<!-- 페이지네이션 -->
		<nav aria-label="페이지네이션" class="space">
      <ul class="pagination justify-content-center align-items-center">
        <?php
          if($pageNumber>1){                   
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?pageNumber=1&search={$search}\"><i class=\"bi bi-chevron-double-left icon_gray\"></i></a></li>";
              if($block_num > 1){
                  $prev = ($block_num - 2) * $block_ct + 1;
                  echo "<li class=\"page-item\"><a href='?pageNumber={$prev}&search={$search}' class=\"page-link\"><i class=\"bi bi-chevron-left icon_gray\"></i></a></li>";
              }
          }
          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?pageNumber={$i}\" class=\"page-link\">{$i}</a></li>";
            }else{
                echo "<li class=\"page-item\"><a href=\"?pageNumber={$i}&search={$search}\" class=\"page-link\">{$i}</a></li>";
            }
          }
          if($pageNumber<$total_page){
            if($total_block > $block_num){
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"?pageNumber={$next}&search={$search}\" class=\"page-link\"><i class=\"bi bi-chevron-right icon_gray\"></i></a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"?pageNumber={$total_page}&search={$search}\" class=\"page-link\"><i class=\"bi bi-chevron-double-right icon_gray\"></i></a></li>";
          }
        ?>  
      </ul>
    </nav>
		<!-- /페이지네이션 -->
<script>

	$("#status").selectmenu({
  change: function( event, data ) {
		let selected_value = data.item.value;//item으로 받음
		location.href=`/attention/admin/coupon/coupon_list.php?status=${selected_value}`;
	}
});

	// 무기한, 제한 설정data-cid
	$(".infinite_date").on("click", function () {
			$("#regdate_box").prop("disabled", true);
	});

	$(".day_date").on("click", function () {
			$("#regdate_box").prop("disabled", false);
	});
	// /무기한, 제한 설정

	//쿠폰 토글 변경 설정
	$(".coup_status_toggle input").change(function() {
		let coup_toggle= $(this);

		//check 되면 1 아니면 0을 value로 넘기기
		if(coup_toggle.prop('checked')) {
			coup_toggle.val("활성화");
		}else {
			coup_toggle.val("비활성화");
		}
		console.log(coup_toggle.val());

		//input의 value와 data-cid 받아오기
		let status = coup_toggle.val();
		let cid = $(this).closest(".col_coup_cid").attr("data-cid"); 
		let data = {
			status : status,
			cid : cid
		}
		console.log(data);
		$.ajax({
			async : false, 
			type: 'post',     
			data: data, 
			url: "coupon_status_change.php", 
			dataType: 'json', //결과 json 객체형식
			error: function(error){
				console.log('Error:', error);
			},
			success: function(return_data){
				console.log(return_data.result);
				if(return_data.result == '활성화'){
					alert('변경되었습니다.');
					location.reload();//새로고침
				} else{
					alert('변경에 실패되었습니다.');
				}
			}
		});
	});
</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>