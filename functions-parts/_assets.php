<?php 
/*
 * Подключение стилей и скриптов
 * */

function my_assets()
{

    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.min.css');

    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/assets/js/app.js',  [], '1.0', true);
  // wp_localize_script( 'main-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')) );
} 

add_action('wp_enqueue_scripts', 'my_assets');