<?php
  $title = '장바구니 - Code Rabbit';
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

  $where = '';
  if(isset($_SESSION['UID'])){
      $where = "B.userid = '{$_SESSION['UID']}'";
  }

  $sql = "SELECT A.pid, A.cate, A.thumbnail, A.name, A.price_val, A.level, A.sale_end_date, A.date_val, B.cartid FROM class A JOIN cart B ON A.pid = B.pid WHERE $where";
  $result = $mysqli -> query($sql);
  if($result){
    while($rs = $result->fetch_object()){
        $rsc[]=$rs;
    }
  }

  $sql2 = "SELECT A.coupon_name, B.ucid, A.coupon_price FROM coupons A JOIN user_coupons B ON A.cid = B.couponid  WHERE B.userid = '{$_SESSION['UID']}' AND B.use_max_date > now() AND A.status = 1 AND B.status = 1";
  $result2 = $mysqli -> query($sql2);
  if($result2){
    while($rs2 = $result2 -> fetch_object()){
        $rsc2[]=$rs2;
    }
  }

  if(isset($rsc)){
    foreach($rsc as $item){
      $sql3 = "INSERT INTO sales (pid, name, userid, price, cate, thumbnail, sale_end_date, date_val) VALUES ({$item->pid}, '{$item->name}', '{$_SESSION['UID']}', {$item->price_val}, '{$item->cate}', '{$item->thumbnail}', {$item->sale_end_date}, {$item->date_val})";
    }
  }
?>

  <link rel="stylesheet" href="/attention/user/css/cart.css">

  <div class="cart_container sub_mg_t sub_mg_b d-flex justify-content-between">
    <div class="cart_list">
      <h2 class="tt_01 text-center">장바구니</h2>
      <table class="table">
        <tbody class="cart_area">
          <?php
          if(isset($rsc)){
              foreach($rsc as $item){
          ?>
          <tr class="d-flex justify-content-between align-items-center" data-id="<?= $item->cartid ?>">
            <td class="cart_product_img"><a href="#"><img src="<?= $item->thumbnail ?>" alt="Product"></a>
            </td>
            <td class="cart_product_name">
              <span class="tt_03"><?= $item->name ?></span>
              <div class="cart_sub_title d-flex justify-content-start">
                <span class="cart_level">
                  <?php if($item->level == 1){
                    echo '초급';
                  }else if($item->level == 2){
                    echo '중급';
                  }else{
                    echo '고급';
                  }?>
                </span>
                <span class="cart_line">|</span>
                <span class="cart_limit">
                  <?php if($item->sale_end_date == 0){
                    echo '무제한';
                  }else{
                    echo $item->date_val.'개월';
                  } ?>
                </span>
              </div>
            </td>
            <td class="cart_product_price text1 number"><span><?= $item->price_val ?></span></td>
            <td class="cart_product_cancel text-end"><button class="cart_item_del"><i class="bi bi-x-square icon_red"></i></button></td>
          </tr>
          <?php }}else{ ?>
            <tr class="d-flex justify-content-center align-items-center">
              <td>장바구니가 비었습니다</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="cart_button d-flex justify-content-end">
        <button class="cart_continue btn btn-primary">쇼핑 계속하기</button>
        <button class="cart_reset btn btn-danger">초기화</button>
      </div>
    </div>
    <div class="coupon">
      <div class="coupon_list">
        <h3 class="tt_03">쿠폰 사용하기</h3>
        <form action="#" class="radius_medium">
          <select name="coupon" id="coupon" class="form-select">
            <option value="" disabled selected>쿠폰을 선택하세요</option>
            <?php
                if(isset($rsc2)){
                    foreach($rsc2 as $item){
            ?>
            <option value="<?= $item->ucid ?>" data-price="<?= $item->coupon_price ?>"><?= $item->coupon_name ?></option>
            <?php
                }}
            ?>
          </select>
        </form>
      </div>
      <div class="cart_total radius_medium">
        <ul>
          <li class="cart_choice text2 d-flex justify-content-between">
            <span>선택 강좌</span>
            <span class="subtotal number"></span>
          </li>
          <li class="cart_sale text2 d-flex justify-content-between">
            <span>쿠폰 할인가</span>
            <div>
              <span>-</span>
              <span class="discount number">0</span>
            </div>
          </li>
          <li class="cart_price tt_03 d-flex justify-content-between">
            <span><strong>합계</strong></span>
            <span><strong class="grandtotal number">0</strong></span>
          </li>
        </ul>
        <div class="cart_checkout text-center">
          <a href="checkout.html" class="btn btn-primary radius_large checkout-btn text2">구매하기</a>
        </div>
      </div>
    </div>
  </div>

  <script src="/attention/user/js/jquery.number.min.js"></script>
  <script>
    $(function(){
      $('#recent').remove();
    })
    function cartCalc(){
        let subtotal = 0;
        $('.cart_area tr').each(function(){
            let unitprice = Number($(this).find('.cart_product_price span').text());
            subtotal+=unitprice;

            // 삭제 버튼 클릭 시 할 일
            $(this).find('.cart_item_del').click(function(){
                let cartid = $(this).closest('tr').attr('data-id');
                
                if(confirm('정말 삭제하시겠습니까?')){
                  let data = {
                      cartid: cartid
                  }
                  $.ajax({
                      async: false,
                      type: 'POST',
                      url: 'cart_del.php',
                      data: data,
                      dataType: 'json',
                      error: function(error){
                          console.log(error);
                      },
                      success: function(data){
                          if(data.result == 'ok'){
                              alert('장바구니에 삭제되었습니다.');
                              location.reload();
                          }else{
                              alert('삭제 실패');
                          }
                      }
                  });
                }else{
                    alert('삭제를 취소했습니다');
                }
            })
        })
        // 초기화 버튼 클릭 시 할 일
        $('.cart_reset').click(function(e){
          let userid = '<?= $_SESSION['UID'] ?>';
          if(confirm('정말 장바구니를 비우시겠습니까?')){
                  let data = {
                      userid: userid
                  }
                  $.ajax({
                      async: false,
                      type: 'POST',
                      url: 'cart_reset.php',
                      data: data,
                      dataType: 'json',
                      error: function(error){
                          console.log(error);
                      },
                      success: function(data){
                          if(data.result == 'ok'){
                              alert('장바구니가 초기화 되었습니다.');
                              location.reload();
                          }else{
                              alert('초기화 실패');
                          }
                      }
                  });
                }
        })
        $('.subtotal').text(subtotal);
    }
    cartCalc();

    // 쇼핑 계속하기
    $('.cart_continue').click(function(){
      let result = confirm('강의 리스트로 이동하시겠습니까?');
      if(result){
        location.href = "/attention/user/class/class_whole_list.php";
      }
    });
    // 쿠폰 적용하기
    let ucid;
    $('#coupon').change(function(){ 
      let coupon_price =  $('#coupon option:selected').attr('data-price');
      ucid = $('#coupon option:selected').val();

      $('.discount').text(coupon_price);
      $('.grandtotal').text(Number( $('.subtotal').text().replace(',','')) - Number(coupon_price.replace(',','')));
      $('.number').number(true);
    })

    // 구매하기
    $('.checkout-btn').click(function(e){
        e.preventDefault();
        if(confirm('결제 하시겠습니까?')){
            let userid = '<?= $_SESSION['UID']; ?>'
            let data = {
                ucid: ucid,
                userid: userid
            }
            $.ajax({
                    async: false,
                    type: 'POST',
                    url: 'payment.php',
                    data: data,
                    dataType: 'json',
                    error: function(error){
                        console.log(error);
                    },
                    success: function(data){
                        if(data.result == 'ok'){
                            alert('결제가 완료되었습니다.');
                            location.href = "/attention/user/my_class/my_class.php"
                        }else{
                            alert('결제에 실패하였습니다.');
                            location.reload();
                        }
                    }
                });
        }else{
            alert('취소되었습니다.')
        }
    })
    $('.number').number(true);
  </script>



<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
?>