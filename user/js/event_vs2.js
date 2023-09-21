let startBtn = $('.startBtn');
let roullete = $('#roullete');
let deg = 45;

startBtn.click(function(){
	rotatePanel();
});

function rotatePanel(){
	let ranNum = (Math.floor(Math.random()*10))%8;
	
	console.log(ranNum);
	
	roullete.animate({transform:'rotate(3000deg)'},4000,function(){
			randeg = ranNum*deg;
		  score = ranNum + 2;
			roullete.css({transform:`rotate(-${randeg}deg)`});	
		  console.log(score+'당첨');
      alert(score+'당첨');

	}
);
}


//  setTimeout(function() {
//   let randeg = (ranNum - 1) * deg;
//   let score = ranNum;
//   roullete.css('transition', 'none'); // 애니메이션 제거
//   roullete.css('transform', 'rotate(-' + randeg + 'deg)');
//   console.log(score + '당첨');
//   alert(score + '당첨');
// }, 4000); // 4초 후에 결과 표시