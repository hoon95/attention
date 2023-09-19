<?php
  if(isset($_SESSION['AUID'])){
    echo "<script>
      alert('로그인이 필요합니다');
      location.href = '/attention/user/login.php';
    </script>";
  }
?>