<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(isset($title)){echo $title;} else { echo '코드래빗과 함께 뛰어보세요!';}; ?></title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/attention/user/css/common.css">
  <link rel="stylesheet" href="/attention/user/css/footer.css">
  <link rel="shortcut icon" type="image/x-icon" href="/attention/admin/img/coderabbit_favicon.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/attention/admin/img/coderabbit_favicon.png">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>
    <header>
    <!-- 로그인 전 -->
    <!-- <nav class="d-flex justify-content-between align-items-center container_cr">
        <h1><img src="img/main/coderabbit_logo.svg" alt="코드래빗 로고"></h1>
        <ul class="d-flex justify-content-between menu-list">
          <li><a href="" class="tt_03">ABOUT</a></li>
          <li><a href="" class="tt_03">강의</a></li>
          <li><a href="" class="tt_03">공지사항</a></li>
        </ul>
      <div class="d-flex justify-content-between login-btn">
        <a href="" class="btn btn-outline-primary">로그인</a>
        <a href="#" class="btn btn-dark-blue icon_red_baisc">회원가입</a>
      </div>
    </nav> -->
    <!-- /로그인 전 -->

    <!-- 로그인 후 -->
    <nav class="d-flex justify-content-between align-items-center container_cr">
      <h1>
        <a href="/attention/user/index.php">
          <img src="/attention/user/img/main/coderabbit_logo.svg" alt="코드래빗 로고">
        </a>
      </h1>
      <ul class="d-flex align-items-center menu-list text1 fw-bold">
        <li><a href="">ABOUT</a></li>
        <li><a href="">강의</a></li>
        <li><a href="">공지사항</a></li>
      </ul>
      <div class="d-flex justify-content-between login-ok-btn gap">
        <a href="" class="d-flex align-items-center"><i class="bi bi-cart3 icon_mint"></i></a>
        <div class="d-flex align-items-center main_admin position-relative">
          <a href="#"><i class="bi material-symbols-outlined icon_mint">face</i></a>
          <div class="login_mypage">
            <div class="login_content d-flex flex-column justify-content-between">
              <div class="login_box d-flex flex-column align-items-center">
                <div class="login_top d-flex flex-column align-items-center">
                  <h2>유저 네임</h2>
                  <div class="thumbnail d-flex align-items-center">
                    <img src="img/main/piskel_rabbit.png" alt="프로필">
                  </div>
                </div>
                <div class="login_icon_box d-flex align-items-center justify-content-between">
                  <a href="coupon.html"><i class="bi bi-ticket-perforated"><span>쿠폰</span></i></a>
                  <a href=""><i class="bi bi-mortarboard"><span>내 강의실</span></i></a>
                </div>
              </div>
              <div class="login_bot"><a href="" class="text-start">로그아웃</a></div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- /로그인 후 -->
  </header>