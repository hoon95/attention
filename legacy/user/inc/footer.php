<div class="coup_event position-fixed d-flex align-items-start">
  <!-- <button class="roullete_close_btn" type="button"><i class="bi material-symbols-outlined icon_red">close</i></button> -->
  <a href="/attention/user/event_vs2.0.php" class="d-inline-block">
    <img src="/attention/user/img/coup/coup_pop.svg" alt="쿠폰 이벤트 이미지 링크">
  </a>
</div>

<a href="#" class="top_btn position-fixed text-center d-block white_back">
  <i class="bi bi-chevron-up d-block mt-1 mb-1"></i>
  <p class="text-uppercase">top</p>
</a>

<aside id="recent" class="radius_medium position-fixed text-center px-2 py-3 white_back z-2">
  <p class="text5">최근 본 강의</p>
  <div class="d-flex flex-wrap gap-3 mt-3">
  <?php   
    if (isset($_COOKIE['recent_view_pd'])) { 
      $prc = json_decode($_COOKIE['recent_view_pd']); // 연관 배열로 변환
      krsort($prc); // 최근 상품 위로 올라오도록 key 값을 기준으로 역순으로 정렬.
      foreach ($prc as $pc) {
  ?>
    <img src="<?= $pc -> thumbnail; ?>" alt="썸네일 이미지">
  <?php
      }
    }
  ?>
  </div>
</aside>

<!-- recentView Modal -->
<div class="modal fade" id="recentView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title tt_03 ms-3 mt-3" id="exampleModalLabel">최근 본 강의</h3>
        <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">                                      
        <?php
          if (isset($_COOKIE['recent_view_pd'])) { 
            $prc = json_decode($_COOKIE['recent_view_pd']); // 연관 배열로 변환
            krsort($prc); // 최근 상품 위로 올라오도록 key 값을 기준으로 역순으로 정렬.
            foreach ($prc as $pc) {
        ?>
        <div class="radius_medium box_shadow p-3 d-flex align-items-start mb-4">
          <a href="/attention/user/class/class_detail_view.php?pid=<?= $pc->pid; ?>" class="d-flex">
            <img src="<?= $pc -> thumbnail; ?>" alt="썸네일 이미지" class="col-4">
            <div class="ms-4 mt-2">
              <p class="card_tt mb-4"><?= $pc -> name; ?></p>
              <p class="text5 dark_gray mb-3"><?= $pc -> teacher; ?></p>
              <p class="text5 dark_gray"><?= ($pc->level == 1) ? '초급' : (($pc->level == 2) ? '중급' : '상급'); ?> &nbsp;|&nbsp; 
                <span class="orange">₩<span class="price"><?= ($pc->price_val == 0) ? '무료' : number_format($pc->price_val); ?></span></span>
              </p>
            </div>
          </a>
        </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>

  <footer class="white dark_blue_back">
    <div class="container_cr d-flex justify-content-between">
      <div class="d-flex align-items-center">
        <img src="/attention/user/img/main/footer_coderabbit_logo.svg" alt="코드래빗 로고">
      </div>
      <address>
        <p><a href="#">코드래빗 소개</a><a href="/attention/user/class/class_whole_list.php">코드래빗 강좌리스트</a><a href="/attention/user/community/notice.php">코드래빗 공지사항</a><a href="#">개인정보처리방침</a><a href="#">이용약관</a></p>
        <ul>
          <li><span>&lbbrk;주&rbbrk;코드래빗</span><span>대표자&#58; Attention</span><span class="business_number">사업자번호&#58; 000&#45;00&#45;00000</span><a href="#" class="business_address">사업자 정보 확인</a></li>
          <li><span>통신판매업&#58; 0000&#45;서울종로&#45;0000</span><span>개인정보보호책임자&#58; Attention</span><span>이메일&#58; <a href="mailto:attention804@gmail.com">attention804&commat;gmail.com</a></span></li>
          <li><span>전화번호&#58; 000&#45;0000&#45;0000</span><span>주소&#58; 서울시 종로구 수표로 96 </span></li>
        </ul>
        <p class="copyright">Copyright &copy; ATTENTION All Rights Reserved&#46;</p>
      </address>
      <ul class="footer_sns d-flex">
        <li><a href="#"><img src="/attention/user/img/main/footer_kakaotalk_logo.svg" alt="kakaotalk logo"></a></li>
        <li><a href="#"><img src="/attention/user/img/main/footer_band_logo.svg" alt="band logo"></a></li>
        <li><a href="#"><img src="/attention/user/img/main/footer_instagram_logo.svg" alt="instagram logo"></a></li>
        <li><a href="#"><img src="/attention/user/img/main/footer_facebook_logo.svg" alt="facebook logo"></a></li>
      </ul>
    </div>
  </footer>
  <script>

    $('#recent').click(function(){
      $('#recentView').modal('show');
    });

    /* recent에 이미지가 포함된 경우에만 보이게 */
    function checkImag(){
      let recentAside = $('#recent');
      let recentImg = recentAside.find('img').length > 0;
      if(!recentImg){
        recentAside.hide();
      } else{
        recentAside.show(); // 이미지가 있을 경우 요소를 보이게 설정
      }
    }
    setInterval(checkImag); // 페이지 내용이 변경될 때마다 함수 실행

    /* top_btn,recent */
    let pageHeight = $(document).height(), //페이지 전체 높이
        recent = $('#recent'),
        topBtn = $('.top_btn'),
        windowHeight = $(window).height(),
        topOffset = windowHeight / 3,
        topScroll = 0;

    if (pageHeight <= 1400) { // 페이지 높이가 1400이하라면
      recent.addClass('active');
    } else{                   // 페이지 높이가 1400이상이면 스크롤 이벤트
      $(window).scroll(() => {
        topScroll = $(window).scrollTop();
        if (topScroll > topOffset) {
          recent.addClass('active');
          topBtn.addClass('active');
        } else {
          recent.removeClass('active');
          topBtn.removeClass('active');
        }
      });
    }

    topBtn.on('click', function(e){
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 'linear');
    });
    /* /top_btn,recent */

    /* Header */
    $(".main_admin").on("mouseenter" , function() {
      $(".login_mypage ").show();
    });
    $(".main_admin").on("mouseleave" , function() {
      $(".login_mypage ").hide();
    });
    /* /Header */

    //사업자 등록 번호
    let url =
      "http://www.ftc.go.kr/bizCommPop.do?wrkr_no=사업자 등록 번호"
      $('.business_address').click(function(){
        window.open(url, "bizCommPop", "width=750, height=700;");
        return false;
      });

  </script>
</body>
</html>