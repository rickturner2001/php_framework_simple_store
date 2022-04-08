<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'passowrd';
    public const TYPE_NUMBER = 'number';
    public const TYPE_SELECT = 'select';

    private function regularInput()
    {

        return '<div class="mb-3">
                 <label  id="%s-label" for="%s" class="form-label">%s</label>
                 <input  id="%s" @input="validate%s" type="%s" name="%s" id="%s" aria-describedby="emailHelp" value="%s" class="form-control%s">
                 <div class="invalid-feedback">%s</div>
                </div>';
    }
    private function selectInput()
    {

        return '<div class="mb-3">
                    <label for="productType" class="form-label">Type</label>
                    <select v-model="type" @change="getChoice" class="form-select" aria-label="Default select example" name="type" id="productType">
                        <option value="book" selected>Book</option>
                        <option value="furniture">Furniture</option>
                        <option value="dvd">DVD</option>
                    </select>
                </div';
    }

    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        if ($this->type !== 'select') {

            return sprintf(
                $this->regularInput(),
                $this->attribute,
                $this->attribute,
                ucfirst($this->attribute),
                $this->attribute,
                $this->model->labels()[$this->attribute] ?? $this->attribute,
                $this->type,
                $this->attribute,
                $this->attribute,
                $this->model->{$this->attribute},
                $this->model->hasError($this->attribute) ? ' is-invalid' : '',
                $this->model->getFirstError($this->attribute)
            );
        }
        return $this->selectInput();
    }

    public function numericField()
    {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }
    public function selectionField()
    {
        $this->type = self::TYPE_SELECT;
        return $this;
    }
}
