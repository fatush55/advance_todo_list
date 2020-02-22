<?php


namespace app\models;



class Create extends AppModal
{

    public $attrebutes = [
        'title' => '',
        'content' => '',
    ];

    public $rules = [
        'required' =>[
            ['title'],
            ['content']
        ]
    ];

}