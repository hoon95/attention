<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

    $selectedDate = $_POST['selectedDate'];
    $sales_query = "SELECT DATE_FORMAT(regdate, '%Y-%m-%d') AS date, ROUND(SUM(price)) AS average_sales FROM sales WHERE regdate > DATE_SUB('{$selectedDate}', INTERVAL 14 DAY) AND regdate <= '{$selectedDate}' GROUP BY date ORDER BY date DESC";
    $sales_result = $mysqli->query($sales_query);

//     $sales_data = array();

//     if($sales_result){
//         while ($sales_object = $sales_result->fetch_object()) {
//             $average_sales = $sales_object->average_sales;
//             $sales_data[] = array('result' => $average_sales);
//         }
        
//         echo json_encode($sales_data);
//     }

    if($sales_result){
        while($sales_object = $sales_result->fetch_object()){
            $rs[]=$sales_object;
        }
        $sales = array('result'=>$rs);
        $sales_result = json_encode($sales);
        echo $sales_result;
    }
 ?>