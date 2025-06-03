<?php

use App\Core\Core;
use App\Routes\Routes;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Routes/main.php';

Core::run(Routes::routes());
