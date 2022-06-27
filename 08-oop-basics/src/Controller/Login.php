<?php

namespace CMS\Controller;

use CMS\Controller;
use CMS\ErrorController;
use CMS\IndexController;

final class Register extends Controller implements IndexController, ErrorController {

    public function index(): void {
        echo "REGISTER -> INDEX";
    }

    public function error(): void {
        echo "REGISTER -> ERROR";
    }

}
