<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$insertedData = $_POST['insertedData'];

$assocArray = [
  'feedbackAuthor' => $insertedData[0],
  'feedbackProp' => $insertedData[1],
  'insetredValue' => $insertedData[2]
];

function checkFeedbackProp(string $prop): string
{
  $checkedProp = '';

  switch ($prop) {
    case 'Автор отзыва':
      $checkedProp = 'author';
      break;
    case 'Содержание отзыва':
      $checkedProp = 'content';
      break;
  }

  return $checkedProp;
}

$author = htmlspecialchars(trim($assocArray['feedbackAuthor']));
$propToChange = checkFeedbackProp(htmlspecialchars(trim($assocArray['feedbackProp'])));
$newValue = htmlspecialchars(trim($assocArray['insetredValue']));

Database::Instance()->query(
  "UPDATE `feedbacks` SET `$propToChange` = '$newValue' WHERE `author` = '$author';"
);

echo includeTemplate('messages/success.php', ['successText' => 'Отзыв успешно изменен']);
