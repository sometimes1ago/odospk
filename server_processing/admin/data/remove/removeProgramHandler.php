<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$progToRemove = $_POST['insertedData'];

Database::Instance()->query(
  "DELETE FROM `courses` WHERE `name` = '$progToRemove';",
);

echo includeTemplate('messages/success.php', ['successText' => 'Программа успешно удалена']);
