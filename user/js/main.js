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