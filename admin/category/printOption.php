<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/inc/dbcon.php';

  $cate = $_POST['cate'];  
  $step = $_POST['step'];  
  $category = $_POST['category'];  

  //$html = "<option selected disabled>".$category."</option>";  //"문자".변수명."문자";
  $html = "<dt>".$category."</dt>"; 

  //조건이 2개 => 부모코드가 A0001이면서 + step이 2인(카테고리가 2인) 것.
  $query = "SELECT * FROM category WHERE step=".$step." AND pcode='".$cate."'";  
  $result = $mysqli -> query($query);  

  while($rs = $result -> fetch_object()){  
    //$html .= "<option value=\"".$rs -> cid."\">".$rs -> name."</option>";
    $html .= "<dt value=\"".$rs -> cid."\">".$rs -> name."</dt>";
  }

  //아래 코드로 출력한 결과는, ajax의(category.php) success항목의 매개변수로 들어온다.
  //즉 매개변수인 result로 들어온다.
  echo $html;
?>
