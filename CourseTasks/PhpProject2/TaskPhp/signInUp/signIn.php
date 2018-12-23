<?php
include_once "../includes/db.php";

$data = $_POST;
$errors = array();
// Проверка заполнения логина и пароля при авторизации
if (isset($data['signIn'])) {
    $user = R::findOne('users', "login = ?", array($data['login']));

    if (trim($data['login']) == '') {
        $errors[] = 'Введите логин!';
    }

    if (trim($data['password']) == '') {
        $errors[] = 'Введите пароль!';
    }

    if ($user) {
        if (password_verify($data['password'], $user->password)) {
        } else {
            $errors[] = 'Неправильный пароль';
        }

    } else {
        $errors[] = 'Пользователь с тиким логином не существует!';
    }

    if (!empty($errors)) {
        echo '<div style="color: red;">' . array_shift($errors) . '</div>';
    } else {
        header("location: ../secondPage/secondPage.php");
    }
}
?>