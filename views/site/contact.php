<?php include "views/layouts/header.php" ?>;

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <?php if($result) : ?>

                    <h3>Письмо отправлено! Мы ответим Вам на указанный адрес</h3>

                <?php  else: ?>

                <div class="contact-form">
                    <h2 class="title text-center">Обратная свяазь</h2>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-12">
                            <span style="color: red"><?php echo $errEmail;  ?></span>
                            <input type="text" name="email" class="form-control"  placeholder="E-mail Адрес" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <span style="color: red;"><?php echo  $errMessage;  ?></span>
                            <textarea name="message" id="message" class="form-control" rows="8" placeholder="Пишите сообщение"><?php echo $message; ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Отправить">
                        </div>
                    </form>
                </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<script>
    window.onload = function() {
        history.replaceState("", "", "/contact");
    }
</script>

<?php include "views/layouts/footer.php" ?>;