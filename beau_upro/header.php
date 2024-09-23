<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="utf-8" />
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <main id="scroll-container" class="page-wrapper page-home" data-scroll-container>
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid justify-content-lg-between">
          <a class="navbar-brand" href="<?= get_home_url() ?>">

            <?php if ($field = get_field('logo_h', 'option')): ?>
              <span class="logo-base">
                <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                  <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
                <?php else: ?>
                  <?= wp_get_attachment_image($field['ID'], 'full') ?>
                <?php endif ?>
              </span>
            <?php endif ?>
            
            <?php if ($field = get_field('fixed_logo_h', 'option')): ?>
              <span class="logo-fixed">
                <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                  <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
                <?php else: ?>
                  <?= wp_get_attachment_image($field['ID'], 'full') ?>
                <?php endif ?>
              </span>
            <?php endif ?>

          </a>
          <div class="navbar-container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
              <div class="inner" data-lenis-prevent>

                <?php wp_nav_menu( array(
                  'theme_location'  => 'header',
                  'container'       => '',
                  'items_wrap'      => '<ul class="navbar-nav">%3$s</ul>'
                )); ?>

              </div>
            </div>

            <?php if ($field = get_field('button_h', 'option')): ?>
              <div class="header-contact">
                <a href="<?= $field['url'] ?>" class="btn btn-sm"<?php if($field['target']) echo ' target="_blank"' ?>>
                  <?= $field['title'] ?>
                  <span class="btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.825" height="16.825" viewBox="0 0 16.825 16.825">
                      <g transform="translate(-6.427 23.252) rotate(-90)">
                        <path d="M7.279,7.279a1.2,1.2,0,0,1,1.7,0L22.6,20.9a1.2,1.2,0,1,1-1.7,1.7L7.279,8.978a1.2,1.2,0,0,1,0-1.7Z" transform="translate(0.301 0.301)" />
                        <path d="M22.05,6.427a1.2,1.2,0,0,1,1.2,1.2V22.05a1.2,1.2,0,0,1-1.2,1.2H7.629a1.2,1.2,0,0,1,0-2.4h13.22V7.629A1.2,1.2,0,0,1,22.05,6.427Z" transform="translate(0 0)" />
                      </g>
                    </svg>
                  </span>
                </a>
              </div>
            <?php endif ?>

          </div>
        </div>
      </nav>
    </header>

    <div class="page-content">