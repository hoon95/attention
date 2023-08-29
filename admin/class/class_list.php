<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
?>

<div>
  <p class="tt_01 class_ss_m class_m_pd text-center">강좌리스트</p>

  <!-- 카테고리 관리 & 검색 form -->
  <form action="">
    <div class="d-flex justify-content-between class_sm_m">
      <span class="btn btn-primary">카테고리 관리</span>
      <span class="btn btn-primary">강좌 등록</span>
    </div>
    <div class="d-flex justify-content-between class_sm_m">
      <span class="d-flex">
        <select class="form-select" aria-label="Default select example"><option selected>대분류</option></select>
        <select class="form-select class_sm_ml" aria-label="Default select example"><option selected>중분류</option></select>
        <select class="form-select class_sm_ml" aria-label="Default select example"><option selected>소분류</option></select>
      </span>
      <span>
        <input type="text" class="form-control" name="search_form" id="search_form">
        <button class="btn btn-primary class_sm_ml">검색</button>
      </span>
    </div>

  </form>
  <!-- /카테고리 관리 & 검색 form -->
  <!-- 강좌 리스트 -->
  <form action="" method="GET">
    <table class="table class_table">
      <tbody>
        <tr>
          <td>더미 텍스트</td>
          <td>
            더미 텍스트
          </td>
          <td>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
              <label class="form-check-label" for="flexSwitchCheckDefault">강좌 공개</label>
            </div>

            <div>
              <i class="bi bi-pencil-square icon_mint"></i>
              <i class="bi bi-trash-fill icon_red"></i>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- /강좌 리스트 -->
    <!-- pagenation -->
    <nav aria-label="page_nation">
      <ul class="pagination">
        <!-- <li><a href=""></a></li>           -->
      </ul>
    </nav> 
    <!-- /pagenation -->
  </form>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>