<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\ItemController;
use app\core\Application;
use app\controllers\SiteController;

$app = new Application(dirname(__DIR__));

$app->router->get("/", [SiteController::class, 'home']);
// $app->router->get("/add_item", [SiteController::class, 'item']);
$app->router->get("/add_item", [ItemController::class, 'item']);
$app->router->post("/add_item", [ItemController::class, 'item']);


$app->run();