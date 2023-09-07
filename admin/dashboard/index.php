<?php
    $flatpickr_min_css = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">';
    $index_css = '<link rel="stylesheet" href="/attention/admin/css/index.css">';
    $title = '대시보드 - Code Rabbit';
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
    
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

    $member_plus = "WHERE DATE_FORMAT(regdate, '%Y-%m-%d') BETWEEN DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND CURDATE()";
    $member_new = "AND DATE_SUB(CURDATE(), INTERVAL 6 DAY) <= DATE_FORMAT(regdate, '%Y-%m-%d')";
    $member_query = "SELECT DATE_FORMAT(regdate, '%Y-%m-%d') as date, COUNT(*) as cnt FROM members ".$member_plus." GROUP BY DATE_FORMAT(regdate, '%Y-%m-%d') ORDER BY DATE_FORMAT(regdate, '%Y-%m-%d') ASC";
    $member_result = $mysqli->query($member_query);

    $member_exit = "SELECT DATE_FORMAT(regdate, '%Y-%m-%d') as date, COUNT(*) as cnt FROM members WHERE DATE_FORMAT(regdate, '%Y-%m-%d') BETWEEN DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND CURDATE() AND status='탈퇴' GROUP BY DATE_FORMAT(regdate, '%Y-%m-%d') ORDER BY DATE_FORMAT(regdate, '%Y-%m-%d') ASC";
    $member_exit_result = $mysqli->query($member_exit);

    while($member_object = $member_result->fetch_assoc()){
        $member[] = $member_object;
    }
    $member_date = [];
    $member_new = [];

    while($member_exit_object = $member_exit_result->fetch_assoc()){
        $exit_num[] = $member_exit_object;
    }
    $member_ex = [];

    foreach($member as $m){
        array_push($member_date, $m['date']);
        array_push($member_new, $m['cnt']);
    }
    foreach($exit_num as $ex){
        array_push($member_ex, $ex['cnt']);
    }
?>

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
            <h3 class="text1 member_num">신규/탈퇴 회원</h3>
            <div class="d-flex member_in text1">
                <span><?= $member_new[6] ?></span>명
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
<script>
    $('.dash_menu').css({backgroundColor: "#252a38"});
    $('.dash_menu').find('a').css({color: 'white'});
    let currentDate = new Date();
    currentDate.setDate(currentDate.getDate() - 6);
    let ago = currentDate.toISOString().split('T')[0];
    $('.member_date_ago').text(ago);
    $('.member_date_now').text(today);

    const mlabel = <?= json_encode($member_date) ?>;
    const mdata = {
        labels: mlabel,
        datasets:[{
            label: '신규 회원 수',
            data: <?= json_encode($member_new) ?>,
            backgroundColor: [
            'rgba(42, 193, 188, 0.2)',
            'rgba(42, 193, 188, 0.2)',
            'rgba(42, 193, 188, 0.2)',
            'rgba(42, 193, 188, 0.2)',
            'rgba(42, 193, 188, 0.2)',
            'rgba(42, 193, 188, 0.2)',
            'rgba(42, 193, 188, 0.2)'
            ],
            hoverBackgroundColor:[
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)'
            ],
            hoverBorderColor:[
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)',
            'rgba(42, 193, 188, 0.5)'
            ],
            borderColor: [
            'rgb(42, 193, 188)',
            'rgb(42, 193, 188)',
            'rgb(42, 193, 188)',
            'rgb(42, 193, 188)',
            'rgb(42, 193, 188)',
            'rgb(42, 193, 188)',
            'rgb(42, 193, 188)'
            ],
            borderWidth: 1
        },{
        label: '탈퇴 회원 수',
        data: <?= json_encode($member_ex) ?>,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 99, 132, 0.2)'
        ],
        hoverBackgroundColor:[
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)'
        ],
        hoverBorderColor:[
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 99, 132, 0.5)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 99, 132)',
            'rgb(255, 99, 132)',
            'rgb(255, 99, 132)',
            'rgb(255, 99, 132)',
            'rgb(255, 99, 132)',
            'rgb(255, 99, 132)'
        ],
        borderWidth: 1
    }]
    }
    const mconfig = {
    type: 'bar',
    data: mdata
    };

  let mchart = document.querySelector('#member_chart');
  const stackedBar = new Chart(mchart, mconfig);
// /가입/탈퇴 회원 막대 그래프
</script>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>