<?php

use App\Core\Core;
use App\Routes\Routes;

require_once 'vendor/autoload.php';
require_once 'src/Routes/routes.php';

Core::run(Routes::routes());
