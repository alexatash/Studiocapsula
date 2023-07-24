<?php


$name = $_POST['name'];
$question = $_POST['question'];
$phone_number = $_POST['phone_number'];

$token = "6260556600:AAFILv0ZJElHNxW00rTdFuLg31A3jW-UBH0";
$chat_id = "-882038829";
$arr = array(

  'Имя пользователя: ' => $name,
  'Номер телефона: ' => $phone_number,
  'Вопрос: ' => $question,
  
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: thank-you_question.html');
} else {
  echo "Error";
}
?>