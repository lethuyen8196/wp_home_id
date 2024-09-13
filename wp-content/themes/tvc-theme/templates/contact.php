<?php

/**
 * Template Name: Contact Page
 */
get_header();
$content = get_field('content_contact');
$currLang = get_bloginfo('language');
?>
<div class="page page-section">
  <div class="page-about">
    <div class="map">
      <?= $content['map']; ?>
    </div>
    <div class="container">
      <div class="form-lienhe">
        <?= do_shortcode($content['form']) ?>
      </div>

    </div>

  </div>
</div>
<?php get_footer(); ?>