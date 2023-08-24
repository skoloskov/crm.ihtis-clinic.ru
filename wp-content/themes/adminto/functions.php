<?php

//подключение css и js
if (file_exists(TEMPLATEPATH . "/functions/add_css_js.php")) {
    require_once(TEMPLATEPATH . "/functions/add_css_js.php");
}

//настройки темы
if (file_exists(TEMPLATEPATH . "/functions/settings_theme.php")) {
    require_once(TEMPLATEPATH . "/functions/settings_theme.php");
}

//карточка пациента
if (file_exists(TEMPLATEPATH . "/functions/patient_post.php")) {
    require_once(TEMPLATEPATH . "/functions/patient_post.php");
}

//запись в историю болезни СТАРАЯ
if (file_exists(TEMPLATEPATH . "/functions/patient_card_post.php")) {
    require_once(TEMPLATEPATH . "/functions/patient_card_post.php");
}

//добавление записи в историю болезни AJAX
if (file_exists(TEMPLATEPATH . "/functions/ajax_new_post_patient_card.php")) {
    require_once(TEMPLATEPATH . "/functions/ajax_new_post_patient_card.php");
}

//посещение пациента
if (file_exists(TEMPLATEPATH . "/functions/patient_visit_post.php")) {
    require_once(TEMPLATEPATH . "/functions/patient_visit_post.php");
}

//шаблоны посещений
if (file_exists(TEMPLATEPATH . "/functions/visit_templates.php")) {
    require_once(TEMPLATEPATH . "/functions/visit_templates.php");
}

//платные услуги
if (file_exists(TEMPLATEPATH . "/functions/paid_services.php")) {
    require_once(TEMPLATEPATH . "/functions/paid_services.php");
}

//планы лечения
if (file_exists(TEMPLATEPATH . "/functions/therapy_plan.php")) {
    require_once(TEMPLATEPATH . "/functions/therapy_plan.php");
}

//диагнозы
if (file_exists(TEMPLATEPATH . "/functions/diagnoses.php")) {
    require_once(TEMPLATEPATH . "/functions/diagnoses.php");
}

//оплаты
if (file_exists(TEMPLATEPATH . "/functions/payments.php")) {
    require_once(TEMPLATEPATH . "/functions/payments.php");
}


