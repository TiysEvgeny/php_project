<?php
/**
 * Метод подготавливает переменные для передачи в шаблон
 *
 * @param string $pageName Название шаблона
 * @return array Переменные для передачи в шаблонизатор
 */
function prepareVariables($pageName, $action)
{
    $vars = []; //Для передачи в шаблонизатор

    $vars['site_title'] = SITE_TITLE;

    switch ($pageName) {
        case "index":
            $vars['content'] = 'Название поста!!!';
            break;

        case 'news':
            $data = getOneNews();
            $vars['TITLE_NEW'] = $data['title'];
            $vars['TEXT_NEW'] = $data['content'];
            break;

        //Отзывы
        case 'feedback':
            if(isset($_POST['name'])){
                $vars['response'] = setFeedback();
            } else {
                $vars['response'] = ''; //Чтобы не отображалась метка вида {{}}
            }

            //Получаем данные
        $vars['feedbackfeed'] = getFeedbacksFeed();
            break;

        case 'basket':
            if($action === 'get'){
                $basketArray = ["result" => 1, ];
                $basketArray['basket'] = getBasket();
                $basketArray['amount'] = getBasketAmount($basketArray['basket']);
                $vars['response_json'] = $basketArray;
            }

            if ($action === 'add' && isset($_POST['id_product']) && isset($_POST['price'])){
                $idProduct = htmlspecialchars(strip_tags($_POST['id_product']));
                $price = htmlspecialchars(strip_tags($_POST['price']));
                $vars['response_json'] = addGoodBasket($idProduct, $price);
            }

            break;

            //Вход на сайт
        case 'login':
            //Если пользователь уже авторизован
            if(alradeyLoggenedId()){
                header('Location: /');
            }

            //Если установлены куки, авторизуем через них
            if(checkAuthWithCookie()){
                header('Location: /');
            }

            //Авторизуем по логину и паролю
        $vars['autherror'] = '';
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(!authWithLoginPassword()){
                    $vars['autherror'] = 'Неправильный логин/пароль';
                } else {
                    header('Location: /'); //Если пользователь успешно авторизован
                }
            }
            break;
    }

    return $vars;
}