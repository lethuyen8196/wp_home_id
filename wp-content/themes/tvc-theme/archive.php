<?php
get_header();
$currLang = get_bloginfo('language');
?>
<div class="page page-section">
  <div class="page-about">
    <div class="bg-page" style="background-image: url('https://storage.googleapis.com/vinhomes-data-02/ListingDuAn1.png')">
      <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="500"><?= single_cat_title() ?></h2>
      </div>
    </div>
    <div class="archive-post">
      <div class="container">
        <div class="post-content">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <article class="article-entry" data-aos="fade-up" data-aos-duration="500">
                <a href="<?= the_permalink(); ?>" class="blog-img" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>)">
                  <p class="meta"><span class="day"><?= get_the_date('d') ?></span><span class="month"><?= get_the_date('m') ?></span></p>
                </a>
                <div class="desc">
                  <a href="<?= the_permalink() ?>" title="<?= the_title() ?>">
                    <h2 class="limit-text limit-text-2"><?= the_title() ?></h2>
                  </a>
                  <p><?php echo strip_tags(getContent(20)); ?></p>
                </div>
              </article>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>