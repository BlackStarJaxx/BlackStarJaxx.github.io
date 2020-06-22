<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (!empty($_POST['name']) && !empty($_POST['phone'])){
  if (isset($_POST['name'])) {
    if (!empty($_POST['name'])){
  $name = strip_tags($_POST['name']);
  $nameFieldset = "Имя пославшего: ";
  }
}
 
if (isset($_POST['subject'])) {
  if (!empty($_POST['subject'])){
  $subject = strip_tags($_POST['subject']);
  $subjectFieldset = "Subject: ";
  }
}
if (isset($_POST['email'])) {
    if (!empty($_POST['email'])){
    $email = strip_tags($_POST['email']);
    $emailFieldset = "E-mail: ";
    }
  }

if (isset($_POST['message'])) {
  if (!empty($_POST['message'])){
  $message = strip_tags($_POST['message']);
  $messageFieldset = "Тема: ";
  }
}
$token = "727039672:AAGy9oTZ2k2bo9E2_4w45P2gXfTfWbyEoDQ";
$chat_id = "468005660";
$arr = array(
  $nameFieldset => $name,
  $subjectFieldset => $subject,
  $emailFieldset => $email,
  $messageFieldset => $message
);
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {
  
  echo '<p class="success">Спасибо за отправку вашего сообщения!</p>';
    return true;
} else {
  echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
}
} else {
  echo '<p class="fail">Ошибка. Вы заполнили не все обязательные поля!</p>';
}
} else {
header ("Location: /");
}
 

