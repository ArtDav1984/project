<?php include "views/layouts/header.php" ?>;

<section style="padding-bottom: 30px">
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

            <div class="col-sm-9 padding-right">
                <div class="table-responsive cart_info">

                    <?php if($productsInCart) : ?>

                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Название</td>
                            <td class="description"></td>
                            <td class="quantity">Количество, шт.</td>
                            <td class="total">Стоимость, дол.</td>
                            <td></td>
                        </tr>
                        </thead>

                        <?php foreach ($products as $product) : ?>

                        <tbody>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="/upload/images/product/<?php echo $product['id']; ?>.jpg" alt="" width="85px" height="84px" style="object-fit: contain"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h4>
                                <p>Код товара: <?php echo $product['code']; ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $productsInCart[$product['id']]; ?>" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$<?php echo $product['price']; ?></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="/cart/delete/<?php echo $product['id']; ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        </tbody>

                        <?php endforeach; ?>

                        <tbody>
                        <tr class="cart_menu">
                            <td class="image">Общая стоимость</td>
                            <td class="description"></td>
                            <td class="quantity"></td>
                            <td class="total">$<?echo $totalPrice; ?></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>

                    <?php else: ?>

                    <p>Корзина пуста</p>

                    <?php endif; ?>

                </div>

                <div class="row">
                    <a href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include "views/layouts/footer.php" ?>;

