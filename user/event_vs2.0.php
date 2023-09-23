<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

	$sql = "SELECT * FROM coupons ORDER BY cid LIMIT 1, 8";

	$userid = $_SESSION['UID'];


  $result = $mysqli -> query($sql);
  while($rs = $result -> fetch_object()){
      $rsc[]=$rs;
  }

?>

<link rel="stylesheet" href="/attention/user/css/event_vs2.css">

<div class="container_cr"> 

	<!-- <h1 class="tt_01">Roulette</h1> -->
	<div class="arrow"></div>
	<div class="eq8" id="roullete">
		<?php
			if(isset($rsc)){
				foreach($rsc as $item){            
		?>
		<div class="panel"><strong class="txt_posi tt_02" data-id="<?= $item -> cid ?>"><?= ($item -> cid) -1 ?></strong></div>
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
	<button class="startBtn">start</button>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/egjs-jquery-transform/2.0.0/transform.min.js"></script>
<script>
	/* Header */
$(".main_admin").on("mouseenter" , function() {
  $(".login_mypage ").show();
});
$(".main_admin").on("mouseleave" , function() {
  $(".login_mypage ").hide();
});
/* /Header */
</script>
<script>
	let startBtn = $('.startBtn');
	let roullete = $('#roullete');
	let deg = 45;
	let score;

	startBtn.click(function(e){
		rotatePanel();
		
		let userid =  <?php echo json_encode($userid); ?>;

		if(!userid) {
			alert('로그인 후 이용해주세요.');
			location.href = "/attention/user/event_vs2.0.php";
		}
	});

	function rotatePanel(){
		let ranNum = (Math.floor(Math.random()*10))%8;
		
		// console.log(ranNum);
		
		roullete.animate({transform:'rotate(3000deg)'},4000,function(){
			randeg = ranNum*deg;
			score = ranNum + 1;
			roullete.css({transform:`rotate(-${randeg}deg)`});
				
			// console.log(score+'당첨');
			setTimeout(()=>{
				alert(score+'번 쿠폰에 당첨되었습니다.');
			},100);


		let userid =  <?php echo json_encode($userid); ?>;

	
		
		let data = {
			userid : userid,
			cid: score
		}
		// console.log(data);

		$.ajax({
			async : false, 
			type: 'post',     
			data: data, 
			url: "event/event.php", 
			dataType: 'json', //결과 json 객체형식
			error: function(error){
				console.log('Error:', error);
			},
			success: function(return_data){
				// console.log(return_data.result);
				if(return_data.result == "1"){
					alert('쿠폰이 지급되었습니다.');
					location.href = "/attention/user/event_vs2.0.php";
				} else{
					alert('이미 발급받은 쿠폰입니다.');
					location.href = "/attention/user/event_vs2.0.php";
				}
			}
		});//ajax
	});
}
</script>
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>
