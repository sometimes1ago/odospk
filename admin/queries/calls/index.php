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
$userNotes = $data->getUserNotes($user['id']);
$calls = $data->getCalls('id');

if (isset($_POST['addNote'])) {
  $value = htmlspecialchars(trim($_POST['addNoteValue']));
  $data->createUserNote($value, $user['id']);
}

if (isset($_POST['processing']) && $_POST['processing'] == 'yes') {
  $data->handleCall($_POST['query__call']);
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

if (isset($_POST['removing']) && $_POST['removing'] == 'yes') {
  $data->dropCall($_POST['query__call']);
  header('Location: ' . $_SERVER['REQUEST_URI']);
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
  <title>ODOSPK • Заявки • Обучение</title>
</head>

<body class="w-full h-screen text-black-900 flex leading-none bg-light-600">
  <?php includeTemplate('sections/aside.php', ['asideMenu' => $asideMenu, 'user' => $user]) ?>
  <section class="w-full px-24 py-24 font-medium text-black-900">
    <h1 class="text-32 md:text-48 font-bold">Заявки • Звонки</h1>
    <div class="w-full h-[92%] flex items-center md:items-start relative flex-col mt-16 md:mt-24 p-16 rounded-16 bg-light-400 shadow-section">
      <?php includeTemplate('sections/queries_header.php', ['userNotes' => $userNotes, 'queriesTabs' => $queriesTabs]) ?>
      <ul class="w-full md:w-[80%] flex items-center mt-16 scrollbar">
        <li class="headerSortBy w-1/5 flex items-center border-2 border-light-900 border-collapse px-12 py-8 rounded-tl-8 rounded-bl-8 cursor-pointer" data-sortByValue="number">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M3.33325 7.5H16.6666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.33325 12.5H16.6666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M8.33341 2.5L6.66675 17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M13.3334 2.5L11.6667 17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words">Номер</p>
        </li>
        <li class="headerSortBy w-1/5 flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 cursor-pointer" data-sortByValue="client">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M17.5264 17.5V15.8333C17.5264 14.9493 17.1753 14.1014 16.5501 13.4763C15.925 12.8512 15.0772 12.5 14.1931 12.5H7.52645C6.64239 12.5 5.79455 12.8512 5.16943 13.4763C4.5443 14.1014 4.19312 14.9493 4.19312 15.8333V17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10.8599 9.16667C12.7009 9.16667 14.1933 7.67428 14.1933 5.83333C14.1933 3.99238 12.7009 2.5 10.8599 2.5C9.019 2.5 7.52661 3.99238 7.52661 5.83333C7.52661 7.67428 9.019 9.16667 10.8599 9.16667Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words">Фамилия и имя</p>
        </li>
        <li class="headerSortBy w-1/5 flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 cursor-pointer" data-sortByValue="phone">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M18.5827 14.1V16.6C18.5836 16.8321 18.5361 17.0618 18.4431 17.2745C18.3502 17.4871 18.2138 17.678 18.0428 17.8349C17.8718 17.9918 17.6699 18.1112 17.45 18.1856C17.2301 18.26 16.9972 18.2876 16.766 18.2667C14.2017 17.988 11.7385 17.1118 9.57437 15.7083C7.5609 14.4289 5.85382 12.7218 4.57437 10.7083C3.16602 8.53435 2.28958 6.05917 2.01604 3.48334C1.99522 3.2529 2.0226 3.02064 2.09646 2.80136C2.17031 2.58208 2.28902 2.38058 2.44501 2.20969C2.60101 2.0388 2.79088 1.90227 3.00253 1.80878C3.21419 1.71529 3.44299 1.66689 3.67437 1.66668H6.17437C6.5788 1.6627 6.97087 1.80591 7.27751 2.06962C7.58415 2.33333 7.78444 2.69955 7.84104 3.10001C7.94656 3.90007 8.14225 4.68562 8.42437 5.44168C8.53649 5.73995 8.56076 6.06411 8.4943 6.37574C8.42783 6.68738 8.27343 6.97344 8.04937 7.20001L6.99104 8.25834C8.17734 10.3446 9.90475 12.072 11.991 13.2583L13.0494 12.2C13.2759 11.976 13.562 11.8216 13.8736 11.7551C14.1853 11.6886 14.5094 11.7129 14.8077 11.825C15.5638 12.1071 16.3493 12.3028 17.1494 12.4083C17.5542 12.4655 17.9239 12.6693 18.1882 12.9813C18.4524 13.2932 18.5928 13.6913 18.5827 14.1Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words">Телефон</p>
        </li>
        <li class="headerSortBy w-1/5 flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 cursor-pointer" data-sortByValue="date">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M16.6261 3.33334H4.95939C4.03892 3.33334 3.29272 4.07954 3.29272 5.00001V16.6667C3.29272 17.5872 4.03892 18.3333 4.95939 18.3333H16.6261C17.5465 18.3333 18.2927 17.5872 18.2927 16.6667V5.00001C18.2927 4.07954 17.5465 3.33334 16.6261 3.33334Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M14.126 1.66666V4.99999" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.45947 1.66666V4.99999" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.29272 8.33334H18.2927" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words">Дата</p>
        </li>
        <li class="headerSortBy w-1/5 flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 rounded-tr-8 rounded-br-8 cursor-pointer" data-sortByValue="status">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M11.2508 1.66666L2.91748 11.6667H10.4175L9.58415 18.3333L17.9175 8.33332H10.4175L11.2508 1.66666Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words">Статус</p>
        </li>
      </ul>
      <?php if ($calls) : ?>
        <form class="w-full md:w-[80%] max-h-[90%] mt-12 md:mt-16 relative" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
          <ul class="overflow-y-scroll scrollbar h-[424px] md:h-[690px]">
            <?php includeTemplate('elements/queries/query_call.php', ['calls' => $calls]) ?>
          </ul>
          <div class="queries__actions w-full font-bold shadow-lg p-12 md:p-16 bg-light-400 absolute bottom-0 border border-light-900 rounded-12" method="POST">
            <h3 class="text-18 md:text-24">Управление заявкой</h3>
            <p class="mt-8 text-14 md:text-18 text-black-800">Действия, доступные для выбранной заявки</p>
            <ul class="mt-16 md:mt-24 flex items-center">
              <li class="mr-12 md:mr-16 last:mr-0">
                <button class="queries__action flex items-center px-12 py-8 font-medium bg-light-600 border border-light-900 rounded-8" name="processing" value="yes" type="submit">
                  <svg class="mr-8 md:w-24 md:h-24" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M19.0671 14.7226V17.2226C19.068 17.4547 19.0205 17.6844 18.9275 17.8971C18.8345 18.1097 18.6982 18.3006 18.5271 18.4575C18.3561 18.6144 18.1542 18.7338 17.9344 18.8082C17.7145 18.8825 17.4816 18.9102 17.2504 18.8893C14.6861 18.6106 12.2229 17.7344 10.0587 16.3309C8.04527 15.0515 6.3382 13.3444 5.05875 11.3309C3.6504 9.15694 2.77395 6.68176 2.50042 4.10593C2.47959 3.87549 2.50698 3.64323 2.58083 3.42395C2.65469 3.20467 2.77339 3.00317 2.92939 2.83228C3.08538 2.66139 3.27525 2.52486 3.48691 2.43137C3.69856 2.33788 3.92737 2.28948 4.15875 2.28927H6.65875C7.06317 2.28528 7.45524 2.4285 7.76188 2.69221C8.06853 2.95592 8.26881 3.32214 8.32542 3.7226C8.43094 4.52265 8.62662 5.3082 8.90875 6.06427C9.02087 6.36254 9.04513 6.68669 8.97867 6.99833C8.91221 7.30997 8.7578 7.59602 8.53375 7.8226L7.47542 8.88093C8.66171 10.9672 10.3891 12.6946 12.4754 13.8809L13.5337 12.8226C13.7603 12.5985 14.0464 12.4441 14.358 12.3777C14.6697 12.3112 14.9938 12.3355 15.2921 12.4476C16.0481 12.7297 16.8337 12.9254 17.6337 13.0309C18.0386 13.088 18.4083 13.2919 18.6725 13.6038C18.9368 13.9158 19.0772 14.3139 19.0671 14.7226Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p class="text-14 md:text-16">Обработать</p>
                </button>
              </li>
              <li class="mr-12 md:mr-16 last:mr-0">
                <button class="queries__action queries__action-trash flex items-center px-12 py-8 font-medium bg-light-600 border border-light-900 rounded-8" name="removing" value="yes" type="submit">
                  <svg class="mr-8 md:w-24 md:h-24" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M2.5 5H4.16667H17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.6665 4.99996V3.33329C6.6665 2.89127 6.8421 2.46734 7.15466 2.15478C7.46722 1.84222 7.89114 1.66663 8.33317 1.66663H11.6665C12.1085 1.66663 12.5325 1.84222 12.845 2.15478C13.1576 2.46734 13.3332 2.89127 13.3332 3.33329V4.99996M15.8332 4.99996V16.6666C15.8332 17.1087 15.6576 17.5326 15.345 17.8451C15.0325 18.1577 14.6085 18.3333 14.1665 18.3333H5.83317C5.39114 18.3333 4.96722 18.1577 4.65466 17.8451C4.3421 17.5326 4.1665 17.1087 4.1665 16.6666V4.99996H15.8332Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8.3335 9.16663V14.1666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11.6665 9.16663V14.1666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p class="text-14 md:text-16">Удалить</p>
                </button>
              </li>
            </ul>
          </div>
        </form>
      <?php endif; ?>
    </div>
  </section>
  <script src="/src/js/common/dropdown.js"></script>
  <script src="/src/js/admin/changeUserdataInit.js"></script>
  <script src="/src/js/admin/queries/addNote.js"></script>
  <script src="/src/js/admin/queries/education/queriesActions.js"></script>
  <script src="/src/js/admin/queries/education/searchControl.js"></script>
</body>

</html>