<?php
include_once "../includes/db.php";

$data = $_POST;
$errors = array();
// Проверка заполнения формы регистрации
if (isset($data['signUp'])) {


    if (trim($data['login']) == '') {
        $errors[] = 'Введите логин!';

    } else if (trim($data['email']) == '') {
        $errors[] = 'Введите Email!';

    } else if (trim($data['password']) == '') {
        $errors[] = 'Введите пароль!';

    } else if ($data['rePassword'] == '') {
        $errors[] = 'Введите повторный пароль!';

    } else if ($data['password'] != $data['rePassword']) {
        $errors[] = 'Пароли не совпадают!';

    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Не корректный Email";
    }

    if (R::count('users', "login = ?", array($data['login'])) > 0) {
        $errors[] = "Пользователь с таким логином уже есть";
    }

    if (R::count('users', "email = ?", array($data['email'])) > 0) {
        $errors[] = "Пользователь с таким email уже есть";
    }

    if (empty($errors)) {
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);

        echo '<div style="color: green;">Вы зарегистрировались</div>';
    } else {
        echo '<div style="color: red;">' . array_shift($errors) . '</div>';
    }
}
?>