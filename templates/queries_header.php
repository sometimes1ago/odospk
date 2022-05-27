<ul class="w-full flex items-center justify-between z-20">
  <li>
    <ul class="flex items-center">
      <li class="tab">
        <a href="/admin/queries/education/">Обучение</a>
      </li>
      <li class="tab">
        <a href="/admin/queries/calls/">Звонки</a>
      </li>
    </ul>
  </li>
  <li>
    <ul class="flex items-center">
      <li class="ml-12">
        <form action="" class="search">
          <div class="search__btn">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-18 h-18 md:w-24 md:h-24 mr-8" viewBox="0 0 18 18" fill="none">
              <path d="M8.25 14.25C11.5637 14.25 14.25 11.5637 14.25 8.25C14.25 4.93629 11.5637 2.25 8.25 2.25C4.93629 2.25 2.25 4.93629 2.25 8.25C2.25 11.5637 4.93629 14.25 8.25 14.25Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M15.7501 15.75L12.4875 12.4875" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="search__btn-text">Прямой поиск</p>
          </div>
          <div class="search__content shadow-xl">
            <h3 class="search__header">Прямой поиск</h3>
            <p class="search__subhead">Выберите поле для поиска <br> и введите значение</p>
            <label class="dropdown__label mt-16 mb-12 text-16 dark:text-light-400" data-dropdownIndex="0">Искать по</label>
            <div class="dropdown dropdown__light z-10" data-index="0">
              <div class="dropdown__btn">
                <p class="dropdown__btn-text dropdown__addProgCourseType" data-dropdownValue="Курсу или программе">Курсу или программе</p>
                <svg class="dropdown__btn-icon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M6.73205 8C5.96225 9.33333 4.03775 9.33333 3.26795 8L0.669873 3.5C-0.0999277 2.16667 0.862323 0.5 2.40192 0.5L7.59808 0.5C9.13768 0.5 10.0999 2.16667 9.33013 3.5L6.73205 8Z" fill="#252525" />
                </svg>
              </div>
              <ul class="dropdown__options">
                <li class="dropdown__option searchPropOption">Курсу или программе</li>
                <li class="dropdown__option searchPropOption">Фамилии и имени</li>
                <li class="dropdown__option searchPropOption">Телефону</li>
                <li class="dropdown__option searchPropOption">Дате</li>
                <li class="dropdown__option searchPropOption">Статусу</li>
              </ul>
            </div>
            <label for="searchValue" class="search__label">Введите значение</label>
            <input type="text" name="searchValue" id="searchValue" class="search__input" placeholder="Наименование курса">
            <input class="sortByDateSender w-full text-14 tb:mt-24 mt-24 md:text-16 xl:text-18 font-medium text-light-400 bg-brand-900 py-[17px] md:py-[19px] rounded-8 cursor-pointer hover:shadow-btn" type="submit" name="removeFeedbackSender" value="Показать">
          </div>
        </form>
      </li>
      <li class="ml-12">
        <a class="archive" href="/admin/queries/archive/">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-18 h-18 md:w-24 md:h-24 mr-8" viewBox="0 0 18 18" fill="none">
            <path d="M12.375 7.04997L5.625 3.15747" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15.75 12V5.99999C15.7497 5.73694 15.6803 5.47859 15.5487 5.25086C15.417 5.02312 15.2278 4.83401 15 4.70249L9.75 1.70249C9.52197 1.57084 9.2633 1.50153 9 1.50153C8.7367 1.50153 8.47803 1.57084 8.25 1.70249L3 4.70249C2.7722 4.83401 2.58299 5.02312 2.45135 5.25086C2.31971 5.47859 2.25027 5.73694 2.25 5.99999V12C2.25027 12.263 2.31971 12.5214 2.45135 12.7491C2.58299 12.9768 2.7722 13.166 3 13.2975L8.25 16.2975C8.47803 16.4291 8.7367 16.4984 9 16.4984C9.2633 16.4984 9.52197 16.4291 9.75 16.2975L15 13.2975C15.2278 13.166 15.417 12.9768 15.5487 12.7491C15.6803 12.5214 15.7497 12.263 15.75 12Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M2.45264 5.21997L9.00014 9.00747L15.5476 5.21997" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M9 16.56V9" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="archive__text">Архив</p>
        </a>
      </li>
      <li class="ml-12">
        <a class="trash" href="/admin/queries/trash/">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-18 h-18 md:w-24 md:h-24 mr-8" viewBox="0 0 18 18" fill="none">
            <path d="M2.25 4.5H3.75H15.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 4.5V3C6 2.60218 6.15804 2.22064 6.43934 1.93934C6.72064 1.65804 7.10218 1.5 7.5 1.5H10.5C10.8978 1.5 11.2794 1.65804 11.5607 1.93934C11.842 2.22064 12 2.60218 12 3V4.5M14.25 4.5V15C14.25 15.3978 14.092 15.7794 13.8107 16.0607C13.5294 16.342 13.1478 16.5 12.75 16.5H5.25C4.85218 16.5 4.47064 16.342 4.18934 16.0607C3.90804 15.7794 3.75 15.3978 3.75 15V4.5H14.25Z" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.5 8.25V12.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10.5 8.25V12.75" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="trash__text">Корзина</p>
        </a>
      </li>
    </ul>
  </li>
  <li>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/notes.php' ?>
  </li>
</ul>