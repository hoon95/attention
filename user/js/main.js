/* Banner slide */
const mainSwiper = new Swiper(".banner-slide", {
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination", // 숫자가 표시될 영역을 지정합니다.
      type: "fraction", // 숫자 형식으로 표시합니다.
    },
    navigation: {
      nextEl: ".main-next",
      prevEl: ".main-prev",
    },
});
/* /Banner slide */


/* Banner pager */
$(".main-slide-btn").click(function (e) {
  let $this = $(this);
  $this.toggleClass("active");

  if($this.hasClass("active")) {
    $(".main-stop").hide();
    $(".main-play").show();
    mainSwiper.autoplay.stop();
  } else {
    $(".main-stop").show();
    $(".main-play").hide();
    mainSwiper.autoplay.start();
  }
});
/* /Banner pager */

/* new slide */
const newSwiper = new Swiper(".new-slide", {
    loop: true,
    slidesPerView: 4,
    spaceBetween: 24,
    slidesPerGroup: 2,
    navigation: {
      nextEl: ".new .bi-chevron-left",
      prevEl: ".new .bi-chevron-right",
    },
});
/* /new slide */

/* best-total */
let hasCounted = false;

$(window).scroll(function () {
  let bestOffset = $('.total').offset().top,
      windowHeight = $(window).height(),
      scrollPoint = $(window).scrollTop();

  // total 요소가 화면 안에 들어왔을 때 실행
  if (scrollPoint + windowHeight >= bestOffset && !hasCounted){
    hasCounted = true; // 카운트가 한 번 실행되면 hasCounted를 true로 설정하여 중복 실행을 막음
    $('.count').each(function(){ //숫자 카운트 애니메이션
      let $this = $(this),
          countTo = $this.attr('data-num');

      $({countNum: $this.text()}).stop().animate({
        countNum: countTo},{
        duration: 3000, 
        easing: 'linear',
        step: function (){
          $this.text(Math.floor(this.countNum));
        },
        complete: function () {
          $this.text(this.countNum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
        }
      });
    });
  }
});
/* /best-total */

/* notice slide */
const noticeSwiper = new Swiper('.notice_silde', {
  direction: 'vertical',
  loop: true,
  autoplay: {
    pauseOnMouseEnter: true,
    delay: 3000,
    disableOnInteraction: false
  }
});
/* /notice slide */

/* add cart */
let cart_btn = $('.cart_btn');

cart_btn.each(function(){
  $(this).click(function() {
    // 선택된 강의의 pid 가져오기
    let pid = $(this).val();
    let priceText = $(this).closest(".cart_add").find(".price").text();
    let total = (priceText.trim() === '무료') ? 0 : parseFloat(priceText.replace(',', ''));
    
    let data = {
      pid : pid,
      total : total
    }
    console.log("data: " + data);

    $.ajax({
      async:false,
      type:'post',
      url: '/attention/user/cart/cart_insert.php',
      data: data,
      dataType:'json',
      error: function(error){
        console.error(error);
        alert("장바구니 추가 중 오류가 발생했습니다.");
      },
      success:function(data){
        if(data.result == 'ok'){
          if (confirm('장바구니에 추가되었습니다. 장바구니로 이동하시겠습니까?')) {
            location.href = '/attention/user/cart/cart.php';
          }
        } else{
          alert('장바구니 담기 실패');
        }
      }
    });
  });
});
/* /add cart */

/* popup */
let popup = $('#popup'),
    closeBtn = popup.find('#close'),
    dayCheck = popup.find('#daycheck');
      
//쿠키생성
function setCookie(name, value, day){
  let date = new Date();
  date.setDate(date.getDate()+day);   
  document.cookie = `${name}=${value};expires=${date.toUTCString()}`;
}

//쿠키 확인
function cookieCheck(name){
  let cookieArr = document.cookie.split(';');
  let visited = false;

  for(let cookie of cookieArr){
    if(cookie.search(name) > -1){
      visited = true;
      break;
    }
  }
  //visited 값이 false면 dialog 보이게
  if(!visited){
    popup.attr('open','');
  } else {
    popup.removeAttr("open");
  }
}
cookieCheck('Rabbit');

closeBtn.click(function(){
  popup.removeAttr('open');
  if(dayCheck.prop("checked")){
    setCookie('Rabbit','code', 1);
  }else{
    setCookie('Rabbit','code', -1);
  }
});
/* /popup */


/* roullete popoup*/
$(".roullete_close_btn").click(function() {
  $(this).closest('.coup_event').css({ visibility: "hidden" });
})