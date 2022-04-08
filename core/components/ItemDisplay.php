<?php

namespace app\core\components;

use app\core\Application;
use app\core\Request;
use PDO;

class ItemDisplay
{

    public function getItems()

    {
        $statement = Application::$app->db->pdo->prepare("SELECT * FROM items");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getSkus()
    {
        $statement = Application::$app->db->pdo->prepare("SELECT sku FROM items");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }

    public function createCardItem($item)
    {
        return sprintf(
            "
        <div class='card card-hidden-border' style='width: 20rem'>
        <input type='checkbox' name=%s class='checkbox delete-checkbox'></input>
            <div class='card-body'>
                <h5 class='card-title'>%s</h5>
              
                <div class='card-items'>
                    <p class='card-items-label'>Price</p>
                    <p class='card-text card-price'>%s$</p>
                </div>
                <div class='card-items'>
                    <p class='card-items-label'>%s</p>
                    <p class='card-text card-attribute %s'> %s</p>
                </div>
                <div class='card-bottom'>
                <p class='card-text card-type card-type-%s badge rounded-pill'>%s</p>
                <p class='card-text card-sku  badge rounded-pill'>%s</p>
                
                </div>
                </div>
        </div>   
        ",
            $item['sku'],
            $item['name'],
            $item['price'],
            $this->defineAttributeLabel($item['type']),
            $this->defineAttributeLabel($item['type']),
            $item['attribute'],
            $item['type'],
            $item['type'],
            $item['sku'],
        );
    }

    private function defineAttributeLabel($type): string
    {
        if ($type === 'book') {
            return "Weight";
        }
        if ($type === 'dvd') {
            return "Size";
        }
        if ($type === 'furniture') {
            return "Dimensions";
        }
    }

    

    static public function massDelete(array $requestBody){
        foreach($requestBody as $key=>$value){
            $statement = Application::$app->db->pdo->prepare("DELETE FROM items WHERE sku = '$key' ");
            // exit;
            $statement->execute();
        }
    }
}
