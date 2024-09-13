<?php
$show = get_field('show_partner');
$title = get_field('title_main');
$contents = get_field('content_partner');
?>
<section class="section-partner pb-100">
  <div class="container">
    <div class="news-top">
      <h2 class="title-h2 text-center" data-aos="fade-up" data-aos-duration="500"><?= $title ?></h2>
    </div>
    <div class="logo-partner">
      <div class="swiper myPartner">
        <div class="swiper-wrapper">
          <?php foreach ($contents as $item) : ?>
            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="500">
              <a href="#">
                <img class="normal" src="<?= $item['image_normal'] ?>" alt="">
                <img class="hover" src="<?= $item['image_hover'] ?>" alt="">
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>
<script>
  var swiper = new Swiper(".myPartner", {
    slidesPerView: 4,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      300: {
        slidesPerView: 1
      },
      768: {
        slidesPerView: 2
      },
      850: {
        slidesPerView: 3
      },
      1024: {
        slidesPerView: 3
      },
      1200: {
        slidesPerView: 4
      }
    }
  });
</script>