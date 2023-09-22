<?php

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
  <h2>상품 상세</h2>
  <table class="table mt-5">
    <colgroup>
        <col style="width :20%">
        <col />
    </colgroup>
    <tbody>
      <tr><th>분류:</th><td><?= $rs -> cate; ?></td></tr>
      <tr><th>상품명:</th><td><?= $rs -> name; ?></td></tr>
      <tr><th>부제:</th><td><?= $rs -> sub_name; ?></td></tr>

      <tr>
        <th>전시옵션:</th>
        <td>
          <?php
            if($rs -> isnew) {echo '신규';}
            if($rs -> isbest) {echo '베스트';}
            if($rs -> isrecom) {echo '추천';}
          ?>
        </td>
      </tr>

      <tr><th>난이도:</th><td><?= $rs -> level; ?></td></tr>
      <tr class="decodeURI"><th>수강대상:</th><td><?= stripslashes($rs -> student); ?></td></tr>
	  <tr class="decodeURI"><th>강사명:</th><td><?= stripslashes($rs -> teacher); ?></td></tr>
      <tr><th>금액 타입:</th><td><?= $rs -> price == "0" ? "무료" : "유료"; ?></td></tr>
      <tr><th>금액:</th><td><?= number_format($rs -> price_val); ?></td></tr>
      <tr><th>수강기간 타입:</th><td><?= $rs -> sale_end_date == "0" ? "무제한" : "제한"; ?></td></tr>
      <tr><th>수강기간:</th><td><?= $rs -> date_val; ?></td></tr>

      <tr>
        <th>썸네일:</th>
        <td id="thumb"><img src="<?= $rs -> thumbnail; ?>" alt=""></td>
      </tr>

	  <tr class="decodeURI"><th>인사말:</th><td><?= stripslashes($rs -> greeting); ?></td></tr>
      <tr><th>PR문구:</th><td><?= $rs -> promotion; ?></td></tr>
	  <tr class="decodeURI"><th>상세설명:</th><td><?= stripslashes($rs -> content); ?></td></tr>

<?php
if (!empty($rs->video))
{
?>
    <tr>
        <th>유튜브 영상</th>
        <td>
            <iframe width="560" height="315" src="<?php echo $rs->video?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </td>
    </tr>
<?php
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

    <tr>
        <th>강의 영상 <?php echo $ii+1?></th>
        <td>
            <iframe width="560" height="315" src="<?php echo $video_data[$ii]['video_url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			<br>
			<?php echo $video_data[$ii]['video_url']?>
        </td>
    </tr>
<?php } 
}
?>


<?php

if (count((array)$file_row["imgid"]))
{
?>
    <tr>
        <th colspan="2" style="text-align:center;font-weight:bold;">추가이미지</th>
    </tr>
<?php
    for ($i=0; $i < count((array)$file_row["imgid"]); $i++)
    {
?>
    <tr>
        <th>추가이미지<?php echo ($i+1)?></th>
        <td>
            <img src="/attention/pdata/class/<?php echo $file_row["filename"][$i]?>">
        </td>
    </tr>
<?php
    }
}

if (!empty($rs->curriculum))
{
    $curriculum_arr = explode("\n", trim($rs->curriculum));
?>
      <tr>
          <th colspan="2" style="text-align:center;font-weight:bold;">커리큘럼</th>
      </tr>

<?php
    for ($i=0; $i < count((array)$curriculum_arr); $i++)
    {
        $curriculum_info = explode("|", trim($curriculum_arr[$i]));
?>
    <tr>
        <th><?php echo $curriculum_info[0]?></th>
<?php
        $curriculum_detail = explode(",", trim($curriculum_info[1]));
?>
        <td>
<?php
        for ($j=0; $j < count((array)$curriculum_detail); $j++)
        {
            echo ($j > 0 ? "<br>" : "")." - ".$curriculum_detail[$j];
        }
?>
        </td>
    </tr>
<?php
    }
}
?>
    </tbody>
  </table>
  <hr>

  <a href="class_up.php?pid=<?=$pid?>" class="btn btn-primary">수정</a>
  <a href="class_ok.php?mode=del&pid=<?php echo $pid?>" type="button" class="btn btn-danger">삭제</a>
  <a href="class_list.php" class="btn btn-secondary">목록</a>
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
