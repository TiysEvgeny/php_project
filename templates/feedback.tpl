<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{SITE_TITLE}}</title>
</head>
<body>
<form method="post">
    <div>
        <label>Имя: <input type="text" name="name"></label>
    </div>
    <div>
        <label>Текст отзыва: <input type="text" name="review"></label>
    </div>
    <div>
        <input type="submit" value="Добавить">
    </div>
</form>
<hr>
<div class="feedback_response">
    {{RESPONSE}}
</div>
<hr>
<h1>Отзывы</h1>
<div class="feedback_feed">
    {{FEEDBACKFEED}}
</div>
</body>
</html>