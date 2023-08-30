<?php
  $title = '쿠폰목록';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
//   include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/admin_check.php'; 로그인 부분

  $sql = "SELECT * from coupons where 1=1" ; // and 컬러명=값 and 컬러명=값 and 컬러명=값 

  $result = $mysqli -> query($sql);
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }
?>
<link rel="stylesheet" href="/attention/admin/coupon/css/coup_ok.css">
<h2 class="h1">쿠폰 관리</h2>
	<div class="d-flex align-items-center justify-content-between common_select_box">
		<!-- 쿠폰 활성화 카테고리 선택 - 기서은 -->
		<div class="common_select coupon_select">
			<div class="d-flex align-items-center justify-content-between">
				<select name="select" id="select">
					<option selected disabled>쿠폰 활성화 선택</option>
					<option>전체 쿠폰</option>
					<option>활성된 쿠폰</option>
					<option>비활성된 쿠폰</option>
					<option>마감임박 쿠폰</option>
				</select>
			</div>
		</div>
		<!-- /쿠폰 활성화 카테고리 선택 - 기서은 -->

		<!-- 쿠폰 검색창, 버튼등록 - 기서은 -->
		<div class="d-flex align-items-center justify-content-between coup_searchbox">
			<div class="seach">
				<input type="text" name="seach_form" id="seach_form" class="form-control" placeholder="제목 및 내용 입력">
				<button type="button"><i class="bi bi-search icon_gray"></i></button>
			</div>	
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
							<p class="text3"><?= $item -> coupon_price ?></p>
							<p class="text4 coup_board coup_board_date">
								<?php 
									 var_dump($item->regdate);
								if($item->coupon_type == '무제한'){
									 echo "무제한"; 
								
									} 
								 else {
									echo "기한";
								 }
								?> 
								
							</p>
						</div>
						<div class="coup_icon d-flex flex-column align-items-end justify-content-lg-end">
							<div class="form-check form-switch">
								<!-- <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"> -->
								<input class="form-check-input" type="checkbox" role="switch" value="<?php echo $item->status ?>" <?php if($item->status){ echo "checked"; } ?> name="<?= $item-> cid ?>" id="<?= $item-> cid ?>">
								
							</div>
							<div class="coup_common_icon d-flex">
								<button type="button" class="bi bi-pencil-square icon_mint" data-bs-toggle="modal" data-bs-target="#myModal"></button>
								<button type="button" class="bi bi-trash-fill icon_red"></button>
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
	<!-- 쿠폰 리스트 form - 기서은 -->

	<!-- 쿠폰 수정 모달 - 기서은 -->
	<div class="modal fade coup_modal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-bs-config='{"delay":0, "title":"Custom Title"}'>
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">쿠폰 등록</h5>
				</div>
				<div class="modal-body">
					<form action="" class="coup_text">
						<table>
							<tbody>
								<tr class="space">
									<th><label for="coup_name"><h3 class="tt_03">쿠폰명</h3></label></th>
									<td><input type="text" id="coup_name" name="coup_name" class="form-control" placeholder="이름을 입력해주세요"></td>
								</tr>
								<tr class="space">
									<th><label for="coup_thumbnail"><h3 class="tt_03">첨부파일</h3></label></th>
									<td class="coup_thumbnail_box">
										<!-- <input type="file" id="coup_thumbnail" name="coup_thumbnail" class="form-control coup_hidden">      -->
										<input type="file" class="coup_hidden" name="" id="">
										<button type="button" class="btn btn-secondary coup_img">첨부파일</button>
									</td>
								</tr>
								<tr class="space">
									<th><label for="coup_price"><h3 class="tt_03">할인액</h3></label></th>
									<td><input type="number" id="coup_price"  min="10000" max="1000000" step="10000" name="coup_price" class="form-control" required></td>
								</tr>
								<!-- <tr class="space">
									<th><label for="coup_type"><h3 class="tt_03">쿠폰설정</h3></label></th>
										<td class="coupon_status_box coup_gap d-flex">
											<div class="coup_type">
												<input type="radio" name="coupon_status" checked value="활성화" id="price">
												<label for="price" class="coupon_status">활성화</label>
											</div>
											<div class="coup_type">
												<input type="radio" name="coupon_status" value="비활성화" id="ratio">
												<label for="ratio" class="coupon_status">비활성화</label>
											</div>
									</td>
								</tr> -->
								<tr class="space">
									<th><label for="coup_type"><h3 class="tt_03">기한</h3></label></th>
										<td class="coup_type_box d-flex align-items-center justify-content-between">
											<div class="coup_gap d-flex">
												<div class="coup_type">
													<input type="radio" name="coup_type" checked value="활성화" id="price">
													<label for="price" class="coup_type_date">무제한</label>
												</div>
												<div class="coup_type">
													<input type="radio" name="coup_type" value="비활성화" id="ratio">
													<label for="ratio" class="coup_type_date">제한</label>
												</div>
											</div>
											<div class="coup_type_date_box d-flex align-items-center coup_gap">
												<input type="number" id="coup_type_date"  min="1" max="24" step="1" name="coup_type" class="form-control" required>
												<span>개월</span>
											</div>
										</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
					<button type="button" class="btn btn-primary">저장</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /쿠폰 수정 모달 - 기서은 -->

<!-- <script>
	$('.coupon_status_box input[type="radio"]').click(function(){
		let $this = $(this);
		if($this.prop('checked')){//체크해서 활성되면
			$this.val('1');
	
		} else{
			$this.val('0');
		}
	});
	console.log($this);
</script>	 -->
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/footer.php';
?>