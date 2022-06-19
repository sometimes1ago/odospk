<?php

require $_SERVER['DOCUMENT_ROOT'] . '/core.php';

if (isset($_SESSION['user'])) {
  header('Location: /admin/queries/education/');
}

if (isset($_POST['submit'])) {
  if (authorize(
    $_POST['login'], 
    $_POST['password'], 
    '/admin/queries/education/'
  )) {
    header('Location: ' . '/admin/queries/education/');
  } else {
    $errors[] = 'Неправильный логин или пароль!';
  }
}

if (isset($_POST['submitRestore'])) {
  $email = htmlspecialchars(trim($_POST['email']));

  $query = Database::Instance()->fetch(
    'SELECT `login`, `password` FROM `users` WHERE `email` = :email',
    ['email' => $email]
  );

  if (!empty($query)) {
    $succeded[] = 'На данный email отправлены данные для входа';
    mail($email, 'Данные для входа', 'Ваш логин: ' . $query['login'] . PHP_EOL . 'Ваш пароль: ' . $query['password']);
  } else {
    $errors[] = 'Пользователя с таким email не существует';
  }
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
  <title>ODOSPK • Вход</title>
</head>
<body class="flex items-center justify-center flex-col relative font-medium text-black-900 leading-none">
  <img class="w-screen h-screen brightness-65" src="/src/img/bg/flower-field.jpg" alt="auth-background">
  <form class="w-[300px] md:w-[336px] flex flex-col items-center absolute p-12 md:p-16 rounded-12 md:rounded-16 bg-light-400" action="" method="post">
    <h1 class="text-22 md:text-24">Вход в систему</h1>
    <p class="text-16 mt-8 md:text-18 text-black-800 text-center leading-tight">Авторизуйтесь чтобы получить доступ к панели администратора</p>
    <?php if (!empty($errors)) :?>
      <div class="animate__animated animate__fadeInDown w-full mt-16 rounded-8 p-12 bg-state-error">
        <p class="text-14 text-light-400 break-words"><?=array_shift($errors)?></p>
      </div>
    <?php endif; ?>
    <?php if (!empty($succeded)) : ?>
      <div class="animate__animated animate__fadeInDown w-full mt-16 rounded-8 p-12 bg-state-success">
        <p class="text-14 text-light-400 break-words"><?=array_shift($succeded)?></p>
      </div>
    <?php endif; ?>
    <label for="login" class="mt-24 md:mt-32 text-18 md:text-20">Ваш логин</label>
    <input type="text" name="login" id="login" class="w-full p-[11px] md:p-[13px] border border-light-900 bg-light-600 rounded-8 md:rounded-12 mt-12 md:mt-16" placeholder="Userlogin" required>
    <label for="password" class="mt-16 md:mt-24 text-18 md:text-20">Ваш пароль</label>
    <div class="w-full h-48 md:h-52 flex items-center border border-light-900 mt-12 md:mt-16 bg-light-600 rounded-8 md:rounded-12">
      <input class="password__input w-[85%] h-[46px] md:h-[50px] border-none bg-light-600 rounded-8 md:rounded-12 focus:ring-2" type="password" name="password" id="password" placeholder="Userpassword" required>
      <svg class="show__password w-20 h-20 ml-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
        <path d="M0.833252 9.99992C0.833252 9.99992 4.16658 3.33325 9.99992 3.33325C15.8333 3.33325 19.1666 9.99992 19.1666 9.99992C19.1666 9.99992 15.8333 16.6666 9.99992 16.6666C4.16658 16.6666 0.833252 9.99992 0.833252 9.99992Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M10 12.5C11.3807 12.5 12.5 11.3807 12.5 10C12.5 8.61929 11.3807 7.5 10 7.5C8.61929 7.5 7.5 8.61929 7.5 10C7.5 11.3807 8.61929 12.5 10 12.5Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
    <input class="w-full text-14 mt-20 md:mt-28 md:text-16 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="submit" value="Войти">
    <p class="dataRestore__init mt-24 text-14 md:text-16 text-black-800 cursor-pointer">Не можете войти?</p>
  </form>
  <div class="dataRestore__filter absolute w-screen h-screen bg-[#000] opacity-50"></div>
  <form class="animate__animated animate__fadeIn dataRestore__form absolute w-[420px] md:w-[460px] bg-light-400 rounded-12 md:rounded-16" action="" method="post">
    <div class="relative p-12 md:p-16">
      <svg class="dataRestore__closer w-18 h-18 top-12 right-8 absolute shrink-0 cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
        <path d="M13.5 4.5L4.5 13.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M4.5 4.5L13.5 13.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <h2 class="text-20 md:text-24">Восстановление данных</h2>
      <p class="text-black-800 mt-8 leading-tight">Введите Email пользователя, на который <br> будут отправлены данные для входа</p>
      <label class="inline-block mt-24 text-18 md:text-20" for="email">Введите Email</label>
      <div class="w-full mt-12 md:mt-16 flex items-center">
        <input class="w-full p-[11px] md:p-[13px] border border-light-900 rounded-8 font-medium" type="email" name="email" id="email" placeholder="User@mail.ru" required>
        <input class="w-2/5 ml-16 text-14 md:text-16 font-medium text-light-400 bg-brand-900 py-[17px] md:py-18 rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="submitRestore" value="Отправить">
      </div>
    </div>
  </form>
  <script src="/src/js/admin/dataRestore.js"></script>
  <script src="/src/js/admin/auth/showPass.js"></script>
</body>
</html>