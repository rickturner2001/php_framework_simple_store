<?php

use app\core\Application;
use app\core\components\ItemDisplay;

$itemsObj = new ItemDisplay();

$skus = $itemsObj->getSkus();

?>

<style>
    <?php include Application::$app::$ROOT_DIR . '/views/static/css/form.css';  ?>
</style>

<div class="container" id="app">


    <?php $form = \app\core\form\Form::begin('', "post"); ?>

    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'sku') ?>
            <div v-if="skuNotUniqueError" class="alert alert-danger  fade show" role="alert">
                <strong>SKU Value Error!</strong> This SKU has already been registered
            </div>
            <div v-if="skuLengthError" class="alert alert-danger  fade show" role="alert">
                <strong>SKU Value Error!</strong> The SKU should be 9 characters long
            </div>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'name') ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'price')->numericField() ?>
            <div v-if="priceValueError" class="alert alert-danger  fade show" role="alert">
                <strong>Price Value Error!</strong> Please make sure the price is a numeric value
            </div>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'attribute') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'type')->selectionField() ?>
        </div>
    </div>

    <!-- Book -->
    <div v-if='type === "book"' class="row">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Weight (Kg)</label>
            <input @input='validateAttribute' type="text" id="book" name="attribute" class="form-control" id="exampleFormControlInput1" placeholder="200">
            <div v-if="attributeErrorNonNumeric" class="alert alert-danger  fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            </div>

        </div>
    </div>

    <!-- Furniture -->
    <div v-if='type === "furniture"' class="row furniture-inputs">
        <div class="col">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Height (Cm)</label>
                <input @input='validateHeight' type="text" id="height" name="attribute" class="form-control" id="exampleFormControlInput1" placeholder="200">
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Width (Cm)</label>
                <input @input='validateWidth' type="text" id="width" name="attribute" class="form-control" id="exampleFormControlInput1" placeholder="200">
            </div>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Length (Cm)</label>
            <input @input='validateLength' type="text" id="length" name="attribute" class="form-control" id="exampleFormControlInput1" placeholder="200">

        </div>

    </div>

    <!-- Dvd -->
    <div v-if='type === "dvd"' class="row">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Size (MB)</label>
            <input @input='validateAttribute' type="text" id="book" name="attribute" class="form-control" id="exampleFormControlInput1" placeholder="200">
            <div v-if="attributeErrorNonNumeric" class="alert alert-danger  fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="d-flex form-btns">

            <button type="submit" name="submit" class="btn btn-submit">Save</button>
            <a href="add-product" class="btn btn-danger" id="reset">Cancel</a>

        </div>
    </div>

    <?php \app\core\form\Form::end(); ?>


</div>
<div class='card' style='width: 20rem'>
    <div class='card-body'>
        <h5 class='card-title text-center'>{{name}}</h5>

        <div v-if='price' class='card-items'>
            <p class='card-items-label'>Price</p>
            <p class='card-text card-price'>{{price}}$</p>
        </div>
        <div class='card-items'>
            <p v-if='type == "book" && attribute' class='card-items-label'>Weight</p>
            <p v-if='type == "dvd" && attribute' class='card-items-label'>Size</p>
            <p v-if='type == "furniture" && attribute' class='card-items-label'>Dimensions</p>

            <p class='card-text card-attribute'>{{attribute}}</p>
        </div>
        <div class='card-bottom'>
            <p class='card-text card-type badge rounded-pill'>{{type}}</p>
            <p class='card-text card-sku  badge rounded-pill'>{{sku}}</p>

        </div>
    </div>
</div>



<script>
    <?php include Application::$app::$ROOT_DIR . '/views/static/js/validate_form.js';  ?>
</script>
<script type="text/javascript">
    let skuList = <?php echo json_encode($skus); ?>
</script>
<script>
    <?php include Application::$app::$ROOT_DIR . '/views/static/js/app.js';  ?>
</script>