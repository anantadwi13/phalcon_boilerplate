<?php

namespace ProjectName\Example\Controllers\Api;

use ProjectName\Example\Controllers\BaseController;
use ProjectName\Example\Models\User;

class IndexController extends BaseController
{
    public function initialize(){
        $this->view->disable();
    }

    public function indexAction()
    {
        echo '{"version":1}';
    }

    public function getAction(){
        $u = User::find();
        echo json_encode($u->toArray());
    }
}