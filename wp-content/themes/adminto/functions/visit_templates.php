<?php
//Записи шаблонов посещений
add_action('init', 'visit_templates_init');
function visit_templates_init() {

    register_taxonomy('visit_templates_name', array('visit_templates'), array(
        'label' => '',
        'labels' => array(
            'name'               => 'Шаблоны посещений',
            'singular_name'      => 'Шаблоны посещений',
            'add_new'            => 'Добавить шаблон посещения',
            'add_new_item'       => 'Добавить новый шаблон посещения',
            'edit_item'          => 'Редактировать шаблон посещения',
            'new_item'           => 'Новый шаблон посещения',
            'view_item'          => 'Посмотреть шаблон посещения',
            'search_items'       => 'Найти шаблон посещения',
            'not_found'          => 'Шаблонов посещений не найдено',
            'not_found_in_trash' => 'В корзине шаблонов посещений не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Категории шаблонов посещений'
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_quick_edit' => true,
        'show_tagcloud' => false,
        'show_admin_column' => true,
    ));

    register_post_type('visit_templates', array(
        'labels'             => array(
            'name'               => 'Шаблоны посещений',
            'singular_name'      => 'Шаблоны посещений',
            'add_new'            => 'Добавить шаблон посещения',
            'add_new_item'       => 'Добавить новый шаблон посещения',
            'edit_item'          => 'Редактировать шаблон посещения',
            'new_item'           => 'Новый шаблон посещения',
            'view_item'          => 'Посмотреть шаблон посещения',
            'search_items'       => 'Найти шаблон посещения',
            'not_found'          => 'Шаблонов посещений не найдено',
            'not_found_in_trash' => 'В корзине шаблонов посещений не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Шаблоны посещений'
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
        'taxonomies'         => array('visit_templates_name'),
    ));
}
