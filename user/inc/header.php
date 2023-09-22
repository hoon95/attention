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
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>
<body>
  <header>
    <nav class="d-flex justify-content-between align-items-center container_cr">
      <h1>
        <a href="/attention/user/index.php">
          <img src="/attention/user/img/main/coderabbit_logo.svg" alt="코드래빗 로고">
        </a>
      </h1>
      <ul class="d-flex align-items-center menu-list text1 fw-bold">
        <li><a href="#">ABOUT</a></li>
        <li><a href="/attention/user/class/class_whole_list.php">강의</a></li>
        <li><a href="/attention/user/community/notice.php">공지사항</a></li>
      </ul>

      <?php
        if(isset($_SESSION['UID'])){   
      ?>

      <!-- 로그인 후 -->
      <div class="d-flex justify-content-between login-ok-btn gap">
        <a href="/attention/user/cart/cart.php" class="d-flex align-items-center">
          <i class="bi bi-cart3 icon_mint"></i>
        </a>
        <div class="d-flex align-items-center main_admin position-relative">
          <a href="#"><i class="bi material-symbols-outlined icon_mint">face</i></a>
          <div class="login_mypage radius_medium p-4">
            <div class="login_content d-flex flex-column justify-content-between">
              <div class="login_box d-flex flex-column align-items-center">
                <div class="login_top d-flex flex-column align-items-center">
                  <h2 class="text2"><?= $_SESSION['UNAME']; ?> 님</h2>
                  <div class="thumbnail d-flex align-items-center">
                    <img src="/attention/user/img/main/piskel_rabbit.png" alt="프로필">
                  </div>
                </div>
                <div class="login_icon_box d-flex justify-content-between">
                  <a href="/attention/user/coupon.php" class="col"><i class="bi bi-ticket-perforated"></i><span>쿠폰함</span></a>
                  <a href="/attention/user/my_class/my_class.php" class="col"><i class="bi bi-mortarboard"></i><span>내 강의실</span></a>
                </div>
              </div>
              <div class="login_bot text-end icon_red mt-3 text5">
                <a href="/attention/user/logout.php">로그아웃</a>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <!-- /로그인 후 -->

      <?php  
        } else {
      ?>

      <!-- 로그인 전 -->
      <div class="d-flex justify-content-between login-btn">
        <a href="/attention/user/login.php" class="btn btn-outline-primary">로그인</a>
        <a href="/attention/user/member/signup.php" class="btn btn-dark-blue icon_red_baisc">회원가입</a>
      </div>
      <!-- /로그인 전 -->

      <?php  
        }
      ?>
    </nav>
  </header>
