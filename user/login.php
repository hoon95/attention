<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

if(isset($_SESSION['UID'])){
    
      echo "<script>
        alert('이미 로그인 하셨습니다.');
        location.href = '/attention/user/index.php';
      </script>";
   
  }
?>

<div class="container">
  <h1 class="h3 mt-5">로그인</h1>
  <form action="login_ok.php" method="POST">
    <div class="mb-3">
      <label for="userid" class="form-label">아이디</label>
      <div class="input-group">        
        <input type="text" name="userid" class="form-control" id="userid" aria-describedby="basic-addon3 basic-addon4" required>
      </div>      
    </div>
    <div class="mb-3">
      <label for="userpw"  class="form-label">비밀번호</label>
      <div class="input-group">        
        <input type="password" name="passwd" class="form-control" id="userpw" aria-describedby="basic-addon3 basic-addon4" required>
      </div>      
    </div>
    <button type="submit" class="btn btn-primary">로그인</button>
  </form>
  <a href="/attention/user/member/signup.php">회원가입</a>
  <a href="/attention/user/member/find_id.php">아이디 찾기</a>
  <a href="/attention/user/member/find_pw.php">비밀번호 찾기</a>
</div>




<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>