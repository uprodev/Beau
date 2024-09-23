</div>

<footer class="footer bg-dark text-white">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-between">

      <?php if ($field = get_field('logo_f', 'option')): ?>
        <div class="col-md-5 col-lg-6">
          <div class="f-logo">
            <a href="<?= get_home_url() ?>">
              <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
              <?php else: ?>
                <?= wp_get_attachment_image($field['ID'], 'full') ?>
              <?php endif ?>
            </a>
          </div>
        </div>
      <?php endif ?>

      <div class="col-md-7 col-lg-6 col-xxl-5">
        <div class="row">

          <?php if ($field = get_field('address_c', 'option')): ?>
            <div class="col-sm-6">
              <address><?= $field ?></address>
            </div>
          <?php endif ?>

          <div class="col-sm-6 ps-xl-0">
            <div class="f-contacts">

              <?php if ($field = get_field('phone_c', 'option')): ?>
                <p><a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a></p>
              <?php endif ?>

              <?php if ($field = get_field('email_c', 'option')): ?>
                <p><a href="mailto:<?= $field ?>"><?= $field ?></a></p>
              <?php endif ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="f-bottom">

      <?php if (($field = get_field('menu_left_f', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
      <ul>

        <?php foreach ($field as $item): ?>
          <?php if ($item['link']): ?>
            <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
          <?php endif ?>
        <?php endforeach ?>
        
      </ul>
    <?php endif ?>

    <?php if (($field = get_field('menu_right_f', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
    <ul>

      <?php foreach ($field as $item): ?>
        <?php if ($item['link']): ?>
          <li><a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a></li>
        <?php endif ?>
      <?php endforeach ?>
      
    </ul>
  <?php endif ?>
  
</div>
</div>
</footer>
</main>

<?php wp_footer() ?>
</body>
</html>
