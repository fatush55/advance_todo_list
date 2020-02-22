<?php


namespace app\controllers;


use app\models\Create;
use app\models\User;
use RedBeanPHP\R;

class EditController extends AppController
{

    public function indexAction()
    {
        $user_mod = new User();
        if (empty($_GET['id']) || !$user_mod->isAdmin()) redirect('/');
        $id = $_GET['id'];
        $item = R::findOne('todo_list', 'id = ?', [$id]);
        $user = R::findOne('users', 'id = ?', [$item->user_id]);
        $this->setData(compact('item', 'user'));
    }

    public function updateAction()
    {
        if ($_POST){
            $date = $_POST;
            $user = new User();
            if (!$user->isAdmin()) {
                $_SESSION['error'] = '<p>Only admin can edit</p>';
                redirect('/user/login');
            };
            $create = new Create();
            $create->load($date);
            $create->attrebutes['user_id'] = $date['user_id'];
            $create->attrebutes['status'] = $date['status'];
            $create->attrebutes['update_admin'] = 'update';
            $create->update('todo_list', $date['id']);
        }
        redirect();
    }

}