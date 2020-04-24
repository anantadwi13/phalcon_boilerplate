<?php
declare(strict_types=1);

namespace App\Common\Controllers;

use Phalcon\Mvc\Controller;

class ErrorController extends Controller
{
    public function initialize()
    {
        $this->view->setViewsDir(__DIR__ . '/../views');
    }

    public function notFoundAction()
    {
        $this->view->setLayoutsDir(__DIR__ . '/../views');
        echo '404 - not found';
    }

    public function serverErrorAction()
    {
        echo 'Server Error';
    }

}

