<?php

namespace ProjectName\Example\Models;

use Phalcon\Mvc\Model;

class User extends Model
{
    public $id;
    public $name;
    public $email;

    public function initialize(){
        $this->setSchema('dbo');
        $this->setSource('users');
    }

    public function onConstruct(){

    }

    public function toString(){
        return
            "ID : " . $this->id . ", " .
            "Nama : " . $this->name . ", " .
            "Email : " . $this->email . "";
    }
}