<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$insertedData = $_POST['insertedData'];

$assocArray = [
  'addUserName' => $insertedData[0],
  'addUserLogin' => $insertedData[1],
  'addUserPassword' => $insertedData[2],
  'addUserAccessLevel' => $insertedData[3],
  'addUserEmail' => $insertedData[4]
];

function addUser($data) {
  $userName = $data['addUserName'];
  $userLogin = $data['addUserLogin'];
  $userPassword = $data['addUserPassword'];
  $userAccess = $data['addUserAccessLevel'];
  $userEmail = $data['addUserEmail'];

  if ($userAccess == 'Оператор') {
    $userAccess = '1';
  } else if ($userAccess == 'Контент менеджер') {
    $userAccess = '2';
  } else if ($userAccess == 'Администратор') {
    $userAccess = '3';
  }

  Database::Instance()->query(
    'INSERT INTO `users`(`name`, `login`, `password`, `email`, `access_level`, `user_photo`, `access_code`) ' .
    'VALUES(:name, :login, :password, :email, :accessLevel, :photo, :accessCode);',
    [
      'name' => $userName,
      'login' => $userLogin,
      'password' => $userPassword,
      'email' => $userEmail,
      'accessLevel' => $userAccess,
      'photo' => '',
      'accessCode' => $userAccess
    ]
  );

  echo includeTemplate('messages/success.php', ['successText' => 'Пользователь успешно добавлен']);
}

addUser($assocArray);
