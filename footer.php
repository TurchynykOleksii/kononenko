<footer class="footer" id="contacts">
  <div class="wrapper">
    <div class="footer__inner">
      <nav class="footer__nav">
        <?php if (have_rows('follow_list', 'option')) : ?>
        <ul class="footer__list">
          <?php while (have_rows('follow_list', 'option')) : the_row(); 
            $follow_link = get_sub_field('follow_item');
            $follow_url = $follow_link['url'];
            $follow_title = $follow_link['title'];
        ?>
          <li class="footer__item">
            <a href="<?= esc_url($follow_url); ?>" class="footer__link"><?= esc_html($follow_title); ?></a>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>

      </nav>
      <h4 class="footer__title"><?php the_field('footer_title', 'option'); ?></h4>
      <div class="footer__copy">
        <p class="footer__copyright">
          <?php the_field('copy', 'option'); ?>
        </p>
        <a href="#header" class="footer__up">back on top</a>
      </div>
    </div>

  </div>
  <div class="mobile-menu">
    <div class="mobile-menu__space-taker"></div>
    <ul class="mobile-menu__list">
      <li class="mobile-menu__item">
        <a href="about.html">about</a>
      </li>
      <li class="mobile-menu__item">
        <a href="#">works</a>
      </li>
      <li class="mobile-menu__item">
        <a href="#contacts">
          contact
        </a>
      </li>
    </ul>
    <div class="mobile-menu__social-wrapper">
      <strong>follow us</strong>
      <?php if (have_rows('follow_list', 'option')) : ?>
      <ul class="mobile-menu__social">
        <?php while (have_rows('follow_list', 'option')) : the_row(); 
            $follow_link = get_sub_field('follow_item');
            $follow_url = $follow_link['url'];
            $follow_title = $follow_link['title'];
        ?>
        <li class="mobile-menu__link">
          <a href="<?= esc_url($follow_url); ?>" class="footer__link"><?= esc_html($follow_title); ?></a>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</footer>
<div class="overlay">
  <div class="form__success-screen">
    <p class="form__submit-result">Sent successfully</p>
    <div class="form__success-icon"></div>
    <p class="form__result-text">We will contact you shortly</p>
  </div>
  <div class="form__error-screen">
    <p class="form__submit-result">Unfortunately, an error occurred</p>
    <div class="form__error-icon"></div>
    <p class="form__result-text">
      Please try submitting your request again in a couple of minutes
    </p>
  </div>
</div>

<?php wp_footer();?>
</body>

</html>