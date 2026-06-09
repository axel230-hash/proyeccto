<?php

require_once __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function validarJWT() {

    session_start();

    if (!isset($_SESSION['token'])) {
        header("Location: login.php");
        exit();
    }

    $secret = "nepe";

    try {
        return JWT::decode(
            $_SESSION['token'],
            new Key($secret, 'HS256')
        );
    } catch (Exception $e) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}