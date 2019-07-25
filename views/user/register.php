<?php include "views/layouts/header.php" ?>;

<section style="padding-bottom: 100px"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <?php if($result) : ?>

                <h3>Вы зарегистрированы</h3>

                <?php  else: ?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Регистрация на сайте</h2>
                    <form action="#" method="post">
                        <span style="color: red"><?php echo $errName; ?></span>
                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name ?>"/>
                        <span style="color: red"><?php echo $errEmail; ?></span>
                        <input type="text" name="email" placeholder="E-mail Адрес" value="<?php echo $email ?>"/>
                        <span style="color: red"><?php echo $errPassword; ?></span>
                        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password ?>"/>
                        <button type="submit" name="submit" class="btn btn-default">Регистрация</button>
                    </form>
                </div><!--/sign up form-->

                <?php endif; ?>

            </div>
        </div>
    </div>
</section><!--/form-->

<script>
    window.onload = function() {
        history.replaceState("", "", "/user/register");
    }
</script>

<?php include "views/layouts/footer.php" ?>;