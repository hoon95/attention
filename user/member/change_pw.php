<?php
  $title = '비밀번호 변경 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';
  $mid = $_GET['mid'];
?>

<link rel="stylesheet" href="/attention/user/css/find.css">
<div class="container_cr sub_mg_t sub_mg_b">
  <h2 class="text-center tt_03 mb-3">비밀번호 변경하기</h2>
  <form action="change_pw_ok.php?mid=<?= $mid ?>" class="find" method="POST" id="change_form">
    <div class="mb-3 change_pw">
      <label for="userpw" class="form-label">변경 비밀번호</label>
      <input type="password" name="userpw" id="userpw" class="form-control mb-2" placeholder="******" required>
    </div>
    <div class="mb-3 change_pw_ok">
      <label for="userpw_ok" class="form-label">비밀번호 확인</label>
      <input type="password" name="userpw_ok" id="userpw_ok" class="form-control mb-2" placeholder="******" required>
    </div>
    <div>
      <button class="btn btn-primary text2 mb-4">변경하기</button>
    </div>
  </form>
</div>


<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';

?>