<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$insertedData = $_POST['insertedData'];

$assocArray = [
  'userName' => $insertedData[0],
  'userProp' => $insertedData[1],
  'insertedValue' => $insertedData[2]
];

$prechecking = Database::Instance()->fetch(
  'SELECT `access_level` FROM `users` WHERE `name` = :name',
  ['name' => $assocArray['userName']]
);

function checkUserProp(string $prop): string {
  $checkedProp = '';

  switch ($prop) {
    case 'Имя':
      $checkedProp = 'name';
      break;
    case 'Логин':
      $checkedProp = 'login';
      break;
    case 'Пароль':
      $checkedProp = 'password';
      break;
    case 'Эл. почту':
      $checkedProp = 'email';
      break;
    case 'Уровень доступа':
      $checkedProp = 'access_level';
      break;
  }

  return $checkedProp;
}

function checkAccessLevels(string $level): string
{
  $access = '';

  switch ($level) {
    case 'Оператор':
      $access = '1';
      break;
    case 'Контент менеджер':
      $access = '2';
      break;
    case 'Администратор':
      $access = '3';
      break;
  }

  return $access;
}

function changeUser($data, $prechecking) {
  $userName = htmlspecialchars(trim($data['userName']));
  $userProp = htmlspecialchars(trim($data['userProp']));
  $newValue = htmlspecialchars(trim($data['insertedValue']));

  $checkedProp = checkUserProp($userProp);

  if ($checkedProp == 'access_level' && $prechecking >= 3) {
    echo includeTemplate('messages/error.php', ['errorText' => 'Уровень доступа этого пользователя изменить нельзя']);
  } else if ($checkedProp == 'access_level' && $prechecking <= 2) {
    $checkedAccess = checkAccessLevels($newValue);

    Database::Instance()->query(
      "UPDATE `users` SET `access_level` = '$checkedAccess' AND `access_code` = '$checkedAccess' WHERE `name` = '$userName';"
    );

    echo includeTemplate('messages/success.php', ['successText' => 'Уровень доступа успешно изменен']);
  } else {
    Database::Instance()->query(
      "UPDATE `users` SET `$checkedProp` = '$newValue' WHERE `name` = '$userName';"
    );

    echo includeTemplate('messages/success.php', ['successText' => 'Пользователь успешно изменен']);
  }
}

changeUser($assocArray, $prechecking);
