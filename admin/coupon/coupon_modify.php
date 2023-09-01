<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
?>
<link rel="stylesheet" href="/attention/admin/coupon/css/coup.css">
<link rel="stylesheet" href="/attention/admin/coupon/css/coup_ok.css">
	<div class="common_pd"> 
		<h2 class="h1">쿠폰 수정</h2>
		<form action="coupon_modify_ok.php" class="coup_text" method="post" enctype="multipart/form-data">
			<table>
				<tbody>
					<tr class="space">
						<th><h3 class="tt_03">쿠폰명</h3></th>
						<td><input type="text" id="coupon_name" name="coupon_name" class="form-control" placeholder="이름을 입력해주세요" required></td>
					</tr>
					<tr class="space">
						<th><h3 class="tt_03">첨부파일</h3></th>
						<td class="d-flex align-items-end coup_thumbnail_box">
							<div class="coup_thumbnail" id="file_table_id"  value="" >
							</div>
							<input type="file" class="coup_hidden" name="coupon_image" id="coupon_image" value="" required>
							<button type="button" class="btn btn-secondary coup_img">첨부파일</button>
						</td>
					</tr>
					<tr class="space">
						<th><h3 class="tt_03">할인액</h3></th>
						<td><input type="number" id="coupon_price"  min="10000" max="1000000" step="10000" name="coupon_price" class="form-control" required></td>
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
									<input type="number" id="regdate_box" name="regdate"  min="1" max="24" step="1"  class="form-control" required disabled>
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
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>