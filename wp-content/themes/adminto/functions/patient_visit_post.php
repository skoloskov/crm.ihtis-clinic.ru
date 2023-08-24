<?php
//Записии о посещениях клиники пациентами
add_action('init', 'patient_visit_init');
function patient_visit_init() {
    register_post_type('patient_visit', array(
        'labels'             => array(
            'name'               => 'Посещение клиники',
            'singular_name'      => 'Посещение клиники',
            'add_new'            => 'Добавить новое посещение',
            'add_new_item'       => 'Добавить новое посещение',
            'edit_item'          => 'Редактировать посещение',
            'new_item'           => 'Новое посещение',
            'view_item'          => 'Посмотреть посещение',
            'search_items'       => 'Найти посещение',
            'not_found'          => 'Посещений не найдено',
            'not_found_in_trash' => 'В корзине посещений не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Посещения клиники'
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
        'supports'           => ['title', 'author'],
    ));
}

// Добавляем мета поля в запись о посещении
add_action('add_meta_boxes', 'patient_visit_custom_fields', 1);

function patient_visit_custom_fields () {
    add_meta_box('patient_visit_fields_main', 'Основные поля', 'patient_visit_fields_main_box_func', 'patient_visit', 'normal', 'high' );
    add_meta_box('patient_visit_fields_additional', 'Шаблон приема', 'patient_visit_fields_reception_template_func', 'patient_visit', 'normal', 'high');
}

function patient_visit_fields_main_box_func( $post ){ ?>

    <p><label><span class="metabox_name">Дата записи: </span><input type="date" name="extra[visit_date]" placeholder="" value="<?php echo get_post_meta($post->ID, 'visit_date', 1); ?>" style="width:50%" /></label></p>

    <p>
        <label>
            <span class="metabox_name">Врач: </span>
            <select name="extra[doctor_name]" id="extra[doctor_name]">
                <?php
                    $users = get_users();
                    foreach ($users as $user) {
                        $user_selected = get_post_meta($post->ID, 'doctor_name', 1); ?>
                        <option value="<?= $user->display_name; ?>" <?php selected( $user_selected, $user->display_name ); ?>><?= $user->display_name; ?></option>
                <?php } ?>
            </select>
        </label>
    </p>

    <p>
        <label>
            <span class="metabox_name">Пациент: </span>
            <select name="extra[patient_name]" id="extra[patient_name]">
                <?php
                $patients = get_posts(array('post_type' => 'patient'));
                foreach ($patients as $patient) {
                    $patient_selected = get_post_meta($post->ID, 'patient_name', 1); ?>
                    <option value="<?= $patient->post_title; ?>" <?php selected( $patient_selected, $patient->post_title ); ?>><?= $patient->post_title; ?></option>
                <?php } ?>
            </select>
        </label>
    </p>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />

<?php }

function patient_visit_fields_reception_template_func( $post ){ ?>
    <?php
        $args = array(
            'taxonomy' => 'visit_templates_name',
            'orderby' => 'ID',
            'order' => 'ASC',
            'hide_empty' => false,
            'parent' => 0,
        );
        $parent_categories = get_terms( $args );
    ?>
    <?php
    foreach ($parent_categories as $category) {
        $category_selected = get_post_meta($post->ID, 'reception_type', 1); ?>
        <label for="reception_type_<?= $category->slug; ?>"><?= $category->name; ?></label><input type="radio" name="extra[reception_type]" value="<?= $category->term_id; ?>" id="reception_type_<?= $category->slug; ?>" <?php checked( $category_selected, $category->term_id ); ?> />
    <?php } ?>
    <?php foreach ($parent_categories as $category) { ?>
        <div class="reception_type_tab" id="reception_type_<?= $category->slug; ?>_text">
            <?php
                $args_childs = array(
                    'taxonomy' => 'visit_templates_name',
                    'child_of' => $category->term_id,
                    'hide_empty' => false,
                    'orderby' => 'ID',
                    'order' => 'ASC',
                    );
                $childs_categories = get_terms( $args_childs );
                foreach ($childs_categories as $child_category) { ?>
                    <p><label><span class="metabox_name"><?= $child_category->name ?>: </span>
                            <?php
                            $diagnosis = get_posts(array(
                                'post_type' => 'visit_templates',
                                'posts_per_page' => -1,
                                'orderby' => 'ID',
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'visit_templates_name',
                                        'field'    => 'slug',
                                        'terms' => $child_category->slug,
                                    )
                                )
                            ));
                            $child_category_name = 'visit_templates_' . str_replace('-', '_', $child_category->slug);
                            $diagnosis_selected = get_post_meta($post->ID, $child_category_name, 1);
                            ?>
                            <select name="extra[<?= $child_category_name ?>]" id="extra[<?= $child_category_name ?>]">
                                <?php foreach ($diagnosis as $diagnose) { ?>
                                    <option value="<?= $diagnose->post_title; ?>" <?php selected( $diagnosis_selected, $diagnose->post_title ); ?>><?= $diagnose->post_title; ?></option>
                               <?php } ?>
                            </select>
                        </label></p>
                <?php } ?>
        </div>
    <?php } ?>

    <!-- p><label><span class="metabox_name">Тип приема: </span><input type="text" name="extra[free_baggage]" placeholder="" value="<?php echo get_post_meta($post->ID, 'free_baggage', 1); ?>" style="width:50%" /></label></p -->

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }


// включаем обновление полей при сохранении
add_action( 'save_post', 'visit_fields_update', 0 );

## Сохраняем данные, при сохранении поста
function visit_fields_update( $post_id ){
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