<?php

//Подключаем CSS для админки
function my_admin_style() {
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/style_admin.css');
}
add_action('admin_enqueue_scripts', 'my_admin_style');
