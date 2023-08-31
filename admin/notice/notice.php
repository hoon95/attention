<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

  // $sql = "SELECT * from notice where 1=1" ; // and 컬러명=값 and 컬러명=값 and 컬러명=값 

  $sql = "SELECT * from notice order by idx desc limit 0, 10" ; // and 컬러명=값 and 컬러명=값 and 컬러명=값 

  // $order = " order by idx desc";//최근순 정렬
  // $limit = " limit $statLimit, $endLimit";

  // $query = $sql.$order.$limit; //쿼리 문장 조합

  // var_dump($query);
  
  $result = $mysqli -> query($sql);
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }
?>

<link rel="stylesheet" href="/attention/admin/css/notice.css">

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

      <a class="btn btn-primary" href="/attention/admin/notice/notice_write.php">글 작성</a>
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
        <?php
          if(isset($rsc)){
            foreach($rsc as $item){            
        ?>
        <!-- 게시물 생성 -->
        <tr class="board_bd">
          <td class="text-center"><?= $item -> idx; ?></td>
          <td><a href="" class="a_link"><?= $item -> title; ?></a></td>
          <td class="text-center"><?= $item -> date; ?></td>
          <td class="text-center">
            <a href="/attention/admin/notice/notice.modify.php"><i class="bi bi-pencil-square icon_mint"></i></a>
            <button type="button"><i class="bi bi-trash-fill icon_red"></i></button>
          </td>
        </tr>
        <?php
          } //foreach
        } else {    
        ?>  
        <tr>
          <td>조회 결과가 없습니다.</td>
        </tr>
        <?php
          }  
        ?>  
        <!-- /게시물 생성 -->
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



<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>