<?php

function alradeyLoggenedId()
{
    return isset($_SESSION['user']);
}

function checkAuthWithCookie()
{
    if (isset($_COOKIE['id_user']) && isset($_COOKIE['cookie_hash'])){
        //Получаем данные пользователя по ID
        $link = getConnection();
        $sql = "SELECT id_user, user_name, user_password FROM user WHERE id_user='".mysqli_real_escape_string($link, $_COOKIE['user_id'])."'";
        $userData = getRowResult($sql, $link);

        if(($userData['user_password'] !== $_COOKIE['user_hash']) || ($userData['id_user'] !== $_COOKIE['id_user'])){
            setcookie('id_user', '', time() - 3600 * 24, '/');
            setcookie('cookie_hash', '', time() - 3600 * 24, '/');
        } else {
            header('Location: /'); //Все в порядке, пользователь авторизовался через cookie
        }
    }
    return false;
}

function authWithLoginPassword()
{
    $username = $_POST['login'];
    $password = $_POST['password'];

    //Получаем данные по логину
    $link = getConnection();
    $sql = "SELECT id_user, user_name, user_password FROM user WHERE user_login = '".mysqli_real_escape_string($link, $username)."'";
    $userData = getRowResult($sql);

    $isAuth = 0;

    //Проверяем соответствие логина и пароля
    if($userData){
        if(checkPassword($password, $userData['user_password'])){
            $isAuth = 1; //Авторизован
        }
    }

    if (isset($_POST['rememberme'])){
        setcookie('id_user', $userData['id_user'], time() + 3600 * 24, '/');
        setcookie('cookie_hash', $userData['user_password'], time() + 3600 * 24, '/');
    }

    //Сохраняем данные в сессии
    $_SESSION['user'] = $userData;
    return $isAuth;
}

function checkPassword($password, $hash)
{
    return md5($password) === $hash;
}
