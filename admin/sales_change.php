<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

    $selectedDate = $_POST['selectedDate'];

    $sales_query = "SELECT DATE_FORMAT(regdate, '%Y-%m-%d') AS date, ROUND(SUM(price)) AS average_sales FROM sales WHERE DATE_FORMAT(regdate, '%Y-%m-%d') = '{$selectedDate}' GROUP BY date";
    $sales_result = $mysqli->query($sales_query);
    if($sales_result){
        $sales_object = $sales_result->fetch_object();
    
        $sales = array('result'=>$sales_object->average_sales);
        $sales_result = json_encode($sales);
        // $average_sales = $sales_object->average_sales;
        echo $sales_result;
    }
?>