<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/coupon_func_event.php';

    $userid = $_POST['userid']; //유저아이디
    $cid = $_POST['cid']; //쿠폰아이디

    $sql = "SELECT * FROM user_coupons WHERE userid='{$userid}' and couponid = '{$cid}'";
    $result = $mysqli -> query($sql);
    $rc = $result->fetch_object();


    if(!isset($rc)){
        user_coupon($mysqli, $userid, $cid,'쿠폰이벤트');
        $return_data = array("result"=> '1');
        echo json_encode($return_data);
        exit;
        } else{
        $return_data = array("result"=> '0');
        echo json_encode($return_data);
        exit;
    }


?>