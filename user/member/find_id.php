<?php
  $title = '아이디 찾기 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

?>
<link rel="stylesheet" href="/attention/user/css/find.css">
<div class="container_cr sub_mg_t sub_mg_b">
  <h2 class="text-center tt_03 mb-3">아이디 찾기</h2>
  <form action="find_id_ok.php" class="find" method="POST" id="find_form">
    <div class="mb-3 find_name">
      <label for="username" class="form-label">이름</label>
      <input type="text" name="username" id="username" class="form-control mb-2" placeholder="홍길동" required>
    </div>
    <div class="mb-3 find_email">
      <label for="useremail" class="form-label">이메일</label>
      <input type="email" name="useremail" id="useremail" class="form-control mb-2" placeholder="example@example.com" required>
    </div>
    <div>
        <button class="btn btn-primary text2 mb-4">인증하기</button>
    </div>
  </form>
</div>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';

?>