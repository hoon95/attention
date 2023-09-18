<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

  $where = '';
  if(isset($_SESSION['UID'])){
      $where = "B.userid = '{$_SESSION['UID']}'";
  }

  $sql = "SELECT A.pid, A.cate, A.name, A.thumbnail, A.sale_end_date, B.userid FROM class A JOIN cart B ON A.pid = B.pid WHERE $where";
  $result = $mysqli -> query($sql);
  while($rs = $result->fetch_object()){
      $rsc[]=$rs;
  }
  foreach($rsc as $item){
    $msql = "INSERT INTO sales (pid, userid, cate, name, thumbnail, sale_end_date) VALUES ({$item->pid}, '{$_SESSION['UID']}', '{$item->cate}', '{$item->name}', '{$item->thumbnail}')";
    var_dump($msql);
  }


?>

<main class="container_cr">
    <section class="sec_mg_t">
      <h2 class="tt_01">내 강의실</h2>
      <p class="text2 gray mt-2">현재 수강 중인 강의 목록</p>
      <form action="" id="search_form" class="text-end mb-4">
        <div class="search col-3">
          <input type="text" name="search" id="search" class="form-control" placeholder="강의명을 입력하세요">
          <button type="submit"><i class="bi bi-search icon_mint"></i></button>
        </div>
      </form>
      <ul class="my_list d-flex flex-wrap justify-content-between">
        <li class="radius_medium box_shadow p-3 mb-4">
          <a href="">
            <p class="card_tt mb-3">[코드래빗x코드캠프] 훈훈한 JavaScript</p>
            <div class="d-flex">
              <img src="img/main/new_6.png" alt="썸네일 이미지" class="col-5 radius_medium">
              <div class="ps-4 pt-2 col">
                <p class="text5 dark_gray mb-3">코드캠프</p>
                <p class="text5 dark_gray mb-3">기한 : 무기한</p>
                <i class="bi material-symbols-outlined ms-auto">play_circle</i>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </section>
    
    <section class="sec_mg">
      <h3 class="tt_02">이런 강의는 어떠세요?</h3>
      <p class="text2 gray mt-2">샘플 강의를 들어보세요!</p>
      <ul class="my_list d-flex flex-wrap justify-content-between mt-4">
        <li class="radius_medium box_shadow p-3">
          <a href="">
            <p class="card_tt mb-3">[코드래빗x코드캠프] 훈훈한 JavaScript</p>
            <div class="d-flex">
              <img src="img/main/new_6.png" alt="썸네일 이미지" class="col-5 radius_medium">
              <div class="ps-4 pt-2 col">
                <p class="text5 dark_gray mb-3">코드캠프</p>
                <p class="text5 dark_gray mb-3">기한 : 무기한</p>
                <i class="bi material-symbols-outlined ms-auto">play_circle</i>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </section>
  </main>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>