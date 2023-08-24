<?php
//Записи диагнозов
add_action('init', 'diagnoses_init');
function diagnoses_init() {
    register_post_type('diagnoses', array(
        'labels'             => array(
            'name'               => 'Диагнозы',
            'singular_name'      => 'Диагнозы',
            'add_new'            => 'Добавить диагноз',
            'add_new_item'       => 'Добавить новый диагноз',
            'edit_item'          => 'Редактировать диагноз',
            'new_item'           => 'Новый диагноз',
            'view_item'          => 'Посмотреть диагноз',
            'search_items'       => 'Найти диагноз',
            'not_found'          => 'Диагнозов не найдено',
            'not_found_in_trash' => 'В корзине диагнозов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Диагнозы'
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