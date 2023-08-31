<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
	// include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
?>
<link rel="stylesheet" href="/attention/admin/coupon/css/coup_ok.css">
<div class="common_pd">
	<h2 class="h1">쿠폰 등록</h2>
	<form action="coupon_ok.php" class="coup_text" method="post" enctype="multipart/form-data">
		<table>
			<tbody>
				<tr class="space">
					<th><h3 class="tt_03">쿠폰명</h3></th>
					<td><input type="text" id="coupon_name" name="coupon_name" class="form-control" placeholder="이름을 입력해주세요" required></td>
				</tr>
				<tr class="space">
					<th><h3 class="tt_03">첨부파일</h3></th>
					<td class="d-flex align-items-end coup_thumbnail_box">
						<div class="coup_thumbnail">
							<span>이미지 등록 부분 나중에 php에서 img 나오게 설정해야함</span>
						</div>
						<input type="file" class="coup_hidden" name="coupon_image" id="coupon_image" required>
						<button type="button" class="btn btn-secondary coup_img">첨부파일</button>
					</td>
				</tr>
				<tr class="space">
					<th><h3 class="tt_03">할인액</h3></th>
					<td><input type="number" id="coupon_price"  min="10000" max="1000000" step="10000" name="coupon_price" class="form-control" required></td>
				</tr>
				<tr class="space">
					<th><h3 class="tt_03">쿠폰설정</h3></th>
						<td class="coupon_status_box d-flex">
							<div class="coup_type coupon_status">
								<input type="radio" name="status" checked value="활성화" id="price">
								<label for="price" class="status">활성화</label>
							</div>
							<div class="coup_type coupon_status">
								<input type="radio" name="status" value="비활성화" id="ratio">
								<label for="ratio" class="status">비활성화</label>
							</div>
					</td>
				</tr>
				<tr class="space">
					<th><h3 class="tt_03">기한</h3></th>
						<td class="coup_type_box d-flex">
							<div class="d-flex">
								<div class="coup_type coup_date">
									<input type="radio" name="regdate" checked value="무제한" id="infinite_date_box">
									<label for="infinite_date_box" class="infinite_date">무제한</label>
								</div>
								<div class="coup_type coup_date">
									<input type="radio" name="regdate" value="제한" id="day_date_box">
									<label for="day_date_box" class="day_date">제한</label>
								</div>
							</div>
							<div class="coup_type_date_box d-flex align-items-center">
								<input type="number" id="regdate" name="regdate"  min="1" max="24" step="1"  class="form-control" required disabled>
								<span>개월</span>
							</div>
						</td>
				</tr>
			</tbody>
		</table>
		<div class="coup_button d-flex justify-content-end">
			<button class="btn btn-primary">등록</button>
			<button class="btn btn-dark">닫기</button>
		</div>
	</form>
</div>
<script>
  // $('#coupon_ratio_tr').hide();
	$(".coup_img").click(function() {
    $(".coup_hidden").trigger("click");
	})

	$(".infinite_date").on("click", function () {
			$("#regdate").prop("disabled", true);
	});

	$(".day_date").on("click", function () {
			$("#regdate").prop("disabled", false);
	});

  // $('.coupon_type input').change(function(){
  //   let typeval = $(this).val();
  //   if(typeval == '정률'){
  //     $('#coupon_price_tr input').prop( "disabled", true );
  //     $('#coupon_ratio_tr input').prop( "disabled", false ).focus();
  //   }
  //   if(typeval == '정액'){
  //     $('#coupon_price_tr input').prop( "disabled", false ).focus();
  //     $('#coupon_ratio_tr input').prop( "disabled", true );
  //   }    
  // });


</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>