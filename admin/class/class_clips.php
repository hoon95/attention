<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
// 관리자 검사
if(!isset($_SESSION['AUID'])){
    $return_data = array("result"=>"member"); 
    echo json_encode($return_data);
    exit;
  }

// // POST로 전송된 video 배열을 받음
// $video_urls = $_POST['video'];

// if(isset($video_urls) && is_array($video_urls)){
//     $success_urls = array();
//     foreach($video_urls as $video_url){
//         if(!empty($video_url) && filter_var($video_url, FILTER_VALIDATE_URL)){
//             // 동영상 주소를 데이터베이스에 삽입
//             $userid = $_SESSION['AUID'];
//             $sql = "INSERT INTO class_clips (userid, video_url) VALUES ('$userid', '$video_url')";
//             $result = $mysqli->query($sql);

//             if($result){
//                 $ccid = $mysqli->insert_id;
//                 $success_urls[] = array("ccid" => $ccid, "video_url" => $video_url);
//             } else {
//                 // 삽입 실패한 URL은 무시
//             }
//         } else {
//             // 유효하지 않은 URL은 무시
//         }
//     }

//     // 성공한 URL과 결과를 반환
//     if (!empty($success_urls)) {
//         $return_data = array("result" => "success", "urls" => $success_urls);
//     } else {
//         $return_data = array("result" => "error", "message" => "모든 URL이 유효하지 않거나 삽입에 실패했습니다.");
//     }

//     echo json_encode($return_data);
// } else {
//     $return_data = array("result" => "error", "message" => "전송된 데이터가 올바르지 않습니다.");
//     echo json_encode($return_data);
// }

// POST로 전송된 video 배열을 받음
$video_urls = $_POST['video'];

if(isset($video_urls) && is_array($video_urls)){
    $success_urls = array();
    foreach($video_urls as $video_url){
        if(!empty($video_url) && filter_var($video_url, FILTER_VALIDATE_URL)){
            // 동영상 주소를 데이터베이스에 삽입
            $userid = $_SESSION['AUID'];
            $sql = "INSERT INTO class_clips (userid, video_url) VALUES ('$userid', '$video_url')";
            $result = $mysqli->query($sql);

            if($result){
                $ccid = $mysqli->insert_id;
                $success_urls[] = array("ccid" => $ccid, "video_url" => $video_url);
            } else {
                // 삽입 실패한 URL은 무시
            }
        } else {
            // 유효하지 않은 URL은 무시
        }
    }

    // 성공한 URL과 결과를 반환
    if (!empty($success_urls)) {
        $return_data = array("result" => "success", "urls" => $success_urls);
    } else {
        $return_data = array("result" => "error", "message" => "모든 URL이 유효하지 않거나 삽입에 실패했습니다.");
    }

    echo json_encode($return_data);
} else {
    $return_data = array("result" => "error", "message" => "전송된 데이터가 올바르지 않습니다.");
    echo json_encode($return_data);
}
?>

