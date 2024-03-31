<?php get_header(); ?>


<section class="object">
  <div class="wrapper">
    <div class="object__inner">
      <?= do_shortcode('[rank_math_breadcrumb]')?>
      <div class="object__presentation">
        <div class="object__wrap">
          <div class="object__info">
            <?php if(get_the_title()):?>
            <h1 class="object__headline"><?= the_title();?></h1>
            <?php endif;?>
            <?php if(get_field('object_year') || get_field('object_subtitle')): ?>
            <div class="object__info-wrapper">
              <span class="object__year"><?= the_field('object_year')?></span>
              <span class="object__subtitle"><?= the_field('object_subtitle')?></span>
            </div>
            <?php endif;?>
          </div>
          <?php if( have_rows('object_two-pc') ): ?>
          <div class="object__two-img object__two-pc">
            <?php while( have_rows('object_two-pc') ): the_row(); 
                $object_image = get_sub_field('object_img-sizes');
            ?>
            <div class="object__img-sizes img-left">
              <img src="<?php echo esc_url($object_image['url']); ?>"
                alt="<?php echo esc_attr($object_image['alt']); ?>" />
            </div>
            <?php endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
        <?php if(get_field('object_hero_img_big')):?>
        <div class="object__presentation-info">
          <div class="object__presentation-wrapper">
            <div class="object__presentation-big">
              <?php 
                $object_hero_img = get_field('object_hero_img_big');
                  if( !empty( $object_hero_img ) ): ?>
              <img src="<?php echo esc_url($object_hero_img['url']); ?>"
                alt="<?php echo esc_attr($object_hero_img['alt']); ?>" />
              <?php endif; ?>
            </div>
            <?php if( have_rows('object_two-pc') ): ?>
            <div class="object__two-img object__two-mob">
              <?php while( have_rows('object_two-pc') ): the_row(); 
                $object_image = get_sub_field('object_img-sizes');
            ?>
              <div class="object__two-sizes">
                <img src="<?php echo esc_url($object_image['url']); ?>"
                  alt="<?php echo esc_attr($object_image['alt']); ?>" />
              </div>
              <?php endwhile; ?>
            </div>
            <?php endif; ?>

          </div>

          <p class="object__presentation-text">
            <?= the_field('presentation_hero_text')?>
          </p>
        </div>
        <?php endif;?>
      </div>
      <ul class="object__list">
        <?php if(get_field('first_big_img') || get_field('first_text')): ?>
        <li class="object__item object__first">
          <div class="object__img object__first-big">
            <?php 
                $first_big_img = get_field('first_big_img');
                  if( !empty( $first_big_img ) ): ?>
            <img src="<?php echo esc_url($first_big_img['url']); ?>"
              alt="<?php echo esc_attr($first_big_img['alt']); ?>" />
            <?php endif; ?>

          </div>
          <?php if(get_field('first_text')):?>
          <p class="object__text object__first-text">
            <?= the_field('first_text')?>
          </p>
          <?php endif;?>
          <div class="object__img object__first-small">
            <?php 
                $first_small_img = get_field('first_small_img');
                  if( !empty( $first_small_img ) ): ?>
            <img src="<?php echo esc_url($first_small_img['url']); ?>"
              alt="<?php echo esc_attr($first_small_img['alt']); ?>" />
            <?php endif; ?>

          </div>
        </li>
        <?php endif;
          if(get_field('second_img_small') || get_field('second_img_big') ):
        ?>
        <li class="object__item object__second">
          <div class="object__img object__second-small">
            <?php 
                $second_img_small = get_field('second_img_small');
                  if( !empty( $second_img_small ) ): ?>
            <img src="<?php echo esc_url($second_img_small['url']); ?>"
              alt="<?php echo esc_attr($second_img_small['alt']); ?>" />
            <?php endif; ?>

          </div>
          <div class="object__img object__second-big">
            <?php 
                $second_img_big = get_field('second_img_big');
                  if( !empty( $second_img_big ) ): ?>
            <img src="<?php echo esc_url($second_img_big['url']); ?>"
              alt="<?php echo esc_attr($second_img_big['alt']); ?>" />
            <?php endif; ?>

          </div>
        </li>
        <?php endif;
          if(get_field('third_text') || get_field('third_img_big')):
        ?>
        <li class="object__item object__third">
          <p class="object__text object__third-text">
            <?= the_field('third_text')?>
          </p>
          <div class="object__img object__third-big">
            <?php 
                $third_img_big = get_field('third_img_big');
                  if( !empty( $third_img_big ) ): ?>
            <img src="<?php echo esc_url($third_img_big['url']); ?>"
              alt="<?php echo esc_attr($third_img_big['alt']); ?>" />
            <?php endif; ?>
          </div>
        </li>
        <?php endif;
        if(get_field('four_img_long') || get_field('four_img_short')):
        ?>
        <li class="object__item object__fourth">
          <div class="object__img object__fourth-big">
            <?php 
                $four_img_long = get_field('four_img_long');
                  if( !empty( $four_img_long ) ): ?>
            <img src="<?php echo esc_url($four_img_long['url']); ?>"
              alt="<?php echo esc_attr($four_img_long['alt']); ?>" />
            <?php endif; ?>
          </div>
          <div class="object__img object__fourth-small">
            <?php 
                $four_img_short = get_field('four_img_short');
                  if( !empty( $four_img_short ) ): ?>
            <img src="<?php echo esc_url($four_img_short['url']); ?>"
              alt="<?php echo esc_attr($four_img_short['alt']); ?>" />
            <?php endif; ?>
          </div>
        </li>
        <?php endif;
          if(get_field('fifth_text') || get_field('fifth_img_small') || get_field('fifth_img_big')):
        ?>
        <li class="object__item object__fifth">
          <div class="object__item-wrap object__fifth-wrap">
            <p class="object__text object__fifth-text">
              <?= the_field('fifth_text')?>
            </p>
            <div class="object__img object__fifth-small">
              <?php 
                $fifth_img_small = get_field('fifth_img_small');
                  if( !empty( $fifth_img_small ) ): ?>
              <img src="<?php echo esc_url($fifth_img_small['url']); ?>"
                alt="<?php echo esc_attr($fifth_img_small['alt']); ?>" />
              <?php endif; ?>
            </div>
          </div>
          <div class="object__img object__fifth-big">
            <?php 
                $fifth_img_big = get_field('fifth_img_big');
                  if( !empty( $fifth_img_big ) ): ?>
            <img src="<?php echo esc_url($fifth_img_big['url']); ?>"
              alt="<?php echo esc_attr($fifth_img_big['alt']); ?>" />
            <?php endif; ?>
          </div>
        </li>
        <?php endif;
          if(get_field('six_img_smal') || get_field('six_img_big')):
        ?>
        <li class="object__item object__sixth">
          <div class="object__img object__sixth-small">
            <?php 
                $six_img_smal = get_field('six_img_smal');
                  if( !empty( $six_img_smal ) ): ?>
            <img src="<?php echo esc_url($six_img_smal['url']); ?>"
              alt="<?php echo esc_attr($six_img_smal['alt']); ?>" />
            <?php endif; ?>
          </div>

          <div class="object__img object__sixth-big">
            <?php 
                $six_img_big = get_field('six_img_big');
                  if( !empty( $six_img_big ) ): ?>
            <img src="<?php echo esc_url($six_img_big['url']); ?>" alt="<?php echo esc_attr($six_img_big['alt']); ?>" />
            <?php endif; ?>
          </div>
        </li>
        <?php endif;
          if(get_field('seven_img_long') || get_field('seven_text') || get_field('seven_img_short')):
          ?>
        <li class="object__item object__seventh">
          <div class="object__img object__seventh-big"><?php 
                $seven_img_long = get_field('seven_img_long');
                  if( !empty( $seven_img_long ) ): ?>
            <img src="<?php echo esc_url($seven_img_long['url']); ?>"
              alt="<?php echo esc_attr($seven_img_long['alt']); ?>" />
            <?php endif; ?>
          </div>
          <p class="object__text object__seventh-text">
            <?= the_field('seven_text')?>
          </p>
          <div class="object__img object__seventh-small">
            <?php 
                $seven_img_short = get_field('seven_img_short');
                  if( !empty( $seven_img_short ) ): ?>
            <img src="<?php echo esc_url($seven_img_short['url']); ?>"
              alt="<?php echo esc_attr($seven_img_short['alt']); ?>" />
            <?php endif; ?>
          </div>
        </li>
        <?php endif;?>
      </ul>
    </div>
  </div>
</section>
<section class="form">
  <div class="wrapper">
    <div class="form__inner">
      <h3 class="form__title">
        <span class="form__title-first"><?php the_field('form_title_first', 'option'); ?></span>
        <span class="form__title-second"><?php the_field('form_title_second', 'option'); ?></span>
      </h3>
      <div class="form__modul-wrapper">
        <?= do_shortcode( '[contact-form-7 id="aaec425" html_class="form__mould" title="Форма для зв`язку"]' )?>

      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>