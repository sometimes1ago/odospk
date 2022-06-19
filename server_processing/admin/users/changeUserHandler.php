<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$data = $_POST['insertedData'];

$assocArray = [
  'userProp' => htmlspecialchars(trim($data[0])),
  'propValue' => htmlspecialchars(trim($data[1]))
];

$userlogin = $_SESSION['user']['login'];


function switchUserProp(string $prop): string
{
  $switchedProp = '';

  switch ($prop) {
    case "Имя":
      $switchedProp = 'name';
      break;
    case "Логин":
      $switchedProp = "login";
      break;
    case "Пароль":
      $switchedProp = "password";
      break;
    case "Электронную почту":
      $switchedProp = "email";
      break;
  }

  return $switchedProp;
}

$userProp = switchUserProp($assocArray['userProp']);
$propValue = $assocArray['propValue'];

Database::Instance()->query(
  "UPDATE `users` SET `$userProp` = '$propValue' WHERE `login` = '$userlogin';"
);

echo includeTemplate('messages/success.php', ['successText' => 'Пользователь успешно изменен']);
