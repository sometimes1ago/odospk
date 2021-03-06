<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';
$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/src/img/gallery/';

if (!isset($_SESSION['user'])) {
  header('Location: /admin/');
}

if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
  unset($_SESSION['user']);
  session_destroy();
  header('Location: /admin/');
}

if (isset($_POST['removePhoto']) && $_POST['removePhoto'] == 'yes') {
  $preparedPhotoId = htmlspecialchars(substr(trim($_POST['photo-id']), 6));

  $filename = Database::Instance()->fetch(
    'SELECT `name` FROM `gallery` WHERE `id` = :id',
    ['id' => $preparedPhotoId]
  );

  Database::Instance()->query(
    'DELETE FROM `gallery` WHERE `id` = :id',
    ['id' => $preparedPhotoId]
  );

  Loader::RemoveFile($uploadPath, $filename['name']);
  
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

if (isset($_POST['file-sender'])) {
  Database::Instance()->query(
    'INSERT INTO gallery(name) VALUES (:name)',
    ['name' => $_FILES['file-form']['name']]
  );

  Loader::UploadFile($uploadPath);

  header('Location: ' . $_SERVER['REQUEST_URI']);
}

$user = $_SESSION['user'];
$data = new Data(Database::Instance());
$photos = Database::Instance()->fetchAll('SELECT * FROM `gallery`');

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
  <title>ODOSPK ??? ??????????????</title>
</head>
<body class="w-full h-screen relative text-black-900 font-medium flex leading-none bg-light-600">
  <?php includeTemplate('sections/aside.php', ['user' => $user, 'asideMenu' => $asideMenu]) ?>
  <section class="w-full px-24 py-24 font-medium text-black-900">
    <h1 class="text-32 md:text-48 font-bold">???????????????????? ????????????????</h1>
    <div class="w-full h-[92%] flex relative flex-col mt-16 md:mt-24 p-16 rounded-16 bg-light-400 shadow-section">
      <h2 class="text-24 md:text-28 font-bold">???????????? ????????????????????</h2>
      <p class="mt-8 text-16 md:text-18 text-black-800">???????????????????? ???????????????????????? ???? ?????????????? ?? ????????????????</p>
      <form class="relative" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <ul class="w-full mt-16 h-[460px] md:h-[730px] flex flex-wrap scrollbar overflow-y-scroll">
          <li class="upload__init gallery__item w-[196px] md:w-[303px] h-[142px] md:h-[232px] flex items-center justify-center bg-brand-900 mr-16 mb-16 last:mr-0 last:mb-0 rounded-8 md:rounded-12 cursor-pointer hover:shadow-btn">
            <svg class="w-18 md:w-24 h-18 md:h-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" fill="none">
              <path d="M19.183 3.61243H5.18298C4.07841 3.61243 3.18298 4.50786 3.18298 5.61243V19.6124C3.18298 20.717 4.07841 21.6124 5.18298 21.6124H19.183C20.2876 21.6124 21.183 20.717 21.183 19.6124V5.61243C21.183 4.50786 20.2876 3.61243 19.183 3.61243Z" stroke="#FEFEFE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M12.183 8.61243V16.6124" stroke="#FEFEFE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M8.18298 12.6124H16.183" stroke="#FEFEFE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="ml-8 text-14 md:text-18 text-light-400 font-bold">???????????????? ????????</p>
          </li>
          <?php includeTemplate('elements/gallery/gallery_item.php', ['photos' => $photos]) ?>
        </ul>
        <div class="animate__animated animate__fadeInUp animate__fast gallery__actions w-full absolute mt-auto bottom-0 p-12 md:p-16 bg-light-400 border border-light-900 rounded-8 shadow-xl">
          <h3 class="text-20 md:text-24 font-bold">???????????????????? ??????????????????????</h3>
          <p class="mt-8 text-14 md:text-18 text-black-800">???????????????? ?????????????????? ?? ??????????????????????</p>
          <ul class="flex mt-16 md:mt-24">
            <li class="mr-16 last:mr-0">
              <button type="submit" name="removePhoto" value="yes" class="queries__trash-clear flex items-center px-12 py-8 font-medium bg-state-error border border-state-error rounded-8">
                <svg class="mr-8 md:w-24 md:h-24" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                  <path d="M2.5 5H4.16667H17.5" stroke="#fefefe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.6665 4.99996V3.33329C6.6665 2.89127 6.8421 2.46734 7.15466 2.15478C7.46722 1.84222 7.89114 1.66663 8.33317 1.66663H11.6665C12.1085 1.66663 12.5325 1.84222 12.845 2.15478C13.1576 2.46734 13.3332 2.89127 13.3332 3.33329V4.99996M15.8332 4.99996V16.6666C15.8332 17.1087 15.6576 17.5326 15.345 17.8451C15.0325 18.1577 14.6085 18.3333 14.1665 18.3333H5.83317C5.39114 18.3333 4.96722 18.1577 4.65466 17.8451C4.3421 17.5326 4.1665 17.1087 4.1665 16.6666V4.99996H15.8332Z" stroke="#fefefe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M8.3335 9.16663V14.1666" stroke="#fefefe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M11.6665 9.16663V14.1666" stroke="#fefefe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p class="text-14 md:text-18 text-light-400">??????????????</p>
              </button>
            </li>
          </ul>
        </div>
      </form>
    </div>
  </section>
  <div class="upload__filter"></div>
  <form class="animate__animated animate__fadeIn animate__fast upload__modal top-1/2 left-1/2 -trans" method="POST" enctype="multipart/form-data">
    <h2 class="text-24 font-bold">???????????????? ????????????????????</h2>
    <p class="text-16 md:text-18 mt-8 text-black-800">?????? ???????????????? ???????????????? ???????????????????? ?? ?????????????? png, jpg, jpeg</p>
    <div class="mt-24 flex flex-col">
      <p class="inline-block text-18 md:text-20 font-bold">???????????????? ????????</p>
      <label for="file-form" class="mt-12 p-12 bg-light-600 rounded-8 border border-light-900 hover:bg-brand-900 hover:border-brand-900 hover:text-light-400 cursor-pointer">???????? ???? ????????????</label>
      <input type="file" name="file-form" id="file-form" class="hidden">
    </div>
    <div class="flex mt-16 md:mt-24">
      <input type="submit" name="file-sender" value="??????????????????" class="file-sender w-1/2 mr-16 p-12 font-bold text-14 md:text-16 bg-brand-900 rounded-8 text-light-400 hover:shadow-btn cursor-pointer">
      <button type="button" class="upload__closer w-1/2 bg-light-700 p-12 md:text-16 font-bold rounded-8 border border-light-900 hover:shadow-xl">????????????</button>
    </div>
  </form>
  <script src="/src/js/common/dropdown.js"></script>
  <script src="/src/js/admin/changeUserdataInit.js"></script>
  <script src="/src/js/admin/gallery/actions.js"></script>
  <script src="/src/js/admin/gallery/loaderModal.js"></script>
</body>
</html>