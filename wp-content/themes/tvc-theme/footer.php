<?php
$logo = get_field('logo_header', 'option');
$address = get_field('address', 'option');
$dia_chi = get_field('dia_chi', 'option');
$ten_cong_ty = get_field('ten_cong_ty', 'option');
$company_name = get_field('company_name', 'option');
$phone = get_field('phone', 'option');
$email = get_field('email', 'option');
$currLang = get_bloginfo('language');
?>
<footer class="footer ptb-50">
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
		  <div class="footer-info d-flex">
			  <div class="logo-footer">
			  <a href="<?= get_home_url(); ?>">
				<img src="<?= $logo; ?>" alt="SCity">
			  </a>
			</div>
        <div class="info-footer">
          <h4 class="title-h4"><?= ($currLang == "vi") ? $ten_cong_ty : $company_name ?></h4>
          <ul>
            <li><?= ($currLang == "vi") ? $dia_chi : $address ?></li>
            <li><?= ($currLang == "vi") ? 'Điện Thoại' : 'Phone' ?>: <?= $phone ?></li>
            <li>Email: <?= $email ?></li>
          </ul>
        </div>
		  </div>
      </div>
      <div class="col-sm-5">
        <div class="info-footer text-end">
          <h4 class="title-h4"><?= ($currLang == "vi") ? "KẾT NỐI VỚI CHÚNG TÔI" : "CONNECT WITH US" ?></h4>
          <ul class="social">
            <li>
              <a href="https://www.facebook.com/s-group.vn/" target="_blank">
                <i class="ion-social-facebook"></i>
              </a>
            </li>
            <li>
              <a href="" target="_blank">
                <i class="ion-social-twitter"></i>
              </a>
            </li>
            <li>
              <a href="" target="_blank">
                <i class="ion-social-google"></i>
              </a>
            </li>
            <li>
              <a href="" target="_blank">
                <i class="ion-social-skype"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>