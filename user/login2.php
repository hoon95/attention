<?php
  $login_css = '<link rel="stylesheet" href="/attention/user/css/login.css">';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';
  
  if(isset($_SESSION['UID'])){
    echo "<script>alert('이미 로그인 하셨습니다');
      location.href = '/attention/user/index.php';</script>";
  }
  

?>
<div class="container">
      <div class="login">
        <h1 class="">로그인</h1>
        <form method="POST">
          <div>
            <input type="text" class="form-control login_id" placeholder="아이디">
          </div>
          <div>
            <span class="seach">
              <input type="password" name="search" id="search" class="search form-control" placeholder="비밀번호">
              <button type="button"><i class="pw_icon bi bi-eye-slash icon_gray"></i></button>
            </span>
          </div>
          <button class="btn btn-primary login_button">로그인</button>
        </form>
        <div class="login_link d-flex justify-content-between">
          <div class="login_find d-flex justify-content-between">
            <a href="">아이디 찾기</a>
            <a href="" class="login_link_pw">비밀번호 찾기</a>
          </div>
          <a href="">회원가입</a>
        </div>
        <h5 class="text4">간편 로그인</h5>
          <ul class="login_sns d-flex justify-content-center">
            <li><a href="#"><img src="./img/main/kakaotalk_logo.png" alt="kakaotalk logo"></a></li>
            <li><a href="#"><img src="./img/main/band_logo.png" alt="band logo"></a></li>
            <li><a href="#"><img src="./img/main/instagram_logo.png" alt="instagram logo"></a></li>
            <li><a href="#"><img src="./img/main/facebook_logo.png" alt="facebook logo"></a></li>
          </ul>
      </div>
    </div>
<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>