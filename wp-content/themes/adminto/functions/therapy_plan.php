<?php
//Записи планов лечения
add_action('init', 'therapy_plan_init');
function therapy_plan_init() {
    register_post_type('therapy_plan', array(
        'labels'             => array(
            'name'               => 'Планы лечения',
            'singular_name'      => 'План лечения',
            'add_new'            => 'Добавить план лечения',
            'add_new_item'       => 'Добавить новый план лечения',
            'edit_item'          => 'Редактировать план лечения',
            'new_item'           => 'Новый план лечения',
            'view_item'          => 'Посмотреть план лечения',
            'search_items'       => 'Найти план лечения',
            'not_found'          => 'Планов лечения не найдено',
            'not_found_in_trash' => 'В корзине планов лечения не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Планы лечения'
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