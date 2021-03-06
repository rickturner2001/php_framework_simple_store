
<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\ItemController;
use app\core\Application;
use app\controllers\SiteController;

$app = new Application(dirname(__DIR__));

$app->router->get("/add-product", [ItemController::class, 'item']);
$app->router->post("/add-product", [ItemController::class, 'item']);
$app->router->get("/", [SiteController::class, 'home']);
$app->router->post("/", [ItemController::class, 'home']);


$app->run();