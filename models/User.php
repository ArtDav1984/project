<?php

class User
{
    public static function register($name, $email, $password) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO users (name, email, password) '
            . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name)
    {
        $errName = [];
        if(empty($name)){
            $errName[] = "Заполните поле Имя";
        } else {
            if(strlen($name) < 2) {
               $errName[] = "Имя не может содержать меньше 2-х символов";
            }
            if(!preg_match('/^[a-zA-Z -]*$/', $name)){
                $errName[] = "Введите допустимые символы";
            }
        }

        if(!empty($errName)){
            return $errName[0];
        }
    }

    public static function checkEmail($email)
    {
        $errEmail = [];
        if(empty($email)){
            $errEmail[] = "Заполните поле E-mail Адрес";
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errEmail[] = "Введите допустимые символы";
            }
        }

        if(!empty($errEmail)){
            return $errEmail[0];
        }
    }

    public static function checkPassword($password)
    {
        $errPassword = [];
        if(empty($password)) {
            $errPassword[] = "Заполните поле Пароль";
        } else {
            if(strlen($password) < 6) {
                $errPassword[] = "Пароль не может содержать меньше 6-и символов";
            }
        }

        if(!empty($errPassword)) {
            return $errPassword[0];
        }
    }

    public static function checkPhone($phone)
    {
        $errPhone = [];
        if(empty($phone)){
            $errPhone[] = "Заполните поле Номер телефона";
        } else {
            if(strlen($phone) > 16) {
                $errPhone[] = "Номер телефона не может содержать более 16 символов";
            }
        }

        if(!empty($errPhone)){
            return $errPhone[0];
        }
    }

    public static function checkMessage($message)
    {
        $errMessage = [];
        if(empty($message)){
            $errMessage[] = "Заполните поле Сообщении";
        } else {
            if(strlen($message) > 255) {
                $errMessage[] = "Сообщения не может содержать более 255 символов";
            }
        }

        if(!empty($errMessage)){
            return$errMessage[0];
        }
    }

    public static function checkEmailExists($email) {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user) {
            return $user['id'];
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        header("Location: /user/login/");
    }

    public static function isGuest()
    {
        if(isset($_SESSION['user'])){
            return false;
        }

        return true;
    }

    public static function getUserById($id)
    {
        if($id){
            $db = Db::getConnection();

            $sql = "SELECT * FROM users WHERE id = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE users SET name = :name, password = :password WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
}