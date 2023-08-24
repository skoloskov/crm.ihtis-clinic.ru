<?php

//Таксономии для карты пациента
add_action('init', 'create_patient_card');

function create_patient_card(){

    //Добавляем карты пациентов
    $arrPatientCard = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Пациент',
            'singular_name'      => 'Пациент',
            'add_new'            => 'Добавить пациента',
            'add_new_item'       => 'Добавить нового пациента',
            'edit_item'          => 'Редактировать пациента',
            'new_item'           => 'Новый пациент',
            'view_item'          => 'Посмотреть пациента',
            'search_items'       => 'Найти пациента',
            'not_found'          => 'Пациентов не найдена',
            'not_found_in_trash' => 'В корзине пациентов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Пациент',
        ),
        'public' => true,
        'hierarchical' => false,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_card', 'patient_card_post', $arrPatientCard );

    // Добавляем жалобы в анамнез
    $arrPatientZhaloby = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Жалобы',
            'singular_name'      => 'Жалоба',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Жалобы',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_zhaloby', 'patient_card_post', $arrPatientZhaloby );

    // Добавляем Характер боли в анамнез
    $arrPatientHarakterBoli = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Характер боли',
            'singular_name'      => 'Характер боли',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Характер боли',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_harakter_boli', 'patient_card_post', $arrPatientHarakterBoli );

    // Добавляем Анамнез заболевания в анамнез
    $arrPatientAnamnezZabolevaniya = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Анамнез заболевания',
            'singular_name'      => 'Анамнез заболевания',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Анамнез заболевания',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_anamnez_zabolevaniya', 'patient_card_post', $arrPatientAnamnezZabolevaniya );

    // Добавляем Проведенное лечение в анамнез
    $arrPatientProvedennoeLechenie = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Проведенное лечение',
            'singular_name'      => 'Проведенное лечение',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Проведенное лечение',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_provedennoe_lechenie', 'patient_card_post', $arrPatientProvedennoeLechenie );

    // Добавляем Анамнез жизни в анамнез
    $arrPatientAnamnezZhizni = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Анамнез жизни',
            'singular_name'      => 'Анамнез жизни',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Анамнез жизни',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_anamne_zhizni', 'patient_card_post', $arrPatientAnamnezZhizni );

    // Добавляем Аллергоанамнез в анамнез
    $arrPatientAllergoanamnez = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Аллергоанамнез',
            'singular_name'      => 'Аллергоанамнез',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Аллергоанамнез',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_allergoanamnez', 'patient_card_post', $arrPatientAllergoanamnez );


    // Добавляем Общее состояние в анамнез
    $arrPatientObshheeSostoyanie = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Общее состояние',
            'singular_name'      => 'Общее состояние',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Общее состояние',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_obshhee_sostoyanie', 'patient_card_post', $arrPatientObshheeSostoyanie );


    // Добавляем Неврологический статус в анамнез
    $arrPatientNevrologicheskijStatus = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Неврологический статус',
            'singular_name'      => 'Неврологический статус',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Неврологический статус',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_nevrologicheskij_status', 'patient_card_post', $arrPatientNevrologicheskijStatus );


    // Добавляем Ортопедический статус в анамнез
    $arrPatientOrtopedicheskijStatus = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Ортопедический статус',
            'singular_name'      => 'Ортопедический статус',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Ортопедический статус',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_ortopedicheskij_status', 'patient_card_post', $arrPatientOrtopedicheskijStatus );


    // Добавляем Локальный статус в анамнез
    $arrPatientLokalnyjStatus = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Локальный статус',
            'singular_name'      => 'Локальный статус',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Локальный статус',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_lokalnyj_status', 'patient_card_post', $arrPatientLokalnyjStatus );


    // Добавляем Результаты обследования в анамнез
    $arrPatientRezultatyObsledovaniya = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Результаты обследования',
            'singular_name'      => 'Результаты обследования',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Результаты обследования',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_rezultaty_obsledovaniya', 'patient_card_post', $arrPatientRezultatyObsledovaniya );


    // Добавляем Предварительный диагноз в анамнез
    $arrPatientPredvaritelnyjDiagnoz = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Предварительный диагноз',
            'singular_name'      => 'Предварительный диагноз',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Предварительный диагноз',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_predvaritelnyj_diagnoz', 'patient_card_post', $arrPatientPredvaritelnyjDiagnoz );


    // Добавляем МКБ 10 Предварительного диагноза в анамнез
    $arrPatientMKB10 = array(
        'label' => '',
        'labels' => array(
            'name'               => 'МКБ 10 Предварительного диагноза',
            'singular_name'      => 'МКБ 10 Предварительного диагноза',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'МКБ 10 Предварительного диагноза',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_mkb_10', 'patient_card_post', $arrPatientMKB10 );


    // Добавляем Рекомендации по лечению в анамнез
    $arrPatientRekomendaciiLechenie = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Рекомендации по лечению',
            'singular_name'      => 'Рекомендации по лечению',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Рекомендации по лечению',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_rekomendaczii_lechenie', 'patient_card_post', $arrPatientRekomendaciiLechenie );


    // Добавляем Рекомендации по обследованию в анамнез
    $arrPatientRekObsl = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Рекомендации по обследованию',
            'singular_name'      => 'Рекомендации по обследованию',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Рекомендации по обследованию',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );

    register_taxonomy('patient_rekomendaczii_obsled', 'patient_card_post', $arrPatientRekObsl );


    // Добавляем Повторная явка в анамнез
    $arrPatientPovtornayaYavka = array(
        'label' => '',
        'labels' => array(
            'name'               => 'Повторная явка',
            'singular_name'      => 'Повторная явка',
            'add_new'            => 'Добавить запись',
            'add_new_item'       => 'Добавить запись',
            'edit_item'          => 'Редактировать запись',
            'new_item'           => 'Новая запись',
            'view_item'          => 'Посмотреть запись',
            'search_items'       => 'Найти запись',
            'not_found'          => 'Запись не найдена',
            'not_found_in_trash' => 'В корзине записей не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Повторная явка',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
        'show_admin_column' => true,
    );

    register_taxonomy('patient_povtornaya_yavka', 'patient_card_post', $arrPatientPovtornayaYavka );
}


//Добавление записи в карту пациента
add_action('init', 'patient_card_post_custom_init');
function patient_card_post_custom_init(){
    register_post_type('patient_card_post', array(
        'labels'             => array(
            'name'               => 'Записи в карту пациента',
            'singular_name'      => 'Запись в карту пациента',
            'add_new'            => 'Добавить новую',
            'add_new_item'       => 'Добавить новую запись в карте пациента',
            'edit_item'          => 'Редактировать запись в карте пациента',
            'new_item'           => 'Новая запись в карте пациента',
            'view_item'          => 'Посмотреть запись в карте пациента',
            'search_items'       => 'Найти запись в карте пациента',
            'not_found'          => 'Записей в карте пациента не найдено',
            'not_found_in_trash' => 'В корзине записей в карте пациента не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Записи в карту пациента'

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
        'supports'           => ['title', 'comments', 'author'],
    ) );
}


// Добавляем мета поля в профиль пациента
add_action('add_meta_boxes', 'patient_card_extra_fields', 1);

function patient_card_extra_fields() {
    add_meta_box( 'patient_card_extra_fields', 'Осмотр пациента', 'patient_card_extra_fields_box_func', 'patient_card_post', 'normal', 'high'  );
}

function patient_card_extra_fields_box_func( $post ){
    $taksonomii = get_taxonomies(array('_builtin' => 0, 'object_type' => array('patient_card_post'),), 'objects' );
    foreach( $taksonomii as $taksonomiya ) {
        if('patient_card' != $taksonomiya->name) {
            echo '<h2>' . $taksonomiya->label . '</h2>';

            $termini = get_the_terms( $post->ID, $taksonomiya->name );
            if($termini) {
                foreach( $termini as $termin ){
                    echo '<p>' . $termin->name . '</p>';
                }
            } else {
                echo '<p>нет</p>';
            }
        }
    }
}

function patient_card_extra_fields_vis( $post_id ){
    $taksonomii = get_taxonomies(array('_builtin' => 0, 'object_type' => array('patient_card_post'),), 'objects' );
    foreach( $taksonomii as $taksonomiya ) {
        if('patient_card' != $taksonomiya->name) {
            echo '<h5>' . $taksonomiya->label . '</h5>';

            $termini = get_the_terms( $post_id, $taksonomiya->name );
            if($termini) {
                foreach( $termini as $termin ){
                    echo '<p>' . $termin->name . '</p>';
                }
            } else {
                echo '<p>нет</p>';
            }
        }
    }
}

function patient_card_one_field_vis( $post_id ){
    $taksonomii = get_taxonomies(array('_builtin' => 0, 'object_type' => array('patient_card_post'),), 'objects' );
    foreach( $taksonomii as $taksonomiya ) {
        if('patient_zhaloby' == $taksonomiya->name) {
            $termini = get_the_terms( $post_id, $taksonomiya->name );
            if($termini) {
                foreach( $termini as $termin ){
                    echo $termin->name;
                }
            } else {
                echo 'Жалоб нет';
            }
        }
    }
}

//Сбор формы карты пациента для отрпавки на печать
function patient_card_pdf_osmotr_print( $post_id ){
    $taksonomii = get_taxonomies(array('_builtin' => 0, 'object_type' => array('patient_card_post'),), 'objects' );
    foreach( $taksonomii as $taksonomiya ) {
        if('patient_card' !== $taksonomiya->name) {
            $printLabel = '<input name="patient_date[' . $taksonomiya->name . ']" ';

            $termini = get_the_terms( $post_id, $taksonomiya->name );
            if($termini) {
                foreach( $termini as $termin ){
                    $printLabel = $printLabel . 'value="' . $termin->name . '" type="hidden">';
                }
            } else {
                $printLabel = $printLabel . 'value="нет" type="hidden">';
            }
            echo $printLabel;
        }
    }
}
