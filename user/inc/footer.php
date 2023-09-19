<a href="#" class="top_btn position-fixed text-center d-block">
  <i class="bi bi-chevron-up d-block mt-1 mb-1"></i>
  <p class="text-uppercase">top</p>
</a>

<aside id="recent" class="radius_medium position-fixed text-center d-flex flex-wrap px-2 py-3 gap-3 white_back z-2">
  <p class="text5 m-auto">최근 본 강의</p>
  <img src="/attention/user/img/main/new_7.png" alt="썸네일 이미지">
  <img src="/attention/user/img/main/new_7.png" alt="썸네일 이미지">
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
        <p class="ms-3 text2 card_tt">전체 건</p>

        <div class="radius_medium box_shadow p-3 d-flex align-items-start mt-4">
          <a href="" class="d-flex">
            <img src="/attention/user/img/main/new_8.png" alt="썸네일 이미지" class="col-4">
            <div class="ms-4 mt-2">
              <p class="card_tt mb-4">Typescript with Vue 실전 프로젝트</p>
              <p class="text5 dark_gray mb-3">성도희</p>
              <p class="text5 dark_gray">고급 &nbsp;|&nbsp; <span class="orange">₩16,000</span></p>
            </div>
          </a>
          <button class="mt-2"><i class="bi bi-x-lg icon_red"></i></button>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn text5 icon_red">전체삭제<i class="bi bi-trash-fill ms-1"></i></button>
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
        <p><a href="">코드래빗 소개</a><a href="">코드래빗 강좌리스트</a><a href="">코드래빗 공지사항</a><a href="#">개인정보처리방침</a><a href="#">이용약관</a></p>
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
    $( function() {
      $( "#select" ).selectmenu();
    } );

    $('#recent').click(function(){
      $('#recentView').modal('show');
    });

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