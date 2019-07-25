<?php

class CartController
{
    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

        return true;
    }

    public function actionIndex()
    {
        $categories = false;
        $categories = Category::getCategoryList();

        $productsInCart = array();
        $productsInCart = Cart::getProducts();

        if($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once "views/cart/index.php";

        return true;
    }

    public function actionCheckout()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $errName = $errPhone = $errComment = '';
        $result = false;
        $i = 0;

        if(isset($_POST['submit'])){
           $name = $_POST['name'];
           $phone = $_POST['phone'];
           $comment = $_POST['comment'];

           if(User::checkName($name)){
               $errName = User::checkName($name);
               $i ++;
           }

           if(User::checkPhone($phone)){
               $errPhone = User::checkPhone($phone);
               $i ++;
           }

           if(User::checkMessage($comment)){
               $errComment = User::checkMessage($comment);
               $i ++;
           }

           if($i == 0){
               $productsInCart = Cart::getProducts();

               if(User::isGuest()){
                   $userId = false;
               } else {
                   $userId = User::checkLogged();
               }

               $result = Order::save($name, $phone, $comment, $userId, $productsInCart);

               if($result){
                   $adminEmail = 'artur.davoyan1984@gmail.com';
                   $message = "http//project.loc/admin/orders";
                   $subject = 'Тема письма';
                   $result = mail($adminEmail, $subject, $message);
               }

               Cart::clear();
           } else {
               $productsInCart = array();
               $productsInCart = Cart::getProducts();
               $productsIds = array_keys($productsInCart);
               $products = Product::getProductsByIds($productsIds);
               $totalPrice = Cart::getTotalPrice($products);
               $totalQuantity = Cart::countItems();
           }

        } else {
            $productsInCart = array();
            $productsInCart = Cart::getProducts();

            if($productsInCart == false) {
                header("Location: /");
            } else {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $name = false;
                $phone = false;
                $comment = false;

                if(User::isGuest()){

                } else {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);

                    $name = $user['name'];
                }
            }
        }

        require_once "views/cart/checkout.php";

        return true;
    }

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

        return true;
    }
}