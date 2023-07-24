<?php

//в переменные помещаются при помощи метода post все данные, которые были введены в форму
$fason = $_POST['fason'];
$og = $_POST['og'];
$ot = $_POST['ot'];
$ob = $_POST['ob'];
$height = $_POST['height'];
$color = $_POST['color'];
$addition = $_POST['addition'];
$line = $_POST['line'];
$patch_on_clothes = $_POST['patch_on_clothes'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$delivery = $_POST['delivery'];
$place = $_POST['place'];
$street = $_POST['street'];
$house = $_POST['house'];
$room = $_POST['room'];

$token = "6025874762:AAEAQ51ABlZ1juEnHAc6cGsOE6-6XMIjDD4";
$chat_id = "-942719004";

//создаем массив, в который передаем значения переменных, которые указали выше
$arr = array(
  'Фасон: ' => $fason,
  'Обхват груди: ' => $og,
  'Обхват талии: ' => $ot,
  'Обхват бедер: ' => $ob,
  'Рост: ' => $height,
  'Цвет: ' => $color,
  'Пожелания: ' => $addition,
  'Добавить шнур: ' => $line,
  'Добавить нашивку: ' => $patch_on_clothes,
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Почта: ' => $mail,
  'Способ доставки : ' => $delivery,
  'Населенный пункт: ' => $place,
  'Улица: ' => $street,
  'Дом: ' => $house,
  'Квартира: ' => $room,
);

//с помощью цикла переираем этот массив, помещая в переменну txt последовательно все значения из массива 
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

// отправка смс в телеграм, с помощью функции fopen (file open) открывается файл, который находится по адресу ниже
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: thank-you_order.html'); // если переменная $sendToTelegram == true, то отправляем пользователя на страницу благодарности (header отправляет заголовки в браузер)
} else {
  echo "Error"; //если false, то выводим сообщение Error
}
?>