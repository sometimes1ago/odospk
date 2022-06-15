<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$feedbackToRemove = $_POST['insertedData'];

Database::Instance()->query(
  "DELETE FROM `feedbacks` WHERE `author` = '$feedbackToRemove';",
);

echo includeTemplate('messages/success.php', ['successText' => 'Отзыв успешно удален']);