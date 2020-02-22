<?php

namespace app\controllers;


use RedBeanPHP\R;
use todo\App;
use todo\libs\Pogination;

class MainController extends AppController
{
    public function indexAction()
    {
        $isAdmin = self::$isAdmin;
        $sort = '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;
        $count = R::count('todo_list');
        $pagination = new Pogination($page, $perpage, $count);
        $start = $pagination->getStart();

        if (!empty($_SESSION['arrow_sort']))  $sort = $_SESSION['arrow_sort'];

        $items = R::getAll(
            "SELECT `todo_list`.*, `users`.`name` as `user_name`, `users`.`email`, `users`.`role` as `user_role` 
                FROM `todo_list`
                JOIN `users` ON `todo_list`.`user_id` = `users`.`id`
               {$sort}
               LIMIT {$start}, {$perpage}"
        );

        $this->setData(compact('items', 'isAdmin', 'pagination'));
    }
}