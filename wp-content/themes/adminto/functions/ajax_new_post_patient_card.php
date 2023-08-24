<?php
//Добавление записей в историю болезней через ajax
add_action( 'wp_enqueue_scripts', 'ajax_actions_scripts' );
function ajax_actions_scripts() {
    wp_enqueue_script('add_posts', get_theme_file_uri('/assets/js/add_posts.js'), array('jquery'), 1.0, true );
    //Создаем переменную с адресом обработчика ajax
    wp_localize_script( 'add_posts', 'ajax_action_object', array(
        'url'   => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'ajax-form-nonce' ),
    ) );
}

//Добавляем новую запись из админки
add_action( 'wp_ajax_add_patient_visit', 'ajax_new_patient_visit' );
add_action( 'wp_ajax_nopriv_add_patient_visit', 'ajax_new_patient_visit' );
function ajax_new_patient_visit() {

    $postTitle = 'Посещение ' . $_POST["patient_name"] . ' от ' . $_POST["visit_date"];

    $meta_input_array = [
        'patient_name'  => $_POST['patient_name'],
        'visit_date'  => $_POST['visit_date'],
        'doctor_name'  => $_POST['doctor_name'],
        'reception_type'  => $_POST['reception_type'],
    ];

    $args_childs = array(
        'taxonomy' => 'visit_templates_name',
        'child_of' => $_POST['reception_type'],
        'hide_empty' => false,
        'orderby' => 'ID',
        'order' => 'ASC',
    );
    $childs_categories = get_terms( $args_childs );

    foreach ($childs_categories as $child_category) {
        $child_category_name = 'visit_templates_' . str_replace('-', '_', $child_category->slug);
        $meta_input_array[$child_category_name] = $_POST[$child_category_name];
    }

    $post_data = array(
        'post_title'    => $postTitle,
        'post_status'   => 'publish',
        'post_type' => 'patient_visit',
        'meta_input' => $meta_input_array,
    );
    error_log($post_data);
    $post_id = wp_insert_post( $post_data, true );

    die; // даём понять, что обработчик закончил выполнение
}
