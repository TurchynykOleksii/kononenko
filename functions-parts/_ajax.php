<?php
function blog_loadmore() {
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 2;
    $args = array(
        'post_type' => 'works',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'paged' => $paged,
    );

    $query = new WP_Query($args);
    $html = ''; // Инициализируем переменную для HTML
    $isOpenLi = false; // Флаг для отслеживания открытого тега <li>

    if ($query->have_posts()) {
        $count = 0; // Счетчик постов

        while ($query->have_posts()) {
            $query->the_post();

            // Открываем новый <li>, если это начало пары или предыдущий <li> закрыт
            if ($count % 2 == 0 && !$isOpenLi) {
                $li_class = (floor($count / 2) % 2 == 0) ? 'works__item' : 'works__item works__item--reverse';
                $html .= '<li class="' . $li_class . '">';
                $isOpenLi = true;
            }

            // Вывод поста
            $wrapper_class = $count % 2 == 0 ? 'works__wrapper--big' : 'works__wrapper--small';
            $html .= '<div class="works__wrapper ' . $wrapper_class . '">';
            $html .= '<div class="works__img"><img src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" alt="' . get_the_title() . '"></div>';
            $html .= '<div class="works__info">';
            $html .= '<div class="works__text"><strong class="works__name">' . get_the_title() . '</strong><strong class="works__year">/ ' . get_the_date('Y') . '</strong></div>';
            $html .= '<a href="' . get_the_permalink() . '" class="works__view">View</a>';
            $html .= '</div></div>';

            // Закрываем <li>, если это второй пост в паре
            if ($count % 2 == 1 && $isOpenLi) {
                $html .= '</li>';
                $isOpenLi = false;
            }

            $count++;
        }

        // Закрываем <li>, если после завершения цикла он остался открытым
        if ($isOpenLi) {
            $html .= '</li>';
        }
    } else {
        $html = 'No posts found';
    }

    wp_reset_postdata();

    // Подготовка данных для JSON
    $result = ['posts' => $html, 'max_pages' => $query->max_num_pages];
    wp_send_json($result);
}






add_action('wp_ajax_blog_loadmore', 'blog_loadmore');
add_action('wp_ajax_nopriv_blog_loadmore', 'blog_loadmore');