<?php

namespace ProjectName\Example\Controllers\Api;

use ProjectName\Example\Controllers\BaseController;

class IndexController extends BaseController
{
    public function initialize(){
        $this->view->disable();
    }

    public function indexAction()
    {
//        $this->view->disable();
        print_r($this->dispatcher->getParams());
        echo '{"version":1}';
    }
}