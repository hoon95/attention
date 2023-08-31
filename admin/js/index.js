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
    defaultDate: new Date(),
    inline: true
});

// 날짜 값 받아오기
document.getElementById("datepicker").addEventListener("change", function(e){
  sales_change(e);
});

function sales_change(e){
  let selectedDate = e.target.value;
  let sales_start_date = document.querySelector('.sales_start_date');
  let sales_end_date = document.querySelector('.sales_end_date');
  
  let selected_date = new Date(selectedDate);
  let seven_ago_date = new Date(selected_date);
  seven_ago_date.setDate(selected_date.getDate() - 6);
  sales_start_date.innerHTML = seven_ago_date.toISOString().split('T')[0];
  sales_end_date.innerHTML = selectedDate;

  let data = {
    selectedDate: selectedDate,
    // sales_start_date: sales_start_date,
    // sales_end_date: sales_end_date,
    // selected_date: selected_date,
    // seven_ago_date: seven_ago_date
  }
  console.log(data);

  $.ajax({
    async: false,
    type: 'POST',
    data: data,
    url: 'sales_change.php',
    dataType: 'json',
    error: function(error){
      console.log('Error:', error);
    },
    success: function(return_data){
      console.log(return_data.result);
      $('.sales_amount').text(return_data.result);
      $('.sales_amount').number(true);
    }
  })
}



// $('#datepicker').trigger('click');
// $('#datapicker').mousedown(function(e){
//     e.stopPropagation();
// })

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

$('.number').number(true);