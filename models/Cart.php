<?php

class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);

        $productsInCart = array();

        if(isset($_SESSION['products'])){
            $productsInCart = $_SESSION['products'];
        }

        if(array_key_exists($id, $productsInCart)){
            $productsInCart[$id] ++;
        } else {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;
    }

    public static function countItems()
    {
        if(isset($_SESSION['products'])){
            $count = 0;

            foreach ($_SESSION['products'] as $id => $quantity){
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts()
    {
        if(isset($_SESSION['products'])){
            return $_SESSION['products'];
        }

        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if($productsInCart){
            foreach ($products as $product){
                $total += $product['price'] * $productsInCart[$product['id']];
            }
        }

        return $total;
    }

    public static function clear()
    {
        if(isset($_SESSION['products'])){
            unset($_SESSION['products']);
        }
    }

    public static function deleteProduct($productId)
    {
        $productsInCart = self::getProducts();

        $productsInCart[$productId] = $productsInCart[$productId] - 1;
        if($productsInCart[$productId] <= 0){
            unset($productsInCart[$productId]);
        }

        $_SESSION['products'] = $productsInCart;
    }
}