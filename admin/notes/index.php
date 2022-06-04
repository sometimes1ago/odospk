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

$notes = $data->getUserNotes($user['id']);

if (isset($_POST['removing']) && $_POST['removing'] == 'yes') {
  $data->dropNote($_POST['note__id']);
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

if (isset($_POST['edit__note'])) {
  $data->editNote($_POST['note__id'], $_POST['notes__new-value']);
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

if (isset($_POST['addNoteSender'])) {
  $preparedValue = htmlspecialchars(trim($_POST['addNoteValue']));
  $data->createUserNote($preparedValue, $user['id']);
  header("Location: " . $_SERVER['REQUEST_URI']);
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
          <p class="text-16 text-black-800 mt-4">Нужные записи всегда под рукой</p>
        </div>
        <a href="/admin/notes/trash/" class="queries__action flex items-center p-8 bg-light-600 border border-light-900 rounded-8 hover:shadow-btn">
          <svg class="tab__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
            <path d="M2.25 4.5H3.75H15.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 4.5V3C6 2.60218 6.15804 2.22064 6.43934 1.93934C6.72064 1.65804 7.10218 1.5 7.5 1.5H10.5C10.8978 1.5 11.2794 1.65804 11.5607 1.93934C11.842 2.22064 12 2.60218 12 3V4.5M14.25 4.5V15C14.25 15.3978 14.092 15.7794 13.8107 16.0607C13.5294 16.342 13.1478 16.5 12.75 16.5H5.25C4.85218 16.5 4.47064 16.342 4.18934 16.0607C3.90804 15.7794 3.75 15.3978 3.75 15V4.5H14.25Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.5 8.25V12.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10.5 8.25V12.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="ml-8 text-14">Корзина</p>
        </a>
      </div>
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="w-full mt-16 p-12 bg-light-600 rounded-8 border border-light-900">
        <label for="addNoteInput" class="text-16 font-bold">Добавить заметку</label>
        <div class="w-full mt-8 flex items-center">
          <input type="text" name="addNoteValue" id="addNoteInput" class="w-full font-medium text-black-800 text-14 p-8 bg-light-400 border border-light-900 rounded-8 mr-16" placeholder="Введите текст заметки" required>
          <button type="submit" name="addNoteSender" class="w-1/5 p-[13px] bg-brand-900 text-light-400 font-bold text-14 rounded-8 hover:shadow-btn">Добавить</button>
        </div>
      </form>
      <?php if (!empty($notes)) : ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="w-full h-[360px] mt-16 relative">
          <ul class="overflow-y-scroll scrollbar max-h-[360px]">
            <?php includeTemplate('elements/notes/note_default.php', ['notes' => $notes]) ?>
          </ul>
          <div class="notes__actions w-full absolute bottom-0 bg-light-400 border border-light-900 p-12 rounded-12 shadow-xl">
            <h3 class="text-18 font-bold">Управление заметкой</h3>
            <p class="mt-8 text-14 text-black-800">Действия, доступные для выбранной заметки</p>
            <ul class="notes__actions-container mt-16 items-center">
              <li class="mr-12 last:mr-0">
                <div class="queries__action notes__edit-btn flex items-center px-12 py-[9px] font-medium bg-light-600 border border-light-900 rounded-8 cursor-pointer">
                  <svg class="mr-8" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z" stroke="#252525" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p class="text-14">Редактировать</p>
                </div>
              </li>
              <li class="mr-12 last:mr-0">
                <button class="queries__action queries__action-trash z-50 flex items-center px-12 py-8 font-medium bg-light-600 border border-light-900 rounded-8" name="removing" value="yes" type="submit">
                  <svg class="mr-8" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none">
                    <path d="M2.5 5H4.16667H17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.6665 4.99996V3.33329C6.6665 2.89127 6.8421 2.46734 7.15466 2.15478C7.46722 1.84222 7.89114 1.66663 8.33317 1.66663H11.6665C12.1085 1.66663 12.5325 1.84222 12.845 2.15478C13.1576 2.46734 13.3332 2.89127 13.3332 3.33329V4.99996M15.8332 4.99996V16.6666C15.8332 17.1087 15.6576 17.5326 15.345 17.8451C15.0325 18.1577 14.6085 18.3333 14.1665 18.3333H5.83317C5.39114 18.3333 4.96722 18.1577 4.65466 17.8451C4.3421 17.5326 4.1665 17.1087 4.1665 16.6666V4.99996H15.8332Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8.3335 9.16663V14.1666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11.6665 9.16663V14.1666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p class="text-14">Удалить</p>
                </button>
              </li>
            </ul>
            <div class="notes__edit w-full mt-16 flex items-center">
              <input type="text" name="notes__new-value" class="w-full px-12 py-8 text-14 text-black-800 font-medium bg-light-600 border border-light-900 rounded-8" placeholder="Новое значение для заметки">
              <input type="submit" name="edit__note" value="Изменить" class="w-1/5 ml-12 p-12 text-light-400 border border-brand-900 bg-brand-900 text-14 font-bold rounded-8 cursor-pointer hover:shadow-btn">
              <div class="notes__edit-cancel w-1/5 ml-12 p-12 bg-light-600 text-center font-bold text-14 border border-light-900 rounded-8 cursor-pointer hover:shadow-md">Отмена</div>
            </div>
          </div>
        </form>
      <?php endif; ?>
    </div>
  </section>
  <script src="/src/js/admin/changeUserdataInit.js"></script>
  <script src="/src/js/admin/notes/actions.js"></script>
</body>

</html>