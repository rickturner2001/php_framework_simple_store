<?php


namespace app\core;



abstract class Model

{
    public const RULE_REQUIRED = 'required';
    public const RULE_NUMERIC = 'numeric';
    public const RULE_SKU = 'sku';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_UNIQUE = 'unique';


    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }


    abstract public function rules(): array;

    public function labels(): array{
        return [];
    }

    public array $errors = [];

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                # if rulename is not a string then it's an array
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_NUMERIC && !is_numeric($value)){
                    $this->addError($attribute, self::RULE_NUMERIC);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
                if($ruleName === self::RULE_UNIQUE){
                    
                    $className = $rule['class'];
                    $uniqueAttribute = $rule['attribute'] ?? $attribute;
                    $tablename = $className::tablename();
                    $statement = Application::$app->db->prepare("SELECT * FROM $tablename WHERE $uniqueAttribute =:attr");
                    $statement->bindValue(":attr", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();

                    if ($record){
                        $this->addError($attribute, self::RULE_UNIQUE, ['field' => $attribute]);
                    }


                }   

            }
        }
        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule, $params= [])
    {
        $message = $this->errorMessages()[$rule] ?? "";
        
        foreach($params as $key => $value){
            $message = str_replace("{{$key}}", $value, $message);
        }

        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
    
        return [
            self::RULE_REQUIRED => "This field is required",
            self::RULE_NUMERIC => "This field must be numeric",
            self::RULE_MIN => "Min lenght of this field must be {min}",
            self::RULE_MAX => "Max lenght of this field must be {max}",
            self::RULE_UNIQUE => "SKU must be unique",
        ];
    }

    public function hasError($attribute){
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute){
        return $this->errors[$attribute][0] ?? false;
    }
}
