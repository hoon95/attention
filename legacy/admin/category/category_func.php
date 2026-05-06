<?php
  $query = "SELECT * FROM category WHERE step=1";

  $result = $mysqli -> query($query);
  
  while($rs = $result -> fetch_object()){
    $cate1[] = $rs;
  }
?>