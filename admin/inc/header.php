<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME - ABCMall</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/admin/css/common.css">

</head>
<body>
  <nav class="aside tt_03">
    <div class="logo">
        <img src="coderabbit_logo.svg" alt="">
    </div>
    <ul>
      <li><a href="/admin/index.php"><i class="bi bi-grid-1x2-fill"></i> 대시보드</a></li>
      <li><i class="bi bi-bar-chart"></i> 매출 관리</li>
      <li><a href="/admin/class/class_list.php"><i class="bi bi-mortarboard-fill"></i> 강좌 관리</a></li>
      <li><a href="/admin/coupon/coupon_list.php"><i class="bi bi-credit-card-2-front"></i> 쿠폰 관리</a></li>
      <li><i class="bi bi-person-fill"></i> 회원 관리</li>
      <li><a href="/admin/notice/notice.php"><i class="bi bi-layout-text-sidebar-reverse"></i> 게시판 관리</a></li>
    </ul>
  </nav>