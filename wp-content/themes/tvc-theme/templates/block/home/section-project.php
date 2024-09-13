<?php
$show = get_field('show_project');
$title_tab = get_field('title_tab');
$contents = get_field('content_project');
$currLang = get_bloginfo('language');
?>

<section class="section-project section-tab ptb-50">
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
        <li class="nav-item" role="presentation" data-aos="fade-up" data-aos-duration="500">
          <?php
          if ($cate->term_id === 19) {
          ?>
            <button class="nav-link <?= ($key == 0 ? 'active' : '') ?>">
              <a href="http://amihome.scity.com.vn" target="_blank">
                <?= $cate->name ?>
              </a>
            </button>
          <?php
          } else if ($cate->term_id === 23) {
          ?>
            <button class="nav-link <?= ($key == 0 ? 'active' : '') ?>">
              <a href="http://amihome.scity.com.vn/home" target="_blank">
                <?= $cate->name ?>
              </a>
            </button>
          <?php
          } else {
          ?>
            <button class="nav-link <?= ($key == 0 ? 'active' : '') ?>" id="pills-<?= $cate->term_id ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?= $cate->term_id ?>" type="button" role="tab" aria-controls="pills-<?= $cate->term_id ?>" aria-selected="true"><?= $cate->name ?></button>
          <?php
          }
          ?>

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
        <div class="tab-pane bg-image fade <?= ($key == 0 ? 'show active' : '') ?>" id="pills-<?= $cate->term_id ?>" role="tabpanel" aria-labelledby="pills-<?= $cate->term_id ?>-tab" data-aos="fade-up" data-aos-duration="500">
          <div class="swiper myProject">
            <div class="swiper-wrapper">
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
                <div class="swiper-slide">
                  <div class="slide-project bg-image">
                    <div class="project-info">
                      <a href="<?= the_permalink() ?>">
                        <h3 class="title-h3"><?= the_title(); ?></h3>
                      </a>
                      <div class="desc">
                        <?php
                        $theExcerpt = get_the_excerpt();
                        if (strlen($theExcerpt) > 180) {
                          echo substr($theExcerpt, 0, 180) . '(...)';
                        } else {
                          echo $theExcerpt;
                        }
                        ?>
                      </div>
                      <div class="button-them">
                        <a href="<?= get_term_link($cate->slug, 'danh-muc-du-an'); ?>" class="btn btn-about" target="_blank"><?= $currLang == 'vi' ? 'XEM THÊM DỰ ÁN' : 'READ MORE' ?></a>
                      </div>
                    </div>
                    <div class="project-img">
                      <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>" />
                    </div>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata(); ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<script>
  var swiper = new Swiper(".myProject", {
    autoplay: {
      delay: 5000,
    },
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>