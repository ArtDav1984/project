<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();

require_once "Components/Autoload.php";

$router = new Router();
$router->run();