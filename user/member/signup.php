<?php
  $title = '회원가입 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

?>
<link rel="stylesheet" href="/attention/user/css/signup.css">
<div class="container_cr sub_mg_t sub_mg_b">
  <h2 class="text-center tt_03 mb-3">회원가입</h2>
  <form action="signup_ok.php" class="signup" method="POST" id="signup_form">
    <div class="mb-3 signup_name">
      <label for="username" class="form-label">이름</label>
      <input type="text" name="username" id="username" class="form-control mb-2" placeholder="홍길동">
      <span class="hidden warning">이름을 입력하세요</span>
    </div>
    <div class="mb-3 signup_id">
      <label for="userid" class="form-label">아이디</label>
      <input type="text" name="userid" id="userid" class="form-control mb-2" placeholder="ID">
      <span class="hidden warning">아이디를 입력하세요</span>
    </div>
    <div class="mb-3 signup_email">
      <label for="useremail" class="form-label">이메일</label>
      <input type="email" name="useremail" id="useremail" class="form-control mb-2" placeholder="example@example.com">
      <span class="hidden warning">이메일을 입력하세요</span>
    </div>
    <div class="mb-3 signup_pw">
      <label for="userpw" class="form-label">비밀번호</label>
      <input type="password" name="userpw" id="userpw" class="form-control mb-2" placeholder="******">
      <span class="hidden warning">비밀번호를 입력하세요</span>
    </div>
    <div class="mb-3 signup_pw_config">
      <label for="pwconfig" class="form-label">비밀번호 확인</label>
      <input type="password" name="pwconfig" id="pwconfig" class="form-control mb-2" placeholder="******">
      <span class="hidden warning">비밀번호가 일치하지 않습니다</span>
    </div>
    <div class="mb-3">
      <button class="btn btn-primary text2 mb-4">가입하기</button>
      <div class="text-center d-flex flex-column">
        <span class="easy_join text4 mb-4">간편 회원가입</span>
        <div class="d-flex justify-content-between sns">
          <img src="/attention/user/img/main/kakaotalk.svg" alt="카카오톡 로고">
          <img src="/attention/user/img/main/band.svg" alt="밴드 로고">
          <img src="/attention/user/img/main/Instagram.svg" alt="인스타그램 로고">
          <img src="/attention/user/img/main/facebook.svg" alt="페이스북 로고">
        </div>
      </div>
    </div>
  </form>
</div>
<script>
  // input 값이 입력될 때마다 경고 문구 제거
  $('#signup_form input').change(function(){
    let username = $('#username').val();
    let userid = $('#userid').val();
    let useremail = $('#useremail').val();
    let userpw = $('#userpw').val();
    let pwconfig = $('#pwconfig').val();

    if(username){
      $('#username').siblings('span').addClass('hidden');
    }
    if(userid){
      $('#userid').siblings('span').addClass('hidden');
    }
    if(useremail){
      $('#useremail').siblings('span').addClass('hidden');
    }
    if(userpw){
      $('#userpw').siblings('span').addClass('hidden');
    }
    if(pwconfig == userpw){
      $('#pwconfig').siblings('span').addClass('hidden');
      return false;
    }
  })

  // 정규표현식을 이용한 이메일 유효성 검사
  function email_check(email){
    let check = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return check.test(email);
  }
  
  $('#signup_form button').click(function(e){
    e.preventDefault();
    let username = $('#username').val();
    let userid = $('#userid').val();
    let useremail = $('#useremail').val();
    let userpw = $('#userpw').val();
    let pwconfig = $('#pwconfig').val();
   
    // 가입버튼 클릭 시 미입력 경고 문구 출력
    if(!username){
      $('#username').siblings('span').removeClass('hidden');
      $('#username').focus();
      return false;
    }
    if(!userid){
      $('#userid').siblings('span').removeClass('hidden');
      $('#userid').focus();
      return false;
    }
    if(!useremail){
      $('#useremail').siblings('span').removeClass('hidden');
      $('#useremail').focus();
      return false;
    }else if(!email_check(useremail)){
      $('#useremail').siblings('span').removeClass('hidden');
      $('#useremail').siblings('span').text('이메일 형식이 올바르지 않습니다');   // 이메일 유효성 검사
      $('#useremail').focus();
      return false;
    }
    if(!userpw){
      $('#userpw').siblings('span').removeClass('hidden');
      $('#userpw').focus();
      return false;
    }
    if(pwconfig != userpw){
      $('#pwconfig').siblings('span').removeClass('hidden');
      $('#pwconfig').focus();
      return false;
    }

    let data = {
      username: username,
      userid: userid,
      useremail: useremail,
      userpw: userpw
    }
    // ajax를 통한 기존회원 유무 체크
    $.ajax({
      async:false,
      type:'post',
      url:'signup_check.php',
      data:data,
      dataType:'json',
      error:function(error){
        console.log(error);
      },
      success:function(returned_data){
        if(returned_data.cnt > 0){
          alert('이미 가입된 회원입니다.');
          return false;
        }else{
          $('#signup_form').submit();
        }
      }
    });
  });
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>