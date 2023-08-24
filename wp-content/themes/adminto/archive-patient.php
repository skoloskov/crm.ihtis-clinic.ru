<?php get_header(); ?>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-20">
                    <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Добавить пациента</button>
                </div>
                <h4 class="page-title">Все пациенты</h4>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
        <?php
            while ( have_posts() ) :
                the_post();
        ?>
                <div class="col-xl-4">
                    <div class="card-box project-box">
                        <?php $arrPatientMeta = get_post_custom(); ?>

                        <div class="badge badge-success">Completed</div>
                        <h4 class="mt-0"><a href="<?php the_permalink(); ?>" class="text-white"><?php the_title() ?></a></h4>

                        <p class="text-success text-uppercase m-b-20 font-13">Web Design</p>
                        <p class="text-muted font-13">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. When an unknown printer took a galley of type and
                            scrambled it...<a href="#" class="font-600 text-muted">view more</a>
                        </p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h3 class="mb-0">56</h3>
                                <p class="text-muted">Questions</p>
                            </li>
                            <li class="list-inline-item">
                                <h3 class="mb-0">452</h3>
                                <p class="text-muted">Comments</p>
                            </li>
                        </ul>

                        <div class="project-members m-b-20">
                            <span class="m-r-5 font-600">Team :</span>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-1.jpg" class="rounded-circle thumb-sm" alt="friend" />
                            </a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Michael Zenaty">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-2.jpg" class="rounded-circle thumb-sm" alt="friend" />
                            </a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="James Anderson">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-3.jpg" class="rounded-circle thumb-sm" alt="friend" />
                            </a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-4.jpg" class="rounded-circle thumb-sm" alt="friend" />
                            </a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Username">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/users/avatar-5.jpg" class="rounded-circle thumb-sm" alt="friend" />
                            </a>
                        </div>

                        <p class="font-600 m-b-5">Progress <span class="text-success pull-right">80%</span></p>
                        <div class="progress progress-bar-success-alt progress-sm m-b-5">
                            <div class="progress-bar progress-bar-success progress-animated wow animated animated"
                                 role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 80%; visibility: visible; animation-name: animationProgress;">
                            </div><!-- /.progress-bar .progress-bar-danger -->
                        </div><!-- /.progress .no-rounded -->
                    </div>
                </div> <!-- end col -->
        <?php endwhile; ?>
        </div>
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<?php get_footer(); ?>
