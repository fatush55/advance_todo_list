<?php

namespace app\controllers;


use RedBeanPHP\R;
use todo\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $sort = '';
        if (!empty($_SESSION['arrow_sort']))  $sort = $_SESSION['arrow_sort'];

        $items = R::getAll(
            "SELECT `todo_list`.*, `users`.`name` as `user_name`, `users`.`email`, `users`.`status` as `user_status` 
                FROM `todo_list`
                JOIN `users` ON `todo_list`.`user_id` = `users`.`id`
               {$sort}"
        );

        $this->setData(compact('items'));
    }
}