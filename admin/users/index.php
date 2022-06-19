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
$users = $data->getUsersList();

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>ODOSPK • Пользователи</title>
</head>

<body class="w-full h-screen text-black-900 flex leading-none bg-light-600">
  <?php includeTemplate('sections/aside.php', ['asideMenu' => $asideMenu, 'user' => $user]) ?>
  <section class="w-full px-24 py-24 font-medium text-black-900">
    <h1 class="text-32 font-bold">Список пользователей</h1>
    <div class="w-full h-[92%] flex items-center relative flex-col mt-16 p-16 rounded-16 bg-light-400 shadow-section">
      <?php if (!empty($users)) : ?>
        <ul class="w-full overflow-y-scroll flex flex-wrap scrollbar">
          <?php includeTemplate('elements/users/user_card.php', ['users' => $users]) ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>
  <script src="/src/js/admin/changeUserDataInit.js"></script>
</body>
</html>