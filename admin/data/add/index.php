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
  <title>ODOSPK • Управление данными</title>
</head>

<body class="w-full h-screen flex font-medium leading-none bg-light-600">
  <?php includeTemplate('sections/aside.php', ['asideMenu' => $asideMenu, 'user' => $user]) ?>
  <section class="w-full px-24 py-24 font-medium text-black-900">
    <h1 class="text-32 md:text-48 font-bold">Управление данными</h1>
    <div class="w-full h-[92%] flex items-center relative flex-col mt-16 p-16 rounded-16 bg-light-400 shadow-section">
      <ul class="flex items-center self-start">
        <li class="mr-16 last:mr-0">
          <a class="data__pill" href="/admin/data/change/">Изменить</a>
        </li>
        <li class="mr-16 last:mr-0">
          <a class="data__pill data__pill-active" href="/admin/data/add/">Добавить</a>
        </li>
        <li class="mr-16 last:mr-0">
          <a class="data__pill" href="/admin/data/remove/">Удалить</a>
        </li>
      </ul>
      <ul class="add__slider mt-16 md:mt-24">
        <li class="add__slider-item w-full h-full">
          <form action="<?=$_SERVER['PHP_SELF']?>" class="w-full h-full p-12 md:p-16 bg-light-600 border border-light-900 rounded-12" method="POST">
            <h2 class="text-20 md:text-24 font-bold">Добавление программы</h2>
            <p class="mt-8 md:mt-12 text-16 md:text-18 text-black-800 leading-tight">Заполните все поля, чтобы добавить <br> новую программу на сайт</p>
            <ul class="w-full mt-24 md:mt-32">
              <li class="mb-16 md:mb-24">
                <ul class="flex justify-between">
                  <li class="w-full mr-16 last:mr-0">
                    <label for="addProgName" class="text-16 md:text-20 font-bold">Наименование</label>
                    <input type="text" id="addProgName" class="addProgName w-full mt-12 text-14 md:text-16 font-medium px-12 py-[11px] md:py-[13px] border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Какая-то новая программа" required>
                  </li>
                  <li class="w-full mr-16 last:mr-0">
                    <label for="addProdLengthAcad" class="text-16 md:text-20 font-bold">Срок обучения</label>
                    <input type="text" id="addProdLengthAcad" class="addProdLengthAcad w-full mt-12 text-14 md:text-16 font-medium px-12 py-[11px] md:py-[13px] border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Сколько учиться" required>
                  </li>
                  <li class="w-full mr-16 last:mr-0">
                    <label class="dropdown__label mb-12 text-16 md:text-20 font-bold dark:text-light-400" data-dropdownIndex="0">Тип программы</label>
                    <div class="dropdown dropdown__light z-10" data-index="0">
                      <div class="dropdown__btn">
                        <p class="dropdown__btn-text dropdown__addProgCourseType" data-dropdownValue="Курс">Курс</p>
                        <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                          <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                        </svg>
                      </div>
                      <ul class="dropdown__options">
                        <li class="dropdown__option addProgCourseTypeOption">Курс</li>
                        <li class="dropdown__option addProgCourseTypeOption">Профессиональная подготовка</li>
                      </ul>
                    </div>
                  </li>
                  <li class="w-full mr-16 last:mr-0">
                    <label class="dropdown__label mb-12 lg:text-16 md:text-20 font-bold dark:text-light-400" data-dropdownIndex="1">Выдаваемый документ</label>
                    <div class="dropdown dropdown__light z-[9]" data-index="1">
                      <div class="dropdown__btn">
                        <p class="dropdown__btn-text dropdown__addProgDiplomaType" data-dropdownValue="Сертификат">Сертификат</p>
                        <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                          <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                        </svg>
                      </div>
                      <ul class="dropdown__options">
                        <li class="dropdown__option addProgDiplomaTypeOption">Сертификат</li>
                        <li class="dropdown__option addProgDiplomaTypeOption">Свидетельство</li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="flex md:mt-24">
                <div class="w-full flex flex-col mr-16">
                  <label for="addProdSkills" class="text-16 md:text-20 font-bold">Чему научитесь</label>
                  <textarea class="lg:h-[95px] md:h-[150px] font-medium lg:mt-12 md:mt-16 text-14 md:text-16 rounded-8 resize-none border border-light-900" name="addProdSkills" id="addProdSkills" placeholder="Навыки слушателя после прохождения обучения" required></textarea>
                  <label for="addProdDescription" class="mt-16 md:mt-24 text-16 md:text-20 font-bold">Описание программы</label>
                  <textarea class="lg:h-[95px] md:h-[150px] font-medium  lg:mt-12 md:mt-16 text-14 md:text-16 rounded-8 resize-none border border-light-900" name="addProdDescription" id="addProdDescription" placeholder="Какое-то описание программы" required></textarea>
                </div>
                <div class="w-1/4">
                  <label for="addProdPrice" class="block text-16 md:text-20 font-bold">Стоимость</label>
                  <input type="text" id="addProdPrice" class="addProdPrice w-full mt-12 text-14 md:text-16 font-medium px-12 py-[11px] xl:py-16 xl:text-16 border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="1000 ₽" required>
                  <input class="w-full text-14 mt-16 md:text-16 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] md:mt-24 rounded-8 cursor-pointer hover:shadow-btn" name="addNewProd" type="submit" value="Добавить">
                </div>
              </li>
            </ul>
          </form>
        </li>
        <li class="add__slider-item w-full flex">
          <form action="<?=$_SERVER['PHP_SELF']?>" class="w-full p-12 bg-light-600 border border-light-900 rounded-12 mr-24" method="POST">
            <h2 class="text-20 md:text-24 font-bold">Добавление отзыва</h2>
            <p class="mt-8 text-16 md:text-18 text-black-800 leading-tight">Заполните все поля, чтобы добавить <br> новый отзыв на сайт</p>
            <label for="addFeedbackName" class="block mt-24 text-16 md:text-20 font-bold">Автор отзыва</label>
            <input type="text" name="addFeedbackName" id="addFeedbackName" class="w-full mt-12 text-14 md:text-16 font-medium px-12 py-[11px] md:py-[17px] border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Фамилия Имя" required>
            <label for="addFeedbackContent" class="block mt-16 text-16 md:text-20 font-bold">Содержание отзыва</label>
            <textarea class="w-full lg:h-[100px] font-medium  md:h-[200px] lg:mt-12 md:mt-16 text-14 md:text-16 rounded-8 resize-none border border-light-900" name="addFeedbackContent" id="addFeedbackContent" placeholder="Впечатление слушателя" required></textarea>
            <input class="w-full text-14 mt-16 md:text-16 font-medium text-light-400 bg-brand-900 py-[15px] md:py-[17px] rounded-8 cursor-pointer hover:shadow-btn" name="addNewFeedbackSender" type="submit" value="Добавить">
          </form>
          <?php if ($user['access_code'] > 2) : ?>
            <form action="" class="w-full h-fit p-12 bg-light-600 border border-light-900 rounded-12" method="POST">
              <h2 class="text-20 font-bold">Добавление пользователя</h2>
              <p class="mt-8 md:mt-12 text-16 text-black-800 leading-tight">Заполните все поля, чтобы добавить <br> новый отзыв на сайт</p>
              <ul class="flex mt-24">
                <li class="w-full mr-24">
                  <label for="addUserName" class="text-16 md:text-18 font-bold">Имя сотрудника</label>
                  <input type="text" name="addUserName" id="addUserName" class="w-full mt-12 text-14 font-medium px-12 md:px-16 py-[11px] md:py-[13px] md:text-16 border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Иван" required>
                  <label for="addUserLogin" class="block mt-16 text-16 md:text-18 font-bold">Логин</label>
                  <input type="text" name="addUserLogin" id="addUserLogin" class="w-full mt-12 text-14 font-medium px-12 md:px-16 py-[11px] md:py-[13px] md:text-16 border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Userlogin" required>
                  <label for="addUserPassword" class="block mt-16 text-16 md:text-18 font-bold">Пароль</label>
                  <input type="text" name="addUserPassword" id="addUserPassword" class="w-full mt-12 text-14 font-medium md:px-16 px-12 py-[11px] md:py-[13px] md:text-16 border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="Userpassword" required>
                </li>
                <li class="w-full">
                  <label class="dropdown__label mb-12 lg:text-16 font-bold dark:text-light-400" data-dropdownIndex="3">Уровень доступа</label>
                  <div class="dropdown dropdown__light z-10" data-index="3">
                    <div class="dropdown__btn">
                      <p class="dropdown__btn-text dropdown__addUserAccess" data-dropdownValue="Оператор">Оператор</p>
                      <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                        <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                      </svg>
                    </div>
                    <ul class="dropdown__options">
                      <li class="dropdown__option addUserAccessOption">Оператор</li>
                      <li class="dropdown__option addUserAccessOption">Контент менеджер</li>
                      <li class="dropdown__option addUserAccessOption">Администратор</li>
                    </ul>
                  </div>
                  <label for="addUserEmail" class="block mt-16 text-16 md:text-18 font-bold">Эл. почта</label>
                  <input type="text" name="addUserEmail" id="addUserEmail" class="w-full mt-12 text-14 font-medium px-12 py-[11px] md:py-[13px] md:text-16 border outline-brand-900 outline-2 rounded-8 border-light-900 bg-light-400 placeholder:text-black-800" placeholder="example@mail.ru" required>
                  <input class="w-full text-14 mt-[44px] md:text-16 font-medium text-light-400 bg-brand-900 py-[15px] md:py-[17px] rounded-8 cursor-pointer hover:shadow-btn" name="addNewUserSender" type="submit" value="Добавить">
                </li>
              </ul>
            </form>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </section>
  <script src="/src/js/admin/changeUserdataInit.js"></script>
  <script src="/src/js/common/dropdown.js"></script>
  <script src="/src/js/common/jquery.min.js"></script>
  <script src="/src/js/common/slick.min.js"></script>
  <script src="/src/js/common/scriptSlick.js"></script>
</body>

</html>