<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$data = new Data(Database::Instance());

function sortEduQueries(string $sortBy, string $requestUri, Data $handler)
{
  $result = [];

  switch ($requestUri) {
    case str_contains($requestUri, 'education'):
      $result = $handler->getQueries('Education', $sortBy);
      break;
    case str_contains($requestUri, 'archive'):
      $result = $handler->getQueries('Archived', $sortBy);
      break;
    case str_contains($requestUri, 'trash'):
      $result = $handler->getQueries('Removed', $sortBy);
      break;
  }

  return $result;
}

$sorted = sortEduQueries($_POST['sortBy'], $_POST['requestUri'], $data);
echo includeTemplate('elements/queries/query_edu.php', ['queries' => $sorted]);
