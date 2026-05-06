<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

	$sql = "SELECT * FROM coupons ORDER BY cid LIMIT 1, 8";

    if(isset($_SESSION['UID'])){
        $userid = $_SESSION['UID'];
    }
    else {
         $userid = '';
    }
	//var_dump($_SESSION['UID']);

    // $userid = $_SESSION['UID'];

  $result = $mysqli -> query($sql);
  while($rs = $result -> fetch_object()){
      $rsc[]=$rs;
  }

?>

<link rel="stylesheet" href="/attention/user/css/event_vs2.css">

<main class="coup_rolue_box sub_mg_p">
	<div class="coup_rolue_banner"><img src="img/coup/coup_banner.png" alt="룰렛배너"></div>
	<div class="container_cr"> 

		<button class="tt_03 btn btn-dark startBtn">START</button>
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
	</div>
</main>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/egjs-jquery-transform/2.0.0/transform.min.js"></script>
<script>
	let startBtn = $('.startBtn');
	let roullete = $('#roullete');
	let deg = 45;
	let score;

	startBtn.click(function(e){
		
		let userid =  <?php echo json_encode($userid); ?>;
        // let useridfalse = userid.indexOf('null');
		if(userid == '') {
			alert('로그인 후 이용해주세요.');
			location.href = "/attention/user/event_vs2.0.php";
		}

        rotatePanel(userid);
	});

	function rotatePanel(userid){
    let ranNum = (Math.floor(Math.random()*10))%8;

    roullete.animate({transform:'rotate(3000deg)'},4000,function(){
        randeg = ranNum * deg;
        score = ranNum + 1;
        roullete.css({transform:`rotate(-${randeg}deg)`});
        // console.log(score+'당첨');

   
        let userid = <?php echo json_encode($userid); ?>;

        if (userid == '') {
            alert('로그인 후 이용해주세요.');
            location.href = "/attention/user/event_vs2.0.php";
            return; // 로그인되지 않은 경우 함수 종료
        }

        let data = {
            userid: userid,
            cid: score
        }
        // console.log(data);

        $.ajax({
            async: false,
            type: 'post',
            data: data,
            url: "event/event.php",
            dataType: 'json', // 결과 json 객체 형식
            error: function (error) {
                console.log('Error:', error);
            },
            success: function (return_data) {
                // console.log(return_data.result);
                if (return_data.result == "1") {
                    setTimeout(function () {
                        alert(score + '번 쿠폰에 당첨되었습니다.');
                    }, 1000);
                } else {
                    alert('이미 발급받은 쿠폰입니다.');
                    // location.href = "/attention/user/event_vs2.0.php"; 
                }
            }
        }); // ajax
    });
}
</script>
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>
