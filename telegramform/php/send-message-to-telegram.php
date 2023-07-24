<?php

// Токен
  const TOKEN = '6288374879:AAFPsFPDzw2sx7IUQ0uCqm3_WP_tOLkvgQ8';

  // ID чата
  const CHATID = '-882485907';

  // Массив допустимых значений типа файла. Популярные типы файлов можно посмотреть тут: https://docs.w3cub.com/http/basics_of_http/mime_types/complete_list_of_mime_types
  $types = array('image/gif', 'image/png', 'image/jpeg', 'application/pdf');

  // Максимальный размер файла в килобайтах
  // 1048576; // 1 МБ
  $size = 1073741824; // 1 ГБ

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $fileSendStatus = '';
  $textSendStatus = '';
  $msgs = [];
  
  // Проверяем не пусты ли поля с именем и телефоном
  if (!empty($_POST['name']) && !empty($_POST['phone'])) {
    
    // Если не пустые, то валидируем эти поля и сохраняем и добавляем в тело сообщения. Минимально для теста так:
    $txt = "";
    
    // Имя
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $txt .= "Имя пославшего: " . strip_tags(trim(urlencode($_POST['name']))) . "%0A";
    }
    
    // Номер телефона
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $txt .= "Телефон: " . strip_tags(trim(urlencode($_POST['phone']))) . "%0A";
    }
    
     // Почта
    if (isset($_POST['mail']) && !empty($_POST['mail'])) {
        $txt .= "Почта: " . strip_tags(trim(urlencode($_POST['mail']))) . "%0A";
    }
    
     // Доставка
    if (isset($_POST['delivery']) && !empty($_POST['delivery'])) {
        $txt .= "Способ доставки: " . strip_tags(trim(urlencode($_POST['delivery']))) . "%0A";
    }
    
     // Населённый пункт
    if (isset($_POST['place']) && !empty($_POST['place'])) {
        $txt .= "Населённый пункт: " . strip_tags(trim(urlencode($_POST['place']))) . "%0A";
    }
    
     // Улица
    if (isset($_POST['street']) && !empty($_POST['street'])) {
        $txt .= "Улица: " . strip_tags(trim(urlencode($_POST['street']))) . "%0A";
    }
    
     // Дом
    if (isset($_POST['house']) && !empty($_POST['house'])) {
        $txt .= "Дом: " . strip_tags(trim(urlencode($_POST['house']))) . "%0A";
    }
    
       // Квартира
    if (isset($_POST['room']) && !empty($_POST['room'])) {
        $txt .= "Квартира: " . strip_tags(trim(urlencode($_POST['room']))) . "%0A";
    }
    
    
     // Пожелания
    if (isset($_POST['addition']) && !empty($_POST['addition'])) {
        $txt .= "Пожелания: " . strip_tags(trim(urlencode($_POST['addition']))) . "%0A";
    }

 // Обхват груди
    if (isset($_POST['og']) && !empty($_POST['og'])) {
        $txt .= "Обхват груди: " . strip_tags(trim(urlencode($_POST['og']))) . "%0A";
    }
    
    // Обхват талии
    if (isset($_POST['ot']) && !empty($_POST['ot'])) {
        $txt .= "Обхват талии: " . strip_tags(trim(urlencode($_POST['ot']))) . "%0A";
    }
    
      // Обхват бедер
    if (isset($_POST['ob']) && !empty($_POST['ob'])) {
        $txt .= "Обхват бедер: " . strip_tags(trim(urlencode($_POST['ob']))) . "%0A";
    }
    
      // Рост
    if (isset($_POST['height']) && !empty($_POST['height'])) {
        $txt .= "Рост: " . strip_tags(trim(urlencode($_POST['height']))) . "%0A";
    }
    
    
    // Не забываем про тему сообщения
    if (isset($_POST['theme']) && !empty($_POST['theme'])) {
        $txt .= "Тема: " . strip_tags(urlencode($_POST['theme']));
    }

    $textSendStatus = @file_get_contents('https://api.telegram.org/bot'. TOKEN .'/sendMessage?chat_id=' . CHATID . '&parse_mode=html&text=' . $txt); 

    if( isset(json_decode($textSendStatus)->{'ok'}) && json_decode($textSendStatus)->{'ok'} ) {
      if (!empty($_FILES['files']['tmp_name'])) {
    
          $urlFile =  "https://api.telegram.org/bot" . TOKEN . "/sendMediaGroup";
          
          // Путь загрузки файлов
          $path = $_SERVER['DOCUMENT_ROOT'] . '/telegramform/tmp/';
          
          // Загрузка файла и вывод сообщения
          $mediaData = [];
          $postContent = [
            'chat_id' => CHATID,
          ];
      
          for ($ct = 0; $ct < count($_FILES['files']['tmp_name']); $ct++) {
            if ($_FILES['files']['name'][$ct] && @copy($_FILES['files']['tmp_name'][$ct], $path . $_FILES['files']['name'][$ct])) {
              if ($_FILES['files']['size'][$ct] < $size && in_array($_FILES['files']['type'][$ct], $types)) {
                $filePath = $path . $_FILES['files']['name'][$ct];
                $postContent[$_FILES['files']['name'][$ct]] = new CURLFile(realpath($filePath));
                $mediaData[] = ['type' => 'document', 'media' => 'attach://'. $_FILES['files']['name'][$ct]];
              }
            }
          }
      
          $postContent['media'] = json_encode($mediaData);
      
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
          curl_setopt($curl, CURLOPT_URL, $urlFile);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $postContent);
          $fileSendStatus = curl_exec($curl);
          curl_close($curl);
          $files = glob($path.'*');
          foreach($files as $file){
            if(is_file($file))
              unlink($file);
          }
      }
      echo json_encode('SUCCESS');
    } else {
      echo json_encode('ERROR');
      // 
      // echo json_decode($textSendStatus);
    }
  } else {
    echo json_encode('NOTVALID');
  }
} else {
  header("Location: /");
}
