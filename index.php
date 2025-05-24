<?php


if (isset($_GET['url']) && $_GET['url'] === 'ping') {
    header('Content-Type: application/json');
    echo json_encode(['ping' => 'pong']);
}
