<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$clientName = $_POST['clientName'];
$clientPhone = $_POST['clientPhone'];
$selectedCourse = $_POST['selectedCourse'];

$prechecking = Database::Instance()->fetchAll(
  'SELECT `id` FROM `getQueriesPreSort` WHERE `client` = :client AND `course` = :selectedCourse AND `status` = :status',
  ['client' => $clientName, 'selectedCourse' => $selectedCourse, 'status' => 'Не обработано']
);

if (!empty($prechecking)) {
  echo includeTemplate('sections/courses/course_error.php');
} else {
  Database::Instance()->query("CALL createQuery('$selectedCourse', '$clientName', '$clientPhone');");
  echo includeTemplate('sections/courses/course_succeded.php');
}
  