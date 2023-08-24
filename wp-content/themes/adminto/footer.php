<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                2023 © CRM.IHTIS
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- Модальная форма добавления пациента -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Форма добавления пациента</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?php get_template_part( '/templates/add-pacient-form' ); ?>
            </div>
        </div>
    </div>
</div>

<!-- Модальная форма добавления записи -->
<div class="modal fade bs-example-modal-lg-post" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Добавить новую запись в историю посещений</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?php get_template_part( '/templates/add-post-card-form' ); ?>
            </div>
        </div>
    </div>
</div>


<!-- jQuery  -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/popper.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/waves.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery.slimscroll.js"></script>

<!--[if IE]>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/plugins/jquery-knob/jquery.knob.js"></script>
<!--Morris Chart-->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/plugins/morris/morris.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/plugins/raphael/raphael-min.js"></script>
<!-- Dashboard init -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/pages/jquery.dashboard.js"></script>
<!-- Plugins Js -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<!-- App js -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery.core.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery.app.js"></script>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/modernizr.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/custom.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/comment-reply.js"></script>


<?php wp_footer(); ?>

</body>
</html>
