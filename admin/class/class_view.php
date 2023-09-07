<?php
$class_view_css = '<link rel="stylesheet" href="/attention/admin/css/class_view.css">';
$title = '강좌상세보기 - Code Rabbit';
$class_view_css = '<link rel="stylesheet" href="/attention/admin/css/class_view.css">';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

$pid = $_GET['pid'];
$sql = "SELECT * FROM class where pid={$pid}";
$result = $mysqli -> query($sql);
$rs = $result -> fetch_object();
$cateArray = explode("/", $rs->cate);
$catenames = '';
foreach($cateArray as $cate){
  $catesql = "SELECT name FROM category where cid={$cate}";
  $cateresult = $mysqli -> query($catesql);
  $cate = $cateresult-> fetch_object();
  $catenames .= $cate->name.'>';
}
$catename = rtrim( $catenames,  $catenames[strlen( $catenames) - 1]); 
$sql2 = "SELECT * FROM class_image_table where pid={$pid}";
$result2 = $mysqli -> query($sql2);
while($rs2 = $result2 -> fetch_object()){
  $imgs[] = $rs2;
}
$clipsql = "SELECT * FROM class_clips where pid={$pid}";
$clipresult = $mysqli -> query($clipsql);
while($rs2 = $clipresult -> fetch_object()){
  $clips[] = $rs2;
}
?>
<div class="common_pd">
  <p class="tt_01 class_ss_mt class_m_pb text-center">강좌상세보기</p>
  <div class="d-flex d-flex align-items-center">
    <div class="d-flex align-items-center">
      <img src="<?php echo $rs->thumbnail ?>" alt="" class="class_v_img ">
    </div>
    <ul class="">
      <li class="text2 class_sm_pd">
        <span class="class_bold class_tl">강좌명</span>
        <span class="text2"><?php echo $rs->name ?></span>
      </li>
      <li class="text2 class_sm_pd">
        <span class="class_bold class_tl">난이도</span>
        <span class="text2 class_level_tag orange"><?php if($rs->level==1){echo "초급";} if($rs->level==2){echo "중급";} if($rs->level==3){echo "상급";} ?></span>
      </li>
      <li class="text2 class_sm_pd">
        <span class="class_bold class_tl">공개 여부</span>
        <span class="text2"><?php if($rs->status==0){echo "비공개";} if($rs->status==1){echo "공개";}  ?></span>
      </li>
      <li class="text2">
        <span class="class_bold class_tl">수강기한</span>
        <span class="text2"><?php if($rs->sale_end_date==1){echo "{$rs->date_val}개월";} if($rs->sale_end_date==0){echo "무제한";} ?></span>
      </li>
    </ul>
  </div>
  <hr class="class_hr class_mm_mt class_mm_mb">
  <div class="d-flex">
    <ul>
      <li class="text2 class_sm_pd">
        <span class="class_bold class_tl2">카테고리</span>
        <span><?= $catename; ?></span>
      </li>
      <li class="text2 class_sm_pd d-flex">
        <span class="class_bold class_tl2">강좌영상</span>
        <ul class="clips_ib">
          <?php
          if(isset($clips)){
            foreach($clips as $clip){
        ?>
        <li>
          <a href="<?php echo $clip->video_url; ?>" class="address_color">
            <?php echo $clip->video_url; ?>
          </a>
        </li>
        <?php 
        }}
        ?> 
        </ul>
      </li>
      <li class="text2 class_sm_pd d-flex">
      <div class="class_bold class_tl2">강좌소개</div>
        <div class="class_into"><?php echo $rs->content ?></div>
      </li>
      <li class="text2 d-flex class_view_img">
        <div class="class_bold class_tl2">추가 이미지</div>
        <div>
      <?php
        if(isset($imgs)){
          foreach($imgs as $item){
      ?>
        <img src="../../pdata/class/<?php echo $item->filename ?>" alt="add image">
      <?php 
      }}
      ?> 
      </div>
      </li>
    </ul>
  </div>    
    <hr class="class_hr class_mm_mt">  
    <div class="d-flex justify-content-end">
      <a href="/attention/admin/class/class_list.php" class="btn btn-dark class_sm_ml">닫기</a>
    </div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>