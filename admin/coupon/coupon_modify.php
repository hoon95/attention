<?php
	$title = '쿠폰 수정';
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
	$cid = $_GET['cid'];
	// $coupon_name = $_POST['coupon_name'];
	// $coupon_image = $_POST['coupon_image'];
	// $coupon_price = $_POST['coupon_price'];
	// $regdate = $_POST['regdate'];

	$sql ="SELECT * FROM coupons where cid='{$cid }' ";

	$result = $mysqli -> query($sql);

	$rs = $result -> fetch_object();


?>
<link rel="stylesheet" href="/attention/admin/css/coup.css">
<link rel="stylesheet" href="/attention/admin/css/coup_ok.css">
	<div class="common_pd"> 
		<h2 class="h1">쿠폰 수정</h2>
		<form action="coupon_modify_ok.php?cid=<?= $rs-> cid ?>" class="coup_text" method="post" enctype="multipart/form-data">
			<table>
				<tbody>
					<tr class="space">
						<th><h3 class="tt_03">쿠폰명</h3></th>
						<td><input type="text" id="coupon_name" name="coupon_name" class="form-control" value="<?= $rs-> coupon_name ?>" ></td>
					</tr>
					<tr class="space">
						<th><h3 class="tt_03">첨부파일</h3></th>
						<td class="d-flex align-items-end coup_thumbnail_box">
							<div class="coup_thumbnail" id="file_table_id"  value="" >
								<div class="thumb">
									<img src="<?= $rs-> coupon_image ?>" alt="">
								</div>
							</div>
							<input type="file" class="coup_hidden" name="coupon_image" id="coupon_image"  value="<?= $rs-> coupon_image ?>" >
							<button type="button" class="btn btn-secondary coup_img">첨부파일</button>
						</td>
					</tr>
					<tr class="space">
						<th><h3 class="tt_03">할인액</h3></th>
						<td><input type="number" id="coupon_price" min="5000" max="1000000" step="1000" name="coupon_price" class="form-control" value="<?= $rs-> coupon_price ?>" ></td>
					</tr>
					<tr class="space">
						<th><h3 class="tt_03">기한</h3></th>
							<td class="coup_type_box d-flex">
								<div class="d-flex">
									<div class="coup_type coup_date coup_infinite_date">
										<input type="radio" name="regdate" checked value="무제한" id="infinite_date_box" <?php if ($rs->regdate == '무제한') echo "checked";  ?>>
										<label for="infinite_date_box" class="infinite_date">무기한</label>
									</div>
									<div class="coup_type coup_date coup_day_date">
										<input type="radio" name="regdate" value="제한" id="day_date_box" <?php if ($rs->regdate == '제한') echo "checked"; ?>>
										<label for="day_date_box" class="day_date">제한</label>
									</div>
								</div>
								<div class="coup_type_date_box d-flex align-items-center">
									<input type="number" id="regdate_box" name="regdate"  min="1" max="24" step="1"  class="form-control" value="<?= $rs-> regdate ?>" data-id="<?= $rs-> regdate ?>" disabled  >
									<span>개월</span>
								</div>
							</td>
					</tr>
				</tbody>
			</table>
			<div class="coup_button d-flex justify-content-end">
				<button class="btn btn-primary">등록</button>
				<button type="button" class="btn btn-dark coup_close">닫기</button>
			</div>
		</form>
	</div>

	<script>
	let coupclose = $(".coup_close");
	coupclose.on("click", function() {
		var confirmation = confirm('수정 취소하시겠습니까? :0');
		if (confirmation) {
			alert('수정 취소되었습니다 :)');
			location.href='coupon_list.php';
		} 
	})

	let coupDate = $(".coup_type_date_box input").attr("data-id");	

	if(coupDate => 1) {
		$("#regdate_box").prop("disabled", false);//활성화되어라
		$(".coup_day_date input").prop("checked", true);//제한부분 체크 되어라
	}

	if(!coupDate) {
		$("#regdate_box").prop("disabled", true);
		$(".coup_infinite_date input").prop("checked", true);

	}

	$(".coup_img").click(function() {
    $(".coup_hidden").trigger("click");
	})

	$(".infinite_date").on("click", function () {
			$("#regdate_box").prop("disabled", true);
	});

	$(".day_date").on("click", function () {
			$("#regdate_box").prop("disabled", false);
	});


	$('.coup_hidden').change(function(){
		let file = $(this).prop('files');
		attachFile(file);
	});

	function attachFile(file) {
		console.log(file);
		let formData = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
		formData.append('savefile', file[0]) //<input type="file" name="savefile" value="파일명">
		console.log(formData);
		$.ajax({
		url: 'coupon_save_image.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		type: 'POST',
		error: function (error) {
			console.log('error:', error)
		},
		success: function (return_data) {

			console.log(return_data);

			if (return_data.result == 'image') {
			alert('이미지 파일만 첨부할 수 있습니다.');
			return;
			} else if (return_data.result == 'size') {
			alert('10메가 이하만 첨부할 수 있습니다.');
			return;
			} else if (return_data.result == 'error') {
			alert('이미지 확인해주세요');
			return;
			} else {
			//첨부이미지 테이블에 저장하면 할일
			let imgid = $('#file_table_id').val() + return_data.imgid + ',';
			$('#file_table_id').val(imgid);
			let html = `
				<div class="thumb" id="f_${return_data.imgid}" data-imgid="${return_data.imgid}">
					<img src="/attention/pdata/coupon/${return_data.savefile}" alt="">
				</div>
			`;
			$('#file_table_id').html(html);
			}
		}

		});
	}

</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>