<?php
/* Template Name: Register */

require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;
//Проверяем, вошел ли уже пользователь в систему
if ($user_ID) {

    //Залогиненного пользователя перенаправляем на главную страницу.
    header( 'Location:' . home_url() );

} else {
    $errors = array();
    if( $_POST ) {
        // Проверяем, есть ли email и действителен ли он
        $email = $wpdb->escape($_REQUEST['email']);
        if( !is_email( $email ) ) {
            $errors['email'] = "Пожалуйста, введите действительный email";
        } elseif( email_exists( $email ) ) {
            $errors['email'] = "Такой email уже зарегистрирован";
        }

        // Проверить согласие с условиями обслуживания
        if($_POST['terms'] != "Yes"){
            $errors['terms'] = "Вы должны согласиться с Условиями использования";
        }
        // если ошибок нет
        if(0 === count($errors)) {
            $username = $email;
            $new_user_id = register_new_user( $username, $email );

            // Здесь вы можете делать все, что угодно, например, отправлять электронное письмо пользователю и т. д.

            $success = 1;

            header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username );

        } else {
            $message = 'Есть ошибки в заполнении формы';
        }
    }
}
?>
?>

<?php get_header(); ?>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page wrapper">
            <div class="text-center">
                <a href="/" class="logo"><span>Admin<span>to</span></span></a>
                <h5 class="text-muted mt-0 font-600">Responsive Admin Dashboard</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold mb-0">Регистрация</h4>
                </div>
                <div class="p-20">
                    <form class="form-horizontal m-t-20" id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

						<div class="form-group ">
							<div class="col-xs-12">
                                <input class="form-control" type="text" name="email" id="email" placeholder="E-mail" value="<?= isset( $_REQUEST['email'] ) ? $_REQUEST['email']  : '' ?>">
                                <span class="error"><?= isset( $errors['email'] ) ? $errors['email']  : '' ?></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<div class="checkbox checkbox-custom">
                                    <input name="terms" id="terms" type="checkbox" checked="checked" value="Yes">
									<label for="terms">Я соглашаюсь с <a href="#">Условиями работы сайта</a></label>
                                    <span class="error"><?= isset( $errors['terms'] ) ? $errors['terms']  : '' ?></span>
                                </div>
							</div>
						</div>

                        <span id="message"><?= isset( $message ) ? $message  : '' ?></span>

						<div class="form-group text-center m-t-40 mb-0">
							<div class="col-xs-12">
								<button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit" id="submitbtn" name="submit" >
									Зарегистрироваться
								</button>
							</div>
						</div>

					</form>

                </div>
            </div>
            <!-- end card-box -->

			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="text-muted">Уже есть аккаунт?<a href="/login/" class="text-primary m-l-5"><b>Авторизуйтесь</b></a></p>
				</div>
			</div>

        </div>
        <!-- end wrapper page -->
<?php get_footer(); ?>