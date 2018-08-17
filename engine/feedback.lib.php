<?php


//Сохранение отзыва
function setFeedback()
{
    $dbLink = getConnection();

    $feedbackUser = mysqli_real_escape_string($dbLink, htmlspecialchars(strip_tags($_POST['name'])));
    $feedbackBody = mysqli_real_escape_string($dbLink, htmlspecialchars(strip_tags($_POST['review'])));

    $sql = "INSERT INTO feedback (feedback_body, feedback_user) VALUES (\"$feedbackBody\", \"$feedbackUser\")";
    $res = executeQuery($sql, $dbLink);

    if(!$res){
        $response = 'Произошла ошибка!';
    } else {
        $response = 'Отзыв успешно сохранен!';
    }

    return $response;
}

//Получение отзывов
function getFeedbacksFeed()
{
    $sql = 'SELECT * FROM feedback';
    $feed = getAssocResult($sql);
    return $feed;
}
