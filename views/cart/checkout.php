<?php include "views/layouts/header.php" ?>;

<section style="padding-bottom: 100px"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">

                        <?php foreach ($categories as $category) : ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $category['id'] ?>"><?php echo $category['name']; ?></a>
                                    </h4>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

            <div class="col-sm-1"></div>

            <div class="col-sm-4">

                <?php if($result) : ?>

                <p>Заказ оформлен. Мы Вас перезвоним</p>

                <?php else: ?>

                <p>Выбрано товаров: <?php echo $totalQuantity ?>, на сумму: <?php echo $totalPrice ?> долларов</p>

                <div class="contact-form"><!--sign up form-->
                    <h2 class="title text-center">Оформления заказа</h2>
                    <form id="main-contact-form" class="contact-form row" action="#" method="post">
                        <div class="form-group col-md-12">
                            <span style="color: red"><?php echo $errName; ?></span>
                            <input class="form-control" type="text" name="name" placeholder="Имя" value="<?php echo $name ?>"/>
                        </div>
                        <div class="form-group col-md-12">
                            <span style="color: red"><?php echo $errPhone; ?></span>
                            <input class="form-control" type="text" name="phone" placeholder="Номер телефона" value="<?php echo $phone ?>"/>
                        </div>
                        <div class="form-group col-md-12">
                            <span style="color: red"><?php echo $errComment; ?></span>
                            <textarea name="comment" id="message" class="form-control" rows="2" placeholder="Пишите Коментария"><?php echo $comment; ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Оформить">
                        </div>
                    </form>
                </div><!--/sign up form-->

                <?php endif; ?>

            </div>
        </div>
    </div>
</section><!--/form-->

<script>
    window.onload = function() {
        history.replaceState("", "", "/cart/checkout");
    }
</script>

<?php include "views/layouts/footer.php" ?>;