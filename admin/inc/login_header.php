<?php
  session_start();
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
  <link rel="stylesheet" href="/attention/admin/css/common.css">
  <link rel="stylesheet" href="/attention/admin/css/login.css">
  

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