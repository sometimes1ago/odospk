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

$courses = $data->getCoursesList();
$feedbacks = $data->getFeedbacksAuthors();
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
  <title>ODOSPK • Управление данными</title>
</head>

<body class="w-full h-screen flex leading-none bg-light-600">
  <?php includeTemplate('sections/aside.php', ['asideMenu' => $asideMenu, 'user' => $user]) ?>
  <section class="w-full px-24 relative py-24 font-medium text-black-900">
    <h1 class="text-32 md:text-48 font-bold">Управление данными</h1>
    <div class="h-[92%] mt-16 p-16 rounded-16 bg-light-400 shadow-section">
      <ul class="flex items-center">
        <li class="mr-16 last:mr-0">
          <a class="data__pill data__pill-active" href="/admin/data/change/">Изменить</a>
        </li>
        <li class="mr-16 last:mr-0">
          <a class="data__pill" href="/admin/data/add/">Добавить</a>
        </li>
        <li class="mr-16 last:mr-0">
          <a class="data__pill" href="/admin/data/remove/">Удалить</a>
        </li>
      </ul>
      <ul class="flex items-start mt-24">
        <li class="mr-24 last:mr-0">
          <form autocomplete="off" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="wow animate__animated animate__fadeInLeft w-fit px-12 pt-12 pb-16 bg-light-600 rounded-12 border border-light-900">
            <h2 class="lg:text-20 md:text-24 font-bold">Изменение программы</h2>
            <p class="lg:mt-8 lg:text-16 md:text-18 leading-tight text-black-800">Выберите программу, что заменить <br> и введите новое значение</p>
            <label class="dropdown__label mb-12 mt-24 lg:text-18 font-bold dark:text-light-400" data-dropdownIndex="0">Выберите программу</label>
            <div class="dropdown dropdown__light z-[11]" data-index="0">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__changeProgValue" data-dropdownValue="<?= $courses[0]['name'] ?>"><?= $courses[0]['name'] ?></p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <?php if (!empty($courses)) : ?>
                <ul class="animate__animated animate__fadeIn animate__fast dropdown__options changeProgOptions">
                  <?php foreach ($courses as $course) : ?>
                    <li class="dropdown__option changeProgOption"><?= $course['name'] ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
            <label class="dropdown__label mb-12 mt-16 lg:text-18 font-bold dark:text-light-400" data-dropdownIndex="1">Свойство программы</label>
            <div class="dropdown dropdown__light z-10" data-index="1">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__changeProgProp" data-dropdownValue="Наименование">Наименование</p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <ul class="animate__animated animate__fadeIn animate__fast  dropdown__options changeProgPropOptions">
                <li class="dropdown__option changeProgPropOption">Наименование</li>
                <li class="dropdown__option changeProgPropOption">Срок обучения</li>
                <li class="dropdown__option changeProgPropOption">Чему научитесь</li>
                <li class="dropdown__option changeProgPropOption">Выдаваемый документ</li>
                <li class="dropdown__option changeProgPropOption">Описание</li>
                <li class="dropdown__option changeProgPropOption">Стоимость</li>
                <li class="dropdown__option changeProgPropOption">Тип программы</li>
              </ul>
            </div>
            <label for="changeProgramValue" class="block mb-12 mt-16 lg:text-18 font-bold dark:text-light-400">Введите значение</label>
            <input type="text" id="changeProgramValue" class="changeProgramValue w-full text-14 font-medium px-12 py-[11px] md:py-16 md:text-16 border outline-brand-900 outline-2 ad:rounded-8 md:rounded-12 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="1000">
            <div class="dropdown dropdown__prog-diploma-type dropdown__light z-[9]" data-index="2">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__program-diploma-type__value" data-dropdownValue="Сертификат">Сертификат</p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <ul class="animate__animated animate__fadeIn animate__fast  dropdown__options courseDiplomaTypeOptions">
                <li class="dropdown__option courseDiplomaTypeOption">Сертификат</li>
                <li class="dropdown__option courseDiplomaTypeOption">Свидетельство</li>
              </ul>
            </div>
            <div class="dropdown dropdown__prog-course-type dropdown__light z-[9]" data-index="3">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__program-course-type__value" data-dropdownValue="Курс">Курс</p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <ul class="animate__animated animate__fadeIn animate__fast  dropdown__options courseTypeOptions">
                <li class="dropdown__option courseTypeOption">Курс</li>
                <li class="dropdown__option courseTypeOption">Профессиональная подготовка</li>
              </ul>
            </div>
            <input class="changeProgramSender w-full text-14 tb:mt-24 lg:mt-28 md:mt-36 md:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="changeProgSend" value="Изменить">
          </form>
        </li>
        <li class="mr-24 last:mr-0">
          <form data-wow-delay="0.3s" autocomplete="off" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="wow animate__animated animate__fadeInLeft w-fit px-12 pt-12 pb-16 bg-light-600 rounded-12 border border-light-900">
            <h2 class="lg:text-20 md:text-24 font-bold">Изменение отзыва</h2>
            <p class="lg:mt-8 lg:text-16 md:text-18 leading-tight text-black-800">Выберите отзыв, что заменить <br> и введите новое значение</p>
            <label class="dropdown__label mb-12 mt-24 lg:text-18 font-bold dark:text-light-400" data-dropdownIndex="4">Автор отзыва</label>
            <div class="dropdown dropdown__light z-[11]" data-index="4">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__changeFeedbackValue" data-dropdownValue="<?= $feedbacks[0]['author'] ?>"><?= $feedbacks[0]['author'] ?></p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <?php if (!empty($feedbacks)) : ?>
                <ul class="animate__animated animate__fadeIn animate__fast  dropdown__options changeFeedbackOptions">
                  <?php foreach ($feedbacks as $feedback) : ?>
                    <li class="dropdown__option changeFeedbackOption"><?= $feedback['author'] ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
            <label class="dropdown__label mb-12 mt-16 lg:text-18 font-bold dark:text-light-400" data-dropdownIndex="5">Свойство отзыва</label>
            <div class="dropdown dropdown__light z-10" data-index="5">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__changeFeedbackProp" data-dropdownValue="Автор отзыва">Автор отзыва</p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <ul class="animate__animated animate__fadeIn animate__fast  dropdown__options changeFeedbackPropOptions">
                <li class="dropdown__option changeFeedbackPropOption">Автор отзыва</li>
                <li class="dropdown__option changeFeedbackPropOption">Содержание отзыва</li>
              </ul>
            </div>
            <label for="changFeedbackValue" class="block mb-12 mt-16 lg:text-18 font-bold dark:text-light-400">Введите значение</label>
            <input type="text" id="changFeedbackValue" class="changFeedbackValue w-full text-14 font-medium px-12 py-[11px] md:py-16 md:text-16 border outline-brand-900 outline-2 ad:rounded-8 md:rounded-12 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Новое значение">
            <input class="changeFeedbackSender w-full text-14 tb:mt-24 lg:mt-28 md:mt-36 md:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="changeFeedbackSend" value="Изменить">
          </form>
        </li>
        <li class="mr-24 last:mr-0">
          <?php if ($user['access_code'] > 2) : ?>
            <form data-wow-delay="0.6s" autocomplete="off" action="<?= $_SERVER['PHP_SELF'] ?>" class="wow animate__animated animate__fadeInLeft w-fit px-12 pt-12 pb-16 bg-light-600 rounded-12 border border-light-900">
              <h2 class="lg:text-20 md:text-24 font-bold">Данные пользователя</h2>
              <p class="lg:mt-8 lg:text-16 md:text-18 leading-tight text-black-800">Выберите пользователя, что <br> заменить и введите новое значение</p>
              <label class="dropdown__label mb-12 mt-24 lg:text-18 font-bold dark:text-light-400" data-dropdownIndex="6">Выберите пользователя</label>
              <div class="dropdown dropdown__light z-[11]" data-index="6">
                <div class="dropdown__btn">
                  <p class="dropdown__btn-text dropdown__changeUserValue" data-dropdownValue="<?= $users[0]['name'] ?>"><?= $users[0]['name'] ?></p>
                  <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                    <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                  </svg>
                </div>
                <?php if (!empty($users)) : ?>
                  <ul class="animate__animated animate__fadeIn animate__fast  dropdown__options changeUserOptions">
                    <?php foreach ($users as $user) : ?>
                      <li class="dropdown__option changeUserOption"><?= $user['name'] ?></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>
              <label class="dropdown__label mb-12 mt-16 lg:text-18 font-bold dark:text-light-400" data-dropdownIndex="7">Свойство пользователя</label>
              <div class="dropdown dropdown__light z-10" data-index="7">
                <div class="dropdown__btn">
                  <p class="dropdown__btn-text dropdown__changeUserProp" data-dropdownValue="Имя">Имя</p>
                  <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                    <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                  </svg>
                </div>
                <ul class="animate__animated animate__fadeIn animate__fast  dropdown__options changeUserPropOptions">
                  <li class="dropdown__option changeUserPropOption">Имя</li>
                  <li class="dropdown__option changeUserPropOption">Логин</li>
                  <li class="dropdown__option changeUserPropOption">Пароль</li>
                  <li class="dropdown__option changeUserPropOption">Эл. почту</li>
                  <li class="dropdown__option changeUserPropOption">Уровень доступа</li>
                </ul>
              </div>
              <label for="changeUserValue" class="block mb-12 mt-16 lg:text-18 font-bold dark:text-light-400">Введите значение</label>
              <input type="text" id="changeUserValue" class="changeUserValue w-full text-14 font-medium px-12 py-[11px] md:py-16 md:text-16 border outline-brand-900 outline-2 ad:rounded-8 md:rounded-12 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Новое значение">
              <div class="dropdown dropdown__changeUserAccess dropdown__light z-[9]" data-index="8">
                <div class="dropdown__btn">
                  <p class="dropdown__btn-text dropdown__changeUserAccessValue" data-dropdownValue="Оператор">Оператор</p>
                  <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                    <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                  </svg>
                </div>
                <ul class="animate__animated animate__fadeIn animate__fast  dropdown__options accessLevelOptions">
                  <li class="dropdown__option accessLevelOption">Оператор</li>
                  <li class="dropdown__option accessLevelOption">Контент менеджер</li>
                  <li class="dropdown__option accessLevelOption">Администратор</li>
                </ul>
              </div>
              <input class="changeUserSender w-full text-14 tb:mt-24 lg:mt-28 md:mt-36 md:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="changeUserSend" value="Изменить">
            </form>
          <?php endif; ?>
        </li>
      </ul>
    </div>
    <div class="responseContainer absolute flex flex-col justify-end items-end w-[320px] h-48 bottom-24 right-24"></div>
  </section>
  <script src="/src/js/common/jquery.min.js"></script>
  <script src="/src/js/common/validate.js"></script>
  <script src="/src/js/common/error.js"></script>
  <script src="/src/js/admin/changeUserdataInit.js"></script>
  <script src="/src/js/common/dropdown.js"></script>
  <script src="/src/js/common/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="/src/js/ajax/admin/data/change/changeProgram.js"></script>
  <script src="/src/js/ajax/admin/data/change/changeFeedback.js"></script>
  <script src="/src/js/ajax/admin/data/change/changeUser.js"></script>
</body>

</html>