<h3 class="wow animate__animated animate__fadeIn courses__name ad:text-28 ph:text-32 md:text-36 xl:text-48 font-bold tracking-tight dark:text-light-400" data-courseName="<?=$returnedCourse['name']?>"><?=$returnedCourse['name']?></h3>
<div class="wow animate__animated animate__fadeIn courses__initial courses__initial-visible lg:pr-36 md:pr-[84px] xl:pr-[120px]">
  <ul class="text-content ad:mt-24 md:mt-32 xl:mt-36">
    <li class="lg:text-18 md:text-20 xl:text-22 text-black-800 leading-tight dark:text-light-800">
      <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Срок обучения: </span>
      <?=$returnedCourse['lenghtAcadem']?>
    </li>
    <li class="ad:mt-12 tb:mt-16 md:mt-20 xl:mt-24 lg:text-18 md:text-20 xl:text-24 text-black-800 leading-tight dark:text-light-800">
      <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Выдаваемый документ: </span>
      <?=$returnedCourse['diplomaType']?>
    </li>
    <li class="ad:mt-12 tb:mt-16 md:mt-20 xl:mt-24 lg:text-18 md:text-20 xl:text-24 text-black-800 leading-tight dark:text-light-800">
      <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Чему научитесь: </span>
      <?=$returnedCourse['skills']?>
    </li>
    <li class="ad:mt-12 tb:mt-16 md:mt-20 xl:mt-24 lg:text-18 md:text-20 xl:text-24 text-black-800 leading-tight dark:text-light-800">
      <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Описание: </span>
      <?=$returnedCourse['description']?>
    </li>
    <li class="ad:mt-12 tb:mt-16 md:mt-20 xl:mt-24 lg:text-18 md:text-20 xl:text-24 text-black-800 leading-tight dark:text-light-800">
      <span class="lg:text-20 md:text-24 xl:text-28 text-black-900 font-bold leading-none dark:text-light-400">Стоимость: </span>
      <?=$returnedCourse['price']?> ₽
    </li>
  </ul>
  <button class="courseOrderBtn ad:w-full lg:w-1/2 mt-24 md:mt-32 xl:mt-36 text-16 font-bold md:text-18 xl:text-20 p-16 md:p-[22px] bg-brand-900 text-light-400 ad:rounded-8 xl:rounded-12 cursor-pointer lg:hover:shadow-btn">Записаться на курс</button>
</div>
