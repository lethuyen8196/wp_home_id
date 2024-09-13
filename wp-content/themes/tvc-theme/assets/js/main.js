jQuery(document).ready(function ($) {
  /* Start AOS */
  AOS.init();
  /* End AOS */
  const navbar = $('.header-navbar');
  const openSub = $('.has-sub i');
  navbar.on('click', function () {
    $(this).toggleClass('active');
    $('.header-inner').toggleClass('active');
  });

  openSub.on('click', function (e) {
    e.preventDefault();
    const target = $(this).parents().children('.sub-menu');
    $(target).toggleClass('active');
  });

  // Get Param to active tab
  var url = $(location).attr('href'),
    parts = url.split('/'),
    last_part = parts[parts.length - 2];

  $('.archive .nav-item button').removeClass('active');
  $('.archive .tab-content .tab-pane').removeClass('show active');
  $;
  $('.archive .nav-item button[data-slug="' + last_part + '"]').addClass(
    'active'
  );
  $(
    '.archive .tab-content .tab-pane[data-slug-tab="' + last_part + '"]'
  ).addClass('show active');

  console.log(last_part);
});
