<?php

namespace ProjectName\Example\Controllers\Web;

use ProjectName\Example\Controllers\BaseController;

class IndexController extends BaseController
{
    public function indexAction()
    {
        echo "web";
        $this->view->setVars([
            'name' => 'Testing',
            'title' => 'TItle',
            'body' => 'This is body'
        ]);
    }
}