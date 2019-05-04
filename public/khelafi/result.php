<?php

	if (!isset($_POST['submit1']) || !isset($_POST['captchaa']) || empty($_POST['captchaa']) ){
		header("location:index.php");
		die();     
	}
    function get_result(){
		$random_num_1 = $_SERVER['REMOTE_ADDR'];
		$random_num_2 = $_SERVER['SERVER_ADDR'];
		$random= $random_num_1.$random_num_2;
		$random_final =str_replace(".","",$random);
		if(file_exists('barcode/'.$random_final.'.txt')){
		$id_code = file_get_contents('barcode/'.$random_final.'.txt');
		}else{
			$id_code ='';
		}
		$type = 'offense';
		$action = 'send_captcha';
		$id = $id_code;
		$barcode = $_POST['captchaa'];
		
		$data = array();
		$data['type'] = $type;
		$data['action'] = $action;
		$data['id'] = $id;	
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
        curl_setopt ($ch, CURLOPT_TIMEOUT, 60); 
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie); 
        curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt ($ch, CURLOPT_REFERER, $url); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $post_str); 
        curl_setopt ($ch, CURLOPT_POST, 1); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec ($ch); 
        $data = curl_exec($ch);
		if(file_exists('barcode/'.$random_final.'.txt')){
		 @unlink('barcode/'.$random_final.'.txt');
		}
		return $result;
    }
	
	function farsidigit($text){
		$text = str_replace('0' , '٠' , $text);
		$text = str_replace('1' , '١' , $text);
		$text = str_replace('2' , '٢' , $text);
		$text = str_replace('3' , '٣' , $text);
		$text = str_replace('4' , '۴' , $text);
		$text = str_replace('5' , '۵' , $text);
		$text = str_replace('6' , '۶' , $text);
		$text = str_replace('7' , '٧' , $text);
		$text = str_replace('8' , '٨' , $text);
		$text = str_replace('9' , '٩' , $text);

		return $text;
	} 
	
	$json_string= get_result();
	$data_info = json_decode($json_string, true);
	if(!empty($data_info['rahvarLastUpdate'])){
		$rahvar_update_string = farsidigit($data_info['rahvarLastUpdate']);
		$tedad_jarime_string = farsidigit(count($data_info['fines']));
		
		$plaq_number = explode(' ــ ', $data_info['fines']['0']['plaque']);
		$plaqq2= farsidigit($plaq_number[1]);
		$plaq_city=explode('ايران', $plaq_number[0]);
		$plaqq1= farsidigit($plaq_city[1]);
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
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background:#312A47;">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<span class="login100-form-title p-b-49">
					استعلام خلافی خودرو
				</span>
				
				<div class="container hesam">
					
					<?php if(!empty($tedad_jarime_string) and !empty($rahvar_update_string)){?>	
					<div class="alert alert-info alert-dismissible" role="alert">
						تعداد <strong><?php echo $tedad_jarime_string; ?></strong> جریمه برای شما یافت شد.
					</div>
					<div class="alert alert-info alert-dismissible" role="alert">  
						تاریخ آپدیت سایت راهور: <?php echo $rahvar_update_string;?>	
					</div>
					<div class="plaqq" > 
						<div class="plaqq-1"><?php echo $plaqq1;?></div>					
						<div class="plaqq-2"><?php echo $plaqq2;?></div>											
					</div>
						<?php
					}

								foreach($data_info as $a=>$b){
									
									if (is_array($b)){

										foreach($b as $c=>$d){
											
											if (is_array($d)){
												
												if(!empty($d["amount"])){	
													$amount_total;
												}
												@$amount_total+=$d["amount"];

												echo "<table class='hesamTable' width='100%' border='1' style='border-collapse: collapse;border-color: silver;'>"; 
												echo '<thead><tr>';											
												echo '<td width="150" align=center>'.$d["type"].' در '.$d["city"].'</td>';
												echo '<td width="150" align=center>'.$d["amount"].' ریال</td>';
												echo '</thead></tr>';
														
												foreach($d as $e=>$f){
																									
														if (is_array($d[$e])){
															echo '<br>';
														}else{
															
															echo '<tr>';
															echo '<th width="150" align=center>';															
																if($e=='desc'){
																	echo $x='شرح تخلف';
																}elseif($e=='type'){
																	echo $x='نوع';	
																}elseif($e=='code'){
																	echo $x='کد تخلف';
																}elseif($e=='amount'){
																	echo $x='مبلغ(ریال)';
																}elseif($e=='position'){
																	echo $x='محل تخلف	';
																}elseif($e=='city'){
																	echo $x='شهر';
																}elseif($e=='date'){
																	echo $x='تاریخ و ساعت	';
																}elseif($e=='serial'){
																	echo $x='سریال';
																}elseif($e=='barcode'){
																	echo $x='بارکد';
																}elseif($e=='plaque'){
																	echo $x='پلاک';
																}elseif($e=='paymentid'){
																	echo $x='شناسه پرداخت';
																}elseif($e=='billid'){
																	echo $x='ششناسه قبض';
																}
															echo '</th>';
															echo '<td width="150" align=center>' . $d[$e] . '</td>';
															echo '</tr>';	
														} 
														
													if (is_array($f)){
														echo '<br>';
													}
												}
												
												echo "</table>";
												
											}else{
												echo $d.'<br>';
											}
										}
										
										//اگر بعد اول ارایه نباشد
									}else{
										if($b =='error'){
											echo '<br>';
										}elseif($b =='success'){
											$fines_count= $data_info['fines'];
											$tedad_jarime=count($fines_count);
											
										}else{
												if($a == 'rahvarLastUpdate'){
													$ubdate_rahvar= $b;
												}elseif($a == 'message'){
													
												echo '<div class="alert alert-warning alert-dismissible text-center" role="alert"><strong>'.$b.'</strong></div>';
												}
										}
										
									}
								}
				if(!empty($amount_total)){
						?>

					<div class="alert alert-warning alert-dismissible amount_block" role="alert">
							کل خلافی شما مبلغ <strong><?php echo farsidigit($amount_total); ?></strong> ریال می باشد.
					</div>
				<?php
			
				}
				
					$amount_total_toman=intval($amount_total)/10;
					$amount_total_price=$amount_total_toman+10000;
					
					$ipaddresss = $_SERVER['REMOTE_ADDR'];
					if(file_exists('barcode/'.$ipaddresss.'.txt')){
						 $barcode_id = file_get_contents('barcode/'.$ipaddresss.'.txt');
						@unlink('barcode/'.$ipaddresss.'.txt');
					}else{
						$barcode_id ='notfound';
					}
				
				if(!empty($amount_total)){
				?>
					<!--
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<a href="http://ir-learn.com/arz/pay/start.php?<?php echo 'price='.$amount_total_price.'&tag='.$barcode_id ?>" id="button-submit1" class="login100-form-btn pardakhtbtn button-submit1">
								پرداخت
							</a>
						</div>
					</div>
					-->
				<?php
				}
				?>
					
					<div class="container-login100-form-btn">
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
	</div>
	<div class="footer ">تمامی حقوق مادی و معنوی این برنامه برای کافه ارز محفوظ می باشد.</div>
</body>
</html>