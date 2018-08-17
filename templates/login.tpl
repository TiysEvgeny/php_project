<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{SITE_TITLE}}</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>
<body>
<p class="red">{{AUTHERROR}}</p>
<form method="post">
    <div>
        <label>Логин:
            <input type="text" name="login">
        </label>
    </div>

    <div>
        <label>Пароль:
            <input type="password" name="password">
        </label>
    </div>
    <div>
        <label>Запомнить мой вход:
            <input type="checkbox" name="rememberme">
        </label>
    </div>
    <div>
        <input type="submit" value="Войти">
    </div>
</form>
</body>
</html>