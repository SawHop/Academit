<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="tabs">
         <!--Вкладки -->
        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1" title="Вкладка 1">Регистрация</label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2" title="Вкладка 2">Вход</label>

        <!--Форма регистрации -->
        <section id="content-tab1">
            <form action="/signInUp/signUp.php" method="POST">
                <p>Логин </p>
                <input type="text" name="login" />
                <p>Email</p>
                <input type="text" name="email" />
                <p>Пароль</p>
                <input type="password" name="password" />
                <p>Повторите пароль</p>
                <input type="password" name="rePassword" />
                <input type="submit" name="signUp" value="Зарегестрироваться" />
            </form>
        </section>
        <section id="content-tab2">
            <!--Форма авторизации -->
            <form action="/signInUp/signIn.php" method="POST">
                <p>Логин </p>
                <input type="text" name="login" />
                <p>Пароль </p>
                <input type="password" name="password" />
                <input type="submit" name="signIn" value="Войти" />
            </form>
        </section>
    </div>
</body>
</html>