<?php
  // PHPMailer 라이브러리 로드
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/Exception.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/PHPMailer.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/SMTP.php';

  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/dbcon.php';

  $username = $_POST['username'];
  $useremail = $_POST['useremail'];

  $sql = "SELECT userid FROM members WHERE username = '{$username}' and useremail = '{$useremail}'";
  $result = $mysqli -> query($sql);
  $id_result = $result -> fetch_object();

  if($id_result && $id_result -> userid){
    $userid = $id_result -> userid;

  // 메일 발송 함수
    function sendEmail($email, $userid) {
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
                    <h2>[Code Rabbit] 아이디를 확인하세요</h2>
                    <p>귀하의 아이디는 <b>'.$userid.'</b> 입니다.</p>
                    <a href="http://hoon95.dothome.co.kr/attention/user/login.php">로그인 페이지</a>
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
    if (sendEmail($useremail, $userid)) {
        echo "<script>
        alert('회원님의 아이디가 이메일로 전송되었습니다.');
        location.href = '/attention/user/login.php';
        </script>";
    } else {
        echo "<script>
        alert('이메일 전송에 실패했습니다. 다시 시도해주세요.');
        history.back();
        </script>";
    }
  } else {
    echo "<script>
    alert('이름 또는 이메일을 다시 확인해주세요');
    history.back();
    </script>";
  }
?>