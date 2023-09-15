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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="/attention/admin/css/common.css">
  <link rel="stylesheet" href="/attention/admin/css/main.css">
  <link rel="shortcut icon" type="image/x-icon" href="/attention/admin/img/coderabbit_favicon.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/attention/admin/img/coderabbit_favicon.png">
  <?php
    if(isset($category_css)){
      echo $category_css;
    }
    if(isset($class_cate_css)){
      echo $class_cate_css;
    }
    if(isset($class_list_css)){
      echo $class_list_css;
    }
    if(isset($class_up_css)){
      echo $class_up_css;
    }
    if(isset($class_view_css)){
      echo $class_view_css;
    }
    if(isset($coup_ok_css)){
      echo $coup_ok_css;
    }
    if(isset($coup_css)){
      echo $coup_css;
    }
    if(isset($login_css)){
      echo $login_css;
    }
    if(isset($member_css)){
      echo $member_css;
    }
    if(isset($notice_css)){
      echo $notice_css;
    }
    if(isset($sales_css)){
      echo $sales_css;
    }
    if(isset($flatpickr_min_css)){
      echo $flatpickr_min_css;
    }
    if(isset($index_css)){
      echo $index_css;
    }
    if(isset($summernote_min_css)){
      echo $summernote_css;
    }

  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script><!-- summernote 기능 쓰려면 필요 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="background d-flex">
  <nav class="aside tt_03">
    <div class="logo">
        <img src="/attention/admin/img/coderabbit_logo.svg" alt="코드래빗 로고">
    </div>
    <div class="d-flex flex-column aside_title">
      <ul>
        <li class="dash_menu"><a href="/attention/admin/dashboard/index.php"><i class="bi bi-grid-1x2-fill"></i> 대시보드</a></li>
        <li class="sales_menu"><a href="/attention/admin/sales/sales_list.php"><i class="bi bi-bar-chart"></i> 매출 관리</a></li>
        <li class="class_menu"><a href="/attention/admin/class/class_list.php"><i class="bi bi-mortarboard-fill"></i> 강좌 관리</a></li>
        <li class="coup_menu"><a href="/attention/admin/coupon/coupon_list.php"><i class="bi bi-credit-card-2-front"></i> 쿠폰 관리</a></li>
        <li class="member_menu"><a href="/attention/admin/member/member_list.php"><i class="bi bi-person-fill"></i> 회원 관리</a></li>
        <li class="board_menu"><a href="/attention/admin/notice/notice.php"><i class="bi bi-layout-text-sidebar-reverse"></i> 게시판 관리</a></li>
      </ul>
      <a href="/attention/admin/logout.php" class="text2 logout"><i class="bi bi-door-closed"></i><span>Logout</span></a>
      
    </div>
  </nav>
  <div class="main">
    <div class="profile text-end">
      <i class="bi bi-bell icon_gray"></i>
      <i class="bi bi-emoji-sunglasses icon_gray"></i>
      <span class="text2">admin</span>
    </div>
