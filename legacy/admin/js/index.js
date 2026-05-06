// 매출 달력
flatpickr("#datepicker", {
    defaultDate: new Date(),
    inline: true
});

// 날짜 값 받아오기
document.getElementById("datepicker").addEventListener("change", function(e){
  sales_change(e);
});
$('.flatpickr-day.today').trigger('click');

var salesChart;

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
  }

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
      let result = return_data.result;
      // console.log(result);
      let sales_array = [];
      let sales_date_array = [];
      result.forEach(function(sales){
        // console.log(sales['average_sales']);
        sales_array.push(sales['average_sales']);
        sales_date_array.push(sales['date']);
      })
      console.log(sales_date_array.reverse(), sales_array.reverse());
      
      $('.sales_amount').text(sales_array.reverse()[0]);
      $('.sales_amount').number(true);
      let sales_compare = ((sales_array[0] - sales_array[7])/sales_array[7] * 100).toFixed(1);
      let sales_compare_text = Math.abs(sales_compare);
      $('.sales_per').text(sales_compare_text);
      if(sales_compare > 0){
        $('.sales_updown').text('상승')        
      }else if(sales_compare = 0){
        $('.sales_updown').text('유지')
      }else{
        $('.sales_updown').text('하락')
      }

      // 매출 요약 선 그래프
      const sales = document.getElementById('sales_chart');
      const sname = sales_date_array.slice(7,14);
      let thisweek = {label: '이번주', data: sales_array.reverse().slice(7,14)};
      let lastweek = {label: '지난주', data: sales_array.slice(0,7)};

      if (salesChart) {
        salesChart.destroy();
      }

      salesChart = new Chart(sales, {
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
    }
  })
}

// 접속자 수 누적 그래프
let today = new Date().toISOString().split('T')[0];
$('.access_week').text(today);

const aname = ['']
let access_now = {
    label: '현재 접속자 수',
    backgroundColor: 'rgb(42, 193, 188, 0.2)',
    borderColor: 'rgb(42, 193, 188)',
    data: [10],
};
let access_today = {
    label: '오늘 접속자 수',
    backgroundColor: 'rgb(42, 193, 188, 0.5)',
    borderColor: 'rgb(42, 193, 188)',
  data: [50],
};
let access_total = {
    label: '총 접속자 수',
    backgroundColor: 'rgb(42, 193, 188)',
    borderColor: 'rgb(42, 193, 188)',
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


$('.number').number(true);
