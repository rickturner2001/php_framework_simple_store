<?php

use app\core\Application;
use app\core\components\ItemDisplay;

use function Composer\Autoload\includeFile;

$itemsObj = new ItemDisplay();
$items = $itemsObj->getItems();
?>


<style>
    <?php include Application::$app::$ROOT_DIR . '/views/static/css/home.css'; ?>
</style>

<div class="main-container">

    <div class="main-container__button-container">

        <button class="btn navbar__btn-secondary" type="submit" form="app" id="delete-product-btn">MASS DELETE</button>
        <a class="btn navbar__btn-primary" href="/add-product">ADD</a>
    </div>


    <form action="" method="post" class="" id="app">
        <div class="row row-cols-2 container-gap">
            <?php
            foreach ($items as $item) {
                echo $itemsObj->createCardItem($item);
            }
            ?>
        </div>
    </form>

</div>

<script>
    <?php include Application::$app::$ROOT_DIR . '/views/static/js/app.js'; ?>
</script>
<script>
    <?php include Application::$app::$ROOT_DIR . '/views/static/js/items_check.js'; ?>
</script>