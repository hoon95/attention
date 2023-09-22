$(document).ready(function() {
	var gift;
	   var price = [5000, 7000, 10000, 12000, 15000, 20000];
      
	   //var  present =[ 1,2,3,4,5,6 ];

	iniGame = function(num){
		gift = num;
		TweenLite.killTweensOf($(".board_on"));
		TweenLite.to($(".board_on"), 0, {css:{rotation:rotationPos[gift]}});
		TweenLite.from($(".board_on"),5, {css:{rotation:-3000}, onComplete:endGame, ease:Sine.easeOut});
               console.log("gift 숫자 : "+ (gift +1) +"rotationPos" + rotationPos );
	}

	var rotationPos = new Array(60,120,180,240,300,360);

	TweenLite.to($(".board_on"), 360, {css:{rotation:-4000}, ease: Linear.easeNone});
	function endGame(){
		var  copImg= "img/coup/coup_event/couptest"+( gift +1) + ".png";
		console.log("이미지 : " + copImg );

		// $newImage = $('<img src="' + copImg + '" data-id="' + (gift + 1) + '" />');

		// $("#popup_gift .lottery_present" ).text(function( ) {   return "축하드립니다."+ present [gift ]   + " 당첨 되셨습니다.";    });
		// $( '<img  src="' + copImg+ '" />' ).prependTo("#popup_gift .lottery_present");

		var $newImage = $('<img src="' + copImg + '" data-id="' + (gift + 1) + '" />');

		$("#popup_gift .lottery_present").html(function() {
			return '축하드립니다. ' + price[gift] + ' 당첨 되셨습니다.<br>' + $newImage[0].outerHTML;
		});

		setTimeout(function() {openPopup("popup_gift");	}, 1000);
}

	$(".popup .btn").on("click",function(){
		location.reload();
	});

	function openPopup(id) {
		closePopup();
		$('.popup').slideUp(0);
		var popupid = id
		$('body').append('<div id="fade"></div>');
		$('#fade').css({
		'filter' : 'alpha(opacity=60)'
		}).fadeIn(300);
		var popuptopmargin = ($('#' + popupid).height()) / 2;
		var popupleftmargin = ($('#' + popupid).width()) / 2;
		$('#' + popupid).css({
			'margin-left' : -popupleftmargin
		});
		$('#' + popupid).slideDown(500);
	}
	function closePopup() {
		$('#fade').fadeOut(300, function() {
			// $(".player").html('');
		});
		$('.popup').slideUp(400);
		return false
	}
	$(".close").click(closePopup);

});



$(function() {
	var clicked  =0;
	for(i=1; i<7; i++){
	// 상품쪽 이미지는 신경 안쓰셔도 됩니다!! 책임님!!!
	  var  pictures = "img/coup/coup_event/couptest"+ i  + ".png"; //룰렛에서 나오는 이미지

	  var $image = $('<img src="' + pictures + '" data-id="' + i + '" />');
      $(".board_on").append($image);
	}

	$(".join").on("mousedown",function(){
	  if( clicked <= 0){    iniGame(Math.floor(Math.random() *6));    }
	  else  if( clicked >=1 ){    event.preventDefault(); alert( "이벤트 참여 하셨습니다."); }
	  clicked ++
	});




		let cid = $(".board_on img").attr("data-cid"); 
		
		console.log(cid);
		let data = {
			cid : cid
		}
		console.log(data);
		$.ajax({
			async : false, 
			type: 'post',     
			data: data, 
			url: "process_coupon.php", 
			dataType: 'json', //결과 json 객체형식
			error: function(error){
				console.log('Error:', error);
			},
			success: function(return_data){
			if(return_data.result == "ok"){
				alert('쿠폰이 지급되었습니다.');
				// location.href = "/attention/user/coupon.php";
			} else{
				alert('이미 발급받은 쿠폰입니다.');
				// location.href = "/attention/user/coupon.php";
			}
			}
		});
})
