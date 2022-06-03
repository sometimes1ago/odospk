<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

if (!isset($_SESSION['user'])) {
  header('Location: /admin/');
}

if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
  unset($_SESSION['user']);
  session_destroy();
  header('Location: /admin/');
}

$user = $_SESSION['user'];
$data = new Data(Database::Instance());

if (isset($_POST['addNote'])) {
  $value = htmlspecialchars(trim($_POST['addNoteValue']));
  $data->createUserNote($value, $user['id']);
}

?>
<!DOCTYPE html>
<html lang="ru" class="html scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/favicon/site.webmanifest">
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#fefefe">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="/src/css/style.css">
  <link rel="stylesheet" href="/src/css/app.css">
  <title>ODOSPK • Заметки</title>
</head>

<body class="w-full h-screen text-black-900 flex leading-none bg-light-600">
  <?php includeTemplate('sections/aside.php', ['asideMenu' => $asideMenu, 'user' => $user]) ?>
  <section class="w-full px-24 py-24 font-medium text-black-900">
    <h1 class="text-32 font-bold">Ваши заметки</h1>
    <div class="w-full h-[92%] flex items-center relative flex-col mt-16 p-16 rounded-16 bg-light-400 shadow-section">
      <div class="w-full flex items-center justify-between">
        <div>
          <h2 class="text-20 font-bold">Список заметок</h2>
          <p class="text-16 text-black-800 mt-4">Полный ваших личных заметок</p>
        </div>
        <a href="/admin/notes/trash/" class="flex items-center p-8 bg-light-600 border border-light-900 rounded-8">
          <svg class="tab__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
            <path d="M2.25 4.5H3.75H15.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 4.5V3C6 2.60218 6.15804 2.22064 6.43934 1.93934C6.72064 1.65804 7.10218 1.5 7.5 1.5H10.5C10.8978 1.5 11.2794 1.65804 11.5607 1.93934C11.842 2.22064 12 2.60218 12 3V4.5M14.25 4.5V15C14.25 15.3978 14.092 15.7794 13.8107 16.0607C13.5294 16.342 13.1478 16.5 12.75 16.5H5.25C4.85218 16.5 4.47064 16.342 4.18934 16.0607C3.90804 15.7794 3.75 15.3978 3.75 15V4.5H14.25Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.5 8.25V12.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10.5 8.25V12.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="ml-8 text-14">Корзина</p>
        </a>
      </div>
      <input type="text" name="addNote" id="addNoteInput" class="w-full mt-16 bg-light-600 border border-light-900 rounded-8" placeholder="Введите текст заметки" required>
    </div>
    
  </section>
</body>

</html>