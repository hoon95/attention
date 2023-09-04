<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';

// 동영상 주소를 담은 배열
$video_urls = $_POST['video'];

if(isset($video_urls) && is_array($video_urls)){
    foreach($video_urls as $video_url){
        if(!empty($video_url) && filter_var($video_url, FILTER_VALIDATE_URL)){
            // 동영상 주소를 데이터베이스에 삽입
            $sql = "INSERT INTO class_clips (userid, video_url) VALUES ('admin', '{$video_urls}')"; //admin ->{$_SESSION['AUID']} login 연결 시 바꿀 껏
            $result = $mysqli->query($sql);

            if(!$result){
                echo "동영상 주소 등록에 실패했습니다.";
            }} 
  }} 
?>

