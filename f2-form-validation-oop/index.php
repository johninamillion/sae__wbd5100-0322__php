<?php

namespace SAE\FormValidation;

use SAE\FormValidation\Controller\Register as RegisterController;

require_once 'config.php';
require_once 'autoload.php';

///** @var RegisterController $controller */
$RegisterController = new RegisterController();
$RegisterController->index();
