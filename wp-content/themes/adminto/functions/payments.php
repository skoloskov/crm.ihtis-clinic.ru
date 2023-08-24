<?php
//Записи оплат
add_action('init', 'payments_init');
function payments_init() {
    register_post_type('payments', array(
        'labels'             => array(
            'name'               => 'Оплаты',
            'singular_name'      => 'Оплаты',
            'add_new'            => 'Добавить оплату',
            'add_new_item'       => 'Добавить новую оплату',
            'edit_item'          => 'Редактировать оплату',
            'new_item'           => 'Новая оплата',
            'view_item'          => 'Посмотреть оплату',
            'search_items'       => 'Найти оплату',
            'not_found'          => 'Оплат не найдено',
            'not_found_in_trash' => 'В корзине оплат не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Оплаты'
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
    ));
}