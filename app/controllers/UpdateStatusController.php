<?php


namespace app\controllers;


use app\models\AppModal;
use RedBeanPHP\R;

class UpdateStatusController
{
    public function indexAction()
    {
        $id = $_POST['id'];

        if ($id){
            new AppModal();
            $item = R::load('todo_list', $id);
            if ($item->status === 'success') {
                $item->status = 'process';
            } else {
                $item->status = 'success';
            }
            R::store($item);
        }
        redirect('/');
    }
}