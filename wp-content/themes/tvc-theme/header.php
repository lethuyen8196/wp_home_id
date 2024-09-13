<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<?php
$logo = get_field('logo_header', 'option');
?>

<body <?php body_class(); ?>>
  <!-- Begin Header -->
  <header class="header header-fixed">
    <div class="container">
      <div class="header-inner d-flex align-items-center justify-content-between">
        <div class="header-logo">
          <a href="<?= get_home_url(); ?>">
            <img src="<?= $logo; ?>" alt="HomeId">
          </a>
        </div>
        <nav class="header-menu">
          <ul>
            <?php wp_nav_menu(array(
              'theme_location' => 'primary',
              'menu_class' => '',
              'container' => false,
              'items_wrap' => '%3$s'
            )); ?>
          </ul>
        </nav>

        <!-- Navbar -->
        <div class="header-navbar">
          <i class="ion-navicon open"></i>
          <i class="ion-android-close close"></i>
        </div>
      </div>

      <!--  -->
    </div>
  </header>
  <!-- End Header -->