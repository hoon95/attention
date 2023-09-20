/* Banner slide */
const mainSwiper = new Swiper(".banner-slide", {
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 2500,
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
$(window).scroll(function () {
  const bestOffset = $('.total').offset().top;
  const windowHeight = $(window).height();
  const scrollPoint = $(window).scrollTop();

  // total 요소가 화면 안에 들어왔을 때 실행
  if (scrollPoint + windowHeight >= bestOffset) {
    $('.count').each(function () { //숫자 카운트 애니메이션
      const $this = $(this),
            countTo = $this.attr('data-num');

      $({ countNum: $this.text() }).stop().animate({
        countNum: countTo
      }, {
        duration: 3000,
        easing: 'linear',
        step: function () {
          $this.text(Math.floor(this.countNum));
        },
        complete: function () {
          $this.text(this.countNum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
        }
      });
    });
    $(window).off('scroll');
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