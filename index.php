<?php

require_once 'vendor/autoload.php';

use App\Database\Database;

class PrintToHello {
    public static function run($a) {
        echo 'Say Hello'.$a;
    }
}

// Duas maneiras de fazer isso:
// Primeria:
$rts = ['/' => fn($a) => PrintToHello::run($a)];
// Segunda:
$rts = ['/' => [], ]


// echo var_dump($rts['rt']);
call_user_func($rts['rt'], ' concatenação mopai');

echo '<pre>';
var_dump($rts);

// echo print_r(Database::connect());
// echo var_dump(file_get_contents('php://input'));


