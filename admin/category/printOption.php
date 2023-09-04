<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

  $cate = $_POST['cate'];  
  $step = $_POST['step'];  
  $category = $_POST['category'];  

  $html = "<option selected disabled>".$category."</option>"; 

  $query = "SELECT * FROM category WHERE step=".$step." AND pcode='".$cate."'";  
  //var_dump($_POST, $query);
  $result = $mysqli -> query($query);  

  while($rs = $result -> fetch_object()){  
    $html .= "<option value=\"".$rs -> cid."\">".$rs -> name."</option>";
  }
  echo $html;
?>
