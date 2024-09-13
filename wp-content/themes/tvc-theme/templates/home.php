<?php

/**
 * Template Name: Home Page
 */
get_header();
?>
<div class="home-page">
  <!-- Banner -->
  <?php get_template_part('templates/block/home/section', 'banner') ?>
  <!-- About -->
  <?php get_template_part('templates/block/home/section', 'about') ?>
  <!-- Project -->
  <?php get_template_part('templates/block/home/section', 'project') ?>
  <!-- New -->
  <?php get_template_part('templates/block/home/section', 'new') ?>
  <!-- Partner -->
  <?php get_template_part('templates/block/home/section', 'partner') ?>
</div>
<?php get_footer(); ?>