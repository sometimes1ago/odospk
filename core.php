<?php

session_start();

spl_autoload_register(function($class) {
  $root = $_SERVER['DOCUMENT_ROOT'];
  $ds = DIRECTORY_SEPARATOR;
  
  $filename = $root . $ds . 'classes' . $ds . str_replace('\\', $ds, $class) . '.php';
  require($filename);
});