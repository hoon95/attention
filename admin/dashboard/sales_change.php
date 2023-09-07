<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

    $selectedDate = $_POST['selectedDate'];
    $sales_query = "SELECT DATE_FORMAT(regdate, '%Y-%m-%d') AS date, ROUND(SUM(price)) AS average_sales FROM sales WHERE regdate >= DATE_SUB('{$selectedDate}', INTERVAL 13 DAY) AND regdate <= DATE_ADD('{$selectedDate}', INTERVAL 1 DAY) GROUP BY date ORDER BY date DESC";
    $sales_result = $mysqli->query($sales_query);

    if($sales_result){
        while($sales_object = $sales_result->fetch_object()){
            $rs[]=$sales_object;
        }
        $sales = array('result'=>$rs);
        $sales_result = json_encode($sales);
        echo $sales_result;
    }
 ?>