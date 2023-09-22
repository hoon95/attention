<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';

  $pid = $_REQUEST['pid'];
  //var_dump($pid);
  $isnew = $_REQUEST["isnew"];
  $isbest = $_REQUEST["isbest"];
  $isrecom = $_REQUEST["isrecom"];
  $stat = $_REQUEST["stat"];

/*
  var_dump($pid);
  echo '<hr>';
  var_dump($ismain);
  echo '<hr>';
  var_dump($isnew);
  echo '<hr>';
  var_dump($isbest);
  echo '<hr>';
  var_dump($isrecom);
  echo '<hr>';
  var_dump($stat);
*/

  foreach($pid as $p){
    $isnew[$p] = $inew[$p] ?? 0;
    $isbest[$p] = $isbest[$p] ?? 0;
    $isrecom[$p] = $isrecom[$p] ?? 0;
    $stat[$p] = $stat[$p] ?? 0;

    $query = "UPDATE class SET isnew=".$isnew[$p].", isbest=".$isbest[$p].", isrecom=".$isrecom[$p].", status=".$stat[$p]." where pid=".$p;
    $rs = $mysqli -> query($query) or die($mysqli -> error);
  }

  if($rs){
    echo "<script>
      alert('일괄 수정 되었습니다.');
      history.back();
    </script>";
  } else {
    echo "<script>
      alert('일괄 수정 실패!');
      history.back();
    </script>";
  }

?>
