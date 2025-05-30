<?php

require_once 'vendor/autoload.php';

use App\Database\Database;

// class PrintToHello {
//     public static function run($a) {
//         echo 'Say Hello'.$a;
//     }
// }

// Duas maneiras de fazer isso:
// Primeria:
// $rts = ['/' => fn($a) => PrintToHello::run($a)];
// // Segunda:
// $rts = ['/' => [], ]


// echo var_dump($rts['rt']);
// call_user_func($rts['rt'], ' concatenação mopai');

// echo '<pre>';
// var_dump($rts);

// echo print_r(Database::connect());
// echo var_dump(file_get_contents('php://input'));


// Testando expressões regulares:
// $rota = '/users/22222/';
// $padrao = '#' . '^/users/(\d+)(w+)$' . '#';
// preg_match($padrao, $rota, $matches);

// echo '<pre>';
// echo print_r($matches[1]);

// if (isset($_GET['url'])) {
//     $url = $_GET['url'];
//     $pattern = '#' . '^users/(\d+)$' . '#';
//     preg_match($pattern, $url, $matches);
//     array_shift($matches);
//     [$id] = $matches;

//     echo '<pre>';
//     echo "$id";
// }


class T {
    public static function t($arg1) {
        echo "$arg1";
    }
}

echo T::class::t(22);