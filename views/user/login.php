<?php include "views/layouts/header.php" ?>;

<section style="padding-bottom: 100px"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h2><a href="/user/register/">Регистрация</a></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="login-form"><!--login form-->
                    <h2>Вход на ваш аккаунт</h2>
                    <form action="#" method="post">
                        <span style="color: red"><?php echo $errEmail; ?></span>
                        <input type="text" name="email" placeholder="E-mail Адрес" value="<?php echo $email ?>" />
                        <span style="color: red"><?php echo $errPassword; ?></span>
                        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password ?>" />
                        <span>
								<input type="checkbox" name="remember" class="checkbox">
								Запомнить меня
							</span>
                        <button type="submit" name="submit" class="btn btn-default">Войти</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->

<script>
    window.onload = function() {
        history.replaceState("", "", "/user/login");
    }
</script>

<?php include "views/layouts/footer.php" ?>;