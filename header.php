<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=wp_get_document_title(); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100..900&display=swap&_v=20240330120424"
    rel="stylesheet">
  <link rel="Shortcut Icon" type="image/x-icon"
    href="<?=get_template_directory_uri(); ?>/assets/img/icons/favicon.png" />
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-42JKTVGMCM"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-42JKTVGMCM');
  </script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- Add autoHide class to automatically hide the header on scroll -->
  <header class="header" id="header">
    <div class="wrapper">
      <div class="header__inner">
        <a href="/" class="header__logo">
          <?php the_field('header_logo', 'option'); ?>
        </a>
        <nav class="header__menu">
          <?php wp_nav_menu(array(
				'menu' => 'header_menu',
				'container' => 'ul',
				'container_class' => '',
				'container_id' => '',
				'menu_class' => 'header__list',
				'menu_id' => 'header__list',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0,
				'walker' => '',
			)) ?>
        </nav>
        <button class="header__btn">
          <span class="header__btn-text">Menu</span>
          <svg class="header__btn-icon" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.5 5L5.5 15" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
            <path d="M5.5 5L15.5 15" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
          </svg></button>
      </div>
    </div>
  </header>

  <main class="main">