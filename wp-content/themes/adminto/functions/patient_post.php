<?php
//Добавляем запись Пациенты
add_action('init', 'patient_custom_init');
function patient_custom_init(){
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
        'supports'           => ['title', 'thumbnail', 'comments'],
        'taxonomies'         => array('post_tag'),
    ) );
}

// Добавляем мета поля в профиль пациента
add_action('add_meta_boxes', 'patient_extra_fields', 1);

function patient_extra_fields() {
    add_meta_box( 'extra_fields', 'Обязательные поля', 'extra_required_fields_box_func', 'patient', 'normal', 'high'  );
    add_meta_box( 'extra_fields_additional', 'Дополнительные поля', 'extra_additional_fields_box_func', 'patient', 'normal', 'high'  );
    add_meta_box( 'extra_fields_confidants', 'Доверенное лицо', 'extra_confidant_fields_box_func', 'patient', 'normal', 'high'  );
}

function extra_required_fields_box_func( $post ){
    ?>
    <p>
        <span class="paceint_metabox_name_field">Пол: </span><?php $mark_v = get_post_meta($post->ID, 'gender', 1); ?>
        <label><input type="radio" name="extra[gender]" value="Мужской" <?php checked( $mark_v, 'Мужской' ); ?> />Мужской</label>
        <label><input type="radio" name="extra[gender]" value="Женский" <?php checked( $mark_v, 'Женский' ); ?> />Женский</label>
    </p>

    <p><label><span class="paceint_metabox_name_field">Дата рождения: </span><input type="text" name="extra[birth_date]" placeholder="mm/dd/yyyy" value="<?php echo get_post_meta($post->ID, 'birth_date', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Телефон: </span><input type="text" name="extra[phone]" placeholder="+7(999) 999-9999" value="<?php echo get_post_meta($post->ID, 'phone', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Субъект Российской Федерации: </span><input type="text" name="extra[adress_subject]" value="<?php echo get_post_meta($post->ID, 'adress_subject', 1); ?>" style="width:50%" /></label></p>

    <p>
        <label>
            <span class="paceint_metabox_name_field">Район, город, населенный пункт: </span>
            <input type="text" name="extra[adress_region]" value="<?php echo get_post_meta($post->ID, 'adress_region', 1); ?>" style="width:25%" />
            <input type="text" name="extra[adress_city]" value="<?php echo get_post_meta($post->ID, 'adress_city', 1); ?>" style="width:25%" />
            <input type="text" name="extra[adress_point]" value="<?php echo get_post_meta($post->ID, 'adress_point', 1); ?>" style="width:25%" />
        </label>
    </p>

    <p>
        <label>
            <span class="paceint_metabox_name_field">Улица, дом, квартира: </span>
            <input type="text" name="extra[adress_street]" value="<?php echo get_post_meta($post->ID, 'adress_street', 1); ?>" style="width:30%" />
            <input type="text" name="extra[adress_building]" value="<?php echo get_post_meta($post->ID, 'adress_building', 1); ?>" style="width:15%" />
            <input type="text" name="extra[adress_appartament]" value="<?php echo get_post_meta($post->ID, 'adress_appartament', 1); ?>" style="width:15%" />
        </label>
    </p>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

function extra_additional_fields_box_func( $post ){
    ?>
    <p>
        <label>
            <span class="paceint_metabox_name_field">Серия и номер паспорта: </span>
            <input type="text" name="extra[ps_series]" value="<?php echo get_post_meta($post->ID, 'ps_series', 1); ?>" style="width:15%" />
            <input type="text" name="extra[ps_number]" value="<?php echo get_post_meta($post->ID, 'ps_number', 1); ?>" style="width:35%" />
        </label>
    </p>

    <p><label><span class="paceint_metabox_name_field">Кем выдан: </span><input type="text" name="extra[ps_organization]" value="<?php echo get_post_meta($post->ID, 'ps_organization', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Дата выдачи: </span><input type="text" name="extra[ps_date]" placeholder="mm/dd/yyyy" value="<?php echo get_post_meta($post->ID, 'ps_date', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">СНИЛС: </span><input type="text" name="extra[snils]" value="<?php echo get_post_meta($post->ID, 'snils', 1); ?>" style="width:50%" /></label></p>

    <p>
        <label>
            <span class="paceint_metabox_name_field">Серия и номер ОМС: </span>
            <input type="text" name="extra[oms_series]" value="<?php echo get_post_meta($post->ID, 'oms_series', 1); ?>" style="width:15%" />
            <input type="text" name="extra[oms_number]" value="<?php echo get_post_meta($post->ID, 'oms_number', 1); ?>" style="width:35%" />
        </label>
    </p>

    <p><label><span class="paceint_metabox_name_field">Страховая медицинская организация: </span><input type="text" name="extra[oms_company]" value="<?php echo get_post_meta($post->ID, 'oms_company', 1); ?>" style="width:50%" /></label></p>

    <p><label><span class="paceint_metabox_name_field">Код категории льготы: </span><input type="text" name="extra[privileges_cod]" value="<?php echo get_post_meta($post->ID, 'privileges_cod', 1); ?>" style="width:50%" /></label></p>

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
