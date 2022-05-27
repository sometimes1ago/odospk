<?php

session_start();

$asideMenu = require 'aside_menu.php';


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