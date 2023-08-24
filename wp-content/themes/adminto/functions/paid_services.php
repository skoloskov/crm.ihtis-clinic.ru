<?php
//Записи платных услуг
add_action('init', 'paid_services_init');
function paid_services_init() {
    register_post_type('paid_services', array(
        'labels'             => array(
            'name'               => 'Платные услуги',
            'singular_name'      => 'Платные услуги',
            'add_new'            => 'Добавить платную услугу',
            'add_new_item'       => 'Добавить новую платную услугу',
            'edit_item'          => 'Редактировать платную услугу',
            'new_item'           => 'Новая платная услуга',
            'view_item'          => 'Посмотреть платную услугу',
            'search_items'       => 'Найти платную услугу',
            'not_found'          => 'Платных услуг не найдено',
            'not_found_in_trash' => 'В корзине платных услуг не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Платные услуги'
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => ['title'],
        'taxonomies'         => array('category'),
    ));
}