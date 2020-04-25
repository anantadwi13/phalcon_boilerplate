<?php
declare(strict_types=1);

namespace App\Common\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ErrorController extends Controller
{
    public function initialize()
    {
        $this->view->setViewsDir(__DIR__ . '/../resources/views/');
        $this->view->setLayoutsDir(__DIR__ . '/../resources/layouts/');
        $this->view->setPartialsDir(__DIR__ . '/../resources/partials/');
        // Disable MAIN Layout View, Because it is confusing (anti pattern)
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }

    public function notFoundAction()
    {
        $this->view->setTemplateBefore('main');
        $this->view->setLayout('coba_layout');
        $this->view->setTemplateAfter('coba_layout_2');
        $this->view->partial('partial_view');
//        $this->view->pick('common/myview');
        echo '404 - not found';
    }

    public function serverErrorAction()
    {
        echo 'Server Error';
    }

}

