<?php

/**
 * Template Name: About Page
 */
get_header();
?>
<div class="page page-section">
  <div class="page-about">
    <div class="bg-page" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')">
      <div class="container">
        <h1><?= the_title(); ?></h1>
      </div>
    </div>
    <div class="container">
      <div class="content">
        <?= the_content(); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>