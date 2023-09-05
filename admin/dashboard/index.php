<?php
    $title = '대시보드 - Code Rabbit';
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
    
    $class_query = "SELECT name, COUNT(sid) AS average_class FROM sales GROUP BY name ORDER BY average_class DESC LIMIT 3";
    $class_result = $mysqli->query($class_query);

    while($class_object = $class_result->fetch_object()){
        $class[] = $class_object;
    }

    $board_query = "SELECT title FROM notice ORDER BY idx DESC LIMIT 0,4";
    $board_result = $mysqli-> query($board_query);

    while($board_object = $board_result->fetch_object()){
        $board[] = $board_object;
    }
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="/attention/admin/css/index.css">
<div class="">
    <h2 class="tt_01 text-center dash_title">대시보드</h2>
    <div class="dash_box_top d-flex justify-content-between">
        <div class="box_shadow radius_medium d-flex flex-column justify-content-between">
            <h3 class="text1 sales_summary">매출 요약</h3>
            <div class="text1">
                <span>₩</span>
                <span class="sales_amount number"></span>
            </div>
            <div class="gray sales_date">
                <span>(</span>
                <span class="sales_start_date"></span>
                <span>~</span>
                <span class="sales_end_date"></span>
                <span>)</span>
            </div>
            <div class="d-flex text4">
                <span>지난 주 대비 </span>
                <span class="sales_per"></span>
                <span> % </span>
                <span class="sales_updown"></span>
            </div>
            <canvas id="sales_chart"></canvas>
        </div>
        <div class="box_shadow radius_medium">
            <input id="datepicker" type="text">
        </div>
        <div class="box_shadow radius_medium">
            <h3 class="text1 access_num">접속자 수</h3>
            <div class="d-flex access_today">
                <p class="text4">오늘 접속자 수</p>
                <span class="text1 number">2,730</span>
            </div>
            <div class="text4 gray">
                <span>(</span>
                <span class="access_week"></span>
                <span>)</span>
            </div>
            <canvas id="access_chart"></canvas>
        </div>
    </div>
    <div class="dash_box_bottom d-flex justify-content-between">
        <div class="box_shadow radius_medium d-flex flex-column justify-content-start">
            <div class="pop_class">
                <h3 class="text1 pop_class_title">인기강좌</h3>
                <p class="text4">가장 인기있는 강좌 Top 3</p>
            </div>
            <div class="pop_class_list d-flex flex-column">
                <?php foreach($class as $item){ ?>
                <div class="top_class d-flex justify-content-between align-items-center">
                    <img src="/attention/admin/img/dashboard/<?= $item->name ?>.png" alt="<?= $item->name ?>">
                    <p class="text2"><?= $item->name ?></p>
                    <span class="gray"><?= $item->average_class ?>명</span>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="box_shadow radius_medium d-flex flex-column">
            <div class="recent_board">
                <h3 class="text1 recent_board_title">최근 등록 게시물</h3>
                <p class="text4">최근 등록된 게시글을 확인하세요</p>
            </div>
            <div class="recent_board_ul d-flex flex-column">
                <?php
                if(isset($board)){
                    foreach($board as $item){
                ?>
                <div class="recent_board_list d-flex justify-content-between">
                    <p class="text4 gray"><?php if(mb_strlen($item->title)>=20){
                        echo mb_substr($item->title, 0, 20).'...';
                    }else{
                        echo $item->title;
                    }
                    ?></p>
                    <p class="text4 recent_board_type">공지사항</p>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="box_shadow radius_medium">
            <h3 class="text1 member_num">가입/탈퇴 회원</h3>
            <div class="d-flex member_in text1">
                <span>가입</span>
                <span>316</span>명
            </div>
            <div class="gray member_date">
                <span>(</span>
                <span class="member_date_ago"></span>
                <span>~</span>
                <span class="member_date_now"></span>
                <span>)</span>
            </div>
            <canvas id="member_chart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="/attention/admin/js/jquery.number.min.js"></script>
<script src="/attention/admin/js/index.js"></script>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>