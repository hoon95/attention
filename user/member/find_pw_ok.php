<?php
  // PHPMailer 라이브러리 로드
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/Exception.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/PHPMailer.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/SMTP.php';

  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $userid = $_POST['userid'];
  $username = $_POST['username'];
  $useremail = $_POST['useremail'];

  $sql = "SELECT mid, userid FROM members WHERE username = '{$username}' and useremail = '{$useremail}' and userid = '{$userid}'";
  $result = $mysqli -> query($sql);
  $pw_result = $result -> fetch_object();
  
  if($pw_result){
    $mid = $pw_result -> mid;


    function sendEmail($email, $userid, $mid) {
      $mail = new PHPMailer(true);
  
      try {
        $mail->SMTPDebug = 0;
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'coderabbit95@gmail.com';
        $mail->Password   = 'ytcb vqmu hytt ivmj';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
  
        $mail->setFrom('coderabbit95@gmail.com', '코드래빗(Code Rabbit)');
        $mail->addAddress($email, '{$username}');
  
        $mail->isHTML(true);
        $mail->Subject = '[Code Rabbit] 아이디를 확인하세요';
        $mail->Body = '
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f9f9f9;
                        padding: 20px;
                    }
                    .content {
                        background-color: #ffffff;
                        padding: 20px;
                        border: 1px solid #dddddd;
                        border-radius: 5px;
                    }
                </style>
            </head>
            <body>
                <div class="content">
                  <h2>[Code Rabbit] 비밀번호를 변경하세요</h2>
                  <p>비밀번호 변경 페이지로 이동합니다</p>
                  <a href="http://localhost/attention/user/member/change_pw.php?mid='.$mid.'">비밀번호 변경</a>
                </div>
            </body>
            </html>
        ';
        $mail->send();
        return true;
      } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
      }
    }
      // 메일 발송
      if (sendEmail($useremail, $userid, $mid)) {
          echo "<script>
          alert('귀하의 이메일로 전송된 링크를 확인하세요');
          location.href = '/attention/user/login.php';
          </script>";
      } else {
          echo "<script>
          alert('이메일 전송에 실패했습니다. 다시 시도해주세요.');
          history.back();
          </script>";
      }
  }else{
    echo "<script>
    alert('입력 정보가 일치하지 않습니다');
    history.back();
    </script>";
  }
?>