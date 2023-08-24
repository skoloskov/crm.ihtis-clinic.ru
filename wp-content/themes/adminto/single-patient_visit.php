<?php get_header(); ?>

<?php
    while ( have_posts() ) :
    the_post();
?>
        <?php $arrVisitMeta = get_post_custom(); //получаем данные визита для вывода ?>
        <div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-title"><?= the_title() ?></h1>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box task-detail">
                            <h4 class="font-600 m-b-20">Основная информация</h4>
                            <dl class="row">
                                <dt class="col-sm-3">Пациент:</dt>
                                <dd class="col-sm-9"><?= $arrVisitMeta['patient_name'][0]; ?></dd>
                                <dt class="col-sm-3">Дата посещения:</dt>
                                <dd class="col-sm-9"><?= $arrVisitMeta['visit_date'][0]; ?></dd>
                                <dt class="col-sm-3">Имя принимающего врача:</dt>
                                <dd class="col-sm-9"><?= $arrVisitMeta['doctor_name'][0]; ?></dd>
                                <dt class="col-sm-3">Тип приема:</dt>
                                <dd class="col-sm-9"><?php $reception_type_name = get_term($arrVisitMeta['reception_type'][0]);
                                    echo $reception_type_name->name; ?></dd>
                            </dl>
                            <h4 class="font-600 m-b-20">Реультат приема</h4>
                            <dl class="row">
                                <?php foreach ($arrVisitMeta as $visitKey => $visitArr ) {
                                    if($visitKey != '_edit_lock' and $visitKey != 'patient_name' and $visitKey != 'visit_date' and $visitKey != 'doctor_name' and $visitKey != 'reception_type'){
                                        $visitShortKey = str_replace('visit_templates_', '', $visitKey);
                                        $visitShortKey = str_replace('_', '-', $visitShortKey);
                                        $term = get_term_by('slug', $visitShortKey, 'visit_templates_name');
                                    ?>
                                        <dt class="col-sm-3"><?= $term->name ?>:</dt>
                                        <dd class="col-sm-9">
                                            <?php
                                            foreach ($visitArr as $visitMeta) {
                                                echo $visitMeta . ' ';
                                            }
                                            ?>
                                        </dd>
                                    <?php }
                                } ?>
                                <?php  echo '<pre>' . print_r($arrVisitMeta, true) . '</pre>'; ?>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php endwhile; ?>
<?php get_footer(); ?>