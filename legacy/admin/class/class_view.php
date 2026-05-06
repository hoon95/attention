<?php
  $title = '강좌 상세 - Code Rabbit';
  $class_view_css = '<link rel="stylesheet" href="/attention/admin/css/class_view.css">';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

  $pid = $_GET['pid'];
  $sql = "SELECT * FROM class WHERE pid={$pid}";
  $result = $mysqli -> query($sql);
  if($result->num_rows === 0) {
	  echo "<script>
      alert('해당하는 상품이 존재하지 않습니다.');
      history.back();
    </script>";
  }

  $rs = $result -> fetch_object();

  $sql = "SELECT * FROM class_image_table WHERE pid={$pid} AND status = 1";
  $file_row = sql_fetch_array($sql);
?>

<div class="container mt-5">
  <h2 class="tt_01 text-center">강좌 상세</h2>
  <div class="mt-5 class_view_main white_back dark_gray">
    <div>
      <div class="d-flex">
        <div class="d-flex class_view_row me-4 class_view_cate"><h3 class="me-2"><mark>분류:</mark></h3><p><?= $rs -> cate; ?></p></div>
        <div class="d-flex class_view_row">
          <h3 class="me-2"><mark>전시옵션:</mark></h3>
          <p>
            <?php
              if($rs -> isnew) {echo '신규&#10003; ';}
              if($rs -> isbest) {echo '베스트&#10003; ';}
              if($rs -> isrecom) {echo '추천&#10003;';}
            ?>
          </p>
        </div>
      </div>

      <div class="d-flex class_view_row">
        <div class="d-flex me-4 class_view_name"><h3 class="me-2"><mark>상품명:</mark></h3><p><?= $rs -> name; ?></p></div>
        <div class="d-flex me-4 class_view_subname"><h3 class="me-2"><mark>부제:</mark></h3><p><?= $rs -> sub_name; ?></p></div>
        <div class="decodeURI d-flex"><h3 class="me-2"><mark>강사명:</mark></h3><p><?= stripslashes($rs -> teacher); ?></p></div>
      </div>

      <div class="d-flex">
        <div class="d-flex class_view_row me-4 class_view_level"><h3 class="me-2"><mark>난이도:</mark></h3><p><?= $rs -> level; ?></p></div>
        <div class="d-flex class_view_row me-4 class_view_price">
          <h3 class="me-2"><mark>가격:</mark></h3>
          <p><?= $rs -> price == "0" ? "무료" : "유료"; ?></p>
          <p>(<?= number_format($rs -> price_val)."원"; ?>)</p>
        </div>
        <div class="d-flex class_view_row">
          <h3 class="me-2"><mark>수강기한:</mark></h3>
          <p><?= $rs -> sale_end_date == "0" ? "무제한" : "제한"; ?></p>
          <p>(<?= $rs -> date_val; ?>개월)</p>
        </div>
      </div>

      <div class="decodeURI class_view_student">
        <h3 class="me-2"><mark>수강대상:</mark></h3>
        <p class="mt-2"><?= stripslashes($rs -> student); ?></p>
      </div>
	    <hr>
      
      <div clas="class_view_row">
        <div class="class_view_thumbarea">
          <h3 class="me-2"><mark>썸네일:</mark></h3>
          <p id="thumb" class="class_view_thumb"><img src="<?= $rs -> thumbnail; ?>" alt=""></p>
        </div>
        <div class="class_view_mainvd">
          <h3 class="me-2"><mark>대표영상:</mark></h3>
          <p class="class_view_video">
        

<?php
if (!empty($rs->video))
{
?>
              <iframe width="420" height="236" src="<?php echo $rs->video?>" title="YouTube video player" frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
              allowfullscreen></iframe>
            </p>
          </div>
      
<?php
}
?>
              </iframe>
            </p>
          </div>
        </div>
        <hr class="mt-4">

      <div class="decodeURI class_view_row mt-4">
        <h3 class="me-2"><mark>인사말:</mark></h3>
        <div class="class_view_greetcon"><p class="mt-2"><?= stripslashes($rs -> greeting); ?></p></div>
      </div>

      <div class="d-flex class_view_row"><h3 class="me-2"><mark>PR문구:</mark></h3><p><?= $rs -> promotion; ?></p></div>
	    
      <div class="decodeURI class_view_row">
        <h3 class="me-2"><mark>상세설명:</mark></h3>
        <div class="class_view_cotent"><p class="mt-2"><?= stripslashes($rs -> content); ?></p></div>
      </div>

      <?php

if (count((array)$file_row["imgid"]))
{
?>
    <div class="d-flex class_view_row">
      <h3 class="me-2"><mark>추가Img:</mark></h3>
      
<?php
    for ($i=0; $i < count((array)$file_row["imgid"]); $i++)
    {
?>
      
        <figure class="class_view_addimg me-3">
          <figcaption class="mb-2">추가 이미지 <?php echo ($i+1)?></figcaption>
          <img src="/attention/pdata/class/<?php echo $file_row["filename"][$i]?>">
        </figure>       

<?php
    }
} ?>


<?php
if (!empty($rs->curriculum))
{
    $curriculum_arr = explode("\n", trim($rs->curriculum));
?>

    </div><hr>
      
    <div class="d-flex class_view_row flex-column">
      <h3 class="me-2"><mark>커리큘럼:</mark></h3>
      

<?php
    for ($i=0; $i < count((array)$curriculum_arr); $i++)
    {
        $curriculum_info = explode("|", trim($curriculum_arr[$i]));
?>
      <div class="class_course_explain">
        <h4 class="me-2"><?php echo $curriculum_info[0]?></h4>
<?php
        $curriculum_detail = explode(",", trim($curriculum_info[1]));
?>
        <p>
<?php
        for ($j=0; $j < count((array)$curriculum_detail); $j++)
        {
            echo ($j > 0 ? "<br>" : "")." - ".$curriculum_detail[$j];
        }
?>
        </p>
      </div>
    </div>  
<?php
    }
}
?>

      <?php
      $query = "select * from class_clips where pid = '".$pid."'";
      $result = $mysqli -> query($query);
      while ($rows = $result -> fetch_array(MYSQLI_ASSOC)) {
        $video_data[] = $rows;
      }

      if($video_data) { 
        for($ii=0;$ii<(count($video_data));$ii++) { 
      ?>

            <div class="d-flex class_view_row white_back class_lecvd_area">
              <h3 class="me-2"><mark>강의영상 <?php echo $ii+1?>:</mark></h3>
              <p class="mt-2 class_view_lecvideo">
                <iframe width="420" height="236" src="<?php echo $video_data[$ii]['video_url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>
                <p class="ms-3 class_view_lecurl"><?php echo $video_data[$ii]['video_url']?></p>
              </p>
            </div>
      <?php } 
      }
      ?>

      <div class="mt-3">
        <a href="class_up.php?pid=<?=$pid?>" class="btn btn-primary me-2">수정</a>
        <a href="class_ok.php?mode=del&pid=<?php echo $pid?>" type="button" class="btn btn-danger me-2">삭제</a>
        <a href="class_list.php" class="btn btn-secondary">목록</a>
      </div>

    </div>
  </div>
  <hr>

</div>
<script>
	$(function() {
		for(const td of document.querySelectorAll('.decodeURI td')){
			td.innerHTML = decodeURIComponent(td.innerHTML);
		}
	});
</script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>
