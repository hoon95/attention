<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="/attention/admin/css/index.css">
<div class="">
    <h2 class="tt_01 text-center dash_title">대시보드</h2>
    <div class="dash_box_top d-flex justify-content-between">
        <div class="box_shadow radius_medium d-flex flex-column justify-content-between">
            <h3 class="text1 sales_summary">매출 요약</h3>
            <p class="text1 sales_amount">₩47,000,000</p>
            <p class="gray sales_date">(2023.08.21~2023.08.25)</p>
            <div class="d-flex text4">
                <span>지난 주 대비</span>
                <span class="sales_per">3.4</span>%
                <span class="sales_updown">상승</span>
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
                <span class="text1">2,730명</span>
            </div>
            <p class="text4 gray">(2023.08.25)</p>
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
                <div class="top1_class d-flex justify-content-between align-items-center">
                    <img src="/attention/admin/img/dashboard/JS_logo.png" alt="자바스크립트">
                    <p class="text2">JavaScript</p>
                    <span class="gray">2,900명</span>
                </div>
                <div class="top2_class d-flex justify-content-between align-items-center">
                    <img src="/attention/admin/img/dashboard/React_logo.png" alt="리액트">
                    <p class="text2">React</p>
                    <span class="gray">1,700명</span>
                </div>
                <div class="top3_class d-flex justify-content-between align-items-center">
                    <img src="/attention/admin/img/dashboard/Redux_logo.png" alt="리덕스">
                    <p class="text2">Redux</p>
                    <span class="gray">1,040명</span>
                </div>
                
            </div>
        </div>

        <div class="box_shadow radius_medium d-flex flex-column">
            <div class="recent_board">
                <h3 class="text1 recent_board_title">최근 등록 게시물</h3>
                <p class="text4">최근 등록된 게시글을 확인하세요</p>
            </div>
            <div class="recent_board_ul d-flex flex-column">
                <div class="recent_board_list d-flex justify-content-between">
                    <p class="text4 gray">다가오는 추석 풍성한 이벤트</p>
                    <p class="text4 recent_board_type">공지사항</p>
                </div>
                <div class="recent_board_list d-flex justify-content-between">
                    <p class="text4 gray">다가오는 추석 풍성한 이벤트</p>
                    <p class="text4 recent_board_type">공지사항</p>
                </div>
                <div class="recent_board_list d-flex justify-content-between">
                    <p class="text4 gray">다가오는 추석 풍성한 이벤트</p>
                    <p class="text4 recent_board_type">공지사항</p>
                </div>
                <div class="recent_board_list d-flex justify-content-between">
                    <p class="text4 gray">다가오는 추석 풍성한 이벤트</p>
                    <p class="text4 recent_board_type">공지사항</p>
                </div>
            </div>
        </div>
        <div class="box_shadow radius_medium">
            <h3 class="text1 member_num">가입/탈퇴 회원</h3>
            <div class="d-flex member_in">
                <span class="text1">가입</span>
                <span class="text1">316명</span>
            </div>
            <p class="gray member_date">(2023.08.21 ~ 2023.08.25)</p>
            <div class="member_chart_container">
                <canvas id="member_chart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // 매출 요약 선 그래프
    const sales = document.getElementById('sales_chart');
    const sname = ['일', '월', '화', '수', '목', '금', '토'];
    let thisweek = {label: '이번주', data: [29,30,31,36,28,27,30]};
    let lastweek = {label: '지난주', data: [30,36,10,20,25,26,27]};

    new Chart(sales, {
        type: 'line',
        data:{
            labels: sname,
            datasets: [thisweek, lastweek]
        },
        scales: {
            x: {
            ticks: {
                display: false
                }
            },
            y: {
            stacked: true,
            ticks: {
                display: false
                }
            }
        }
    });
    // /매출 요약 선 그래프

    
    // 매출 달력
    flatpickr("#datepicker", {
        defaultDate: new Date()
    });
    $('#datepicker').trigger('click');
    $('#datapicker').mousedown(function(e){
        e.stopPropagation();
    })

    // var datepickerOpen = false;
            
    // $("#datepicker").datepicker({
    //     beforeShow: function(input, inst) {
    //         if (!datepickerOpen) {
    //             datepickerOpen = true;
    //             return false; // Datepicker 열지 않음
    //         }
    //     }
    // });

    // Datepicker를 클릭하면 열리도록 설정
    // $("#datepicker").on("click", function() {
    //     datepickerOpen = true;
    //     $("#datepicker").datepicker("show");
    // });
    // /매출 달력

    // 접속자 수 누적 그래프
    const aname = ['']
    let access_now = {
        label: '현재 접속자 수',
        backgroundColor: 'rgb(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 0, 0)',
        data: [10],
    };
    let access_today = {
        label: '오늘 접속자 수',
        backgroundColor: 'rgb(255, 99, 132, 0.5)',
        borderColor: 'rgb(0, 0, 255)',
      data: [50],
    };
    let access_total = {
        label: '총 접속자 수',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(0, 0, 255)',
      data: [100],
    };
    const data = {
        labels: aname,
        datasets: [access_now, access_today, access_total]
    };

    const config = {
    type: 'bar',
    data: data,
    options: {
      indexAxis: 'y',
      scales: {
        x: {
          stacked: true,
          ticks: {
            display: false
          }
        },
        y: {
          stacked: true,
          ticks: {
            display: false
          }
        }
      }
    }
    };

    const myChart = new Chart(
    document.getElementById('access_chart'),
    config
    );
    // /접속자 수 누적 그래프

    // 가입/탈퇴 회원 막대 그래프
    const mlabel = ['일','월','화','수','목','금','토'];
    const mdata = {
        datasets:[{
            label: '가입/탈퇴 회원 수',
            data: [65,59,80,81,56,55,40],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            hoverBackgroundColor:[
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 159, 64, 0.5)',
            'rgba(255, 205, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(201, 203, 207, 0.5)'
            ],
            hoverBorderColor:[
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 159, 64, 0.5)',
            'rgba(255, 205, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(201, 203, 207, 0.5)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ]
        }]
    }
    const mconfig = {
        type: 'bar',
        data: mdata
    };

    let mchart = document.getElementById('member_chart');
    const stackedBar = new Chart(mchart, mconfig);
    // /가입/탈퇴 회원 막대 그래프

</script>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>