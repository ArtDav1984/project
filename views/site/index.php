<?php include "views/layouts/header.php" ?>;

<section>
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
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>

                    <?php foreach ($products as $product) : ?>

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/upload/images/product/<?php echo $product['id']; ?>.jpg" alt="" height="249px" style="object-fit: contain" />
                                    <h2>$<?php echo $product['price']; ?></h2>
                                    <p><a href="/product/<?php echo $product['id'] ?>">
                                       <?php echo $product['name']; ?>
                                    </p>
                                    <a href="/cart/add/<?php echo $product['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </div>
                                <?php if($product['is_new']) : ?>
                                <img src="/template/images/home/new.png" class="new" alt="" />
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>

                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <?php for($i = 0; $i < $count; $i ++) : ?>

                            <?php $from = $i * $limit; ?>

                            <?php $productLists = array_slice($productList, $from, $limit); ?>

                            <?php if($i == 0) : ?>

                            <div class="item active">

                            <?php else: ?>

                                <div class="item">

                            <?php endif; ?>

                                    <?php foreach ($productLists as $item) : ?>

                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/upload/images/product/<?php echo $item['id']; ?>.jpg" alt="" height="134px" style="object-fit: contain"/>
                                                <h2><?php echo $item['price'] ?></h2>
                                                <p><a href="/product/<?php echo $item['id'] ?>"><?php echo $item['name']; ?></p>
                                                <a href="/cart/add/<?php echo $item['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <?php endforeach; ?>

                                </div>

                                <?php endfor; ?>

                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

<?php include "views/layouts/footer.php" ?>;

