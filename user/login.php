<?php
$title = '로그인 - Code Rabbit';
require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

if(isset($_SESSION['UID'])){
  echo "<script>alert('이미 로그인 하셨습니다');
    location.href = '/attention/user/index.php';</script>";
}
?>
<link rel="stylesheet" href="/attention/user/css/login.css">
<div class="container_cr">
      <div class="login">
        <h2>로그인</h2>
        <form action="login_ok.php" method="POST">
          <div>
            <input type="text" class="form-control login_id" id="userid" name="userid" placeholder="아이디" required>
          </div>
          <div>
            <span class="search">
              <input type="password" name="userpw" id="userpw" class="user_pw search form-control" placeholder="비밀번호" required>
              <button type="button"><i class="pw_icon bi bi-eye-slash icon_gray"></i></button>
            </span>
          </div>
          <button class="btn btn-primary login_button">로그인</button>
        </form>
        <div class="login_link d-flex justify-content-between">
          <div class="login_find d-flex justify-content-between">
            <a href="/attention/user/member/find_id.php">아이디 찾기</a>
            <a href="/attention/user/member/find_pw.php" class="login_link_pw">비밀번호 찾기</a>
          </div>
          <a href="/attention/user/member/signup.php">회원가입</a>
        </div>
        <h5 class="text4">간편 로그인</h5>
          <ul class="login_sns d-flex justify-content-center">
            <li><a href="#"><img src="img/main/kakaotalk_logo.png" alt="kakaotalk logo"></a></li>
            <li><a href="#"><img src="img/main/band_logo.png" alt="band logo"></a></li>
            <li><a href="#"><img src="img/main/instagram_logo.png" alt="instagram logo"></a></li>
            <li><a href="#"><img src="img/main/facebook_logo.png" alt="facebook logo"></a></li>
          </ul>
      </div>
    </div>
  <script>
    // 비밀번호 보기 기능
    $('.pw_icon').click(function(){
      $('.user_pw').toggleClass('active');
        if($('.user_pw').hasClass('active')){
          $('.user_pw').attr('type', 'text');
          $(this).attr('class','bi-eye');
        } else{
          $('.user_pw').attr('type', 'password');
          $(this).attr('class','bi-eye-slash');
        }
    })
  </script>
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>