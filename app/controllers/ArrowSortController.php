<?php


namespace app\controllers;


use todo\App;

class ArrowSortController
{
    public function indexAction()
    {
        if (!empty($_POST)) {
            $action = $_POST['action'];
        } else {
            $action = '';
        }

        switch ($action) {
            case 'id-up':
                $sort = ' ORDER BY `todo_list`.`id` DESC';
                $_SESSION['arrow_action'] = 'id-up';
                break;
            case 'title-up':
                $sort = ' ORDER BY `todo_list`.`title` DESC';
                $_SESSION['arrow_action'] = 'title-up';
                break;
            case 'title-down':
                $sort = 'ORDER BY `todo_list`.`title`';
                $_SESSION['arrow_action'] = 'title-down';
                break;
            case 'user-up':
                $sort = ' ORDER BY `users`.`name` DESC';
                $_SESSION['arrow_action'] = 'user-up';
                break;
            case 'user-down':
                $sort = ' ORDER BY `users`.`name`';
                $_SESSION['arrow_action'] = 'user-down';
                break;
            case 'email-up':
                $sort = ' ORDER BY `users`.`email` DESC';
                $_SESSION['arrow_action'] = 'email-up';
                break;
            case 'email-down':
                $sort = ' ORDER BY `users`.`email`';
                $_SESSION['arrow_action'] = 'email-down';
                break;
            default:
                $sort = ' ORDER BY `todo_list`.`id`';
                $_SESSION['arrow_action'] = 'id-down';
        }

        $_SESSION['arrow_sort'] = $sort;
    }

}