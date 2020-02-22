<?php


namespace app\controllers;


use app\models\Create;
use RedBeanPHP\R;

class CreateController extends AppController
{
    public function indexAction()
    {
        if (!empty($_POST)){
            $create = new Create();
            $date = $_POST;

            if (!$create->validate($date)){
                $create->getError();
                $_SESSION['remember'] = $date;
            } else {
                $create->load($date);

                if (empty($_SESSION['user'])){
                    $create->attrebutes['user_id'] = 1;
                } else {
                    $create->attrebutes['user_id'] = $_SESSION['user']['id'];
                }

                $create->save('todo_list', 0);
                $_SESSION['success'] = '<p>Todo creator success</p>';
            }
        }
        redirect('/');
    }

}