<footer class="white dark_blue_back">
    <div class="common_container d-flex justify-content-between">
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
  <script src="js/main.js"></script>
  <script>
    $( function() {
      $( "#select" ).selectmenu();
    } );

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