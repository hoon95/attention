<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

	// $where = '';
	// if(isset($_SESSION['UID'])){
	// 		$where = "B.userid = '{$_SESSION['UID']}'";
	// }
  $couponid = $_SESSION['UID'];

  $sql2 = "SELECT cp.*, usercp.* FROM user_coupons usercp 
  JOIN coupons cp ON cp.cid = usercp.couponid  
  WHERE usercp.userid='{$couponid}'and usercp.use_max_date > Now()
  ORDER BY usercp.userid DESC";
  $result2 = $mysqli -> query($sql2);
  while($rs2 = $result2 -> fetch_object()){
      $rsc2[]=$rs2;
  }

?>

<link rel="stylesheet" href="css/cevent.css">
<div id="wrap">
	<div id="gameContainer">	
		<div class="board_start join">시작버튼</div>
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
<script src="js/coup_event.js"></script>
