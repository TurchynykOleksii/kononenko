<?php
/*
Template Name: about
*/
?>
<?php get_header(); ?>
<section class="about">
  <div class="wrapper">
    <div class="about__inner">
      <?= do_shortcode('[rank_math_breadcrumb]')?>
      <h1 class="about__title">
        <span><?= the_field('headline_first')?></span><span><?= the_field('headline_second')?></span>
      </h1>
      <div class="about__founded">
        <h2 class="about__founded-title">
          <span class="accent-color"><?= the_field('founded_first')?></span>
          <?= the_field('founded_second')?>
        </h2>
        <?php if( have_rows('about_list') ): ?>
        <ul class="about__list">
          <?php while( have_rows('about_list') ): the_row(); 
        $about_image = get_sub_field('about_photo');
        $about_name = get_sub_field('about_name');
        ?>
          <li class="about__item">
            <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>" />
            <h3 class="about__name"><?= $about_name; ?></h3>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </div>
      <div class="about__info">
        <?php if( have_rows('benefits_list') ): ?>
        <ul class="benefits__list">
          <?php while( have_rows('benefits_list') ): the_row(); 
        $benefits_title = get_sub_field('benefits_title');
        $benefits_text = get_sub_field('benefits_euche');
        ?>
          <li class="benefits__item">
            <h4 class="benefits__title"><?= $benefits_title; ?></h4>
            <p><?= $benefits_text?></p>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>

        <div class="slogan slogan__hide">
          <h4 class="slogan__title"><?= the_field('slogan_title')?></h4>
          <?php if( have_rows('slogan_list') ): ?>

          <?php while( have_rows('slogan_list') ): the_row(); 
                $benefits_text = get_sub_field('slogan_text') ?>
          <p><?= $benefits_text?></p>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <button class="slogan__toggle">View all</button>
        <div class="follow">
          <h4 class="follow__title"><?= the_field('follow_title')?></h4>
          <?php if (have_rows('follow_list', 'option')) : ?>
          <ul class="follow__list">
            <?php while (have_rows('follow_list', 'option')) : the_row(); 
            $follow_link = get_sub_field('follow_item');
            $follow_url = $follow_link['url'];
            $follow_title = $follow_link['title'];
        ?>
            <li class="follow__item">
              <a href="<?= esc_url($follow_url); ?>"><?= esc_html($follow_title); ?></a>
            </li>
            <?php endwhile; ?>
          </ul>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>
<section class="successes">
  <div class="wrapper">
    <div class="successes__inner">
      <div class="successes__awards">
        <h5 class="successes__headline"><?= the_field('successes_headline')?></h5>
        <?php if( have_rows('awards_list') ): ?>
        <ul class="awards__list">
          <?php while( have_rows('awards_list') ): the_row(); 

        $awards_year = get_sub_field('awards_year');
        $awards_info_first = get_sub_field('awards_info_first');
        $awards_info_who = get_sub_field('awards_info_who');
        $awards_city = get_sub_field('awards_city');
        ?>
          <li class="awards__item">
            <span class="awards__year"><?= $awards_year;?></span>
            <p class="awards__info">
              <span><?= $awards_info_first;?></span>
              <span><?= $awards_info_who;?></span>
            </p>
            <span class="awards__city"><?= $awards_city;?></span>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>

      </div>
      <div class="successes__exhibitions">
        <h5 class="successes__headline"><?= the_field('exhibitions_headline')?></h5>
        <?php if( have_rows('exhibitions') ): ?>
        <ul class="exhibitions">
          <?php while( have_rows('exhibitions') ): the_row(); 
            $exhibitions_year = get_sub_field('exhibitions_year');
            $exhibitions_info = get_sub_field('exhibitions_info');
            $exhibitions_city = get_sub_field('exhibitions_city');
        ?>
          <li class="exhibitions__item">
            <span class="exhibitions__year"><?= $exhibitions_year;?></span>
            <p class="exhibitions__info">
              <?= $exhibitions_info;?>
            </p>
            <span class="exhibitions__city"><?= $exhibitions_city;?></span>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>

      </div>
      <div class="successes__brands">
        <h5 class="successes__headline"><?= the_field('brands_title')?></h5>
        <?php if( have_rows('brands_list') ): ?>
        <ul class="brands__list">
          <?php while( have_rows('brands_list') ): the_row(); 
            $brands_item = get_sub_field('brands_item');
        ?>
          <li class="brands__item">
            <?= $brands_item;?>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </div>
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