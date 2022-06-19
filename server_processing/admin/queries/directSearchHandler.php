<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$data = $_POST['dataToSearch'];

$array = [
  'searchBy' => htmlspecialchars(trim($data[0])),
  'searchByValue' => htmlspecialchars(trim($data[1])),
  'requestUri' => htmlspecialchars(trim($data[2]))
];

function switchSearchBy(string $searchBy): string
{
  $switchedSearchBy = '';

  switch ($searchBy) {
    case 'Курсу или программе':
      $switchedSearchBy = 'course';
      break;
    case 'Фамилии и имени':
      $switchedSearchBy = 'client';
      break;
    case 'Телефону':
      $switchedSearchBy = 'phone';
      break;
    case 'Дате':
      $switchedSearchBy = 'date';
      break;
    case 'Статусу':
      $switchedSearchBy = 'status';
      break;
  }

  return $switchedSearchBy;
}


function searchBy(array $data): ?array
{
  $result = [];

  $searchBy = switchSearchBy($data['searchBy']);
  $searchByValue = $data['searchByValue'];
  $requestUri = $data['requestUri'];

  switch ($requestUri) {
    case str_contains($requestUri, 'education'):
      $result = Database::Instance()->fetchAll("SELECT * FROM `getQueriesPreSort` WHERE ($searchBy LIKE '%$searchByValue%' AND `status` = 'Обработано') OR ($searchBy LIKE '%$searchByValue%' AND `status` = 'Не обработано') ORDER BY $searchBy DESC;");
      break;
    case str_contains($requestUri, 'calls'):
      $result = Database::Instance()->fetchAll("SELECT * FROM `getCalls` WHERE `$searchBy` LIKE '%$searchByValue%' ORDER BY $searchBy DESC;");
      break;
    case str_contains($requestUri, 'archive'):
      $result = Database::Instance()->fetchAll("SELECT * FROM `getQueriesPreSort` WHERE `$searchBy` LIKE '%$searchByValue%' AND `status` = 'Архивировано' ORDER BY $searchBy DESC;");
      break;
    case str_contains($requestUri, 'trash'):
      $result = Database::Instance()->fetchAll("SELECT * FROM `getQueriesPreSort` WHERE `$searchBy` LIKE '%$searchByValue%' AND `status` = 'Удалено' ORDER BY $searchBy DESC;");
      break;
  }
  

  return $result;
}

$searched = searchBy($array);

echo includeTemplate('elements/queries/query_edu.php', ['queries' => $searched]);
