<?php

namespace app\controllers;

use app\core\App;

class PhpInfoController {

    public function info()
    {
        phpinfo();
    }
}
