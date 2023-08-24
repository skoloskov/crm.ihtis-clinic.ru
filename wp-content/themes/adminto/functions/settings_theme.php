<?php
//Включаем возможность устанавливать миниатюру посту
add_theme_support( 'post-thumbnails' );


//Реквизиты в настройках темы
add_action( 'customize_register', 'add_customizer_init' );
function add_customizer_init( $wp_customize ) {
    $wp_customize->add_section(
        'account_details_section',
        array(
            'title'       => 'Реквизиты',
            'priority'    => 100,
            'description' => 'Поля для добавления реквизитов компании.',
        )
    );

    $wp_customize->add_setting(
        'company_name',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_name',
        array(
            'section'   => 'account_details_section',
            'label'     => 'Название компании',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting(
        'company_director',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_director',
        array(
            'section'   => 'account_details_section',
            'label'     => 'Генеральный директор',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting(
        'company_inn',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_inn',
        array(
            'section'   => 'account_details_section',
            'label'     => 'ИНН',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting(
        'company_ogrn',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_ogrn',
        array(
            'section'   => 'account_details_section',
            'label'     => 'ОГРН',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting(
        'company_rass_schet',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_rass_schet',
        array(
            'section'   => 'account_details_section',
            'label'     => 'Расчетный счет',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting(
        'company_korr_schet',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_korr_schet',
        array(
            'section'   => 'account_details_section',
            'label'     => 'Корр. счет',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting(
        'company_bank_name',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_bank_name',
        array(
            'section'   => 'account_details_section',
            'label'     => 'Наименование банка',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting(
        'company_bik',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_bik',
        array(
            'section'   => 'account_details_section',
            'label'     => 'БИК',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting(
        'company_adress',
        array(
            'default'    =>  '',
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'company_adress',
        array(
            'section'   => 'account_details_section',
            'label'     => 'Адрес',
            'type'      => 'text'
        )
    );
}

//Включаем комментарии
add_action('wp_enqueue_scripts', 'enqueue_comment_reply');
function enqueue_comment_reply() {
    if(is_singular()) {
        wp_enqueue_script('comment-reply');
    }
}