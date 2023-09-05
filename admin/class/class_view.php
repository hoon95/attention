<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

$pid = $_GET['pid'];

$sql = "SELECT * FROM class where pid={$pid}";

$result = $mysqli -> query($sql);
  $rs = $result -> fetch_object();

  $sql2 = "SELECT * FROM class_image_table where pid={$pid}";
  $result2 = $mysqli -> query($sql2);

  while($rs2 = $result2 -> fetch_object()){
    $imgs[] = $rs2;
  }
  
?>
<link rel="stylesheet" href="/attention/admin/css/class_view.css">
<div class="common_pd">
      <p class="tt_01 class_ss_mt class_m_pd text-center">강좌상세보기</p>
      <div class="d-flex">
        <img src="../../pdata/class/<?php echo $rs->thumbnail ?>" alt="" class="class_v_img">
        <ul class="class_view_title d-flex flex-column justify-content-between">
          <li class="text2 class_bold">강좌명<span class="text2"><?php echo $rs->name ?></span></li>
          <li class="text2 class_bold">난이도<span class="text2 class_level_tag orange"><?php if($rs->level==1){echo "초급";} if($rs->level==2){echo "중급";} if($rs->level==3){echo "상급";} ?></span></li>
          <li class="text2 class_bold">공개 여부<span class="text2 class_m_ml"><?php if($rs->status==0){echo "비공개";} if($rs->status==1){echo "공개";}  ?></span></li>
          <li class="text2 class_bold">수강기한<span class="text2"><?php if($rs->sale_end_date==0){echo "무제한";} if($rs->sale_end_date!==0){echo "{$rs->sale_end_date}개월";}  ?></span></li>
        </ul>
      </div>
      <hr>
      <div class="d-flex">
        <ul>
          <li class="text2 class_sm_pd">
            <span class="class_bold class_title">카테고리</span>
            <span class=""></span>
          </li>
          <li class="text2 class_sm_pd">
            <span class="class_bold class_title">강좌영상</span>
            <span class=""><a href="<?php echo $rs->video ?>" class="text2 class_sm_pd address_color"><?php echo $rs->video ?></a></span>
          </li>
          <li class="text2 d-flex">
          <span class="class_bold">강좌소개</span>
            <span class="class_into"><?php echo $rs->content ?></span>
          </li>
          <!-- <?php
          foreach($imgs as $item){ 
          ?>
          <li class="text2 class_sm_pd d-flex">
          <span class="class_bold">추가이미지</span>
          <img src="../../pdata/class/20230903195147163493.png" alt="add image">
          </li>
          <?php } ?> -->
        </ul>
      </div>    
      <hr class="class_hr">  
      <div class="d-flex justify-content-end">
        <button class="class_close btn btn-dark sm-ml">닫기</button>
      </div>
  <script>
    $('.class_close').click(function(e){
      e.preventDefault();
        history.back();
    });
  </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>