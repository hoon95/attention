<?php
    $title="오늘의쿠폰";

    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

    if(!isset($_SESSION['UID'])){
    echo"<script>
    alert('로그인 후 이용해주세요.');
    history.back();
    </script>";
    }
?>

<link rel="stylesheet" href="css/cevent.css">
<div id="wrap">
	<div id="gameContainer">	
		<div class="board_start join"><a href="">시작버튼</a></div>
		<div class="board_on obj"></div>
	</div>
	<div id="popup_gift" class="popup">
		<div class="lottery_present"></div>
			<a href="javascript:;" class="close">닫기 </a>
		</div>
	</div>
</div>		
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/easing/EasePack.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenLite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/plugins/CSSPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/event_test.js"></script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>
