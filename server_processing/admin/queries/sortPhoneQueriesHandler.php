<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$data = new Data(Database::Instance());

$sortBy = htmlspecialchars(trim($_POST['sortBy']));
$sorted = $data->getCalls($sortBy);

echo includeTemplate('elements/queries/query_call.php', ['calls' => $sorted]);
