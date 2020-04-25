<?php

namespace ProjectName\Example\Controllers\Web;

use ProjectName\Example\Controllers\BaseController;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $this->view->setVars([
            'name' => 'Testing',
            'title' => 'TItle',
            'body' => 'This is body'
        ]);
        echo "This is index of web controller";
    }
}