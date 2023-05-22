<?php 

$subject = $_POST['subject'];
$email = $_POST['reply_to'];
$message = $_POST['text'];
$token = '5916558398:AAFiIMQrqf3dyG1aDXG7Q5b5-26VCgXCwlY'; 
$chat_id = '5527705092'; 

$text = "Новое сообщение💬\n\nИмя: $subject\nПочта: $email\nСообщение: $message"; 

$text = urlencode($text);

$url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat_id.'&amp;parse_mode=html&amp;text='.$text; 

$fp=file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$text}");
 
header('Location: index.php'); 
?>