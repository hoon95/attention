<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
?>

<link rel="stylesheet" href="../css/notice.css">

<div class="notice">
  <h2 class="tt_01 text-center">게시판</h2>

  <div class="d-flex mt-5 align-items-center justify-content-between">
    <div class="select">
      <select name="select" id="select">
        <option value="1">공지사항</option>
        <option value="2">기타</option>
        <!-- <option value="3">기타</option> -->
      </select>
    </div>

    <div class="d-flex">       
      <div class="seach mx-4">
        <input type="text" name="seach_form" id="seach_form" class="form-control" placeholder="제목 및 내용 입력">
        <button type="button"><i class="bi bi-search icon_gray"></i></button>
      </div>

      <a class="btn btn-primary" href="#">글 작성</a>
    </div>
  </div>

  <form action="">
    <table class="table mt-4">
      <thead>
        <tr class="board_hd text1 text-center">
          <th scope="col" class="col-1">No&#46;</th>
          <th scope="col" class="col-7">제목</th>
          <th scope="col">작성일</th>
          <th scope="col">수정 &#47; 삭제</th>
        </tr>
      </thead>
      <tbody>
        <!-- 반복 -->
        <tr class="board_bd">
          <td class="text-center">10</td>
          <td><a href="" class="a_link">관리자 게시판에는 어떤 글이 있나..</a></td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <!-- /반복 -->
        <tr class="board_bd">
          <td class="text-center">9</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <tr class="board_bd">
          <td class="text-center">8</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <tr class="board_bd">
          <td class="text-center">7</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <tr class="board_bd">
          <td class="text-center">6</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <tr class="board_bd">
          <td class="text-center">5</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <tr class="board_bd">
          <td class="text-center">4</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <tr class="board_bd">
          <td class="text-center">3</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <tr class="board_bd">
          <td class="text-center">2</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <tr class="board_bd">
          <td class="text-center">1</td>
          <td>안녕하세요</td>
          <td class="text-center">2023-08-27</td>
          <td class="text-center">
            <a href=""><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>            
      </tbody>
    </table>

    <nav aria-label="페이지네이션" class="space">
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

  </form>
</div><!-- /notice -->

<script>
    $( function() {
      $( "#select" ).selectmenu();
    } );
  </script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>