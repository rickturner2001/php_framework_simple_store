<?php

namespace app\core\components;

use app\core\Application;
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

    public function createCardItem($item)
    {
        return sprintf(
            "
        <div class='card' style='width: 18rem'>
            <div class='card-body'>
                <h5 class='card-title'>%s</h5>
                <p class='card-text'>SKU: %s</p>
                <p class='card-text'>Price: %s</p>
                <p class='card-text'>%s: %s</p>
                
            </div>
        </div>   
        ",
            $item['name'],
            $item['sku'],
            $item['price'],
            $this->defineAttributeLabel($item['type']),
            $item['attribute']
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
}
