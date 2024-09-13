<?php

function tvc_theme_setup()
{

  // Add theme support.
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
  add_theme_support('woocommerce');

  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }

  // Disables the block editor.
  add_filter('use_block_editor_for_post', '__return_false');
  add_filter('use_widgets_block_editor', '__return_false');

  // Register nav menu.
  register_nav_menus(array(
    'primary'   => __('Primary Menu', 'tvc'),
    'secondary' => __('Secondary Menu', 'tvc'),
    'footer' => __('Footer Menu', 'tvc'),
  ));

  // Create ACF Plugin theme options
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
      'page_title' => __('Cài đặt Website', 'tvc'),
      'menu_title' => __('Cài đặt Website', 'tvc'),
      'menu_slug'  => 'theme-settings',
      'capability' => 'manage_options',
      'redirect'   => false
    ));
  }
}
add_action('after_setup_theme', 'tvc_theme_setup');

function tvc_theme_widget()
{

  if (function_exists('register_sidebar')) {
    register_sidebar(array(
      'name'          => __('Sidebar', 'tvc'),
      'id'            => 'tvc-sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>',
    ));
  }
}
add_action('widgets_init', 'tvc_theme_widget');

function tvc_theme_scripts()
{
  $uri = get_template_directory_uri();

  // CSS
  wp_enqueue_style('bootstrap-css', $uri . '/assets/libs/bootstrap/bootstrap.min.css', array());
  wp_enqueue_style('swiper-css', $uri . '/assets/libs/swiper/swiper-bundle.min.css', array());
  wp_enqueue_style('aos-css', $uri . '/assets/libs/aos/aos.css', array());
  wp_enqueue_style('icon-css', 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array());
  wp_enqueue_style('style', $uri . '/assets/css/main.css', array());

  // JS
  wp_deregister_script('jquery-core');
  wp_register_script('jquery-core', $uri . '/assets/js/jquery.min.js', array());
  wp_enqueue_script('bootstrap-js', $uri . '/assets/libs/bootstrap/bootstrap.min.js', array('jquery-core'));
  wp_enqueue_script('swiper-js', $uri . '/assets/libs/swiper/swiper-bundle.min.js', array('jquery-core'));
  wp_enqueue_script('aos-js', $uri . '/assets/libs/aos/aos.js', array('jquery-core'));
  wp_enqueue_script('main-script', $uri . '/assets/js/main.js', array('jquery'));
  wp_localize_script('main-script', 'tvcRequest', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
  ));
}
add_action('wp_enqueue_scripts', 'tvc_theme_scripts');
