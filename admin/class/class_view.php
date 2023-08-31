<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
?>

<div class="common_pd">
      <p class="tt_01 class_ss_mt class_m_pd text-center">강좌상세보기</p>
      <table class="table">
        <tbody>
          <tr class="d-flex align-items-center">
            <td class="class_img"><img src="../img/test2.png" alt=""></td>
            <td>
              <div class="text2 class_bold class_sm_pd">강좌명</div>
              <div class="text2 class_bold class_sm_pd">난의도</div>
              <div class="text2 class_bold class_sm_pd">공개 여부</div>
              <div class="text2 class_bold">수강기한</div>
            </td>
            <td class="class_m_ml">
              <div class="text2 class_sm_pd">웹디자이너를 위한 피그마 100% 활용 기초</div>
              <div class="text2 class_sm_pd"><span class="class_level_tag orange">초급</span></div>
              <div class="text2 class_sm_pd">공개</div>
              <div class="text2">1개월</div>
            </td>
          </tr>
        </tbody>
      </table>
      <hr class="class_hr">
      <table class="table">
        <tbody>
          <tr>
            <th>
              <div class="text2 class_bold class_sm_pd class_cate class_view_w">카테고리</div>
            </th>
            <td class="class_m_ml">
            <div class="text1 class_sm_pd">Computer > Design > 피그마</div>
            </td>
          </tr>
          <tr>
            <th>
              <div class="text2 class_bold class_sm_pd class_view_w">강좌영상</div>
            </th>
            <td class="class_m_ml">
              <a href="https://www.youtube.com" class="text2 class_sm_pd address_color">https://www.youtube.com</a>
            </td>
          </tr>
          <tr>
            <th>
              <div class="text2 class_bold class_view_w">강좌소개</div>
            </th>
            <td class="class_m_ml">
            
              <div class="text2 class_into">입문자를 위해 준비한[프로그래밍 언어] 강의입니다.
                이미 2만명 이상이 학습하고 만족한 최고의 프로그래밍 입문 강의. 
                인프런이 비전공자 위치에서 직접 기획하고 준비한 프로그래밍 입문 강의로,
                프로그래밍을 전혀 접해보지 못한 사람부터 실제 활용 가능한 프로그래밍 능력까지 갈 수 있도록 
                도와주는 강의입니다.</div>
            </td>
          </tr>
        </tbody>
      </table>
  
      <hr class="class_hr">  <div class="d-flex justify-content-end">
        <button class="btn btn-dark sm-ml">닫기</button>
      </div>
    </div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>