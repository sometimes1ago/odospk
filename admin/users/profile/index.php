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
  <title>ODOSPK • Профиль</title>
</head>

<body class="w-full h-screen text-black-900 flex leading-none bg-light-600">
  <?php includeTemplate('sections/aside.php', ['asideMenu' => $asideMenu, 'user' => $user]) ?>
  <section class="w-full px-24 py-24 font-medium text-black-900">
    <h1 class="text-32 font-bold">Ваш профиль</h1>
    <div class="w-full h-[92%] flex relative flex-col mt-16 p-16 rounded-16 bg-light-400 shadow-section">
      <div class="flex items-center">
        <div class="w-[136px] h-[136px] flex items-center justify-center bg-light-600 rounded-full">
          <p class="block text-32 font-bold text-black-800"><?= mb_substr($user['name'], 0, 1) ?></p>
        </div>
        <div class="ml-24">
          <h2 class="text-28 font-bold"><?= $user['name'] ?></h2>
          <p class="mt-8 text-black-800 text-18"><?= $user['access'] ?></p>
        </div>
      </div>
      <div class="w-full changeUserResult"></div>
      <form autocomplete="off" class="animate__animated animate__fadeInUp w-full mt-24 p-12 md:p-16 bg-light-600 rounded-8 md:rounded-12" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <h3 class="text-22 font-bold">Изменение данных</h3>
        <p class="mt-8 text-16 text-black-800">Выберите что изменить, введите значение и нажмите на кнопку "Подтвердить"</p>
        <div class="w-full mt-24 flex items-end justify-between">
          <div class="w-full mr-16">
            <label class="dropdown__label mb-12 lg:text-18 font-bold dark:text-light-400" data-dropdownIndex="0">Что изменить</label>
            <div class="dropdown dropdown__light z-10" data-index="0">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__changeUserProp" data-dropdownValue="Имя">Имя</p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <ul class="animate__animated animate__fadeIn animate__fast dropdown__options changeUserProps">
                <li class="dropdown__option changeUserProp">Имя</li>
                <li class="dropdown__option changeUserProp">Логин</li>
                <li class="dropdown__option changeUserProp">Пароль</li>
                <li class="dropdown__option changeUserProp">Электронную почту</li>
              </ul>
            </div>
          </div>
          <div class="w-full mr-16">
            <label for="changeUserValue" class="text-18 md:text-20 font-bold">Введите значение</label>
            <input type="text" id="changeUserValue" class="changeUserValue w-full mt-12 text-14 md:text-16 font-medium px-12 py-[11px] md:py-[13px] border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Новое значение">
          </div>
          <div class="w-full">
            <input class="changeUserConfirm w-full text-14 md:text-16 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] md:mt-24 rounded-8 cursor-pointer hover:shadow-btn" name="changeUserConfirm" type="submit" value="Подтвердить">
          </div>
        </div>
      </form>
    </div>
  </section>
  <script src="/src/js/admin/changeUserDataInit.js"></script>
  <script src="/src/js/common/jquery.min.js"></script>
  <script src="/src/js/common/error.js"></script>
  <script src="/src/js/common/validate.js"></script>
  <script src="/src/js/common/dropdown.js"></script>
  <script src="/src/js/ajax/admin/users/change.js"></script>
</body>

</html>