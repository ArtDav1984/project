<?php

class CatalogController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $products = array();
        $products = Product::getLatestProducts(12);

        require_once "views/catalog/index.php";

        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $products = array();
        $products = Product::getProductsListByCategory($categoryId, $page, 3);

        $path = "/category/$categoryId/page-";
        $total = Product::getTotalProducts($categoryId)['count_id'];

        $Pagination = new Pagination($total, 3, $page, $path);

        require_once "views/catalog/category.php";

        return true;
    }
}