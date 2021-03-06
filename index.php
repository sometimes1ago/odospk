<?php

require 'core.php';

$data = new Data(Database::Instance());
$courses = $data->getCourses('Курс');
$programs = $data->getCourses('Профессиональная подготовка');
$currentProgram = $data->getCourseData($courses[0]['name']);

$gallery = $data->getPhotos();
$feedbacks = $data->getFeedbacks();

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
  <link rel="stylesheet" href="/src/css/toggle-switchy.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>Отделение дополнительного образования</title>
</head>

<body class="w-full flex flex-col items-center relative bg-light-500 text-black-900 font-medium leading-none dark:bg-dark-900 dark:text-light-900">
  <script src="/src/js/common/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <header id="head" class="w-full relative ad:mb-36 tb:mb-[60px] lg:mb-48 md:mb-56 xl:mb-[80px]">
    <div class="menu__button">
      <span class="menu__lines"></span>
      <p class="menu__name">Меню</p>
    </div>
    <div class="theme__switcher fixed p-8 top-16 ad:right-16 lg:right-32 flex items-center bg-light-700 rounded-8 border border-light-900 dark:bg-dark-700 dark:border-dark-700">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mr-12 ad:block tb:hidden" viewBox="0 0 24 24" fill="none">
        <path class="dark:stroke-light-400 dark:fill-light-400" d="M21 13.5C21 15 20.2039 16.1144 19.1582 17.4668C18.1126 18.8192 16.7035 19.8458 15.0957 20.4265C13.4879 21.0073 11.748 21.1181 10.0795 20.7461C8.41101 20.3741 6.88299 19.5345 5.67422 18.3258C4.46545 17.117 3.62593 15.589 3.2539 13.9205C2.88187 12.252 2.99271 10.5121 3.57345 8.9043C4.1542 7.29651 5.18082 5.88737 6.53321 4.84175C7.88559 3.79614 9.50779 3.15731 11.21 3C10.2134 4.34827 9.73384 6.00945 9.85852 7.68141C9.98321 9.35338 10.7039 10.9251 11.8894 12.1106C13.0749 13.2961 14.6466 14.0168 16.3186 14.1415C17.9905 14.2662 17 14.1415 19.1582 13.9205L21 13.5Z" fill="#252525" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <p class="ad:hidden tb:block text-16 mr-12 dark:text-light-400">Ночной режим</p>
      <label class="darkmode__toggle toggle-switchy" for="darkmode__btn" data-size="sm" data-style="rounded" data-text="false">
        <input class="darkmode__checkbox" type="checkbox" id="darkmode__btn">
        <span class="toggle">
          <span class="switch"></span>
        </span>
      </label>
    </div>
    <div id="menu" class="menu">
      <ul class="menu__content animate__animated animate__fadeIn">
        <li class="menu__content-col menu__nav">
          <h2 class="menu__content-header menu__nav-header">Навигация</h3>
            <ul class="menu__list-links">
              <li class="menu__link-item">
                <a href="#head" class="menu__link">
                  <h4 class="menu__link-header">главная</h4>
                  <p class="menu__link-description">начало вашего пути</p>
                </a>
              </li>
              <li class="menu__link-item">
                <a href="#about" class="menu__link">
                  <h4 class="menu__link-header">о нас</h4>
                  <p class="menu__link-description">кто мы и чем занимаемся</p>
                </a>
              </li>
              <li class="menu__link-item">
                <a href="#courses" class="menu__link">
                  <h4 class="menu__link-header">курсы</h4>
                  <p class="menu__link-description">то, ради чего Вы здесь</p>
                </a>
              </li>
              <li class="menu__link-item">
                <a href="#feedbacks" class="menu__link">
                  <h4 class="menu__link-header">отзывы</h4>
                  <p class="menu__link-description">впечатления наших учеников</p>
                </a>
              </li>
              <li class="menu__link-item">
                <a href="#contacts" class="menu__link">
                  <h4 class="menu__link-header">контакты</h4>
                  <p class="menu__link-description">пароли и явки для связи</p>
                </a>
              </li>
            </ul>
            <h2 class="menu__content-header menu__socials">Социальные сети</h2>
            <ul class="menu__list-socials">
              <li class="menu__socials-item">
                <a href="https://vk.com/odospk" class="menu__socials-link">
                  <svg xmlns="http://www.w3.org/2000/svg" class="menu__socials-icon" viewBox="0 0 28 28" fill="none">
                    <path class="dark:fill-light-900" d="M18.297 0H9.7019C1.8584 0 -0.000976562 1.85938 -0.000976562 9.70288V18.298C-0.000976562 26.1415 1.8584 28.0009 9.7019 28.0009H18.297C26.1405 28.0009 27.9999 26.1415 27.9999 18.298V9.70288C27.9999 1.85938 26.1221 0 18.297 0ZM22.6038 19.9745H20.5711C19.8011 19.9745 19.564 19.3637 18.1789 17.9602C16.9758 16.7939 16.4429 16.639 16.1463 16.639C15.7271 16.639 15.6081 16.7571 15.6081 17.332V19.1686C15.6081 19.6612 15.4533 19.957 14.1495 19.957C11.9935 19.957 9.60127 18.6532 7.9239 16.2243C5.39427 12.6648 4.70215 9.99862 4.70215 9.44738C4.70215 9.15075 4.82027 8.87337 5.3899 8.87337H7.4269C7.94227 8.87337 8.13827 9.1105 8.33865 9.66175C9.34577 12.5694 11.0231 15.1165 11.7153 15.1165C11.9708 15.1165 12.0889 14.9984 12.0889 14.3465V11.3435C12.011 9.95837 11.2821 9.83937 11.2821 9.34762C11.2821 9.1105 11.4781 8.87337 11.7923 8.87337H14.9956C15.4288 8.87337 15.588 9.1105 15.588 9.62062V13.6719C15.588 14.1094 15.784 14.2642 15.9021 14.2642C16.1576 14.2642 16.3764 14.1094 16.8498 13.6351C18.3128 11.9945 19.361 9.46488 19.361 9.46488C19.4975 9.16825 19.7346 8.89087 20.25 8.89087H22.287C22.8978 8.89087 23.0343 9.205 22.8978 9.6425C22.6423 10.8273 20.1494 14.3456 20.1494 14.3456C19.935 14.7009 19.8528 14.8558 20.1494 15.2521C20.3681 15.5487 21.0795 16.1639 21.5529 16.7151C22.4235 17.7039 23.0929 18.5334 23.2714 19.1074C23.4718 19.677 23.176 19.9736 22.6011 19.9736L22.6038 19.9745Z" fill="#252525" />
                  </svg>
                </a>
              </li>
              <li class="menu__socials-item">
                <a href="https://ok.ru/otdeldopol" class="menu__socials-link">
                  <svg xmlns="http://www.w3.org/2000/svg" class="menu__socials-icon" viewBox="0 0 28 28" fill="none">
                    <path class="dark:fill-light-900" d="M11.5125 9.06875C11.5125 7.6875 12.6313 6.56875 14 6.56875C15.3687 6.56875 16.4875 7.6875 16.4875 9.06875C16.4875 10.4438 15.3687 11.5562 14 11.5562C12.6313 11.5562 11.5125 10.4375 11.5125 9.06875ZM28 3V25C28 26.6562 26.6562 28 25 28H3C1.34375 28 0 26.6562 0 25V3C0 1.34375 1.34375 0 3 0H25C26.6562 0 28 1.34375 28 3ZM8.93125 9.06875C8.93125 11.8563 11.2063 14.125 14 14.125C16.7938 14.125 19.0688 11.8625 19.0688 9.06875C19.0688 6.26875 16.7938 4 14 4C11.2063 4 8.93125 6.2625 8.93125 9.06875ZM19.8375 14.7375C19.55 14.1687 18.7562 13.6875 17.7062 14.5125C17.7062 14.5125 16.2875 15.6375 14 15.6375C11.7125 15.6375 10.2937 14.5125 10.2937 14.5125C9.24375 13.6875 8.45 14.1687 8.1625 14.7375C7.66875 15.7437 8.23125 16.2188 9.5 17.05C10.5813 17.7437 12.075 18 13.0375 18.1L12.2312 18.9062C11.0938 20.0312 10.0125 21.125 9.25 21.8875C8.15 22.9875 9.91875 24.75 11.025 23.675L14.0063 20.6812C15.1438 21.8188 16.2375 22.9125 16.9875 23.675C18.0875 24.75 19.8625 23.0063 18.775 21.8875L15.7937 18.9062L14.9812 18.1C15.95 18 17.425 17.7312 18.4937 17.05C19.7687 16.2188 20.325 15.7375 19.8375 14.7375Z" fill="#252525" />
                  </svg>
                </a>
              </li>
              <li class="menu__socials-item">
                <a href="https://wa.me/79039274044" class="menu__socials-link">
                  <svg xmlns="http://www.w3.org/2000/svg" class="menu__socials-icon" viewBox="0 0 28 28" fill="none">
                    <path class="dark:fill-light-900" d="M14 5.675C9.45625 5.675 5.7625 9.36875 5.75625 13.9125C5.75625 15.4688 6.19375 16.9875 7.01875 18.2938L7.2125 18.6063L6.38125 21.6437L9.5 20.825L9.8 21.0063C11.0625 21.7563 12.5125 22.1562 13.9937 22.1562H14C18.5375 22.1562 22.3312 18.4625 22.3312 13.9187C22.3312 11.7188 21.3813 9.65 19.825 8.09375C18.2625 6.53125 16.2 5.675 14 5.675ZM18.8438 17.45C18.6375 18.0312 17.65 18.5562 17.175 18.625C16.3875 18.7437 15.775 18.6812 14.2063 18.0063C11.725 16.9312 10.1 14.4312 9.975 14.2687C9.85 14.1062 8.9625 12.925 8.9625 11.7063C8.9625 10.4875 9.6 9.8875 9.83125 9.6375C10.0563 9.3875 10.325 9.325 10.4937 9.325C10.6562 9.325 10.825 9.325 10.9688 9.33125C11.1187 9.3375 11.325 9.275 11.525 9.75625C11.7312 10.25 12.225 11.4688 12.2875 11.5938C12.35 11.7188 12.3937 11.8625 12.3062 12.025C11.8312 12.975 11.325 12.9375 11.5813 13.375C12.5375 15.0188 13.4937 15.5875 14.95 16.3188C15.2 16.4438 15.3438 16.425 15.4875 16.2563C15.6313 16.0938 16.1062 15.5312 16.2687 15.2875C16.4312 15.0375 16.6 15.0813 16.825 15.1625C17.05 15.2438 18.2687 15.8438 18.5187 15.9688C18.7687 16.0938 18.9312 16.1562 18.9937 16.2563C19.05 16.375 19.05 16.875 18.8438 17.45ZM25 0H3C1.34375 0 0 1.34375 0 3V25C0 26.6562 1.34375 28 3 28H25C26.6562 28 28 26.6562 28 25V3C28 1.34375 26.6562 0 25 0ZM13.9937 23.825C12.3312 23.825 10.7 23.4062 9.25625 22.6187L4 24L5.40625 18.8625C4.5375 17.3625 4.08125 15.6562 4.08125 13.9062C4.0875 8.44375 8.53125 4 13.9937 4C16.6437 4 19.1313 5.03125 21.0063 6.90625C22.875 8.78125 24 11.2687 24 13.9187C24 19.3813 19.4562 23.825 13.9937 23.825Z" fill="#252525" />
                  </svg>
                </a>
              </li>
            </ul>
        </li>
        <li class="menu__content-col menu__map">
          <h2 class="menu__content-header menu__map-header">Наши контакты</h2>
          <iframe class="menu__map-frame" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aaffdf134588f4f17bc68ba6e62806797ee2d56eb6d5e20b04c5d759c750403c8&amp;source=constructor" width="578" height="289" loading="lazy" frameborder="1"></iframe>
          <ul class="menu__list-contacts">
            <li class="menu__contacts-item">
              <h3 class="menu__contacts-header">Адрес</h3>
              <p class="menu__contacts-description">Омск, ул. Добролюбова, <br>
                д.15, кабинет №77
              </p>
            </li>
            <li class="menu__contacts-item">
              <h3 class="menu__contacts-header">Телефоны</h3>
              <p class="menu__contacts-description">+7 (903) 927-40-44 <br>
                +7 (3812) 35-67-04
              </p>
            </li>
            <li class="menu__contacts-item">
              <h3 class="menu__contacts-header">Часы работы</h3>
              <p class="menu__contacts-description">В будние дни с 8:30 <br>
                до 17:00
              </p>
            </li>
          </ul>
        </li>
        <li class="menu__content-col menu__help">
          <h2 class="menu__content-header menu__help-header">Нужна наша помощь?</h2>
          <p class="menu__help-subhead">Оставьте заявку на обратный звонок. Мы свяжемся с вами в ближайшее время</p>
          <form autocomplete="off" action="<?= $_SERVER['PHP_SELF'] ?>" class="menu__help-form" method="POST">
            <div class="burger__request-errors"></div>
            <div class="burger__request-form">
              <ul class="menu__help-inputs">
                <li>
                  <label for="customerName" class="menu__help-label">Ваше имя и фамилия</label>
                  <input type="text" name="customerName" id="customerName" class="menu__help-input menu__help-clientname md:text-16 border border-light-900 focus:ring-1 focus:ring-brand-900" placeholder="Иван Иванов">
                </li>
                <li class="menu__help-item">
                  <label for="customerPhone" class="menu__help-label">Ваш телефон</label>
                  <input type="tel" name="customerPhone" id="customerPhone" class="menu__help-input menu__help-clientphone md:text-16 border border-light-900 focus:ring-1 focus:ring-brand-900" placeholder="+7 923 900 90 90">
                </li>
              </ul>
              <div class="menu__help-checkbox">
                <input type="checkbox" name="burger__request-agreement" id="burger__request-agreement" class="burger__request-agreement shrink-0 rounded-[5px] form-checkbox w-[18px] h-[18px] border-black-900 border-2" checked>
                <label for="burger__request-agreement" class="text-14 md:text-16 ml-8 md:ml-16 md:mt-8 text-black-900 shrink-1 leading-tight dark:text-light-400">Я согласен(а) на обработку моих личных данных</label>
              </div>
              <input class="menu__help-sender w-full text-14 tb:mt-24 lg:mt-28 md:mt-36 md:text-16 xl:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="sendHelpRequest" value="Позвоните мне">
              <button type="button" class="menu__help-modal-start w-full ad:mt-24 text-14 font-bold text-light-400 bg-brand-900 py-[17px] rounded-8 cursor-pointer hover:shadow-btn">Заказать звонок</button>
            </div>
            <div class="burger__request-result"></div>
          </form>
        </li>
      </ul>
    </div>
    <div class="menu__overlay"></div>
    <div class="w-full ad:flex ad:flex-col lg:flex-row tb:items-center lg:justify-between ad:mt-[80px] md:mt-[100px] xl:mt-[128px]">
      <div class="ad:mt-12 ph:w-[390px] tb:w-[470px] lg:w-[498px] md:w-[592px] xl:w-[750px] flex flex-col tb:items-center lg:items-start ad:order-2 lg:order-1 ad:px-16 tb:px-0 lg:pl-32 xl:pl-48">
        <h1 class="wow animate__animated animate__fadeInDown ad:text-32 ph:text-36 tb:text-52 tb:text-center lg:text-left md:text-64 xl:text-82 leading-none font-bold -tracking-wide dark:text-light-400">Отделение <br> дополнительного <br> образования</h1>
        <p data-wow-delay="0.5s" class="wow animate__animated animate__fadeInDown ad:mt-16 tb:mt-24 md:mt-32 ad:text-16 ph:text-18 tb:text-center lg:text-left md:text-20 xl:text-22 xl:w-[573px] text-black-800 leading-tight dark:text-light-800">Мы приглашаем всех желающих пройти обучение на наших курсах и программах профессиональной подготовки, по окончании которых вы получите подтверждающий сертификат</p>
        <a data-wow-delay="1s" href="#courses" class="wow animate__animated animate__fadeIn block w-fit px-24 py-20 ad:mt-24 ph:mt-36 tb:text-18 lg:text-16 md:text-18 md:mt-48 md:px-32 md:py-24 ad:rounded-8 md:rounded-12 bg-brand-900 text-light-400 hover:shadow-btn font-bold">Смотреть курсы и программы</a>
      </div>
      <img src="/src/img/landing/illustrations/offer-img.png" class="animate__animated animate__fadeInRight ad:order-1 lg:order-2 ad:w-full ad:h-[280px] ph:w-[380px] ph:h-[310px] tb:w-[700px] tb:h-[500px] lg:w-3/5 lg:h-2/5 md:w-[890px] md:h-[600px] xl:w-[1040px] xl:h-[710px] dark:brightness-90" alt="Offer img">
    </div>
  </header>
  <section id="about" class="w-full ad:px-16 lg:px-32 ad:mt-36 ad:mb-36 tb:mt-[60px] tb:mb-[60px] lg:mt-48 lg:mb-48 md:mt-56 md:mb-56 xl:mb-[80px] flex flex-col items-center justify-center">
    <h2 class="ad:text-left ad:self-start tb:self-center tb:text-center ad:text-28 tb:text-36 md:text-48 xl:text-52 font-bold tracking-tight dark:text-light-400">Кто мы и чем занимаемся</h2>
    <p class="ad:text-left tb:text-center tb:w-[625px] lg:w-[730px] md:w-[812px] xl:w-[900px] ad:mt-12 md:mt-16 ad:text-16 tb:text-18 md:text-20 xl:text-22 text-black-800 text-center leading-tight dark:text-light-900">Мы распологаем большим выбором программ обучения, среди которых обязательно найдется нужная именно Вам! Все программы реализуются в нашем колледже под руководством наставников с многолетним опытом работы</p>
    <?php if (isset($gallery) && !empty($gallery)) : ?>
      <div class="wow animate__animated animate__fadeIn gallery-slider ad:mt-36 tb:mt-48 md:mt-56 xl:mt-64 bg-light-500 shadow-slider">
        <?php foreach ($gallery as $photo) : ?>
          <img class="gallery-slider__item dark:brightness-90" src="/src/img/gallery/<?= $photo['name'] ?>" alt="Gallery Slider Item" loading="lazy">
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <ul class="tb:w-5/6 lg:w-11/12 md:w-5/6 flex tb:justify-between ad:flex-col tb:flex-row ad:mt-[120px] tb:mt-[86px] lg:mt-64 md:mt-[120px]">
      <li class=" tb:w-1/2 xl:w-5/12 tb:mr-48 flex flex-col">
        <div class="wow animate__animated animate__fadeInUp flex ad:flex-col ad:items-start lg:flex-row">
          <img src="/src/img/landing/illustrations/simple.svg" class="ad:w-[136px] ad:h-[136px] lg:w-[148px] lg:h-[148px] xl:w-[164px] xl:h-[164px] dark:brightness-90" alt="Simplicity" loading="lazy">
          <div class="ad:w-11/12 tb:w-10/12 lg:w-3/5 xl:w-[425px] lg:ml-32 ad:mt-24">
            <h3 class="ad:text-24 md:text-28 font-bold tracking-tight dark:text-light-400">Простота</h3>
            <p class="ad:mt-8 xl:mt-12 lg:text-16 md:text-18 xl:text-20 text-black-800 leading-tight dark:text-light-900">Наши программы созданы таким образом, чтобы не вызывать затруднений у слушателей и быть им интересными</p>
          </div>
        </div>
        <div class="wow animate__animated animate__fadeInUp ad:mt-48 tb:mt-64 lg:mt-[84px] md:mt-[96px] flex ad:flex-col ad:items-start lg:flex-row">
          <img src="/src/img/landing/illustrations/quality.svg" class="ad:w-[136px] ad:h-[136px] lg:w-[148px] lg:h-[148px] xl:w-[164px] xl:h-[164px] dark:brightness-90" alt="Quality" loading="lazy">
          <div class="ad:w-11/12 tb:w-10/12 lg:w-3/5 xl:w-[400px] lg:ml-32 ad:mt-24">
            <h3 class="ad:text-24 md:text-28 font-bold tracking-tight dark:text-light-400">Качество</h3>
            <p class="ad:mt-8 xl:mt-12 lg:text-16 md:text-18 xl:text-20 text-black-800 leading-tight dark:text-light-800">Все наши образовательные программы проверены временем и отзывами
              о высоком качестве наших методик
              и подходов обучения слушателей</p>
          </div>
        </div>
      </li>
      <li class="tb:w-1/2 xl:w-5/12 flex flex-col ad:mt-48 tb:mt-0">
        <div class="wow animate__animated animate__fadeInUp flex ad:flex-col ad:items-start lg:flex-row">
          <img src="/src/img/landing/illustrations/price.svg" class="ad:w-[136px] ad:h-[136px] lg:w-[148px] lg:h-[148px] xl:w-[164px] xl:h-[164px] dark:brightness-90" alt="Cost" loading="lazy">
          <div class="ad:w-11/12 tb:w-10/12 lg:w-3/5 lg:ml-32 ad:mt-24">
            <h3 class="ad:text-24 md:text-28 font-bold tracking-tight dark:text-light-400">Стоимость</h3>
            <p class="ad:mt-8 xl:mt-12 xl:w-[366px] lg:text-16 md:text-18 xl:text-20 text-black-800 leading-tight dark:text-light-800">Для вашего удобства, реализуемые нами программы отличаются возможностью оплаты обучения в рассрочку</p>
          </div>
        </div>
        <div class="wow animate__animated animate__fadeInUp ad:mt-48 tb:mt-64 lg:mt-[84px] flex ad:flex-col ad:items-start lg:flex-row">
          <img src="/src/img/landing/illustrations/proff.svg" class="ad:w-[136px] ad:h-[136px] lg:w-[148px] lg:h-[148px] xl:w-[164px] xl:h-[164px] dark:brightness-90" alt="Professionality" loading="lazy">
          <div class="ad:w-11/12 tb:w-10/12 lg:w-3/5 lg:ml-32 ad:mt-24">
            <h3 class="ad:text-24 md:text-28 font-bold tracking-tight dark:text-light-400">Профессионализм</h3>
            <p class="ad:mt-8 xl:mt-12 xl:w-[412px] lg:text-16 md:text-18 xl:text-20 text-black-800 leading-tight dark:text-light-800">Опыт наших преподавателей позволит вам стать специалистом по выбранной программе обучения или курсу по вашему запросу</p>
          </div>
        </div>
      </li>
    </ul>
  </section>
  <section id="courses" class="w-full ad:px-16 ad:mt-36 ad:mb-36 lg:px-32 tb:mt-48 tb:mb-48 md:mt-56 lg:mb-48 md:mb-56 xl:mt-[80px] xl:mb-[80px] ad:flex ad:flex-col ad:items-start ad:justify-start tb:items-center tb:justify-center">
    <h2 class="ad:mt-36 tb:mt-48 ad:text-28 tb:text-36 md:text-48 xl:text-52 font-bold tracking-tight dark:text-light-400">Наши курсы и программы</h2>
    <p class="ad:w-11/12 tb:w-3/4 lg:w-[617px] md:w-[689px] xl:w-[755px] ad:mt-12 md:mt-16 text-18 md:text-20 xl:text-22 text-black-800 ad:text-start tb:text-center leading-tight dark:text-light-800">Список наших программ обучения, по которым вы можете получить дополнительное образование, профессиональную подготовку
      или повысить квалификацию</p>
    <div class="courses__mobile-begin w-full ad:mt-24 tb:mt-48 ad:p-12 tb:p-16 md:p-20 bg-light-700 ad:rounded-12 tb:rounded-16 lg:rounded-24 md:rounded-28 dark:bg-dark-800">
      <div class="w-full flex ad:flex-col lg:flex-row ad:flex-start lg:items-center justify-between">
        <div>
          <h3 class="ad:block ad:text-24 md:text-32 font-bold dark:text-light-400 tracking-tight">Список курсов</h3>
          <p class="ad:mt-8 ad:text-16 md:text-24 lg:text-18 leading-tight tracking-tight text-black-800 dark:text-light-800">Выбирайте курс из списка для получения подробной информации</p>
        </div>
      </div>
      <div class="w-full ad:flex ad:flex-col lg:flex-row lg:items-start lg:justify-between lg:mt-36">
        <?php if (!empty($courses) || !empty($programs)) : ?>
          <div class="courses__list ad:w-full ad:mt-24 lg:mt-0 ad:order-2 lg:order-1 lg:w-1/2 lg:mr-24 overflow-y-scroll">
            <h4 class="ad:text-20 tb:mt-0 md:text-24 font-bold dark:text-light-400 tracking-tight">Курсы</h4>
            <ul class="w-full ad:mt-12 md:mt-16">
              <?php for ($i = 0; $i < count($courses); $i++) : ?>
                <li class="courses__item <?= $i == 0 ? 'courses__item-active' : '' ?>" data-courseName="<?= $courses[$i]['name'] ?>"><?= $courses[$i]['name'] ?></li>
              <?php endfor; ?>
            </ul>
            <h4 class="ad:mt-24 ad:text-20 md:text-24 font-bold dark:text-light-400 tracking-tight">Профессиональная подготовка</h4>
            <ul class="courses w-full ad:mt-12 md:mt-16">
              <?php foreach ($programs as $program) : ?>
                <li class="courses__item" data-courseName="<?= $program['name'] ?>"><?= $program['name'] ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <div class="courses__description ad:w-full ad:mt-24 tb:mt-36 lg:mt-0 lg:w-1/2 ad:order-1 lg:order-2 ad:p-12 tb:p-16 md:p-20 xl:p-24 bg-light-500 ad:rounded-12 lg:rounded-20 md:rounded-24 border border-light-900 dark:bg-dark-700 dark:border-none">
          <div class="courses__get-result">
            <h3 class="courses__name ad:text-28 ph:text-32 md:text-36 xl:text-48 font-bold tracking-tight dark:text-light-400" data-courseName="<?= $currentProgram['name'] ?>"><?= $currentProgram['name'] ?></h3>
            <div class="courses__initial courses__initial-visible lg:pr-36 md:pr-[84px] xl:pr-[120px]">
              <ul class="text-content ad:mt-24 md:mt-32 xl:mt-36">
                <li class="lg:text-18 md:text-20 xl:text-22 text-black-800 leading-tight dark:text-light-800">
                  <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Срок обучения: </span>
                  <?= $currentProgram['name'] ?>
                </li>
                <li class="ad:mt-12 tb:mt-16 md:mt-20 xl:mt-24 lg:text-18 md:text-20 xl:text-24 text-black-800 leading-tight dark:text-light-800">
                  <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Выдаваемый документ: </span>
                  <?= $currentProgram['diplomaType'] ?>
                </li>
                <li class="ad:mt-12 tb:mt-16 md:mt-20 xl:mt-24 lg:text-18 md:text-20 xl:text-24 text-black-800 leading-tight dark:text-light-800">
                  <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Чему научитесь: </span>
                  <?= $currentProgram['skills'] ?>
                </li>
                <li class="ad:mt-12 tb:mt-16 md:mt-20 xl:mt-24 lg:text-18 md:text-20 xl:text-24 text-black-800 leading-tight dark:text-light-800">
                  <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Описание: </span>
                  <?= $currentProgram['description'] ?>
                </li>
                <li class="ad:mt-12 tb:mt-16 md:mt-20 xl:mt-24 lg:text-18 md:text-20 xl:text-24 text-black-800 leading-tight dark:text-light-800">
                  <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Стоимость: </span>
                  <?= $currentProgram['price'] ?> ₽
                </li>
              </ul>
              <button class="courseOrderBtn ad:w-full lg:w-1/2 mt-24 md:mt-32 xl:mt-36 text-16 font-bold md:text-18 xl:text-20 p-16 md:p-[22px] bg-brand-900 text-light-400 ad:rounded-8 xl:rounded-12 cursor-pointer lg:hover:shadow-btn">Записаться на курс</button>
            </div>
          </div>
          <div class="animate__animated animate__fadeIn animate__fast courses__requesting lg:w-2/3">
            <h3 class="ad:text-20 tb:text-24 md:text-32 ad:mt-16 lg:mt-20 font-bold dark:text-light-400">Запись на курс</h3>
            <p class="ad:text-14 lg:text-16 md:text-20 ad:mt-8 tb:mt-12 lg:mt-8 md:mt-12 leading-tight text-black-800 dark:text-light-900">Заполните все необходимые поля и отправьте заявку чтобы записаться на выбранный курс</p>
            <form autocomplete="off" action="<?= $_SERVER['PHP_SELF'] ?>" class="courseOrderSend w-full ad:mt-16 tb:mt-24 lg:mt-20 md:mt-28">
              <div class="courseErrorContainer"></div>
              <label for="clientName" class="ad:text-16 lg:text-18 md:text-24 font-bold dark:text-light-400">Ваше имя и фамилия</label>
              <input type="text" id="clientName" class="courseClientName w-full ad:text-16 md:text-18 px-12 py-[13px] md:py-[17.5px] md:px-16 font-medium leading-normal mt-12 xl:mt-16 border outline-brand-900 outline-2 rounded-8 md:rounded-12 border-light-900 bg-light-700 dark:text-light-900 placeholder:text-black-800 dark:border-dark-800 dark:bg-dark-800" placeholder="Иван Иванов">
              <label for="clientPhone" class="ad:text-16 lg:text-18 ad:mt-16 tb:mt-24 md:text-24 block font-bold dark:text-light-400">Ваш телефон</label>
              <input type="tel" id="clientPhone" class="courseClientPhone w-full ad:text-16 md:text-18 px-12 py-[13px] md:py-[17.5px] md:px-16 font-medium leading-normal mt-12 xl:mt-16 border outline-brand-900 outline-2 rounded-8 md:rounded-12 border-light-900 bg-light-700 dark:text-light-900 placeholder:text-black-800 dark:border-dark-800 dark:bg-dark-800" placeholder="+7 900 900 90 90">
              <div class="flex items-start ad:mt-16 md:mt-24">
                <input type="checkbox" name="agreement" id="agreement" class="courseAgreement form-checkbox lg:mt-[3px] lg:rounded-[4px] border-text-900 border-2" checked>
                <label for="agreement" class="ad:ml-8 lg:text-16 md:text-18 leading-tight text-black-900 accent-brand-900 dark:text-light-400">Я согласен на обработку моих личных данных</label>
              </div>
              <div class="flex ad:flex-col lg:flex-row ad:items-center mt-24 md:mt-32 xl:mt-36">
                <button type="submit" class="sendOrderBtn ad:w-full text-16 font-medium md:text-18 p-16 md:p-[21px] bg-brand-900 text-light-400 ad:rounded-8 md:rounded-12 cursor-pointer hover:shadow-btn">Записаться</button>
                <button type="button" class="cancelOrderBtn ad:w-full text-16 ad:ml-0 ad:mt-12 p-16 md:p-[21px] lg:mt-0 lg:ml-12 xl:ml-16 md:text-18 font-bold ad:rounded-8 md:rounded-12 cursor-pointer dark:text-light-400 bg-light-700 dark:bg-dark-800">Отмена</button>
              </div>
              <p class="ad:mt-16 ad:text-14 md:text-16 text-black-800 leading-tight dark:text-light-400">Все передаваемые вами данные защищены по ФЗ № 152</p>
            </form>
          </div>
          <div class="course__ordering-result"></div>
        </div>
      </div>
    </div>
    <div class="wow animate__animated animate__fadeInUp w-full flex ad:flex-col lg:flex-row lg:items-center lg:justify-between ad:mt-36 md:mt-48 ad:p-16 md:p-24 ad:rounded-12 lg:rounded-16 md:rounded-24 bg-brand-900 dark:bg-dark-800">
      <div class="lg:w-[350px] md:w-[390px] xl:w-[436px]">
        <h4 class="ad:text-20 tb:text-24 xl:text-32 text-light-400 font-bold dark:text-light-400">Не можете выбрать курс?</h4>
        <p class="ad:mt-8 lg:mt-8 lg:text-16 md:text-18 xl:text-20 ad:font-medium lg:font-light lg:leading-tight md:leading-8 text-light-400 dark:text-light-800">Оставьте заявку на обратный звонок. <br class="ad:hidden lg:inline">
          Мы свяжемся с вами в ближайшее время
          и поможем в выборе курса или программы</p>
      </div>
      <form autocomplete="off" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="ad:mt-16 lg:mt-0 lg:w-3/5 md:w-1/2 p-12 md:p-16 md:px-20 bg-light-400 rounded-12 md:rounded-16 dark:bg-dark-700">
        <div class="courses__call-order-content">
          <ul class="courses__call-order-inputs flex ad:flex-col lg:flex-row ad:items-start lg:items-center">
            <li class="ad:w-full lg:mr-24 xl:mr-28 flex flex-col">
              <label class="ad:text-18 xl:text-22 dark:text-light-400" for="helperClientName">Ваше имя и фамилия</label>
              <input class="coursesCallClientName ad:mt-12 xl:mt-16 lg:px-12 md:px-16 ad:py-[10px] md:py-18 md:text-18 bg-light-600 border border-light-900 focus:border-brand-900 ad:rounded-8 md:rounded-12 placeholder:text-black-800 dark:border-dark-800 dark:bg-dark-800" type="text" name="helperClientName" id="helperClientName" placeholder="Иван Иванов">
            </li>
            <li class="ad:w-full ad:mt-16 lg:mt-0 lg:mr-24 xl:mr-28 flex flex-col">
              <label class="ad:text-18 xl:text-22 dark:text-light-400" for="helperClientPhone">Ваш телефон</label>
              <input class="coursesCallClientPhone ad:mt-12 xl:mt-16 lg:px-12 md:px-16 ad:py-[10px] md:py-18 md:text-18 bg-light-600 border border-light-900 focus:border-brand-900 ad:rounded-8 md:rounded-12 placeholder:text-black-800 dark:border-dark-800 dark:bg-dark-800" type="tel" name="helperClientPhone" id="helperClientPhone" placeholder="+7 900 900 90 90">
            </li>
            <li class="ad:w-full ad:self-start lg:self-end ad:mt-24">
              <button class="coursesCallSender ad:w-full ad:px-16 lg:px-24 md:px-32 ad:py-16 md:py-[22px] md:text-18 bg-brand-900 text-light-400 ad:rounded-8 md:rounded-12 lg:hover:shadow-btn dark:bg-brand-900 dark:text-light-400 dark:hover:shadow-btn dark:hover:outline-none font-bold" type="submit">Позвоните мне</button>
            </li>
          </ul>
          <div class="courses__call-order-errors"></div>
          <div class="flex ad:items-center xl:items-start ad:mt-12 md:mt-16">
            <svg xmlns="http://www.w3.org/2000/svg" class="ad:w-24 ad:h-24 shrink-0" viewBox="0 0 24 24" fill="none">
              <path class="dark:stroke-light-400" d="M9.99996 18.3334C14.6023 18.3334 18.3333 14.6025 18.3333 10.0001C18.3333 5.39771 14.6023 1.66675 9.99996 1.66675C5.39759 1.66675 1.66663 5.39771 1.66663 10.0001C1.66663 14.6025 5.39759 18.3334 9.99996 18.3334Z" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path class="dark:stroke-light-400" d="M10 6.66675V10.0001" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path class="dark:stroke-light-400" d="M10 13.3333H10.0083" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="shrink-1 ad:ml-8 md:ml-12 text-black-800 ad:text-12 lg:text-14 md:text-18 leading-tight tracking-wide dark:text-light-400">Отправляя данную форму вы автоматически согласны на обработку персональных данных</p>
          </div>
        </div>
        <div class="courses__call-order-result flex items-center ad:flex-col lg:flex-row lg:justify-between">
          <div class="animate__animated animate__fadeIn">
            <h4 class="ad:text-18 tb:text-20 md:text-24 font-bold text-black-900 dark:text-light-400">Скоро услышимся!</h4>
            <p class="ad:mt-8 md:mt-12 ad:text-16 xl:text-18 text-black-800 leading-tight dark:text-light-800">Мы свяжемся с вами по указанному телефону</p>
          </div>
          <button type="button" class="coursesCallOrderSucceded ad:w-full lg:w-2/5 lg:ml-16 ad:px-16 lg:px-24 md:px-32 ad:py-16 md:py-[22px] md:text-18 bg-brand-900 text-light-400 ad:rounded-8 md:rounded-12 lg:hover:shadow-btn dark:bg-brand-900 dark:text-light-400 dark:hover:shadow-btn dark:hover:outline-none font-bold">Буду ждать!</button>
        </div>
      </form>
    </div>
  </section>
  <?php if (isset($feedbacks) && !empty($feedbacks)) : ?>
    <section id="feedbacks" class="ad:px-16 ad:mt-36 ad:mb-[80px] tb:mb-[60px] lg:mb-0 lg:px-32 tb:mt-48 md:mt-48 md:mb-56 xl:mt-[80px] xl:mb-[80px] ad:flex ad:flex-col ad:items-start ad:justify-start tb:items-center tb:justify-center">
      <h2 class="ad:mt-36 tb:mt-48 ad:text-28 tb:text-36 md:text-48 xl:text-52 font-bold tracking-tight dark:text-light-400">Что говорят о нас ученики</h2>
      <p class="ad:w-11/12 tb:w-3/4 lg:w-[570px] md:w-[625px] xl:w-[630px] ad:mt-12 md:mt-16 text-18 md:text-20 xl:text-22 text-black-800 ad:text-start tb:text-center leading-tight dark:text-light-800">Прочтите отзывы тех слушателей, которые уже прошли обучение и поделились своими впечатлениями о программах</p>
      <ul class="feedbacks-slider self-center block ad:mt-36 tb:mt-48 md:mt-56 xl:mt-64">
        <?php foreach ($feedbacks as $feedback) : ?>
          <li class="feedbacks-slider__item flex ad:flex-col tb:flex-row ad:flex-start tb:items-center ad:p-24 lg:p-32 bg-light-700 rounded-16 dark:bg-dark-800">
            <div class="flex items-center justify-center h-[160px] w-[160px] bg-light-600 rounded-full border border-light-900 dark:border-dark-700 dark:bg-dark-700">
              <p class="block text-32 w-[160px] text-center dark:text-light-400"><?= mb_substr($feedback['author'], 0, 1) ?></p>
            </div>
            <div class="tb:ml-24 md:ml-32">
              <h3 class="ad:text-24 md:text-28 ad:mt-36 tb:mt-0 font-bold dark:text-light-400"><?= $feedback['author'] ?></h3>
              <p class="mt-8 ad:text-16 md:text-18 ad:leading-5 text-black-800 dark:text-light-900"><?= $feedback['content'] ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
  <?php endif; ?>
  <section id="contacts" class="w-full ad:px-16 ad:mt-36 tb:mt-48 flex ad:flex-col ad:items-start ad:justify-start tb:items-center tb:justify-center lg:hidden">
    <h2 class="ad:mt-36 tb:mt-48 ad:text-28 tb:text-36 font-bold tracking-tight dark:text-light-400">Где мы находимся</h2>
    <p class="ad:w-11/12 tb:w-3/4 ad:mt-12 text-18 text-black-800 ad:text-start tb:text-center leading-tight dark:text-light-800">Наш адрес, карта, часы работы, почта и телефон - все самое необходимое, чтобы нас найти</p>
    <div class="w-full ad:mt-36 tb:mt-48 ad:p-16 bg-light-700 ad:rounded-12 tb:rounded-16 dark:bg-dark-800">
      <h3 class="text-24 font-bold dark:text-light-400">Наши контакты</h3>
      <p class="ad:text-16 lg:text-18 mt-8 leading-tight text-black-800 dark:text-light-900">Мы всегда рады Вам! Звоните, пишите или заходите в гости</p>
      <ul class="ad:mt-24 flex ad:items-start ad:flex-col tb:flex-row tb:justify-between">
        <li class="ad:w-full tb:w-1/3 flex items-start mr-24">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-[26px] shrink-0" viewBox="0 0 24 26" fill="none">
            <path class="dark:stroke-light-400" d="M21.5 10.6364C21.5 14.1507 19.1232 17.6203 16.4286 20.3707C15.1151 21.7113 13.7962 22.81 12.8036 23.5743C12.501 23.8073 12.2299 24.0083 12 24.1747C11.7701 24.0083 11.499 23.8073 11.1964 23.5743C10.2038 22.81 8.88489 21.7113 7.57145 20.3707C4.87676 17.6203 2.5 14.1507 2.5 10.6364C2.5 8.22983 3.4882 5.91124 5.26451 4.19365C7.04253 2.47441 9.46448 1.5 12 1.5C14.5355 1.5 16.9575 2.47441 18.7355 4.19365C20.5118 5.91124 21.5 8.22983 21.5 10.6364Z" stroke="#252525" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            <path class="dark:stroke-light-400" d="M15.5 11C15.5 12.933 13.933 14.5 12 14.5C10.067 14.5 8.5 12.933 8.5 11C8.5 9.067 10.067 7.5 12 7.5C13.933 7.5 15.5 9.067 15.5 11Z" stroke="#252525" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <div class="ad:ml-8">
            <h4 class="text-20 dark:text-light-400">Адрес</h4>
            <p class="ad:mt-8 text-16 leading-tight text-black-800 dark:text-light-900">Омск, ул. Добролюбова, д.15, кабинет №77</p>
          </div>
        </li>
        <li class="ad:w-full ad:mt-24 tb:w-1/3 flex items-start mr-24">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 shrink-0" viewBox="0 0 24 24" fill="none">
            <path class="dark:stroke-light-400" d="M21.9994 17.9738V20.9846C22.0005 21.2642 21.9432 21.5408 21.831 21.7969C21.7188 22.053 21.5542 22.2829 21.3478 22.4719C21.1415 22.6608 20.8978 22.8047 20.6325 22.8942C20.3672 22.9838 20.0861 23.017 19.8072 22.9919C16.7128 22.6563 13.7404 21.601 11.1289 19.9108C8.69922 18.3699 6.63926 16.3141 5.09534 13.8892C3.39586 11.271 2.33824 8.29008 2.00816 5.18795C1.98303 4.91042 2.01608 4.63071 2.1052 4.36663C2.19432 4.10254 2.33757 3.85987 2.52581 3.65407C2.71405 3.44826 2.94317 3.28383 3.19858 3.17123C3.45398 3.05864 3.73008 3.00036 4.0093 3.0001H7.02608C7.5141 2.9953 7.98722 3.16778 8.35725 3.48537C8.72727 3.80297 8.96896 4.24401 9.03727 4.72629C9.1646 5.68982 9.40074 6.63587 9.74118 7.54641C9.87648 7.90563 9.90576 8.29602 9.82556 8.67133C9.74536 9.04665 9.55903 9.39115 9.28867 9.66402L8.01156 10.9386C9.44308 13.4512 11.5276 15.5315 14.0451 16.9602L15.3222 15.6856C15.5956 15.4158 15.9408 15.2298 16.3169 15.1498C16.6929 15.0698 17.0841 15.099 17.444 15.234C18.3564 15.5738 19.3043 15.8095 20.2698 15.9365C20.7582 16.0053 21.2044 16.2509 21.5233 16.6265C21.8422 17.0021 22.0116 17.4817 21.9994 17.9738Z" stroke="#252525" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <div class="ad:ml-8">
            <h4 class="text-20 dark:text-light-400">Телефоны</h4>
            <p class="ad:mt-8 text-16 leading-tight text-black-800 dark:text-light-900">+7 (903) 927-40-44 <br> +7 (3812) 35-67-04</p>
          </div>
        </li>
        <li class="ad:w-full ad:mt-24 tb:w-1/3 flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 shrink-0" viewBox="0 0 24 24" fill="none">
            <path class="dark:stroke-light-400" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#252525" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            <path class="dark:stroke-light-400" d="M11 7V13L15 15" stroke="#252525" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <div class="ad:ml-8">
            <h4 class="text-20 dark:text-light-400">Часы работы</h4>
            <p class="ad:mt-8 text-16 leading-tight text-black-800 dark:text-light-900">В будние дни с 8:30 до 17:00</p>
          </div>
        </li>
      </ul>
    </div>
    <iframe class="ad:w-full ad:h-[480px] ad:mt-32 ad:rounded-12 tb:rounded-16 shadow-slider" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aaffdf134588f4f17bc68ba6e62806797ee2d56eb6d5e20b04c5d759c750403c8&amp;source=constructor" loading="lazy" frameborder="1"></iframe>
  </section>
  <footer class="w-full ad:p-16 tb:p-24 lg:p-36 lg:pb-48 flex flex-wrap ad:flex-col ad:flex-start lg:flex-row lg:item-center lg:justify-between bg-[#151515] ad:mt-[72px] tb:mt-[120px] lg:mt-[96px] md:mt-[112px] xl:mt-[160px] ad:rounded-t-16 tb:rounded-t-24 lg:rounded-t-36">
    <a class="flex items-center ad:mb-32 lg:mb-0" href="https://spk-55.ru/">
      <img class="ad:w-56 ad:h-56 md:w-64 md:h-64" src="/src/img/landing/icons/logo.png" alt="spk logo">
      <p class="ad:ml-16 md:ml-24 ad:text-16 md:text-18 text-light-400">Сибирский <br> профессиональный <br> колледж</p>
    </a>
    <ul class="flex ad:items-start ad:flex-col tb:flex-row tb:items-center ad:-ml-16 tb:mb-24 lg:ml-0 lg:mb-0">
      <li class="ad:mb-12 tb:mb-0 py-8 px-16 mr-24 lg:hover:bg-brand-900 cursor-pointer rounded-8 lg:hover:shadow-btn">
        <a href="#head" class="text-16 md:text-18 text-light-400">Главная</a>
      </li>
      <li class="ad:mb-12 tb:mb-0 py-8 px-16 mr-24 lg:hover:bg-brand-900 cursor-pointer rounded-8 lg:hover:shadow-btn">
        <a href="#about" class="text-16 md:text-18 text-light-400">О нас</a>
      </li>
      <li class="ad:mb-12 tb:mb-0 py-8 px-16 mr-24 lg:hover:bg-brand-900 cursor-pointer rounded-8 lg:hover:shadow-btn">
        <a href="#courses" class="text-16 md:text-18 text-light-400">Курсы</a>
      </li>
      <li class="ad:mb-12 tb:mb-0 py-8 px-16 mr-24 lg:hover:bg-brand-900 cursor-pointer rounded-8 lg:hover:shadow-btn">
        <a href="#feedbacks" class="text-16 md:text-18 text-light-400">Отзывы</a>
      </li>
      <li class="lg:hidden ad:mb-12 tb:mb-0 text-16 py-8 px-16 text-light-400 cursor-pointer rounded-8 lg:hover:shadow-btn">
        <a href="#contacts" class="text-16 md:text-18 text-light-400">Контакты</a>
      </li>
    </ul>
    <div class="call-order__modal-btn ad:-ml-16 ad:mt-16 tb:mt-0 lg:ml-0 flex ad:self-start lg:self-center items-center cursor-pointer h-36 px-12 lg:hover:bg-brand-900 ad:rounded-8 lg:hover:shadow-btn">
      <p class="text-16 md:text-18 text-light-400">Обратный звонок</p>
    </div>
  </footer>
  <div class="tb:w-full flex items-center justify-center py-16 bg-[#101010]">
    <p class="ad:text-12 ad:text-center text-light-400 leading-tight">Собственность организации БПОУ ОО “Сибирский профессиональный колледж”. Копирование запрещено. Copyright © 2022. Illustraions by @vectorjuice on freepik.com</p>
  </div>
  <a class="fixed ad:bottom-16 ad:right-16 tb:bottom-24 tb:right-24 lg:bottom-32 lg:right-32 rounded-full lg:hover:shadow-btn" href="#head">
    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
      <path d="M0 24C0 10.7452 10.7452 0 24 0V0C37.2548 0 48 10.7452 48 24V24C48 37.2548 37.2548 48 24 48V48C10.7452 48 0 37.2548 0 24V24Z" fill="#375DE1" />
      <path d="M24 31V17" stroke="#FEFEFE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M17 24L24 17L31 24" stroke="#FEFEFE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
  </a>
  <div class="wow animate__animated animate__fadeInUp darkmode__ntf fixed ad:bottom-16 ad:mx-16 tb:mx-0 tb:right-24 tb:bottom-24 lg:right-32 lg:bottom-32 ad:p-12 tb:p-16 md:p-20 dark:bg-dark-800 rounded-16 z-[12]">
    <h3 class="ad:text-18 lg:text-20 tb:text-24 md:text-24 text-light-400">Включен <span class="ad:text-20 lg:text-20 tb:text-24 md:text-24 text-brand-900">ночной режим</span></h3>
    <p class="ad:w-full tb:w-[290px] md:w-[310px] ad:text-14 md:text-16 ad:mt-4 tb:mt-8 text-light-700 leading-tight">Ваши глаза под надежной защитой. Выбирайте наши курсы и изучайте информацию с комфортом для зрения</p>
    <div class="flex items-center mt-16">
      <button class="darkmode__ntf-accept ad:w-1/2 tb:w-fit lg:mr-16 py-[14px] px-[50px] text-14 text-light-400 font-bold bg-brand-900 rounded-8 lg:hover:shadow-btn">Спасибо</button>
      <button class="darkmode__ntf-decline ad:w-1/2 tb:w-fit py-[14px] px-16 text-light-400 text-14 font-bold bg-dark-800">Отключить</button>
    </div>
  </div>
  <div class="modal">
    <div class="modal__filter"></div>
    <form autocomplete="off" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="animate__animated animate__fadeIn modal__form relative shrink-1">
      <svg class="modal__closer w-24 md:w-32 h-24 md:h-32 absolute p-4 top-4 right-4 shrink-0 cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
        <path d="M13.5 4.5L4.5 13.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M4.5 4.5L13.5 13.5" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <div class="modal__default">
        <h3 class="modal__header">Обратный звонок</h3>
        <p class="modal__subhead">Оставьте заявку на обратный звонок. Мы свяжемся с вами в ближайшее время</p>
        <div class="modal__errors"></div>
        <div class="modal__controls">
          <ul class="modal__inputs">
            <li>
              <label for="customerName" class="modal__label">Ваше имя и фамилия</label>
              <input type="text" name="customerName" id="customerName" class="modal__input modal__client-name border border-light-900 focus:ring-1 focus:ring-brand-900" placeholder="Иван Иванов">
            </li>
            <li class="modal__item">
              <label for="customerPhone" class="modal__label">Ваш телефон</label>
              <input type="tel" name="customerPhone" id="customerPhone" class="modal__input modal__client-phone border border-light-900 focus:ring-1 focus:ring-brand-900" placeholder="+7 923 900 90 90">
            </li>
          </ul>
          <div class="modal__checkbox">
            <input type="checkbox" name="remember-me" id="remember-me" class="modal__agreement shrink-0 rounded-[5px] form-checkbox w-[18px] h-[18px] border-black-900 border-2" checked>
            <label for="remember-me" class="text-14 md:text-16 ml-8 md:ml-16 md:mt-8 text-black-900 shrink-1 leading-tight dark:text-light-400">Я согласен(а) на обработку моих личных данных</label>
          </div>
          <input class="modal__sender w-full text-14 tb:mt-24 lg:mt-28 md:mt-36 md:text-16 xl:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="sendPhoneRequest" value="Позвоните мне">
        </div>
      </div>
      <div class="modal__result-inject"></div>
    </form>
  </div>
  <script src="/src/js/common/jquery.min.js"></script>
  <script src="/src/js/common/cookie.js"></script>
  <script src="/src/js/landing/burger.js"></script>
  <script src="/src/js/common/scriptSlick.js"></script>
  <script src="/src/js/landing/heightCorrection.js"></script>
  <script src="/src/js/common/slick.min.js"></script>
  <script src="/src/js/common/dropdown.js"></script>
  <script src="/src/js/landing/darkmode.js"></script>
  <script src="/src/js/common/error.js"></script>
  <script src="/src/js/common/validate.js"></script>
  <script src="/src/js/ajax/landing/courseGet.js"></script>
  <script src="/src/js/ajax/landing/getCallRequest.js"></script>
</body>

</html>