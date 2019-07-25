<?php

class SiteController
{
    public function actionIndex() {
        $categories = array();
        $categories = Category::getCategoryList();

        $products = array();
        $products = Product::getLatestProducts(6);

        $productList = array();
        $productList = Product::getProductsByRecommended();
        $limit = 3;
        $count = Product::recommendedProductsCount($limit);

        require_once "views/site/index.php";

        return true;
    }

    public function actionContact()
    {
        $email = $message = '';
        $errEmail = $errMessage = '';
        $result = false;
        $i = 0;

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $message = $_POST['message'];

            if(User::checkEmail($email)){
                $errEmail = User::checkEmail($email);
                $i ++;
            }

            if(User::checkMessage($message)){
                $errMessage = User::checkMessage($message);
                $i ++;
            }

            if($i == 0){
                $adminEmail = 'artur.davoyan1984@gmail.com';
                $message = "текст: {$message}. от {$email}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
            }
        }

        require_once "views/site/contact.php";

        return true;
    }
}