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
  <link rel="stylesheet" href="/attention/admin/css/common.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>
<div class="background d-flex">
  <nav class="aside tt_03">
    <div class="logo">
        <img src="/attention/admin/img/coderabbit_logo.svg" alt="코드래빗 로고">
    </div>
    <div class="d-flex flex-column aside_title">
      <ul>
        <li><a href="/attention/admin/dashboard/index.php"><i class="bi bi-grid-1x2-fill"></i> 대시보드</a></li>
        <li><a href="/attention/admin/sales/sales_list.php"><i class="bi bi-bar-chart"></i> 매출 관리</a></li>
        <li><a href="/attention/admin/class/class_list.php"><i class="bi bi-mortarboard-fill"></i> 강좌 관리</a></li>
        <li><a href="/attention/admin/coupon/coupon_list.php"><i class="bi bi-credit-card-2-front"></i> 쿠폰 관리</a></li>
        <li><a href="/attention/admin/member/member_list.php"><i class="bi bi-person-fill"></i> 회원 관리</a></li>
        <li><a href="/attention/admin/notice/notice.php"><i class="bi bi-layout-text-sidebar-reverse"></i> 게시판 관리</a></li>
      </ul>
      <a href="/attention/admin/logout.php" class="text2 logout"><i class="bi bi-door-closed"></i><span>out</span></a>
      
    </div>
  </nav>
  <div class="main">
    <div class="profile text-end">
      <i class="bi bi-bell icon_gray"></i>
      <i class="bi bi-emoji-sunglasses icon_gray"></i>
      <span class="text2">admin</span>
    </div>
