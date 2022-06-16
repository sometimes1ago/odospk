<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$insertedData = $_POST['insertedData'];

$assocArray = [
  'addProgName' => $insertedData[0],
  'addProgLength' => $insertedData[1],
  'addProgCourseType' => $insertedData[2],
  'addProgDiplomaType' => $insertedData[3],
  'addProgSkills' => $insertedData[4],
  'addProgDescription' => $insertedData[5],
  'addProgPrice' => $insertedData[6]
];

function addProgram($data) {
  $progName = $data['addProgName'];
  $length = $data['addProgLength'];
  $courseType = $data['addProgCourseType'];
  $diplomaType = $data['addProgDiplomaType'];
  $skills = $data['addProgSkills'];
  $description = $data['addProgDescription'];
  $price = $data['addProgPrice'];

  if ($courseType == 'Курс') {
    $courseType = '1';
  } else if ($courseType == 'Профессиональная подготовка') {
    $courseType = '2';
  }

  if ($diplomaType == 'Сертификат') {
    $diplomaType = '1';
  } else if ($diplomaType == 'Свидетельство') {
    $diplomaType = '2';
  }

  Database::Instance()->query(
    'INSERT INTO `courses`(`name`, `lenght_academ`, `course_type`, `diploma_type`, `skills`, `description`, `price`) ' .
    'VALUES (:name, :length, :courseType, :diplomaType, :skills, :description, :price);',
    [
      'name' => $progName,
      'length' => $length,
      'courseType' => $courseType,
      'diplomaType' => $diplomaType,
      'skills' => $skills,
      'description' => $description,
      'price' => $price
    ]
  );

  echo includeTemplate('messages/success.php', ['successText' => 'Программа успешно добавлена']);
}

addProgram($assocArray);
