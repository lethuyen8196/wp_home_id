<?php
get_header();
$category = get_the_category();
$nameCate = $category[0]->cat_name;
$currLang = get_bloginfo('language');
?>
<div class="page page-section">
  <div class="page-about">
    <div class="bg-page" style="background-image: url('<?= get_the_post_thumbnail_url() ?>')">
      <div class="container">
        <h1><?= ($currLang == 'vi' ? 'Tin tức' : 'News') ?></h1>
        <?php
        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>
      </div>
      <div class="gradient"></div>
    </div>

    <div class="archive-post">
      <div class="container">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="title-single text-center">
              <h1><?= the_title(); ?></h1>
              <p><?= get_the_date('j F, Y'); ?></p>
            </div>
            <article class="article-entry article-post">
              <?= the_content(); ?>
            </article>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="post-related">
      <div class="container">
        <div class="post-content">
          <h2 class="title-related"><?= ($currLang == 'vi' ? 'Bài viết liên quan' : 'Post Related') ?></h2>
          <div class="swiper mySingle">
            <div class="swiper-wrapper">
              <?php
              $categories = get_the_category(get_the_ID());
              if ($categories) {
                $category_ids = array();
                foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                $args = array(
                  'category__in' => $category_ids,
                  'post__not_in' => array(get_the_ID()),
                  'posts_per_page' => 5, // So bai viet dc hien thi
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) :
                  while ($my_query->have_posts()) : $my_query->the_post();
              ?>
                    <div class="swiper-slide">
                      <article class="article-entry">
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
                    </div>
              <?php
                  endwhile;
                endif;
                wp_reset_query();
              }
              ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var swiper = new Swiper(".mySingle", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      300: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      980: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1280: {
        slidesPerView: 3,
        spaceBetween: 30,
      }
    },
  });
</script>
<?php get_footer(); ?>