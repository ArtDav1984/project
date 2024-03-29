<?php

class AdminOrderController extends AdminBase
{
    public function __construct()
    {
        self::checkAdmin();
    }

    public function actionIndex()
    {
        $ordersList = Order::getOrdersList();

        require_once 'views/admin_order/index.php';

        return true;
    }

    public function actionView($id)
    {
        $order = Order::getOrderById($id);

        $productsQuantity = json_decode($order['products'], true);

        $productsIds = array_keys($productsQuantity);

        $products = Product::getProductsByIds($productsIds);

        require_once 'views/admin_order/view.php';

        return true;
    }

    public function actionUpdate($id)
    {
        $order = Order::getOrderById($id);

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

            header("Location: /admin/order/view/$id");
        }

        require_once 'views/admin_order/update.php';

        return true;
    }

    public function actionDelete($id)
    {
        if (isset($_POST['submit'])) {
            Order::deleteOrderById($id);

            header("Location: /admin/order");
        }

        require_once 'views/admin_order/delete.php';

        return true;
    }
}