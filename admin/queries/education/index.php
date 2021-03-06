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

if (isset($_POST['addNote'])) {
  $value = htmlspecialchars(trim($_POST['addNoteValue']));
  $data->createUserNote($value, $user['id']);
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

$queries = $data->getQueries('Education', 'id');

if (isset($_POST['processing']) && $_POST['processing'] === 'yes') {
  handleQuery($_POST['query__id'], 'Обработано');
}

if (isset($_POST['undoProcessing']) && $_POST['undoProcessing'] == 'yes') {
  handleQuery($_POST['query__id'], 'Не обработано');
}

if (isset($_POST['archiving']) && $_POST['archiving'] === 'yes') {
  handleQuery($_POST['query__id'], 'Архивировано');
}

if (isset($_POST['removing']) && $_POST['removing'] === 'yes') {
  handleQuery($_POST['query__id'], 'Удалено');
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>ODOSPK • Заявки • Обучение</title>
</head>

<body class="w-full h-screen flex leading-none bg-light-600 overflow-hidden">
  <?php includeTemplate('sections/aside.php', ['user' => $user, 'asideMenu' => $asideMenu]) ?>
  <section class="w-full px-24 py-24 font-medium text-black-900">
    <h1 class="text-32 md:text-48 font-bold">Заявки • Обучение</h1>
    <div class="w-full h-[92%] flex items-center md:items-start relative flex-col mt-16 md:mt-24 p-16 rounded-16 bg-light-400 shadow-section">
      <?php includeTemplate('sections/queries_header.php', ['userNotes' => $userNotes, 'queriesTabs' => $queriesTabs]) ?>
      <ul class="flex items-center lg:w-full mt-16 font-medium headerSortBy__parent">
        <li class="headerSortBy lg:max-w-[151px] xl:max-w-[160px] lg:min-w-[151px] md:min-w-[130px] md:max-w-[130px] xl:min-w-[160px] flex items-center border-2 border-light-900 border-collapse px-12 py-8 rounded-tl-8 rounded-bl-8 cursor-pointer" data-sortByValue="id">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M3.33325 7.5H16.6666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.33325 12.5H16.6666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M8.33341 2.5L6.66675 17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M13.3334 2.5L11.6667 17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words text-14 xl:text-16">Номер</p>
        </li>
        <li class="headerSortBy lg:max-w-[264px] xl:max-w-[336px] lg:min-w-[264px] md:min-w-[250px] md:max-w-[250px] xl:min-w-[336px] flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 cursor-pointer" data-sortByValue="course">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M3.92139 16.25C3.92139 15.6975 4.14088 15.1676 4.53158 14.7769C4.92228 14.3861 5.45219 14.1667 6.00472 14.1667H17.2547" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6.00472 1.66666H17.2547V18.3333H6.00472C5.45219 18.3333 4.92228 18.1138 4.53158 17.7231C4.14088 17.3324 3.92139 16.8025 3.92139 16.25V3.74999C3.92139 3.19746 4.14088 2.66755 4.53158 2.27685C4.92228 1.88615 5.45219 1.66666 6.00472 1.66666V1.66666Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words text-14 xl:text-16">Курс или программа</p>
        </li>
        <li class="headerSortBy lg:max-w-[222px] xl:max-w-[245px] lg:min-w-[222px] md:min-w-[195px] md:max-w-[195px] xl:min-w-[245px] flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 cursor-pointer" data-sortByValue="client">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M17.5264 17.5V15.8333C17.5264 14.9493 17.1753 14.1014 16.5501 13.4763C15.925 12.8512 15.0772 12.5 14.1931 12.5H7.52645C6.64239 12.5 5.79455 12.8512 5.16943 13.4763C4.5443 14.1014 4.19312 14.9493 4.19312 15.8333V17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10.8599 9.16667C12.7009 9.16667 14.1933 7.67428 14.1933 5.83333C14.1933 3.99238 12.7009 2.5 10.8599 2.5C9.019 2.5 7.52661 3.99238 7.52661 5.83333C7.52661 7.67428 9.019 9.16667 10.8599 9.16667Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words text-14 xl:text-16">Фамилия и имя</p>
        </li>
        <li class="headerSortBy lg:max-w-[168px] xl:max-w-[197px] lg:min-w-[168px] md:min-w-[150px] md:max-w-[150px] xl:min-w-[197px] flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 cursor-pointer" data-sortByValue="phone">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M18.5827 14.1V16.6C18.5836 16.8321 18.5361 17.0618 18.4431 17.2745C18.3502 17.4871 18.2138 17.678 18.0428 17.8349C17.8718 17.9918 17.6699 18.1112 17.45 18.1856C17.2301 18.26 16.9972 18.2876 16.766 18.2667C14.2017 17.988 11.7385 17.1118 9.57437 15.7083C7.5609 14.4289 5.85382 12.7218 4.57437 10.7083C3.16602 8.53435 2.28958 6.05917 2.01604 3.48334C1.99522 3.2529 2.0226 3.02064 2.09646 2.80136C2.17031 2.58208 2.28902 2.38058 2.44501 2.20969C2.60101 2.0388 2.79088 1.90227 3.00253 1.80878C3.21419 1.71529 3.44299 1.66689 3.67437 1.66668H6.17437C6.5788 1.6627 6.97087 1.80591 7.27751 2.06962C7.58415 2.33333 7.78444 2.69955 7.84104 3.10001C7.94656 3.90007 8.14225 4.68562 8.42437 5.44168C8.53649 5.73995 8.56076 6.06411 8.4943 6.37574C8.42783 6.68738 8.27343 6.97344 8.04937 7.20001L6.99104 8.25834C8.17734 10.3446 9.90475 12.072 11.991 13.2583L13.0494 12.2C13.2759 11.976 13.562 11.8216 13.8736 11.7551C14.1853 11.6886 14.5094 11.7129 14.8077 11.825C15.5638 12.1071 16.3493 12.3028 17.1494 12.4083C17.5542 12.4655 17.9239 12.6693 18.1882 12.9813C18.4524 13.2932 18.5928 13.6913 18.5827 14.1Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words text-14 xl:text-16">Телефон</p>
        </li>
        <li class="headerSortBy lg:max-w-[138px] xl:max-w-[169px] lg:min-w-[138px] md:min-w-[138px] md:max-w-[138px] xl:min-w-[169px] flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 cursor-pointer" data-sortByValue="date">
          <svg class="lg:w-20 lg:h-20 mr-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
            <path d="M16.6261 3.33334H4.95939C4.03892 3.33334 3.29272 4.07954 3.29272 5.00001V16.6667C3.29272 17.5872 4.03892 18.3333 4.95939 18.3333H16.6261C17.5465 18.3333 18.2927 17.5872 18.2927 16.6667V5.00001C18.2927 4.07954 17.5465 3.33334 16.6261 3.33334Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M14.126 1.66666V4.99999" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.45947 1.66666V4.99999" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.29272 8.33334H18.2927" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words text-14 xl:text-16">Дата</p>
        </li>
        <li class="headerSortBy lg:max-w-[155px] xl:max-w-[171px] lg:min-w-[155px] md:min-w-[140px] md:max-w-[140px] xl:min-w-[171px] flex items-center border-2 border-light-900 border-collapse -ml-2 px-12 py-8 rounded-tr-8 rounded-br-8 cursor-pointer" data-sortByValue="status">
          <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
            <path d="M11.2508 1.66666L2.91748 11.6667H10.4175L9.58415 18.3333L17.9175 8.33332H10.4175L11.2508 1.66666Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="break-words ml-8">Статус</p>
        </li>
      </ul>
      <?php if (!empty($queries) && is_array($queries)) : ?>
        <form class="w-full md:w-[77%] xl:w-[80%] h-[90%]  mt-12 md:mt-16 relative" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
          <ul class="sortEduQueriesResult overflow-y-scroll scrollbar h-[424px] md:h-[542px] xl:h-[690px]">
            <?php includeTemplate('elements/queries/query_edu.php', ['queries' => $queries]) ?>
          </ul>
          <div class="animate__animated animate__fadeInUp animate__fast queries__actions w-full font-bold shadow-lg p-12 xl:p-16 bg-light-400 absolute bottom-0 border border-light-900 rounded-8 md:rounded-12">
            <h3 class="text-18 xl:text-24">Управление заявкой</h3>
            <p class="mt-8 text-14 xl:text-16 text-black-800">Действия, доступные для выбранной заявки</p>
            <ul class="mt-16 xl:mt-24 flex items-center">
              <li class="mr-12 md:mr-16 last:mr-0">
                <button class="queries__action flex items-center px-12 py-8 md:py-[10px] md:px-16 font-medium bg-light-600 border border-light-900 rounded-8" name="undoProcessing" value="yes" type="submit">
                  <svg class="mr-8 xl:w-24 xl:h-24" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 25" fill="none">
                    <path d="M1.25214 4.46509V10.4651H7.25214" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3.76214 15.465C4.41053 17.3054 5.63947 18.8852 7.26379 19.9664C8.88811 21.0476 10.8198 21.5716 12.7679 21.4595C14.7159 21.3474 16.5747 20.6052 18.0643 19.3448C19.5538 18.0844 20.5934 16.374 21.0264 14.4714C21.4593 12.5688 21.2622 10.577 20.4648 8.79614C19.6673 7.01528 18.3127 5.54183 16.605 4.5978C14.8973 3.65377 12.929 3.2903 10.9968 3.56215C9.06459 3.83401 7.27305 4.72646 5.89214 6.10504L1.25214 10.465" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p class="text-14 xl:text-16">Отменить обработку</p>
                </button>
              </li>
              <li class="mr-12 md:mr-16 last:mr-0">
                <button class="queries__action flex items-center px-12 py-8 md:py-[10px] md:px-16 font-medium bg-light-600 border border-light-900 rounded-8" name="processing" value="yes" type="submit">
                  <svg class="mr-8 xl:w-24 xl:h-24" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M18.3332 9.2333V9.99997C18.3321 11.797 17.7503 13.5455 16.6743 14.9848C15.5983 16.4241 14.0859 17.477 12.3626 17.9866C10.6394 18.4961 8.79755 18.4349 7.1119 17.8121C5.42624 17.1894 3.98705 16.0384 3.00897 14.5309C2.03089 13.0233 1.56633 11.24 1.68457 9.4469C1.80281 7.65377 2.49751 5.94691 3.66507 4.58086C4.83263 3.21482 6.41049 2.26279 8.16333 1.86676C9.91616 1.47073 11.7501 1.65192 13.3915 2.3833" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.3333 3.33337L10 11.675L7.5 9.17504" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p class="text-14 xl:text-16">Обработать</p>
                </button>
              </li>
              <li class="mr-12 md:mr-16 last:mr-0">
                <button class="queries__action flex items-center px-12 py-8 md:py-[10px] md:px-16 font-medium bg-light-600 border border-light-900 rounded-8" name="archiving" value="yes" type="submit">
                  <svg class="mr-8 xl:w-24 xl:h-24" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M13.75 7.8333L6.25 3.5083" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M17.5 13.3333V6.66663C17.4997 6.37435 17.4225 6.0873 17.2763 5.83426C17.13 5.58122 16.9198 5.37109 16.6667 5.22496L10.8333 1.89163C10.58 1.74535 10.2926 1.66833 10 1.66833C9.70744 1.66833 9.42003 1.74535 9.16667 1.89163L3.33333 5.22496C3.08022 5.37109 2.86998 5.58122 2.72372 5.83426C2.57745 6.0873 2.5003 6.37435 2.5 6.66663V13.3333C2.5003 13.6256 2.57745 13.9126 2.72372 14.1657C2.86998 14.4187 3.08022 14.6288 3.33333 14.775L9.16667 18.1083C9.42003 18.2546 9.70744 18.3316 10 18.3316C10.2926 18.3316 10.58 18.2546 10.8333 18.1083L16.6667 14.775C16.9198 14.6288 17.13 14.4187 17.2763 14.1657C17.4225 13.9126 17.4997 13.6256 17.5 13.3333Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.7251 5.80005L10.0001 10.0084L17.2751 5.80005" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M10 18.4V10" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p class="text-14 xl:text-16">Архивировать</p>
                </button>
              </li>
              <li class="mr-12 md:mr-16 last:mr-0">
                <button class="queries__action queries__action-trash flex items-center px-12 py-8 md:py-[10px] md:px-16 font-medium bg-light-600 border border-light-900 rounded-8" name="removing" value="yes" type="submit">
                  <svg class="mr-8 xl:w-24 xl:h-24" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M2.5 5H4.16667H17.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.6665 4.99996V3.33329C6.6665 2.89127 6.8421 2.46734 7.15466 2.15478C7.46722 1.84222 7.89114 1.66663 8.33317 1.66663H11.6665C12.1085 1.66663 12.5325 1.84222 12.845 2.15478C13.1576 2.46734 13.3332 2.89127 13.3332 3.33329V4.99996M15.8332 4.99996V16.6666C15.8332 17.1087 15.6576 17.5326 15.345 17.8451C15.0325 18.1577 14.6085 18.3333 14.1665 18.3333H5.83317C5.39114 18.3333 4.96722 18.1577 4.65466 17.8451C4.3421 17.5326 4.1665 17.1087 4.1665 16.6666V4.99996H15.8332Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8.3335 9.16663V14.1666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11.6665 9.16663V14.1666" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p class="text-14 xl:text-16">Удалить</p>
                </button>
              </li>
            </ul>
          </div>
        </form>
      <?php else : ?>
        <div class="flex items-center animate__animated animate__fadeIn mt-12">
          <div class="flex flex-col items-center">
            <img class="w-[360px] h-[360px]" src="/src/img/landing/illustrations/order-error.svg" alt="error-image">
            <h3 class="text-24 font-bold">Ой, кажется здесь ничего нет :(</h3>
            <p class="mt-8 text-16 text-black-800">Пользователи пока что не оставили заявок на обучение</p>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <script src="/src/js/common/jquery.min.js"></script>
  <script src="/src/js/ajax/admin/sortEduQueries.js"></script>
  <script src="/src/js/common/dropdown.js"></script>
  <script src="/src/js/admin/changeUserdataInit.js"></script>
  <script src="/src/js/admin/queries/addNote.js"></script>
  <script src="/src/js/ajax/admin/directSearch.js"></script>
  <script src="/src/js/admin/queries/education/queriesActions.js"></script>
  <script src="/src/js/admin/queries/education/searchControl.js"></script>
</body>

</html>