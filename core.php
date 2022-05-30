<?php

session_start();

$asideMenu = require $_SERVER['DOCUMENT_ROOT'] . '/menu/aside_menu.php';
$queriesTabs = require_once $_SERVER['DOCUMENT_ROOT'] . '/menu/queries_header_menu.php';

spl_autoload_register(function($class) {
  $root = $_SERVER['DOCUMENT_ROOT'];
  $ds = DIRECTORY_SEPARATOR;
  
  $filename = $root . $ds . 'classes' . $ds . str_replace('\\', $ds, $class) . '.php';
  require($filename);
});



function handleQuery($queryId, $status) {
  $preparedQueryId = htmlspecialchars(substr(trim($queryId), 5));

  Database::Instance()->query(
    "UPDATE `queries` SET `status` = '$status' WHERE `id` = :id",
    ['id' => $preparedQueryId]
  );

  header('Location: ' . $_SERVER['REQUEST_URI']);
}

function dropQuery($queryId) {
  $preparedQueryId = htmlspecialchars(substr(trim($queryId), 5));

  Database::Instance()->query(
    "DELETE FROM `queries` WHERE `id` = :id",
    ['id' => $preparedQueryId]
  );

  header('Location: ' . $_SERVER['REQUEST_URI']);
}

function truncateTrash() {
  Database::Instance()->query(
    'DELETE FROM `queries` WHERE `status` = :status',
    ['status' => 'Удалено']
  );

  header('Location: ' . $_SERVER['REQUEST_URI']);
}

function includeTemplate($templateName, $variables = []) {
  $root = $_SERVER['DOCUMENT_ROOT'] . '/templates/';
  try {
    if (is_string($templateName) && $templateName !== '') {
      if (file_exists($root . $templateName)) {
        extract($variables);
        require_once $root . $templateName;
      } else {
        throw new Exception('Данного подключаемого файла не существует');
      }
    } else {
      throw new Exception('Имя подключаемого шаблона не может быть пустым!');
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}