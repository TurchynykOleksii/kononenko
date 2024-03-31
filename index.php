<?php get_header(); ?>

<section class="hero">
  <div class="wrapper">
    <div class="hero__inner">
      <div class="hero__title">
        <h1 class="hero__headline"><?= the_field('zagolovok_first')?><span
            class="hero__end"><?= the_field('zagolovok_second')?></span></h1>
        <p class="hero__subtext">
          <?= the_field('subtext')?>
        </p>
      </div>
      <div class="hero__services">
        <?php if( have_rows('hero_list') ): ?>
        <ul class="hero__list hero__list--pc">
          <?php while( have_rows('hero_list') ): the_row(); 
        ?>
          <li class="hero__item">
            <?= get_sub_field('hero_item') ?>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <p class="hero__list--mob">
          <?= the_field('hero_list--mob')?>
        </p>
        <strong class="hero__slogan">ID</strong>
      </div>
    </div>
    <div class="hero__decor"></div>
  </div>
</section>
<section class="works" id="works">
  <div class="wrapper">
    <div class="works__inner">
      <h2 class="works__title"><?= the_field('works_title')?></h2>




      <!-- ========================== -->
      <?php
$args = array(
    'post_type' => 'works',
    'posts_per_page' => 8, 
);

$works_posts = new WP_Query($args);
?>

      <?php if ($works_posts->have_posts()) : ?>
      <ul class="works__list">
        <?php $count = 0; // Счетчик постов ?>
        <?php $liCount = 0; // Счетчик для <li> элементов ?>
        <?php $isOpenLi = false; // Флаг для отслеживания состояния тега <li> ?>
        <?php while ($works_posts->have_posts()) : $works_posts->the_post(); ?>

        <?php if ($count % 2 == 0) : // Открываем <li> для первого поста и каждого следующего третьего ?>
        <?php if ($isOpenLi) : // Закрываем предыдущий <li>, если он открыт ?>
        </li>
        <?php $isOpenLi = false; ?>
        <?php endif; ?>
        <?php $liClass = $liCount % 2 == 0 ? 'works__item' : 'works__item works__item--reverse'; // Определяем класс для <li> ?>
        <li class="<?= $liClass ?>">
          <?php $isOpenLi = true; ?>
          <?php $liCount++; // Увеличиваем счетчик <li> после создания нового ?>
          <?php endif; ?>

          <div class="works__wrapper <?= $count % 2 == 0 ? 'works__wrapper--big' : 'works__wrapper--small'; ?>">
            <div class="works__img">
              <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?= get_the_title(); ?>">
            </div>
            <div class="works__info">
              <div class="works__text">
                <strong class="works__name"><?= get_the_title(); ?></strong>
                <strong class="works__year">/ <?= get_post_meta(get_the_ID(), 'object_year', true); ?></strong>
              </div>
              <a href="<?= get_the_permalink(); ?>" target="_blank" class="works__view">View</a>
            </div>
          </div>

          <?php if ($count % 2 == 1 && $isOpenLi) : // Закрываем <li> после второго поста ?>
        </li>
        <?php $isOpenLi = false; ?>
        <?php endif; ?>

        <?php $count++; ?>
        <?php endwhile; ?>
        <?php if ($isOpenLi) : // Закрываем открытый <li>, если цикл завершился ?>
        </li>
        <?php endif; ?>
      </ul>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>





      <button class="works__more" data-count="8">show more</button>

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