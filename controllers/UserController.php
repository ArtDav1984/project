<?php

class UserController
{
    public function actionRegister()
    {
        $name = $email = $password = '';
        $errName = $errEmail = $errPassword = '';
        $result = false;

        $i = 0;

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(User::checkName($name)) {
                $errName = User::checkName($name);
                $i ++;
            }

            if(User::checkEmail($email)) {
                $errEmail = User::checkEmail($email);
                $i ++;
            }

            if(User::checkPassword($password)) {
                $errPassword = User::checkPassword($password);
                $i ++;
            }

            if(User::checkEmailExists($email)) {
                $errEmail = "Такой E-mail уже существует";
                $i ++;
            }

            if($i == 0) {
                $result = User::register($name, $email, $password);
            }
        }

        require_once "views/user/register.php";

        return true;
    }

    public function actionLogin()
    {
        $email = $password = '';
        $errEmail = $errPassword = '';
        $i = 0;

        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(User::checkEmail($email)) {
                $errEmail = User::checkEmail($email);
                $i ++;
            }

            if(User::checkPassword($password)) {
                $errPassword = User::checkPassword($password);
                $i ++;
            }

            if($i == 0) {
                $userId = User::checkUserData($email, $password);

                if ($userId == false) {
                    $errEmail = "Данные неверный";
                } else {
                    User::auth($userId);

                    header("Location: /cabinet/");
                }
            }

        }

        require_once "views/user/login.php";

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }
}