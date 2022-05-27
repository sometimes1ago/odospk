<aside class="aside">
  <h6 class="aside__header"><span class="aside__accenter">ODOSPK • </span>Admin Panel</h6>
  <p class="aside__greetings">Добро пожаловать</p>
  <div class="aside__user">
    <div class="aside__btn">
      <img src="/src/img/avatars/<?= $user['photo'] ?>" alt="authorized-user-avatar" class="aside__img">
      <span class="aside__btn-container">
        <h5 class="aside__user-name"><?= $user['name'] ?></h5>
        <button class="aside__btn-show">
          <p class="aside__btn-show__text">Данные</p>
          <svg class="aside__btn-show__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 8" fill="none">
            <path d="M1.67139 1.66666L6.49996 6.33332L11.3285 1.66666" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </span>
      </img>
    </div>
    <div class="aside__user-data">
      <h3 class="aside__user-header">Пользователь</h3>
      <p class="aside__user-subhead">Данные и действия с <br> вашей учетной записью</p>
      <ul class="aside__user-items">
        <li class="aside__user-item">
          <h4 class="aside__user-item__header">Логин</h4>
          <p class="aside__user-item__value"><?= $user['login'] ?></p>
        </li>
        <li class="aside__user-item">
          <h4 class="aside__user-item__header">Уровень доступа</h4>
          <p class="aside__user-item__value"><?= $user['access'] ?></p>
        </li>
        <li class="aside__user-item">
          <h4 class="aside__user-item__header">IP-адрес</h4>
          <p class="aside__user-item__value"><?= $_SERVER['REMOTE_ADDR'] ?></p>
        </li>
      </ul>
      <button class="aside__change hover:shadow-btn">Изменить данные</button>
    </div>
  </div>
  <ul class="aside__links">
    <?php foreach ($asideMenu as $asideItem) : ?>
      <?php if ($user['access_code'] >= $asideItem['access']) : ?>
        <li class="aside__links-item">
          <a href="<?= $asideItem['address'] ?>" class="aside__link <?= str_contains($_SERVER['REQUEST_URI'], $asideItem['address']) ? 'aside__links-item__active' : '' ?>">
            <?= $asideItem['icon'] ?>
            <p class="aside__link-text"><?= $asideItem['name'] ?></p>
          </a>
        </li>
      <?php else : ?>
        <?php continue ?>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
  <a href="?logout=yes" class="aside__logout">
    <svg class="aside__link-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
      <path d="M6.75 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H6.75" stroke="#252525" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M12 12.75L15.75 9L12 5.25" stroke="#252525" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M15.75 9H6.75" stroke="#252525" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    <p class="aside__logout-text">Выйти</p>
  </a>
</aside>