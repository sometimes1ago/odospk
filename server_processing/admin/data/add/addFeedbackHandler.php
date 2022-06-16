<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$insertedData = $_POST['insertedData'];

$assocArray = [
  'addFeedbackName' => $insertedData[0],
  'addFeedbackContent' => $insertedData[1]
];

Database::Instance()->query(
  'INSERT INTO `feedbacks`(`author`, `content`) VALUES(:name, :content);',
  ['name' => $assocArray['addFeedbackName'], 'content' => $assocArray['addFeedbackContent']]
);

echo includeTemplate('messages/success.php', ['successText' => 'Отзыв успешно добавлен']);
