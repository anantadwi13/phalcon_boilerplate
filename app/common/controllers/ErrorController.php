<?php
declare(strict_types=1);

namespace App\Common\Controllers;

use Phalcon\Mvc\Controller;

class ErrorController extends Controller
{
    public function initialize()
    {
        $this->view->setViewsDir(__DIR__ . '/../views/');
        $this->view->setLayoutsDir(__DIR__ . '/../layouts/');
        $this->view->setPartialsDir(__DIR__ . '/../another/');
    }

    public function notFoundAction()
    {
        $this->view->setTemplateBefore('main');
        $this->view->setLayout('coba_layout');
        $this->view->setTemplateAfter('coba_layout_2');
//        $this->view->partial('another_layout');
//        $this->view->pick('common/myview');
        echo '404 - not found';
    }

    public function serverErrorAction()
    {
        echo 'Server Error';
    }

}

