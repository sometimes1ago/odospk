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
  <title>ODOSPK • Управление данными</title>
</head>

<body class="w-full h-screen flex leading-none bg-light-600">
  <?php includeTemplate('sections/aside.php', ['asideMenu' => $asideMenu, 'user' => $user]) ?>
  <section class="w-full px-24 py-24 font-medium text-black-900">
    <h1 class="text-32 md:text-48 font-bold">Управление данными</h1>
    <div class="h-[92%] flex flex-col mt-16 p-16 rounded-16 bg-light-400 shadow-section">
      <ul class="flex items-center self-start">
        <li class="mr-16 last:mr-0">
          <a class="data__pill" href="/admin/data/change/">Изменить</a>
        </li>
        <li class="mr-16 last:mr-0">
          <a class="data__pill" href="/admin/data/add/">Добавить</a>
        </li>
        <li class="mr-16 last:mr-0">
          <a class="data__pill data__pill-active" href="/admin/data/remove/">Удалить</a>
        </li>
      </ul>
      <ul class="mt-16 flex flex-wrap">
        <li class="mr-16 last:mr-0">
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-12 md:p-16 bg-light-600 border border-light-900 rounded-8 md:rounded-12">
            <h2 class="text-20 md:text-24 font-bold">Удаление программы</h2>
            <p class="mt-8 md:mt-12 text-16 md:text-18 leading-tight text-black-800">Выберите программу и нажмите <br> на кнопку удалить</p>
            <label class="dropdown__label mb-12 mt-24 lg:text-18 md:text-20 font-bold dark:text-light-400" data-dropdownIndex="0">Выберите программу</label>
            <div class="dropdown dropdown__light z-[11]" data-index="0">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__removeProgValue" data-dropdownValue="Программа 1">Программа 1</p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <ul class="dropdown__options">
                <li class="dropdown__option removeProgOption">Программа 1</li>
                <li class="dropdown__option removeProgOption">Программа 2</li>
                <li class="dropdown__option removeProgOption">Программа 3</li>
                <li class="dropdown__option removeProgOption">Программа 4</li>
                <li class="dropdown__option removeProgOption">Программа 5</li>
                <li class="dropdown__option removeProgOption">Программа 6</li>
              </ul>
            </div>
            <input class="removeProgramSender w-full text-14 tb:mt-24 lg:mt-28 md:mt-36 md:text-16 xl:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="removeProgramSender" value="Удалить">
          </form>
        </li>
        <li class="mr-16 last:mr-0">
          <form action="" method="post" class="p-12 md:p-16 bg-light-600 border border-light-900 rounded-12">
            <h2 class="text-20 md:text-24 font-bold">Удаление отзыва</h2>
            <p class="mt-8 md:mt-12 text-16 md:text-18 leading-tight text-black-800">Выберите отзыв и нажмите <br> на кнопку удалить</p>
            <label class="dropdown__label mb-12 mt-24 lg:text-18 md:text-20 font-bold dark:text-light-400" data-dropdownIndex="1">Выберите автора отзыва</label>
            <div class="dropdown dropdown__light z-[11]" data-index="1">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__removeFeedbackValue" data-dropdownValue="Автор 1">Автор 1</p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <ul class="dropdown__options">
                <li class="dropdown__option removeFeedbackOption">Автор 1</li>
                <li class="dropdown__option removeFeedbackOption">Автор 2</li>
                <li class="dropdown__option removeFeedbackOption">Автор 3</li>
                <li class="dropdown__option removeFeedbackOption">Автор 4</li>
                <li class="dropdown__option removeFeedbackOption">Автор 5</li>
                <li class="dropdown__option removeFeedbackOption">Автор 6</li>
              </ul>
            </div>
            <input class="removeFeedbackSender w-full text-14 tb:mt-24 lg:mt-28 md:mt-36 md:text-16 xl:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="removeFeedbackSender" value="Удалить">
          </form>
        </li>
        <?php if ($user['access_code'] > 2) : ?>
          <li class="mr-16 last:mr-0">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="p-12 md:p-16 bg-light-600 border border-light-900 rounded-12">
              <h2 class="text-20 md:text-24 font-bold">Удаление пользователя</h2>
              <p class="mt-8 md:mt-12 text-16 md:text-18 leading-tight text-black-800">Выберите пользователя и нажмите <br> на кнопку удалить</p>
              <label class="dropdown__label mb-12 mt-24 lg:text-18 md:text-20 font-bold dark:text-light-400" data-dropdownIndex="2">Выберите пользователя</label>
              <div class="dropdown dropdown__light z-[11]" data-index="2">
                <div class="dropdown__btn">
                  <p class="dropdown__btn-text dropdown__removeUserValue" data-dropdownValue="Пользователь 1">Пользователь 1</p>
                  <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                    <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                  </svg>
                </div>
                <ul class="dropdown__options">
                  <li class="dropdown__option removeUserOption">Пользователь 1</li>
                  <li class="dropdown__option removeUserOption">Пользователь 2</li>
                  <li class="dropdown__option removeUserOption">Пользователь 3</li>
                  <li class="dropdown__option removeUserOption">Пользователь 4</li>
                  <li class="dropdown__option removeUserOption">Пользователь 5</li>
                  <li class="dropdown__option removeUserOption">Пользователь 6</li>
                </ul>
              </div>
              <input class="removeUserSender w-full text-14 tb:mt-24 lg:mt-28 md:mt-36 md:text-16 xl:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="removeUserkSender" value="Удалить">
            </form>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </section>
  <script src="/src/js/admin/changeUserdataInit.js"></script>
  <script src="/src/js/common/dropdown.js"></script>
</body>

</html>