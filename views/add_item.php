<?php

use app\core\Application;
?>
<style>
    <?php include Application::$app::$ROOT_DIR . '/views/static/css/add_item.css';  ?>
</style>

<div class="container" id="app">
    <h1>Some Title</h1>
    <?php $form = \app\core\form\Form::begin('', "post"); ?>

    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'sku') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'name') ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'price')->numericField() ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'type')->selectionField() ?>
        </div>
    </div>
    <?php echo $form->field($model, 'attribute') ?>
    <div v-if='type === "book"' class="row">
        <div class="mb-3">
            <label   for="exampleFormControlInput1" class="form-label">Weight</label>
            <input type="text" id="book" name="attribute" class="form-control" id="exampleFormControlInput1" placeholder="200">
        </div>
    </div>
    <div class="row">

        <button type="submit" name="submit" class="btn btn-primary btn-submit">Submit</button>
    </div>

    <?php \app\core\form\Form::end(); ?>

</div>
<button class="check-btn" @click="getData"> test</button>

<script>
    <?php include Application::$app::$ROOT_DIR . '/views/static/js/form.js';  ?>
</script>
<script>
    <?php include Application::$app::$ROOT_DIR . '/views/static/js/app.js';  ?>
</script>