$(document).ready(function() {
    var gift;
    var present = [1, 2, 3, 4, 5, 6];
    var clicked = 0;

    iniGame = function(num) {
        gift = num;
        TweenLite.killTweensOf($(".board_on"));
        TweenLite.to($(".board_on"), 0, { css: { rotation: rotationPos[gift] } });
        TweenLite.from($(".board_on"), 5, { css: { rotation: -3000 }, onComplete: endGame, ease: Sine.easeOut });
        console.log("gift 숫자 : " + (gift + 1) + "rotationPos" + rotationPos);
    }

    var rotationPos = new Array(1, 2, 3, 4, 5, 6);

    TweenLite.to($(".board_on"), 360, { css: { rotation: -4000 }, ease: Linear.easeNone });

    function endGame() {
        var copImg = "http://img.babathe.com/upload/specialDisplay/htmlImage/2019/test/coupon" + (gift + 1) + ".png";
        console.log("이미지 : " + copImg);

        // 서버로 쿠폰을 지급하는 요청을 보냅니다.
        giveCoupon(function(response) {
            if (response === "success") {
                $("#popup_gift .lottery_present").text("축하드립니다." + present[gift] + " 룰렛숫장" + (gift + 1) + " 당첨 되셨습니다.");
                $('<img  src="' + copImg + '" />').prependTo("#popup_gift .lottery_present");
                setTimeout(function() {
                    openPopup("popup_gift");
                }, 1000);
            } else {
                // 쿠폰 지급 실패 또는 오류 처리
                alert("쿠폰 지급 중 오류가 발생했습니다.");
            }
        });
    }

    $(".popup .btn").on("click", function() {
        location.reload();
    });

    function openPopup(id) {
        closePopup();
        $('.popup').slideUp(0);
        var popupid = id
        $('body').append('<div id="fade"></div>');
        $('#fade').css({
            'filter': 'alpha(opacity=60)'
        }).fadeIn(300);
        var popuptopmargin = ($('#' + popupid).height()) / 2;
        var popupleftmargin = ($('#' + popupid).width()) / 2;
        $('#' + popupid).css({
            'margin-left': -popupleftmargin
        });
        $('#' + popupid).slideDown(500);
    }

    function closePopup() {
        $('#fade').fadeOut(300, function() {
            // $(".player").html('');
        });
        $('.popup').slideUp(400);
        return false;
    }

    $(".close").click(closePopup);

    // 클릭 이벤트
    for (i = 1; i < 7; i++) {
        var pictures = "http://img.babathe.com/upload/specialDisplay/htmlImage/2019/test/coupon" + i + ".png";
        $(".board_on").append('<img  src="' + pictures + '" />');
    }

    $(".join").on("mousedown", function(e) {
        if (clicked <= 0) {
            iniGame(Math.floor(Math.random() * 6));
        } else if (clicked >= 1) {
            e.preventDefault();
            alert("이벤트 참여 하셨씁니다.");
        }
        clicked++;
    });

    // 서버로 쿠폰을 지급하는 요청을 보내는 함수
    function giveCoupon(callback) {
        // 서버로 요청을 보내서 쿠폰을 지급하고 응답을 받습니다.
        // jQuery를 사용한 예시입니다. jQuery를 사용하지 않을 경우 XMLHttpRequest 또는 fetch API를 사용할 수 있습니다.

        $.post("give_coupon.php", function(response) {
            // 서버에서 받은 응답을 처리합니다.
            if (typeof callback === "function") {
                callback(response);
            }
        });
    }
});