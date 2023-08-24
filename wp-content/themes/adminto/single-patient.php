<?php get_header(); ?>

<?php
    while ( have_posts() ) :
        the_post();
?>

    <div class="wrapper">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Страница пациента</h4>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <?php $arrPatientMeta = get_post_custom(); //получаем данные пациента для вывода ?>
            <?php // echo '<pre>' . print_r($arrPatientMeta, true) . '</pre>'; ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="card-box task-detail">
                        <div class="dropdown pull-right">
                            <?php  ?>
                            <form class="print_form" method="post" action="/pdf_front_page.php">
                                <input name="patient_date[id]" value="<?= get_the_ID() ?>" type="hidden">
                                <input name="patient_date[name]" value="<?= the_title() ?>" type="hidden">
                                <input name="patient_date[gender]" value="<?= $arrPatientMeta['gender'][0]?>" type="hidden">
                                <input name="patient_date[birth_date]" value="<?=$arrPatientMeta['birth_date'][0]?>" type="hidden">
                                <input name="patient_date[phone]" value="<?=$arrPatientMeta['phone'][0]?>" type="hidden">
                                <input name="patient_date[adress_subject]" value="<?=$arrPatientMeta['adress_subject'][0]?>" type="hidden">
                                <input name="patient_date[adress_region]" value="<?=$arrPatientMeta['adress_region'][0]?>" type="hidden">
                                <input name="patient_date[adress_city]" value="<?=$arrPatientMeta['adress_city'][0]?>" type="hidden">
                                <input name="patient_date[adress_point]" value="<?=$arrPatientMeta['adress_point'][0]?>" type="hidden">
                                <input name="patient_date[adress_street]" value="<?=$arrPatientMeta['adress_street'][0]?>" type="hidden">
                                <input name="patient_date[adress_building]" value="<?=$arrPatientMeta['adress_building'][0]?>" type="hidden">
                                <input name="patient_date[adress_appartament]" value="<?=$arrPatientMeta['adress_appartament'][0]?>" type="hidden">
                                <input name="patient_date[ps_series]" value="<?=$arrPatientMeta['ps_series'][0]?>" type="hidden">
                                <input name="patient_date[ps_number]" value="<?=$arrPatientMeta['ps_number'][0]?>" type="hidden">
                                <input name="patient_date[ps_organization]" value="<?=$arrPatientMeta['ps_organization'][0]?>" type="hidden">
                                <input name="patient_date[ps_date]" value="<?=$arrPatientMeta['ps_date'][0]?>" type="hidden">
                                <input name="patient_date[snils]" value="<?=$arrPatientMeta['snils'][0]?>" type="hidden">
                                <input name="patient_date[oms_series]" value="<?=$arrPatientMeta['oms_series'][0]?>" type="hidden">
                                <input name="patient_date[oms_number]" value="<?=$arrPatientMeta['oms_number'][0]?>" type="hidden">
                                <input name="patient_date[oms_company]" value="<?=$arrPatientMeta['oms_company'][0]?>" type="hidden">
                                <input name="patient_date[privileges_cod]" value="<?=$arrPatientMeta['privileges_cod'][0]?>" type="hidden">
                                <input type="submit" class="btn btn-purple btn-rounded w-md waves-light m-b-5" value="Печать титульного листа">
                            </form>

                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <form class="print_form" method="post" action="/pdf_osmotr.php">
                                    <input name="patient_date[name]" value="<?= the_title() ?>" type="hidden">
                                    <input name="patient_date[birth_date]" value="<?=$arrPatientMeta['birth_date'][0]?>" type="hidden">
                                    <?php
                                    $post_slug = $post->post_name;
                                    $patient_first_record = get_posts( [
                                        'posts_per_page' => 1,
                                        'orderby'        => 'ID',
                                        'order'          => 'ASC',
                                        'post_type'      => 'patient_card_post',
                                        'patient_card'   => $post_slug,
                                        'post_status'    => 'publish',
                                    ] );
                                    if($patient_first_record) {
                                        foreach ($patient_first_record as $record) {
                                            echo patient_card_pdf_osmotr_print($record->ID);
                                        }

                                        wp_reset_postdata();
                                    }
                                    ?>
                                    <input type="submit" class="button_a_link" value="Печать осмотра">
                                </form>
                                <!-- item-->
                                <form class="print_form" method="post" action="/pdf_soglasie_osmotr.php">
                                    <input name="patient_date[name]" value="<?= the_title() ?>" type="hidden">
                                    <input name="patient_date[birth_date]" value="<?=$arrPatientMeta['birth_date'][0]?>" type="hidden">
                                    <input name="patient_date[ps_series]" value="<?=$arrPatientMeta['ps_series'][0]?>" type="hidden">
                                    <input name="patient_date[ps_number]" value="<?=$arrPatientMeta['ps_number'][0]?>" type="hidden">
                                    <input name="patient_date[ps_organization]" value="<?=$arrPatientMeta['ps_organization'][0]?>" type="hidden">
                                    <input name="patient_date[ps_date]" value="<?=$arrPatientMeta['ps_date'][0]?>" type="hidden">
                                    <input type="submit" class="button_a_link" value="Печать соглашения на осмотр">
                                </form>
                                <!-- item-->
                                <form class="print_form" method="post" action="/pdf_dogovor.php">
                                    <input name="patient_date[name]" value="<?= the_title() ?>" type="hidden">
                                    <input name="patient_date[birth_date]" value="<?=$arrPatientMeta['birth_date'][0]?>" type="hidden">
                                    <input name="patient_date[ps_series]" value="<?=$arrPatientMeta['ps_series'][0]?>" type="hidden">
                                    <input name="patient_date[ps_number]" value="<?=$arrPatientMeta['ps_number'][0]?>" type="hidden">
                                    <input name="patient_date[ps_organization]" value="<?=$arrPatientMeta['ps_organization'][0]?>" type="hidden">
                                    <input name="patient_date[ps_date]" value="<?=$arrPatientMeta['ps_date'][0]?>" type="hidden">
                                    <input name="patient_date[adress_city]" value="<?=$arrPatientMeta['adress_city'][0]?>" type="hidden">
                                    <input name="patient_date[adress_street]" value="<?=$arrPatientMeta['adress_street'][0]?>" type="hidden">
                                    <input name="patient_date[adress_building]" value="<?=$arrPatientMeta['adress_building'][0]?>" type="hidden">
                                    <input name="patient_date[adress_appartament]" value="<?=$arrPatientMeta['adress_appartament'][0]?>" type="hidden">
                                    <input name="patient_date[phone]" value="<?=$arrPatientMeta['phone'][0]?>" type="hidden">
                                    <input name="patient_date[company_name]" value="<?=get_theme_mod('company_name')?>" type="hidden">
                                    <input name="patient_date[company_director]" value="<?=get_theme_mod('company_director')?>" type="hidden">
                                    <input name="patient_date[company_inn]" value="<?=get_theme_mod('company_inn')?>" type="hidden">
                                    <input name="patient_date[company_ogrn]" value="<?=get_theme_mod('company_ogrn')?>" type="hidden">
                                    <input name="patient_date[company_rass_schet]" value="<?=get_theme_mod('company_rass_schet')?>" type="hidden">
                                    <input name="patient_date[company_korr_schet]" value="<?=get_theme_mod('company_korr_schet')?>" type="hidden">
                                    <input name="patient_date[company_bank_name]" value="<?=get_theme_mod('company_bank_name')?>" type="hidden">
                                    <input name="patient_date[company_bik]" value="<?=get_theme_mod('company_bik')?>" type="hidden">
                                    <input name="patient_date[company_adress]" value="<?=get_theme_mod('company_adress')?>" type="hidden">
                                    <input type="submit" class="button_a_link" value="Печать договора">
                                </form>
                                <!-- item-->
                                <form class="print_form" method="post" action="/pdf_soglasie_obrab_dannyh.php">
                                    <input name="patient_date[name]" value="<?= the_title() ?>" type="hidden">
                                    <input name="patient_date[ps_series]" value="<?=$arrPatientMeta['ps_series'][0]?>" type="hidden">
                                    <input name="patient_date[ps_number]" value="<?=$arrPatientMeta['ps_number'][0]?>" type="hidden">
                                    <input name="patient_date[ps_organization]" value="<?=$arrPatientMeta['ps_organization'][0]?>" type="hidden">
                                    <input name="patient_date[ps_date]" value="<?=$arrPatientMeta['ps_date'][0]?>" type="hidden">
                                    <input type="submit" class="button_a_link" value="Печать соглашения на обработку данных">
                                </form>
                            </div>

                        </div>
                        <div class="media m-b-30">
                            <img class="d-flex mr-3 rounded-circle" alt="64x64" src="<?php the_post_thumbnail_url(); ?>" style="width: 48px; height: 48px;">
                            <div class="media-body">
                                <h4 class="media-heading mb-0 mt-0"><?php the_title() ?></h4>
                                <span class="badge badge-danger">Пациент</span>
                            </div>
                        </div>





                        <?php
                        /*'<h4 class="font-600 m-b-20">Первое обращение</h4>'
                            $post_slug = $post->post_name;
                            $patient_first_record = get_posts( [
                                'posts_per_page' => 1,
                                'orderby'        => 'ID',
                                'order'          => 'ASC',
                                'post_type'      => 'patient_card_post',
                                'patient_card'   => $post_slug,
                                'post_status'    => 'publish',
                            ] );


                        if($patient_first_record) {
                            foreach ($patient_first_record as $record) {
                                echo patient_card_extra_fields_vis($record->ID);
                            }

                            wp_reset_postdata();
                        } */
                        ?>


                        <h4 class="font-600 m-b-20">Обязательные поля</h4>

                        <dl class="row">
                            <dt class="col-sm-3">Пол</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['gender'][0]; ?></dd>

                            <dt class="col-sm-3">Дата рождения:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['birth_date'][0]; ?></dd>

                            <dt class="col-sm-3 text-truncate">Телефон:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['phone'][0]; ?></dd>

                            <dt class="col-sm-3">Субъект Российской Федерации:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['adress_subject'][0]; ?></dd>

                            <dt class="col-sm-3">Район, город, населенный пункт:</dt>
                            <dd class="col-sm-3"><?= $arrPatientMeta['adress_region'][0]; ?></dd>
                            <dd class="col-sm-3"><?= $arrPatientMeta['adress_city'][0]; ?></dd>
                            <dd class="col-sm-3"><?= $arrPatientMeta['adress_point'][0]; ?></dd>

                            <dt class="col-sm-3">Улица, дом, квартира:</dt>
                            <dd class="col-sm-3"><?= $arrPatientMeta['adress_street'][0]; ?></dd>
                            <dd class="col-sm-3"><?= $arrPatientMeta['adress_building'][0]; ?></dd>
                            <dd class="col-sm-3"><?= $arrPatientMeta['adress_appartament'][0]; ?></dd>
                        </dl>

                        <h4 class="font-600 m-b-20">Дополнительные поля</h4>

                        <dl class="row">
                            <dt class="col-sm-3">Серия и номер паспорта: </dt>
                            <dd class="col-sm-1"><?= $arrPatientMeta['ps_series'][0]; ?></dd>
                            <dd class="col-sm-8"><?= $arrPatientMeta['ps_number'][0]; ?></dd>

                            <dt class="col-sm-3">Кем выдан:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['ps_organization'][0]; ?></dd>

                            <dt class="col-sm-3 text-truncate">Дата выдачи:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['ps_date'][0]; ?></dd>

                            <dt class="col-sm-3 text-truncate">СНИЛС:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['snils'][0]; ?></dd>

                            <dt class="col-sm-3">Серия и номер ОМС:</dt>
                            <dd class="col-sm-1"><?= $arrPatientMeta['oms_series'][0]; ?></dd>
                            <dd class="col-sm-8"><?= $arrPatientMeta['oms_number'][0]; ?></dd>

                            <dt class="col-sm-3">Страховая медицинска организация:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['oms_company'][0]; ?></dd>

                            <dt class="col-sm-3">Код категории льготы:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['privileges_cod'][0]; ?></dd>
                        </dl>

                        <h4 class="font-600 m-b-20">Доверенное лицо</h4>

                        <dl class="row">
                            <dt class="col-sm-3">ФИО доверенного лица: </dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['fio_dl'][0]; ?></dd>

                            <dt class="col-sm-3 text-truncate">Телефон доверенного лица:</dt>
                            <dd class="col-sm-9"><?= $arrPatientMeta['phone_dl'][0]; ?></dd>
                        </dl>



                        <ul class="list-inline task-dates m-b-0 m-t-20">
                            <li>
                                <h5 class="font-600 m-b-5">Start Date</h5>
                                <p> 22 March 2016 <small class="text-muted">1:00 PM</small></p>
                            </li>

                            <li>
                                <h5 class="font-600 m-b-5">Due Date</h5>
                                <p> 17 April 2016 <small class="text-muted">12:00 PM</small></p>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                        <div class="task-tags m-t-20">
                            <h5 class="font-600">Теги</h5>
                            <!-- input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput" placeholder="add tags"/ -->
                            <?php the_tags( '', ); ?>

                        </div>

                        <div class="assign-team m-t-30">
                            <h5 class="font-600 m-b-5">Assign to</h5>
                            <div>
                                <a href="#"> <img class="rounded-circle thumb-sm" alt="64x64" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-2.jpg"> </a>
                                <a href="#"> <img class="rounded-circle thumb-sm" alt="64x64" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-3.jpg"> </a>
                                <a href="#"> <img class="rounded-circle thumb-sm" alt="64x64" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-5.jpg"> </a>
                                <a href="#"> <img class="rounded-circle thumb-sm" alt="64x64" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-8.jpg"> </a>
                                <a href="#"><span class="add-new-plus"><i class="mdi mdi-plus"></i> </span></a>
                            </div>
                        </div>

                        <div class="attached-files m-t-30">
                            <h5 class="font-600">Attached Files </h5>
                            <div class="files-list">
                                <div class="file-box">
                                    <a href=""><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/attached-files/img-1.jpg" class="img-responsive img-thumbnail" alt="attached-img"></a>
                                    <p class="font-13 m-b-5 text-muted"><small>File one</small></p>
                                </div>
                                <div class="file-box">
                                    <a href=""><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/attached-files/img-2.jpg" class="img-responsive img-thumbnail" alt="attached-img"></a>
                                    <p class="font-13 m-b-5 text-muted"><small>Attached-2</small></p>
                                </div>
                                <div class="file-box">
                                    <a href=""><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/attached-files/img-3.png" class="img-responsive img-thumbnail" alt="attached-img"></a>
                                    <p class="font-13 m-b-5 text-muted"><small>Dribbble shot</small></p>
                                </div>
                                <div class="file-box m-l-15">
                                    <div class="fileupload add-new-plus">
                                        <span><i class="mdi-plus mdi"></i></span>
                                        <input type="file" class="upload">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-right m-t-30">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Save
                                        </button>
                                        <button type="button"
                                                class="btn btn-light waves-effect">Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-box">
                        <div class="dropdown pull-right">
                            <button type="submit" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg-post">Добавить запись</button>
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        <h4 class="m-t-0 header-title">История болезни</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Дата приема</th>
                                <th>Тип приема</th>
                                <th>Принимающий врач</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $patient_visits = get_posts( [
                                'posts_per_page' => 10,
                                'orderby'        => 'ID',
                                'order'          => 'DESC',
                                'post_type'      => 'patient_visit',
                                'post_status'    => 'publish',
                                'meta_query' => [
                                    [
                                        'key' => 'patient_name',
                                        'value' => get_the_title(),
                                    ],
                                ]
                            ] );

                                if($patient_visits) {
                                    foreach ($patient_visits as $visit) {
                                        //  echo '<pre>' . print_r($visit, true) . '</pre>';
                                        ?>
                                        <tr>
                                            <td><?php
                                                $visitdDate = explode(' ', $visit->visit_date);
                                                echo $visitdDate[0]; ?></td>
                                            <td>
                                                <?php
                                                $reception_type_name = get_term($visit->reception_type);
                                                echo $reception_type_name->name;
                                                ?>
                                            </td>
                                            <td><?= $visit->doctor_name ?></td>
                                            <td> <a href="<?= $visit->guid ?>">Подробнее</a></td>
                                        </tr>
                                        <?php
                                    }

                                    wp_reset_postdata();
                                } else { echo '<tr><td colspan="3" style="text-align: center">диагноз еще не поставлен</td></tr>' ;}
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div><!-- end col -->

                <div class="col-md-4">
                    <div class="card-box">
                        <h2 class="header-title m-t-0 m-b-30">Финансы</h2>

                        <h5 class="font-600 m-b-5">Остаток средств</h5>
                        <p>50 000 <small class="text-muted">руб.</small></p>

                        <h5 class="font-600 m-b-5">Последние поступления</h5>
                        <p>120 000 <small class="text-muted">руб.</small></p>
                    </div>
                    <div class="card-box">
                        <div class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <div>
                            <div class="media m-b-20">
                                <?php comment_form(array(
                                    'label_submit' => 'Отправить',
                                    'comment_field' => '
                                    <p class="comment-form-comment">
                                        <textarea id="comment" name="comment" cols="45" rows="4" maxlength="65525" class="form-control" required="required"></textarea>
                                    </p>',
                                    'title_reply' => 'Комментарии',
                                    'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title header-title m-t-0 m-b-30">',
                                    'title_reply_after' => '</h4>',
                                    'class_submit' => 'btn btn-primary',
                                )); ?>
                            </div>

                            <?php comments_template( '/comments.php' ); ?>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


        </div> <!-- end container -->


        <!-- Right Sidebar -->
        <div class="side-bar right-bar">
            <a href="javascript:void(0);" class="right-bar-toggle">
                <i class="mdi mdi-close-circle-outline"></i>
            </a>
            <h4 class="">Notifications</h4>
            <div class="notification-list nicescroll">
                <ul class="list-group list-no-border user-list">
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-2.jpg" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">Michael Zenaty</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-info">
                                <i class="mdi mdi-account"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Signup</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">5 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-pink">
                                <i class="mdi mdi-comment"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Message received</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-3.jpg" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">James Anderson</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 days ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-warning">
                                <i class="mdi mdi-settings"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">Settings</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /Right-bar -->

    </div>
    <!-- end wrapper -->

<?php endwhile; ?>
<?php get_footer(); ?>