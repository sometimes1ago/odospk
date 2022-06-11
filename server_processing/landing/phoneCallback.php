<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$clientName = $_POST['insertedName'];
$clientPhone = $_POST['insertedPhone'];

$precheking = Database::Instance()->fetchAll(
  'SELECT `id` FROM `calls` WHERE `client` = :client AND `phone` = :phone AND `status` = :status',
  ['client' => $clientName, 'phone' => $clientPhone, 'status' => 'Не обзвонен']
);

if (!empty($precheking)) {
  echo includeTemplate('sections/mobile/help_error.php');
} else {
  Database::Instance()->query("CALL createCall('$clientName', '$clientPhone');");
  echo includeTemplate('sections/mobile/help_succeded.php');
}
