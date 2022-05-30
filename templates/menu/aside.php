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