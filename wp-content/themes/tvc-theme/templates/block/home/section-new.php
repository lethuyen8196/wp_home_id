<?php
$currLang = get_bloginfo('language');
$show = get_field('show_news');
$content = get_field('content_news');
?>
<section class="section-news ptb-100">
  <div class="container">
    <div class="news-top">
      <h2 class="title-h2" data-aos="fade-up" data-aos-duration="500"><?= $content['title_main'] ?></h2>
      <p class="desc" data-aos="fade-up" data-aos-duration="500"><?= $content['description'] ?></p>
    </div>
    <div class="news-list" data-aos="fade-up" data-aos-duration="500">
      <?php $getposts = new WP_query(array(
        'post_type' => 'post',
        'pos_status' => 'publish',
        'posts_per_page' => 3,
      ));
      ?>
      <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
        <div class="item">
          <div class="img">
            <a href="<?= the_permalink(); ?>">
              <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>">
            </a>
          </div>
          <div class="item-body">
            <div class="slogan"><?= get_the_category(get_the_ID())[0]->name ?></div>
            <a href="<?= the_permalink(); ?>">
              <h1 class="item-title limit-text limit-text-2">
                <?= the_title(); ?>
              </h1>
            </a>
            <div class="desc"><?= strip_tags(getContent(20)); ?></div>
          </div>
        </div>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </div>
    <div class="button">
      <a href="/category/<?= ($currLang == "vi") ? 'tin-tuc/' : 'news/' ?>" class="btn btn-about" target="_blank"><?= ($currLang == "vi") ? "Xem tất cả" : "Read More" ?></a>
    </div>
  </div>
</section>