<?php

class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once "views/cabinet/index.php";

        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $errName = $errPassword = '';
        $result = false;
        $i = 0;

        if(isset($_POST['submit'])) {
            $name = $password = '';

            $name = $_POST['name'];
            $password = $_POST['password'];

            if(User::checkName($name)) {
                $errName = User::checkName($name);
                $i ++;
            }

            if(User::checkPassword($password)) {
                $errPassword = User::checkPassword($password);
                $i ++;
            }

            if($i == 0) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once "views/cabinet/edit.php";

        return true;
    }
}