<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$insertedData = $_POST['insertedData'];

$assocArray = [
  'progName' => $insertedData[0],
  'progProp' => $insertedData[1],
  'insetredValue' => $insertedData[2]
];

function checkProgProps(string $progProp) {
  $checkedProp = '';

  switch ($progProp) {
    case 'Наименование':
      $checkedProp = 'name';
      break;
    case 'Срок обучения':
      $checkedProp = 'lenghtAcadem';
      break;
    case 'Чему научитесь':
      $checkedProp = 'skills';
      break;
    case 'Выдаваемый документ':
      $checkedProp = 'diplomaType';
      break;
    case 'Тип программы':
      $checkedProp = 'courseType';
      break;
    case 'Описание':
      $checkedProp = 'description';
      break;
    case 'Стоимость':
      $checkedProp = 'price';
      break;
  }

  return $checkedProp;
}

function changeProgam($data) {
  if (!empty($data)) {
    
    $progName = $data['progName'];
    $checkedProp = checkProgProps($data['progProp']);
    $checkedValue = $data['insetredValue'];

    if ($checkedProp == 'courseType' && $checkedValue == 'Курс') {
      $checkedValue = '1';
    } else if ($checkedProp == 'courseType' && $checkedValue == 'Профессиональная подготовка') {
      $checkedValue = '2';
    } else if ($checkedProp == 'diplomaType' && $checkedValue == 'Сертификат') {
      $checkedValue = '1';
    } else if ($checkedProp == 'diplomaType' && $checkedValue == 'Свидетельство') {
      $checkedValue = '2';
    }

    Database::Instance()->query(
      "UPDATE `courses` SET `$checkedProp` = '$checkedValue' WHERE `name` = '$progName';"
    );

    echo includeTemplate('messages/success.php', ['successText' => 'Программа успешно изменена']);
  }
}

changeProgam($assocArray);
