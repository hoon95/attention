<?php
// $product_wlist_css = '<link rel="stylesheet" href="/attention/user/css/product_whole_list.css">';
$title = '전체 강의리스트 - Code Rabbit';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/class/class_function.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

$cate_1 = sql_fetch_array("SELECT * FROM `category` WHERE step = 1");

$data["s_cate1"] = empty($_GET["s_cate1"]) ? null : $_GET["s_cate1"];
$data["s_cate2"] = empty($_GET["s_cate2"]) ? null : $_GET["s_cate2"];
$data["s_cate3"] = empty($_GET["s_cate3"]) ? null : $_GET["s_cate3"];
$data["s_name"] = empty($_GET["s_name"]) ? null : $_GET["s_name"];
$data["page"] = empty($_GET["page"]) ? 1 : $_GET["page"];

if (!empty($data["s_cate1"]))
{
	$cate1_info = sql_fetch("SELECT * FROM `category` WHERE cid = ".$data["s_cate1"]);
}

if (!empty($data["s_cate2"]))
{
	$cate2_info = sql_fetch("SELECT * FROM `category` WHERE cid = ".$data["s_cate2"]);
}
?>

<link rel="stylesheet" href="/attention/user/css/class_whole_list.css">

<div class="container">

  <div class="row">
    <div class="col product_whole_aside">
      <aside>
        <nav>
          <div class="accordion">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed arrow_needless cate-btn" type="button" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseOne" data-cate-depth="0" >전체강의</button>
              </h2>
            </div>
<?php
if (count((array)$cate_1["cid"]) > 0)
{
    for ($i=0; $i < count((array)$cate_1["cid"]); $i++)
    {
        $cate_2 = sql_fetch_array("SELECT * FROM `category` WHERE step = 2 AND pcode = ".$cate_1["cid"][$i]);
?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $cate_1["cid"][$i]?>"
                aria-expanded="false" aria-controls="panelsStayOpen-collapse<?php echo $cate_1["cid"][$i]?>"><?php echo $cate_1["name"][$i]?></button>
              </h2>
              <div id="panelsStayOpen-collapse<?php echo $cate_1["cid"][$i]?>" style="cursor:pointer;"  class="accordion-collapse collapse cate-btn" style="">
                  <div class="accordion-body"  data-cate-depth="1" data-cate1="<?php echo $cate_1["cid"][$i]?>">ALL</div>
<?php
        if (count((array)$cate_2["cid"]) > 0)
        {
            for ($j=0; $j < count((array)$cate_2["cid"]); $j++)
            {
?>
                    <div class="accordion-body cate-btn" data-cate-depth="2" data-cate1="<?php echo $cate_1["cid"][$i]?>" data-cate2="<?php echo $cate_2["cid"][$j]?>"  style="cursor:pointer;"><?php echo $cate_2["name"][$j]?></div>
<?php
            }
        }
?>

              </div>
            </div>
<?php
    }
}
?>

          </div>
        </nav>
      </aside>
    </div>

    <div class="col product_whole_main">
      <div class="d-flex justify-content-between align-items-center product_whole_section1">
        <div class="product_cate_nav d-flex">
          <h2 class="product_whole_title">전체 강의<?php echo !empty($cate1_info["cid"]) ? "<span class=\"product_cate_slash\">&#47;</span>" : "";?></h2>
<?php
if (!empty($cate1_info["cid"]))
{
?>
			<h2 class="product_large_cate"><?php echo $cate1_info["name"]?><?php echo !empty($cate2_info["cid"]) ? "<span class=\"product_cate_slash\">&#47;</span>" : "";?></h2>
<?php
}
if (!empty($cate2_info["cid"]))
{
?>
			<h2 class="product_middle_cate"><?php echo $cate2_info["name"]?></h2>
<?php
}
?>
        </div>

        <form name="s_form" action="/attention/user/class/class_whole_list.php" id="product_search_form">
          <input type="hidden" name="s_cate1" value="<?php echo $data["s_cate1"]?>">
          <input type="hidden" name="s_cate2" value="<?php echo $data["s_cate2"]?>">
          <input type="hidden" name="s_cate3" value="<?php echo $data["s_cate3"]?>">
		  <input type="hidden" name="page" value="<?php echo $data["page"]?>">
          <div class="search">
            <input type="text" name="s_name" id="product_search_input" class="form-control" value="<?php echo $data["s_name"]?>" placeholder="전체 강의 검색">
            <button type="button" id="search-btn"><i class="bi bi-search icon_mint"></i></button>
          </div>
        </form>
      </div>


<?php
if (!empty($data["s_cate2"]))
{
    $cate_3 = sql_fetch_array("SELECT * FROM `category` WHERE step = 3 AND pcode = ".$data["s_cate2"]);
    if (count((array)$cate_3["cid"]) > 0)
    {
?>
        <div class="product_tabgtns_area">
          <div class="product_tagbtns">
<?php
        for ($i=0; $i < count((array)$cate_3["cid"]); $i++)
        {
?>
            <button type="button" class="text5 product_cate_small cate-btn" data-cate1="<?php echo $data["s_cate1"]?>" data-cate2="<?php echo $data["s_cate2"]?>" data-cate3="<?php echo $cate_3["cid"][$i];?>"><?php echo $cate_3["name"][$i]?></button>
<?php
        }
?>
          </div>
        </div>
<?php
    }
}


$sql_where = " WHERE 1=1";
if (!empty($data["s_cate1"])) $sql_where .= " AND cate1 = '".$data["s_cate1"]."'";
if (!empty($data["s_cate2"])) $sql_where .= " AND cate2 = '".$data["s_cate2"]."'";
if (!empty($data["s_cate3"])) $sql_where .= " AND cate3 = '".$data["s_cate3"]."'";
if (!empty($data["s_name"])) $sql_where .= " AND (name LIKE '%".$data["s_name"]."%' || content LIKE '%".$data["s_name"]."%')";


$product_count = sql_fetch("SELECT count(*) AS cnt FROM `class`".$sql_where);

$total_cnt = $product_count["cnt"];
$list_max = 20; // 리스트 출력 개수
$total_page = ceil($total_cnt / $list_max);
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$start = ($page - 1) * $list_max;
$page_max = 10;
$total_block = ceil($total_page / $page_max);
$now_block = ceil($page / $page_max);
$start_page = ($now_block - 1) * $page_max + 1;
$end_page = min($now_block * $page_max, $total_page);
$product_row = sql_fetch_array("SELECT * FROM `class`".$sql_where." LIMIT ".$start.", ".$list_max);
if (count((array)$product_row["pid"]) > 0)
{
?>
        <div class="row product_goods product_whole_section3">
<?php
    for ($i=0; $i < count((array)$product_row["pid"]); $i++)
    {
?>
            <article class="col-3 view-btn" data-pid="<?php echo $product_row["pid"][$i]?>" style="cursor:pointer;">
                <img src="<?php echo $product_row["thumbnail"][$i]?>" alt="" class="product_whole_thumbnail">
                <div class="product_info_profile">
                    <div>
                        <h3 class="product_name"><?php echo $product_row["name"][$i]?></h3>
                        <p class="product_teacher text5 gray"><?php echo $product_row["teacher"][$i]?></p>
                        <div class="d-flex product_level_price">
                            <p class="product_level gray"><?php echo $level_arr[$product_row["level"][$i]]?></p>
                            <span class="product_vertical_bar gray text5">&#124;</span>
                            <p class="product_price"><?php echo $product_row["price"][$i] == "0" ? "무료" : (" &#8361;".number_format($product_row["price_val"][$i]))?></p>
                        </div>
                    </div>
                </div>
            </article>
<?php
    }
?>

        </div>
<?php
}
else
{
?>
    <div style="text-align:center;margin-top:150px;">등록된 강좌가 없습니다.</div>
<?php
}
?>

<?php
if ($total_cnt > 0)
{

?>
		<div class="product_whole_section4">
		  <nav aria-label="...">
			<ul class="pagination justify-content-center align-items-center">

			  <li class="page-item">
				<a class="page-link" href="#null" data-paging="<?php echo $page == 1 ? "first" : "1" ?>"><i class="bi bi-chevron-double-left icon_gray"></i></a>
			  </li>

			  <li class="page-item">
				<a class="page-link" href="#null" data-paging="<?php echo $page-1 >= 1 ? $page-1 : "first" ?>"><i class="bi bi-chevron-left icon_gray"></i></a>
			  </li>
<?php
	for ($i=$start_page; $i <= $end_page; $i++)
	{
?>
			<li class="page-item<?php echo $page == $i ? " active" : ""?>"><a class="page-link" href="#null" data-paging="<?php echo $i?>"><?php echo $i?></a></li>
<?php
	}
?>

			  <li class="page-item">
				<a class="page-link" href="#null" data-paging="<?php echo $page+1 <= $total_page ? $page+1 : "last" ?>"><i class="bi bi-chevron-right icon_gray"></i></a>
			  </li>

			  <li class="page-item">
				<a class="page-link" href="#null" data-paging="<?php echo $page == $total_page ? "last" : $total_page;?>"><i class="bi bi-chevron-double-right icon_gray"></i></a>
			  </li>
			</ul>
		  </nav>
		</div>

<?php
}
?>

    </div>

  </div>


</div>
<script>
$(".cate-btn, .page-link").click(function () {
	var depth = $(this).attr("data-cate-depth");

	if (depth == 0)
	{
		$("input[name='s_cate1']").val("");
		$("input[name='s_cate2']").val("");
		$("input[name='s_cate3']").val("");
	}

	if (depth == 1)
	{
		$("input[name='s_cate2']").val("");
		$("input[name='s_cate3']").val("");
	}

	if (depth == 2)
	{
		$("input[name='s_cate3']").val("");
	}

    if ($(this).attr("data-cate1"))
    {
        $("input[name='s_cate1']").val($(this).attr("data-cate1"));
    }
    if ($(this).attr("data-cate2"))
    {
        $("input[name='s_cate2']").val($(this).attr("data-cate2"));
    }
    if ($(this).attr("data-cate3"))
    {
        $("input[name='s_cate3']").val($(this).attr("data-cate3"));
    }

	if ($(this).attr("data-paging"))
    {
		if ($(this).attr("data-paging") == "first")
		{
			alert("첫 페이지입니다.");
			return false;
		}
		else if ($(this).attr("data-paging") == "last")
		{
			alert("마지막 페이지입니다.");
			return false;
		}
		else
		{
			$("input[name='page']").val($(this).attr("data-paging"));
		}
    }
	else
	{
		$("input[name='page']").val(1);
	}
    search_form();
});

$("#search-btn").click(function () {
	search_form();
});

$(".view-btn").click(function () {
	var pid = $(this).attr("data-pid");
	location.href='class_detail_view.php?pid='+pid;
});

function search_form()
{
    var f = document.s_form;
    f.submit();
}

</script>

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>
