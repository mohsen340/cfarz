<?php

	if (!isset($_POST['submit']) || !isset($_POST['hashtraghami']) ) {
	header("location:index.php");
	die();     
	}

    function open($url)
    {
		$type = 'offense';
		$action = 'send_barcode';
		$barcode = $_POST['hashtraghami'];
		//$barcode = 92654924;
		$ipaddresss = $_SERVER['REMOTE_ADDR'];
		@$barcodefile = fopen("barcode/$ipaddresss.txt", "w") or die("Unable to open file!");
		fwrite($barcodefile, $barcode);
		fclose($barcodefile);
		
		$data = array();
		$data['type'] = $type;
		$data['action'] = $action;
		$data['barcode'] = $barcode;

		$post_str = '';
		
		foreach($data as $key=>$val) {
			$post_str .= $key.'='.urlencode($val).'&';
		}

		$post_str = substr($post_str, 0, -1);
		
		$url = 'https://etore.me/api/inquiry.php';
        $cookie=dirname(__FILE__) . '/cookie.txt';

        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL, $url); 
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
        curl_setopt ($ch, CURLOPT_TIMEOUT, 120); 
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_HEADER, 1);
        curl_setopt ($ch, CURLOPT_COOKIE, 1);
        curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie); 
        curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt ($ch, CURLOPT_REFERER, $url); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $post_str); 
        curl_setopt ($ch, CURLOPT_POST, 1); 
        $result = curl_exec ($ch); 
        $data = curl_exec($ch);
		return $result;
    }
	
    function between($string, $start, $end)
    {
        $out = explode($start, $string);

        if(isset($out[1]))
        {
            $string = explode($end, $out[1]);
            return $string[0];
        }

        return '';
    }
	
    function get_captcha()
    {
        $url    = 'https://etore.me/api/inquiry.php';
		$open   = open($url);
		global $hesam;
		$hesam[0] = between($open,'"success","id":"','"}');
		
		$random_num_1 = $_SERVER['REMOTE_ADDR'];
		$random_num_2 = $_SERVER['SERVER_ADDR'];
		$random= $random_num_1.$random_num_2;
		$random_final= str_replace(".","",$random);
		@$myfile = fopen("barcode/$random_final.txt", "w") or die("Unable to open file!");
		$txt = $hesam[0];
		fwrite($myfile, $txt);
		fclose($myfile);
		$hesam[1]= 'https://etore.me/api/captcha.php?'.rand(11111111,99999999).'&type=offense&id='.$hesam[0];
		return $hesam;
    } 
?>

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
		var x=document.forms["advformid"]["captchaa"].value.length;
	if (x==null || x==""){
	alert("لطفا کد امنیتی را وارد کنید.");
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
					<h2 class="text-center">وارد کردن کد امنیتی</h2>
					<p class="text-center">
						در این قسمت شما باید کد امنیتی تصویر زیر را وارد کنید. در صورتی که کد امنیتی نمایش داده نشده است. دوباره به صفحه اول برگردید
					</p>
				</div>
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form" action="result.php" method="post" onsubmit="return validateForm()" id="advformid"  name="advformid" autocomplete="off" enctype="application/x-www-form-urlencoded" dir="rtl">
					<span class="login100-form-title p-b-49">
						استعلام خلافی خودرو
					</span>
					<div class="cptcha-img" >
						<?php if(isset($_POST['submit'])) {
							get_captcha();
							echo '<img src="'.$hesam[1].'">';
							}
						?>
					</div>	
					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">کد امنیتی</span>
						<input class="input100" type="text" name="captchaa" id="captchaa" placeholder="کد موجود در تصویر بالا راوارد کنید.">
						
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button  id="button-submit1" class="login100-form-btn button-submit1" name="submit1" type="submit">
								استعلام
							</button>
						</div>
					</div>
				</form>
				
			<div class="container-login100-form-btn" style="margin-top:25px;">
				<div class="wrap-login100-form-btn">
					<div class="login100-form-bgbtn"></div>
					<a href="index.php" id="button-submit1" class="login100-form-btn button-submit1">
						بازگشت به صفحه اصلی
					</a>
				</div>
			</div>

			</div>

		</div>
	</div>
	<div class="footer ">تمامی حقوق مادی و معنوی این برنامه برای کافه ارز محفوظ می باشد.</div>
	
	<div id="loading" style="display:none">
		<img id="loading-image" src="images/ajax-loader.gif" alt="Loading..." />
	</div>

</body>
</html>