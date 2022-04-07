
<?php

use app\core\Application;
use app\core\components\ItemDisplay;

use function Composer\Autoload\includeFile;

$itemsObj = new ItemDisplay();
$items = $itemsObj->getItems();
?>
<style>
    <?php include "test.css" ?>
</style>


<h1>Home</h1>

<div class="container" id="app">
    <div class="row row-cols-2 container-gap">
        <?php
        foreach ($items as $item) {
            echo $itemsObj->createCardItem($item);
        }
        ?>
    </div>
</div>


<script>
        <?php include Application::$app::$ROOT_DIR . '/views/static/js/app.js';?>
</script>