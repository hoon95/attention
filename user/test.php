<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

	// $where = '';
	// if(isset($_SESSION['UID'])){
	// 		$where = "B.userid = '{$_SESSION['UID']}'";
	// }
  $couponid = $_SESSION['UID'];

  $sql2 = "SELECT cp.*, usercp.* FROM user_coupons usercp 
  JOIN coupons cp ON cp.cid = usercp.couponid  
  WHERE usercp.userid='{$couponid}'and usercp.use_max_date > Now()
  ORDER BY usercp.userid DESC";
  $result2 = $mysqli -> query($sql2);
  while($rs2 = $result2 -> fetch_object()){
      $rsc2[]=$rs2;
  }
  $couponData = json_encode($rsc2);

  
  
?>

        <link rel="stylesheet" href="css/test.css" type="text/css">
        <!-- <link rel="stylesheet" href="main.css" type="text/css" /> -->

        <div align="center">
            <h1>Winwheel.js example wheel - wheel of fortune</h1>
            <p>Here is an example of a code-drawn Wheel of Fortune looking wheel which spins to a stop with the prize won alerted to the user.</p>
            <br />
            <p>
                With some additional coding it could be made so that the prize won is added to a total after each spin rather than
                just alerting the prize to make a proper wheel of fortune like game.
            </p>
            <br />
            <p>Choose a power setting then press the Spin button. You will be alerted to the prize won when the spinning stops.</p>
            <br />
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
                        <div class="power_controls">
                            <br />
                            <br />
                            <table class="power" cellpadding="10" cellspacing="0">
                                <tr>
                                    <th align="center">Power</th>
                                </tr>
                                <tr>
                                    <td width="78" align="center" id="pw3" onClick="powerSelected(3);">High</td>
                                </tr>
                                <tr>
                                    <td align="center" id="pw2" onClick="powerSelected(2);">Med</td>
                                </tr>
                                <tr>
                                    <td align="center" id="pw1" onClick="powerSelected(1);">Low</td>
                                </tr>
                            </table>
                            <br />
                            <img id="spin_button" src="img/coup/coup_event/spin_off.png" alt="Spin" onClick="startSpin();" />
                            <br /><br />
                            &nbsp;&nbsp;<a href="#" onClick="resetWheel(); return false;">Play Again</a><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(reset)
                        </div>
                    </td>
                    <td width="438" height="582" class="the_wheel" align="center" valign="center">
                        <canvas id="canvas" width="434" height="434">
                            <p style="color: white" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                        </canvas>
                    </td>
                </tr>
            </table>
         </div>   

        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script src="js/Winwheel.js" type="text/javascript"></script>
        <script src="js/test.js" type="text/javascript"></script>
<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
   
?>