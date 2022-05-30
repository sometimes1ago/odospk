<ul class="w-full flex items-center justify-between z-20">
  <li>
    <?php if (!empty($queriesTabs) && is_array($queriesTabs)) : ?>
      <ul class="flex items-center">
        <?php includeTemplate('menu/queries_tab.php', ['queriesTabs' => $queriesTabs]) ?>
      </ul>
    <?php endif; ?>
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
    </ul>
  </li>
  <li>
    <?php includeTemplate('sections/notes.php', ['userNotes' => $userNotes]) ?>
  </li>
</ul>