<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;

class ItemModel extends DbModel
{

    public string $sku = "";
    public string $name = "";
    public string $price = "";
    public string $type = "";
    public $attribute = "";


    public function tablename(): string
    {
         return "items";
    }

    public function register()
    {
        return $this->save();
    }

    public function rules(): array
    {
        return [
            "sku" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 9], [self::RULE_MAX, 'max' => 10], [self::RULE_UNIQUE, 'class' => self::class]],
            "name" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED, [self::RULE_NUMERIC]],
            "type" => [self::RULE_REQUIRED],
            "attribute" => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return ["sku", 'name', 'price', 'type', 'attribute'];
    }

    public function labels(): array
    {
        return [
            "sku" => "SKU",
            "name" => "Name",
            "price" => "Price",
            "type" => "Type",
            "attribute" => "Attribute"
            
        ];
    }
}
