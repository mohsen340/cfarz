<!DOCTYPE html>
<html lang="fa">
<head>
	<title>استعلام خلافی خودرو</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script>
	function validateForm(){
		var x=document.forms["advformid"]["hashtraghami"].value.length;
		if (x!=8){
		alert("بارکد باید 8 رقم باشد");
		return false;
		}else{
			$("#loading").show();
		}
	}
</script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">

		<div class="container-login100" style="background:#312A47;">
			<div class="about-khalafi">
				<h2 class="text-center">نحوه دریافت خلافی خودرو: </h2>
				<p class="text-center">
					شماره 8 رقمی درج شده در پشت کارت خودرو را مطابق تصویر زیر وارد نمائید :
				<div class="img-box">
					<img  class="img-responsive img-right " src="images/kart_final.jpg">
					<img  class="img-responsive img-left " src="images/kart_new.png">
				</div>
				</p>
			</div>
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form  class="login100-form " action="captcha.php" method="post" id="advformid"   onsubmit="return validateForm()" name="advformid" autocomplete="on" enctype="application/x-www-form-urlencoded" dir="rtl">
					<span class="login100-form-title p-b-49">
						فرم استعلام خلافی خودرو
					</span>

					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">شماره هشت رقمی</span>
						<input class="input100" type="text" name="hashtraghami" id="hashtraghami" placeholder="کد هشت رقمی خودرو را در اینجا وارد کنید" onkeypress='return onlyNumbers(event);' onblur="CheckEmpty();">
						
					</div>
		
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="button-submit" class="login100-form-btn" name="submit" type="submit"  >
								ارسال
							</button>
						</div>
					</div>	

				</form>
			</div>
		</div>
	</div>	
	
	<div id="loading">
		<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." />
	</div>
	
	<script language="javascript" type="text/javascript">
		function onlyNumbers(evt){var charCode = (evt.which) ? evt.which : event.keyCode;if (charCode > 31 && (charCode < 48 || charCode > 57))return false;return true;}
	</script>
	
	<script>
	    document.onreadystatechange = function () {
          var state = document.readyState
           if (state == 'complete') {
              setTimeout(function(){
                 document.getElementById('loading').style.visibility="hidden";
              },100);
          }
        }
	</script>

</body>
</html>