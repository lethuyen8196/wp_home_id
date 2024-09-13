<?php
get_header();
$category = get_queried_object();
$catID = $category->term_id;
$catSlug = $category->slug;
$currLang = get_bloginfo('language');
?>
<section class="section-tab ptb-50">
  <div class="container">
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
      <?php
      $args = array(
        'hide_empty' => 0,
        'taxonomy' => 'danh-muc-du-an',
        'orderby' => 'id',
      );
      $cates = get_categories($args);
      foreach ($cates as $key => $cate) { ?>
        <li class="nav-item" role="presentation">
          <?php if ($cate->slug === 'can-ho-cho-thue') : ?>
            <button class="nav-link <?= ($key == 0 ? 'active' : '') ?>">
              <a href="http://amihome.scity.com.vn" target="_blank">
                <?= $cate->name ?>
              </a>
            </button>

          <?php else : ?>
            <button data-slug="<?= $cate->slug ?>" class="nav-link <?= ($key == 0 ? 'active' : '') ?>" id="pills-<?= $cate->term_id ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?= $cate->term_id ?>" type="button" role="tab" aria-controls="pills-<?= $cate->term_id ?>" aria-selected="true"><?= $cate->name ?></button>
          <?php endif; ?>

        </li>
      <?php }
      ?>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <?php
      $args = array(
        'hide_empty' => 0,
        'taxonomy' => 'danh-muc-du-an',
      )
      ?>
      <?php $cates = get_categories($args) ?>
      <?php foreach ($cates as $key => $cate) : ?>
        <div data-slug-tab="<?= $cate->slug ?>" class="tab-pane bg-image fade <?= ($key == 0 ? 'show active' : '') ?>" id="pills-<?= $cate->term_id ?>" role="tabpanel" aria-labelledby="pills-<?= $cate->term_id ?>-tab">

          <?php
          $args = [
            'post_type' => 'du-an',
            'tax_query' => [
              [
                'taxonomy' => 'danh-muc-du-an',
                'terms' => $cate->term_id,
                'include_children' => false // Remove if you need posts from term 7 child terms
              ],
            ],
          ];
          ?>
          <?php $posts = new WP_Query($args); ?>
          <?php while ($posts->have_posts()) : $posts->the_post(); ?>
            <div class="row row-gap">
              <div class="col-sm-4">
                <div class="project-info">
                  <a href="<?= the_permalink() ?>" title="<?= the_title(); ?>">
                    <h3 class="title-h3 limit-text limit-text-3 text-center"><?= the_title(); ?></h3>
                  </a>
                  <div class="desc"><?= the_excerpt() ?></div>
                  <div class="button text-center">
                    <a href="<?= the_permalink() ?>" class="btn btn-about btn-blue"><?= $currLang == 'vi' ? 'Chi tiết' : 'Read More' ?></a>
                  </div>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="project-img">
                  <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>">
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>