<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

$progName = htmlspecialchars(trim($_POST['progName']));
$data = new Data(Database::Instance());
$returnedCourse = $data->getCourseData($progName);

echo includeTemplate('sections/courses/course_initial.php', ['returnedCourse' => $returnedCourse]);
