<?php

namespace app\core;



abstract class DbModel extends Model
{

    abstract public function tablename(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tablename = $this->tablename();
        $attributes = $this->attributes();
        $params = array_map(fn($attribute) => ":$attribute", $attributes);
        $statement = self::prepare("INSERT INTO $tablename (" .implode(',', $attributes).") 
                                    VALUES (".implode(',', $params).")");

        
        foreach($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }



    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
