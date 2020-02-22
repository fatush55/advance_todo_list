<?php


namespace app\controllers;


use app\models\Create;
use app\models\User;
use RedBeanPHP\R;

class CreateController extends AppController
{
    public function indexAction()
    {
        if (!empty($_POST)){
            $create = new Create();
            $user = new User();
            $date = $_POST;

            if (!$create->validate($date)){
                $create->getError();
                $_SESSION['remember'] = $date;
            } else {
                $create->load($date);
                if (empty($_SESSION['user']) || $user->isAdmin()){
                    $stub_user = R::findOne('users', 'role = ?', ['guest']);
                    $create->attrebutes['user_id'] = $stub_user['id'];
                } else {
                    $create->attrebutes['user_id'] = $_SESSION['user']['id'];
                }
                debug($create->attrebutes);

                $create->save('todo_list', 0);
                $_SESSION['success'] = '<p>Todo creator success</p>';
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}