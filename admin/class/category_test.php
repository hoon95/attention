<?php
  $title = '카테고리 관리 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';

  $query = "SELECT * FROM category WHERE step=1";
  $result = $mysqli -> query($query);
  while($rs = $result -> fetch_object()){
    $cate1[] = $rs;
  }
?>

<link rel="stylesheet" href="/attention/admin/css/category.css">
<style> #pcode3_1-button {font-weight: 400; color: var(--gray);} </style>

<!-- <div class="container"> -->
  <!-- <div class="common_pd"> -->
    <!-- <h2 class="tt_01 text-center">페이지 제목</h2> -->
      <!-- <div class="row"> -->
        <!-- <div class="col-md-4 cate_section">  
          <select class="cate_large" name="" id="pcode2_1">
            <option selected disabled>대분류</option> -->
            <!-- <option value="1">대분류1</option> -->
            <!-- <?php foreach($cate1 as $c){ ?>
              <option value="<?php echo $c -> cid ?>"><?php echo $c -> name ?></option>
            <?php } ?>
          </select>
        </div> -->
        <div class="col-md-4 cate_section">
          <select class="" name="" id="pcode3">
            <option selected disabled>중분류</option>
            <!-- <option value="1">중분류1</option> -->
          </select>
        </div>
        <div class="col-md-4 cate_section">
          <select class="" name="" id="pcode3_1">
            <option selected disabled>소분류</option>
            <!-- <option value="1">소분류1</option> -->
          </select>
        </div>
      </div>
</div>  
  </div>
<div>
     

<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>

<script>
  $(function(){
    $("select").selectmenu();

    $("select#pcode2_1").on("selectmenuchange", function(event, ui){
      $('#pcode2_1-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });
    $("select#pcode3").on("selectmenuchange", function(event, ui){
      $('#pcode3-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });
    $("select#pcode3_1").on("selectmenuchange", function(event, ui){
      $('#pcode3_1-button span.ui-selectmenu-text').css({color: '#505050', fontWeight: '700'});
    });
  
    $("#pcode2_1").on("selectmenuselect", function(event, ui) {
      let data = { 
        cate : $("#pcode2_1").val(),  //대분류의 값이 변경되면  
        step : 2,
        category : '중분류'  
      }

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "../category/printOption.php",
        dataType: 'html',
        success: function(result) {
        $("#pcode3").html(result);  //중분류 div에 html 추가
        $("#pcode3").selectmenu('refresh');
        }
      });
     });  

    $("#pcode3").on("selectmenuselect", function(event, ui) {
      let data = { 
        cate : $("#pcode3").val(),  //대분류의 값이 변경되면  
        step : 3,
        category : '소분류'  
      }

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "../category/printOption.php",
        dataType: 'html',
        success: function(result) {
        $("#pcode3_1").html(result);  //중분류 div에 html 추가
        $("#pcode3_1").selectmenu('refresh');
        }
      });
     });  
  })
</script>