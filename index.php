<?php
require('config.php');
require('vendor/autoload.php');
spl_autoload_register(function ($class) {
    if (file_exists("Core/" . $class . ".php")) {
        require("Core/" . $class . ".php");
    } elseif (file_exists("Controller/" . $class . ".php")) {
        require("Controller/" . $class . ".php");
    } elseif (file_exists("Model/" . $class . ".php")) {
        require("Model/" . $class . ".php");
    }
});

if (session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

$core = new Core;
$core->run();
