<?php
$show = get_field('show_about');
$contents = get_field('content_about');
?>
<section class="section-about ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="about-info" data-aos="fade-up" data-aos-duration="500">
          <h3 class="title-h2"><?= $contents['title'] ?></h3>
          <p class="desc"><?= $contents['description'] ?></p>
          <div class="button">
            <a href="<?= $contents['cta']['link'] ?>" class="btn btn-about" target="_blank"><?= $contents['cta']['text'] ?></a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="about-img" data-aos="fade-up" data-aos-duration="500">
          <div class="swiper myGalleryAbout">
            <div class="swiper-wrapper">
              <?php foreach ($contents['image'] as $item) : ?>
                <div class="swiper-slide">
                  <img src="<?= esc_url($item['url']); ?>" alt="<?= esc_attr($item['alt']); ?>">
                </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  var swiper = new Swiper(".myGalleryAbout", {
    loop: true,
    autoplay: {
      delay: 2000,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>