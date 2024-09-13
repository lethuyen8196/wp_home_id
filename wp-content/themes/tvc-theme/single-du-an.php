<?php
get_header();
$category = get_the_category();
// $nameCate = $category[0]->cat_name;
$currLang = get_bloginfo('language');
?>
<div class="page page-section">
  <div class="page-about">
    <div class="bg-page" style="background-image: url('<?= get_the_post_thumbnail_url() ?>')">
      <div class="container">
        <h1><?= ($currLang == 'vi' ? 'Lĩnh vực đầu tư' : 'Investment sector') ?></h1>
        <p id="breadcrumbs"><span><span><a href="<?= get_home_url(); ?>"><?= ($currLang == 'vi' ? 'Trang chủ' : 'Home') ?></a></span> » <span><a href=""><?= ($currLang == 'vi' ? 'Lĩnh vực đầu tư' : 'Investment sector') ?></a></span> » <span class="breadcrumb_last" aria-current="page"><?= the_title(); ?></span></span></p>
      </div>
      <div class="gradient"></div>
    </div>

    <div class="archive-post">
      <div class="container">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="title-single text-center">
              <h1><?= the_title(); ?></h1>
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

              //get the taxonomy terms of custom post type
              $customTaxonomyTerms = wp_get_object_terms($post->ID, 'danh-muc-du-an', array('fields' => 'ids'));

              //query arguments
              $args = array(
                'post_type' => 'du-an',
                'post_status' => 'publish',
                'posts_per_page' => 5,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'danh-muc-du-an',
                    'field' => 'id',
                    'terms' => $customTaxonomyTerms
                  )
                ),
                'post__not_in' => array($post->ID),
              );

              //the query
              $relatedPosts = new WP_Query($args);

              //loop through query
              if ($relatedPosts->have_posts()) {
                while ($relatedPosts->have_posts()) {
                  $relatedPosts->the_post();
              ?>
                  <div class="swiper-slide">
                    <article class="article-entry">
                      <a href="<?= the_permalink(); ?>" class="blog-img" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>)">
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
                }
              }
              wp_reset_postdata();
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