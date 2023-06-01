<?php

function my_admin_style() {
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/style_admin.css');
}
add_action('admin_enqueue_scripts', 'my_admin_style');


add_action('init', 'my_custom_init');
function my_custom_init(){
    register_post_type('patient', array(
        'labels'             => array(
            'name'               => 'Пациенты',
            'singular_name'      => 'Пациент',
            'add_new'            => 'Добавить нового',
            'add_new_item'       => 'Добавить нового пациента',
            'edit_item'          => 'Редактировать пациента',
            'new_item'           => 'Новый пациент',
            'view_item'          => 'Посмотреть пациента',
            'search_items'       => 'Найти пациента',
            'not_found'          => 'Пациента не найдено',
            'not_found_in_trash' => 'В корзине пациентов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Пациенты'

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
        'supports'           => array('title','thumbnail'),
    ) );
}

// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
    add_meta_box( 'extra_fields', 'Обязательные поля', 'extra_required_fields_box_func', 'patient', 'normal', 'high'  );
    add_meta_box( 'extra_fields_additional', 'Дополнительные поля', 'extra_additional_fields_box_func', 'patient', 'normal', 'high'  );
    add_meta_box( 'extra_fields_confidants', 'Доверенное лицо', 'extra_confidant_fields_box_func', 'patient', 'normal', 'high'  );
}

function extra_required_fields_box_func( $post ){
    ?>
    <p><span class="paceint_metabox_name_field">Пол: </span><?php $mark_v = get_post_meta($post->ID, 'gender', 1); ?>
        <label><input type="radio" name="extra[gender]" value="Мужской" <?php checked( $mark_v, '' ); ?> />Мужской</label>
        <label><input type="radio" name="extra[gender]" value="Женский" <?php checked( $mark_v, 'nofollow' ); ?> />Женский</label>
    </p>

    <p><label><span class="paceint_metabox_name_field">Дата рождения: </span><input type="text" name="extra[birth_date]" placeholder="mm/dd/yyyy" value="<?php echo get_post_meta($post->ID, 'birth_date', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Телефон: </span><input type="text" name="extra[phone]" placeholder="+7(999) 999-9999" value="<?php echo get_post_meta($post->ID, 'phone', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Адрес проживания: </span><input type="text" name="extra[adress]" value="<?php echo get_post_meta($post->ID, 'adress', 1); ?>" style="width:50%" /></label></p>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

function extra_additional_fields_box_func( $post ){
    ?>
    <p><label><span class="paceint_metabox_name_field">Серия и номер паспорта: </span><input type="text" name="extra[ps_number]" value="<?php echo get_post_meta($post->ID, 'ps_number', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Кем выдан: </span><input type="text" name="extra[ps_organization]" value="<?php echo get_post_meta($post->ID, 'ps_organization', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Дата выдачи: </span><input type="text" name="extra[ps_date]" placeholder="mm/dd/yyyy" value="<?php echo get_post_meta($post->ID, 'ps_date', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Адрес регистрации: </span><input type="text" name="extra[ps_adress]" value="<?php echo get_post_meta($post->ID, 'ps_adress', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">СНИЛС: </span><input type="text" name="extra[snils]" value="<?php echo get_post_meta($post->ID, 'snils', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Номер ОМС/ДМС: </span><input type="text" name="extra[oms_dms]" value="<?php echo get_post_meta($post->ID, 'oms_dms', 1); ?>" style="width:50%" /></label></p>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}


function extra_confidant_fields_box_func( $post ){
    ?>
    <p><label><span class="paceint_metabox_name_field">ФИО доверенного лица: </span><input type="text" name="extra[fio_dl]" placeholder="mm/dd/yyyy" value="<?php echo get_post_meta($post->ID, 'fio_dl', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Телефон доверенного лица: </span><input type="text" name="extra[phone_dl]" placeholder="+7(999) 999-9999" value="<?php echo get_post_meta($post->ID, 'phone_dl', 1); ?>" style="width:50%" /></label></p>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}


// включаем обновление полей при сохранении
add_action( 'save_post', 'my_extra_fields_update', 0 );

## Сохраняем данные, при сохранении поста
function my_extra_fields_update( $post_id ){
    // базовая проверка
    if (
        empty( $_POST['extra'] )
        || ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
        || wp_is_post_autosave( $post_id )
        || wp_is_post_revision( $post_id )
    )
        return false;

    // Все ОК! Теперь, нужно сохранить/удалить данные
    $_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
    foreach( $_POST['extra'] as $key => $value ){
        if( empty($value) ){
            delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
    }

    return $post_id;
}



?>