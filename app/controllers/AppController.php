<?php


namespace app\controllers;


use app\models\AppModal;
use app\models\Create;
use RedBeanPHP\R;
use todo\basic\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModal();

        $stub_user = R::findOne('users', 'id = ?', [1]);
        if (empty($stub_user)){
            $data = [
               'id' => 1,
               'status' => 'guest',
               'name' => 'guest',
               'email' => 'guest',
            ];
            //Todo - to do stub_user
            $create = new Usrs();
            $create->load($data);
            $create->save('users');
        }

//        debug($stub_user);

    }



}