<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

  $mid = $_GET['mid'];
  $userpw = $_POST['userpw'];
  $userpw_hash = hash('sha512', $userpw);
  $userpw_ok = $_POST['userpw_ok'];

  if($userpw == $userpw_ok){
    $sql = "UPDATE members SET userpw = '{$userpw_hash}' WHERE mid = '{$mid}'";
    $result = $mysqli -> query($sql);

    echo "<script>
    alert('비밀번호가 변경되었습니다.')
    location.href = '/attention/user/login.php'
    </script>";
  }else{
    echo "<script>
    alert('비밀번호가 일치하지 않습니다');
    history.back();
    </script>";
  }
?>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';

?>