<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

?>
<link rel="stylesheet" href="/attention/user/css/notice.css">

<main>
  <div class="banner d-flex align-items-center justify-content-center">
    <p class="white tt_01">코드래빗이 전해드리는 소식을 확인해보세요</p>
  </div>
  <section class="container sub_mg_t sub_mg_b">
    <h2 class="tt_01 ms-4">공지사항</h2>
    <form action="" id="search_form" class="text-end">
      <div class="search col-3">
        <input type="text" name="search" id="search" class="form-control" placeholder="제목 및 내용 입력">
        <button type="submit"><i class="bi bi-search icon_mint"></i></button>
      </div>
    </form>

    <!-- <table class="table mt-4"> -->
    <table class="mt-4">
      <thead>
        <tr class="board_hd text1 text-center fw-bold mint_bg_back d-flex align-items-center">
          <th scope="col" class="col-1">No&#46;</th>
          <th scope="col" class="col-7">제목</th>
          <th scope="col" class="col-2">작성일</th>
          <th scope="col" class="col-2">조회수</th>
        </tr>
      </thead>
      <tbody>
        <!-- 반복 -->
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <!-- /반복 -->    
  
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
        <tr class="board_bd d-flex align-items-center">
          <td class="text-center col-1">10</td>
          <td class="col-7"><a href="notice_view.html">[회원] 신규회원 대상 안내 사항</a></td>
          <td class="text-center col-2">2023-09-13</td>
          <td class="text-center col-2">106</td>
        </tr>
      </tbody>
    </table>

    <nav aria-label="페이지네이션" class="mt-5">
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
  </section>
</main>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';

?>