<?php
  session_start();
  // header("Access-Control-Allow-Origin: *");
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Code Rabbit</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/attention/admin/css/common.css">
  <link rel="stylesheet" href="/attention/admin/css/login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>
<div class="background">
  <div class="">
    <div class="main d-flex flex-column align-items-center justify-content-center">
      <div class="logo d-flex flex-column align-items-center">
        <img src="/attention/admin/img/coderabbit_logo_2x.svg" alt="">
        <p class="tt_02">Admin</p>
      </div>
      <form action="login_ok.php" method="POST" class="d-flex flex-column align-items-center">
        <label for="userid" class="hidden_label">ID</label>
        <input type="text" name="userid" class="form-control" id="userid" aria-describedby="basic-addon3 basic-addon4" placeholder="ID">
        <label for="userpw" class="hidden_label">Password</label>
        <input type="password" name="passwd" class="form-control" id="userpw" aria-describedby="basic-addon3 basic-addon4" placeholder="Password">
        <button type="submit" class="btn btn-primary flex-fill">로그인</button>
      </form>
    </div>

<dialog class="radius_medium" id="popup">
  <h2 class="tt_01 text-center"><span class="mint">CODE</span><span class="red"> RABBIT</span></h2>
  <p class="dark_gray text-center">LMS 관리자 페이지 제작 프로젝트</p>
  <p class="text1 mt-3">본 사이트는 구직용 포트폴리오 웹사이트이며,<br>
    실제로 운영되는 사이트가 아닙니다.</p>
  <hr>
  <div>
    <p><b>팀 Attention :</b> 김*훈(팀장), 기*은, 천*영, 한*연, 한*희</p>
    <p class="mt-2"><b>제작기간 :</b> 2023. 08. 11 ~ 2023. 09. 08</p>
    <p>
      <b>기획서 :</b> <a href="https://www.figma.com/file/10UMk7aVCAB6EPqeRh8F59/LMS-%EA%B4%80%EB%A6%AC-%EC%82%AC%EC%9D%B4%ED%8A%B8?type=design&node-id=0%3A1&mode=design&t=rFV52jADv1RGWBGw-1" target="_blank">피그마</a>
      <b class="ms-3">코드 :</b><i class="bi bi-github"></i><a href="https://github.com/hoon95/attention" target="_blank">깃허브</a>
    </p>
    <p><b>개발환경 :</b> html5, css3, javascript, php, mySQL</p>
  </div>
  <hr>
  <div>
    <p><b>업무분장</b></p>
    <p><b>기획 :</b> 팀원 전체</p>
    <p><b>디자인 :</b> 구현 담당자</p>
    <p class="mt-2"><b>- 구현 완료 페이지 -</b></p>
    <p><b>김다훈 :</b><a> 로그인</a>, <a href="./dashboard/index.php">대시보드</a>, <a href="./sales/sales_list.php">매출관리</a>, <a href="./member/member_list.php">회원관리</a></p>
    <p><b>기서은 :</b><a href="./coupon/coupon_list.php"> 쿠폰관리 </a>(조회, 등록, 수정)</p>
    <p><b>천혜영 :</b><a href="./notice/notice.php"> 공지사항 </a>(조회, 등록, 수정, 상세보기)</p>
    <p><b>한수연 :</b><a href="./category/category.php"> 카테고리 </a>(조회, 등록, 수정)</p>
    <p><b>한지희 :</b><a href="./class/class_list.php"> 강좌관리 </a>(조회)</p>
  </div>
  <hr>
  <p class="text4">아이디 : admin / 비밀번호 : 1111</p>
  <p><a href="http://hoon95.dothome.co.kr/attention/user/index.php" target="_blank" class="text4 icon_mint">사용자 페이지 가기</a></p>

  <div class="mt-4 d-flex justify-content-between">
    <div class="d-flex align-items-center gap-2">
      <label class="form-check-label" for="daycheck">하루 동안 보지 않기</label>
      <input class="form-check-input" type="checkbox" id="daycheck">
    </div>
    <button id="close" type="button" class="text4"><img src="/attention/admin/img/piskel_rabbit.png" alt="">close</button>
  </div>
</dialog>

<script>
  let popup = $('#popup'),
      closeBtn = popup.find('#close'),
      dayCheck = popup.find('#daycheck');
        
  //쿠키생성
  function setCookie(name, value, day){
    let date = new Date();
    date.setDate(date.getDate()+day);   
    document.cookie = `${name}=${value};expires=${date.toUTCString()}`;
  }

  //쿠키 확인
  function cookieCheck(name){
    let cookieArr = document.cookie.split(';');
    let visited = false;

    for(let cookie of cookieArr){
      if(cookie.search(name) > -1){
        visited = true;
        break;
      }
    }
    //visited 값이 false면 dialog 보이게
    if(!visited){
      popup.attr('open','');
    } else {
      popup.removeAttr("open");
    }
  }
  cookieCheck('Rabbit');

  closeBtn.click(function(){
    popup.removeAttr('open');
    if(dayCheck.prop("checked")){
      setCookie('Rabbit','code', 1);
    }else{
      setCookie('Rabbit','code', -1);
    }
  });
</script>