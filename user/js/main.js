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
//toggle