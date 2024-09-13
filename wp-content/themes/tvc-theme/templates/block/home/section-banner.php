<?php
$show = get_field('show_banner');
$contents = get_field('banner');
?>
<div class="slide-hero">
  <div class="swiper myBanner">
    <div class="swiper-wrapper">
      <?php foreach ($contents as $item) : ?>
        <div class="swiper-slide bg-image" style="background-image: url('<?= $item['image']['url'] ?>')">
          <div class="container">
            <div class="slide-info">
              <h2 class="title-h2"><?= $item['title'] ?></h2>
              <p class="desc"><?= $item['description'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</div>
<script>
  var swiper = new Swiper(".myBanner", {
    autoplay: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>