<?php


namespace app\controllers;


use app\models\AppModal;
use app\models\Create;
use app\models\User;
use RedBeanPHP\R;
use todo\basic\Controller;

class AppController extends Controller
{
    public static $isAdmin;

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModal();
        self::createUserStub();
        self::createAdmin();
        $user = new User();
        self::$isAdmin = $user->isAdmin();
    }

    public static function createUserStub()
    {
        $stub_user = R::findOne('users', 'role = ?', ['guest']);
        if (empty($stub_user)) {
            $data = [
                'role' => 'guest',
                'name' => 'guest',
                'email' => 'guest',
                'password' => '0000',
            ];
            $tbl = \R::dispense('users');
            foreach ($data as $k => $v) {
                $tbl->$k = $v;
            }
            R::store($tbl);
        }
    }

    public static function createAdmin()
    {
        $stub_user = R::findOne('users', 'role = ?', ['admin']);
        if (empty($stub_user)) {
            $data = [
                'role' => 'admin',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '123456',
            ];
            $tbl = \R::dispense('users');
            $data['password'] = password_hash( $data['password'], PASSWORD_DEFAULT);
            foreach ($data as $k => $v) {
                $tbl->$k = $v;
            }
            R::store($tbl);
        }
    }
}