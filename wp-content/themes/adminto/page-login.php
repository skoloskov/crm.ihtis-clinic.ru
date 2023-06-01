<?php
/* Template Name: Login */
if($_POST) {

    global $wpdb;

    //Проверяем все поля ввода перед запросом SQL
    $username = $wpdb->escape($_REQUEST['username']);
    $password = $wpdb->escape($_REQUEST['password']);
    $remember = $wpdb->escape($_REQUEST['rememberme']);

    if($remember) $remember = "true";
    else $remember = "false";

    $login_data = array();
    $login_data['user_login'] = $username;
    $login_data['user_password'] = $password;
    $login_data['remember'] = $remember;

    $user_verify = wp_signon( $login_data, false );

    if ( is_wp_error($user_verify) ){
        //Передаем параметр error для использования его потом в скрипте
        header("Location: " . home_url() . "/login?error=true");
    } else {
        echo "<script>window.location='". home_url() ."'</script>";
        exit();
    }

}
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
                    <h4 class="text-uppercase font-bold mb-0">Авторизация</h4>
                </div>
                <div class="p-20">
                    <div class="login-form-container">
                        <form class="form-horizontal m-t-20" id="login" name="form" action="<?php echo home_url(); ?>/login/" method="post">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" id="username" type="text" placeholder="E-mail" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" id="password" type="password" placeholder="Пароль" name="password">
                                </div>
                            </div>
                            <div class="form-group text-center m-t-30">
                                <div class="col-xs-12">
                                    <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" id="submit" type="submit">Авторизация</button>
                                </div>
                            </div>
                            <div id="error_message"></div>
                            <div class="form-group m-t-30 mb-0">
                                <div class="col-sm-12">
                                    <a href="/recovery/" class="text-muted"><i class="fa fa-lock m-r-5"></i> Забыли пароль?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Нет аккаунта? <a href="/register/" class="text-primary m-l-5"><b>Зарегистрируйтесь</b></a></p>
                </div>
            </div>
        </div>
        <!-- end wrapper page -->
    <script>
        let error_message = document.getElementById('error_message');
        if(location.search.indexOf('error')>-1){
            error_message.innerHTML='Неверные учетные данные<br>';
            error_message.innerHTML+='Введите заново или перейдите на страницу <a href="/register/">регистрации</a>';
        }
    </script>
<?php get_footer(); ?>