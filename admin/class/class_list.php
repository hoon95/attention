<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
?>
  <link rel="stylesheet" href="/attention/admin/css/class_list.css">
<p class="tt_01 class_ss_mt class_m_pd text-center">강좌리스트</p>

  <!-- 카테고리 관리 & 검색 form -->
  <form action="">
    <div class="d-flex justify-content-between class_sm_m">
      <span class="btn btn-primary">카테고리 관리</span>
      <span class="btn btn-primary">강좌 등록</span>
    </div>
    <div class="d-flex justify-content-between class_sm_m">
      <span>
        <span class="select">
          <select name="select" class="select_from"> 
            <option selected disabled>대분류</option>
            <!-- <option value="1">대분류</option> -->
          </select>
        </span>
        <span class="select class_ss_ml">
          <select name="select" class="select_from">
            <option selected disabled>중분류</option>
            <!-- <option value="1">중분류</option> -->
          </select>
        </span>
        <span class="select class_ss_ml">
          <select name="select" class="select_from">
            <option selected disabled>소분류</option>
            <!-- <option value="1">소분류</option> -->
          </select>
        </span>
      </span>
      <span>
        <span class="seach">
          <input type="text" name="seach_form" id="seach_form" class="form-control">
          <button type="button"><i class="bi bi-search icon_gray"></i></button>
        </span>
        <button class="btn btn-primary class_ssm_ml">검색</button>
      </span>
    </div>

  </form>
  <!-- /카테고리 관리 & 검색 form -->
  <!-- 강좌 리스트 -->
  <form action="" method="GET">
    <table class="table class_table">
      <tbody>
        <tr class="white_back d-flex">
          <td class="class_list_img d-flex align-items-center">
            <img src="../img/test.png" alt="">
          </td>
          <td class="d-flex flex-column justify-content-between class_sm_mtb flex-grow-1">
            <div>
              <span class="text2">웹디자이너를 위한 피그마 100% 활용 기초</span><span class="class_level_tag orange">초급</span>
            </div>
            <div>200,000원</div>
            <div>
              <span class="text4 fw-bold">수강기한</span><span class="class_date_tag orange">무제한</span>
            </div>
          </td>
          <td class="class_button d-flex flex-column justify-content-between">
            <div class="form-check form-switch d-flex justify-content-end">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            </div>
            <div>
              <i class="bi bi-pencil-square icon_mint"></i>
              <i class="bi bi-trash-fill icon_red"></i>
            </div>
          </td>
        </tr>
      </tbody>
      <tbody>
        <tr class="white_back d-flex">
          <td class="class_list_img d-flex align-items-center">
            <img src="../img/test.png" alt="">
          </td>
          <td class="d-flex flex-column justify-content-between class_sm_mtb flex-grow-1">
            <div>
              <span class="text2">웹디자이너를 위한 피그마 100% 활용 기초</span><span class="class_level_tag orange">초급</span>
            </div>
            <div>200,000원</div>
            <div>
              <span class="text4 fw-bold">수강기한</span><span class="class_date_tag orange">무제한</span>
            </div>
          </td>
          <td class="class_button d-flex flex-column justify-content-between">
            <div class="form-check form-switch d-flex justify-content-end">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            </div>
            <div>
              <i class="bi bi-pencil-square icon_mint"></i>
              <i class="bi bi-trash-fill icon_red"></i>
            </div>
          </td>
        </tr>
      </tbody>
      <tbody>
        <tr class="white_back d-flex">
          <td class="class_list_img d-flex align-items-center">
            <img src="../img/test.png" alt="">
          </td>
          <td class="d-flex flex-column justify-content-between class_sm_mtb flex-grow-1">
            <div>
              <span class="text2">웹디자이너를 위한 피그마 100% 활용 기초</span><span class="class_level_tag orange">초급</span>
            </div>
            <div>200,000원</div>
            <div>
              <span class="text4 fw-bold">수강기한</span><span class="class_date_tag orange">무제한</span>
            </div>
          </td>
          <td class="class_button d-flex flex-column justify-content-between">
            <div class="form-check form-switch d-flex justify-content-end">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            </div>
            <div>
              <i class="bi bi-pencil-square icon_mint"></i>
              <i class="bi bi-trash-fill icon_red"></i>
            </div>
          </td>
        </tr>
      </tbody>
      <tbody>
        <tr class="white_back d-flex">
          <td class="class_list_img d-flex align-items-center">
            <img src="../img/test.png" alt="">
          </td>
          <td class="d-flex flex-column justify-content-between class_sm_mtb flex-grow-1">
            <div>
              <span class="text2">웹디자이너를 위한 피그마 100% 활용 기초</span><span class="class_level_tag orange">초급</span>
            </div>
            <div>200,000원</div>
            <div>
              <span class="text4 fw-bold">수강기한</span><span class="class_date_tag orange">무제한</span>
            </div>
          </td>
          <td class="class_button d-flex flex-column justify-content-between">
            <div class="form-check form-switch d-flex justify-content-end">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
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
    <div>
      <nav aria-label="pagenation">
        <ul class="pagination justify-content-center align-items-center">
          <li class="page-item">
            <a class="page-link" href="#"><i class="bi bi-chevron-left icon_gray"></i></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#"><i class="bi bi-chevron-right icon_gray"></i></a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /pagenation -->
  </form>

  <script>
    $( function() {
      $( ".select_from" ).selectmenu();
    } );
  </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>