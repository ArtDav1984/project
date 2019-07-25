<?php

class AdminController extends AdminBase
{
    public function __construct()
    {
        self::checkAdmin();
    }

    public function actionIndex()
    {
        require_once "views/admin/index.php";

        return true;
    }
}