<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$userToRemove = htmlspecialchars(trim($_POST['insertedData']));

$prechecking = Database::Instance()->fetch(
  'SELECT `access_level` FROM `users` WHERE `name` = :name',
  ['name' => $userToRemove]
);


if ($prechecking > 2) {
  echo includeTemplate('messages/error.php', ['errorText' => 'Данного пользователя удалить нельзя']);
} else if ($prechecking <= 2) {
  Database::Instance()->query(
    "DELETE FROM `users` WHERE `name` = '$userToRemove';"
  );

  echo includeTemplate('messages/success.php', ['successText' => 'Пользователь успешно удален']);
}
